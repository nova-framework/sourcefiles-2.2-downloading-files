<?php
namespace Helpers;

class Files
{
    public static function download($file)
    {
        if (file_exists($file)) {
            $path = pathinfo($file);
            $file = $path['basename'];
            header('Content-type: application/octet-stream');
            header("Content-Disposition: filename='$file'");
            readfile($file);
            exit();

        } else {
            return 'File not found.';
        }
    }
}
