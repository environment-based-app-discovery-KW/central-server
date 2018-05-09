<?php

use phpseclib\Crypt\RSA;

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
    copy($file_path, join_paths(env('FILE_BUCKET_PATH'), $hash));
    return $hash;
}

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir."/".$object))
                    rrmdir($dir."/".$object);
                else
                    unlink($dir."/".$object);
            }
        }
        rmdir($dir);
    }
}

function verfiySignature($signature, $message, $publicKey)
{
//    $message = "APP:auth-test:1525878081992";
//    $signature = "X4DZzHI6EliyKDIxNpiQmbF2uJBFY+VeubVv00OXm2Ipyi3INaLpdSFHONC/pre2ARWPFAa76ka2eXkV/KCYA36xiProwN6IOiAjcNp6ShIoQXQb56c3SQexNcllzhjLAOSOR38Jj5YcZK5v5nVJqhF+gzfZmdGDqoDsGjOLPnmm/THr9LWRSXo2qRWswRB/uOjZlCnqharvTxZCBOaw5rnDSMkmZq6KNSTbaFt4kGnUjbjSBneeqCQl4xfllf0aUfsdA7D8aKVWiWeQyY6FguShhUHXilxLYNvHONj6mB6JP/50QQEJNILL7zAN+bUPgMcy2cpgcWaRZFPRiNzmdw==";
//    $publicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnNqy/RO+wg6pph7O7OfNYGksVyQWEAdBSYzdGX8tA6NZhd6zmAxiBpZnAiqqpGY8HIVaL4CiQyjZKiAEuMwGUXajGIPeAIeaI5pBCEIDgOE5zZZP4LGXEcMu5U3AYgdajLL33rv0J5iMZp7LJrtaJn6+w2AqKA5f8Zx8UmvhPdzG2hdw0GO461dX8bLOtOT8D6gaieb1xkY0h+zdnj4O9e91id/PIvihRAKpFngKc2y5mO0XpWzVp8+961WcqNxLkO+uGHI1IA6dRqBwbQ7Ymd3F90CKTxunwHFnQ/eUkeaQDF62uNibVhaj+elrwcy+XRRWE0a7tjy6HF+v+Np0zQIDAQAB";

    $rsa = new RSA();
    $rsa->loadKey(base64_decode($publicKey));
    $rsa->setPublicKey();
    $rsa->setSignatureMode(RSA::SIGNATURE_PKCS1);
    return $rsa->verify($message, base64_decode($signature));
}

function error($msg, $code = 500)
{
    return Response::json(['errMsg' => $msg], $code);
}