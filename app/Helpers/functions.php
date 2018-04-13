<?php
function join_paths() {
    $paths = array();

    foreach (func_get_args() as $arg) {
        if ($arg !== '') { $paths[] = $arg; }
    }

    return preg_replace('#/+#','/',join('/', $paths));
}

function put_file($file_path)
{
    $hash = hash_file('sha256', $file_path);
    copy($file_path, storage_path(join_paths('files_bucket', $hash)));
    return $hash;
}