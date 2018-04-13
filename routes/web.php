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
    $savedir = join_paths(getcwd(), "tmp_" . str_random(10));
    try {
        $phar = new PharData('test.tar.gz');
        $phar->extractTo($savedir);
    } catch (Exception $e) {
        throw new Exception("Error extracting tar");
    }
    $meta = json_decode(file_get_contents(join_paths($savedir, "meta.json")));

    dd($meta);
});
