<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PharData;

/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 4/13/2018
 * Time: 11:05 PM
 */
class WebAppController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->hasFile('targz')) {
            return error("");
        }
        $file = $request->file('targz');
        $newname = str_random(10) . '.tar.gz';
        $newpath = storage_path($newname);
        rename($file->path(), $newpath);
        $savedir = storage_path("extract_" . $newname);
        try {
            $phar = new PharData($newpath);
            $phar->extractTo($savedir);
        } catch (Exception $e) {
            throw new Exception("Error extracting tar");
        }
        $meta = json_decode(file_get_contents(join_paths($savedir, "meta.json")));

        \DB::beginTransaction();
        $app = \App\WebApp::whereName($meta->name)->first();
        if (!$app) {
            $app = new \App\WebApp();
            $app->name = $meta->name;
            $app->description = $meta->description;
            $app->developer_id = 0; //TODO
            $app->save();
        }
        $app_version = \App\WebAppVersion::whereVersion($meta->version)->whereWebAppId($app->id)->first();
        if ($app_version) {
            \App\WebAppHasWebAppDependency::whereWebAppVersionId($app_version->id)->delete();
        } else {
            $app_version = new \App\WebAppVersion();
            $app_version->version = $meta->version;
            $app_version->web_app_id = $app->id;
            $app_version->logo_url = ""; //TODO
            $app_version->code_bundle_hash = put_file(join_paths($savedir, 'app.js'));
            $app_version->save();
        }

        // 解析 dependencies
        foreach ($meta->deps as $depName => $depVersion) {
            $dep = \App\WebAppDependency::whereDependencyVersion($depVersion)->whereDependencyName($depName)->first();
            if (!$dep) {
                $dep = new \App\WebAppDependency();
                $dep->dependency_name = $depName;
                $dep->dependency_version = $depVersion;
                $dep->dependency_name_version = $depName . '_' . $depVersion;
                $dep->code_bundle_hash = put_file(join_paths($savedir, 'deps', $depName . '_' . $depVersion . '.js'));
                $dep->save();
            }
            $webapp_dep = new \App\WebAppHasWebAppDependency();
            $webapp_dep->web_app_dependency_id = $dep->id;
            $webapp_dep->web_app_version_id = $app_version->id;
            $webapp_dep->save();
        }
        rrmdir($savedir);
        unlink($newpath);
        \DB::commit();
        $successful = true;
        return compact('app', 'app_version', 'successful');
    }
}