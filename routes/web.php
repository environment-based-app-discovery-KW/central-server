<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
//    $savedir = join_paths(getcwd(), "tmp_" . str_random(10));
    $savedir = join_paths(getcwd(), "tmp_");
    try {
        $phar = new PharData('test.tar.gz');
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
        $app_version->code_bundle_url = ""; //TODO
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
            $dep->code_bundle_url = ""; //TODO
            $dep->save();
        }
        $webapp_dep = new \App\WebAppHasWebAppDependency();
        $webapp_dep->web_app_dependency_id = $dep->id;
        $webapp_dep->web_app_version_id = $app_version->id;
        $webapp_dep->save();
    }

    \DB::commit();
});
