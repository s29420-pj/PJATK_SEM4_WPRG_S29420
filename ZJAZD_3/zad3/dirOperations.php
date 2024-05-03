<?php

function directoryOperations($path, $directory, $operation = 'read'): string
{
    if (!str_ends_with($path, '/')) {
        $path .= '/';
    }

    $fullPath = $path . $directory;

    switch ($operation) {
        case 'read':
            if (is_dir($fullPath)) {
                $elements = scandir($fullPath);
                return 'Elements in the directory: ' . implode('<br>', $elements);
            } else {
                return 'The directory does not exist.';
            }
            break;
        case 'delete':
            if (is_dir($fullPath)) {
                if (count(scandir($fullPath)) == 2) { // Directory is empty
                    rmdir($fullPath);
                    return 'The directory has been deleted.';
                } else {
                    return 'The directory is not empty.';
                }
            } else {
                return 'The directory does not exist.';
            }
            break;
        case 'create':
            if (!is_dir($fullPath)) {
                mkdir($fullPath);
                return 'The directory has been created.';
            } else {
                return 'The directory already exists.';
            }
            break;
        default:
            return 'Invalid operation.';
    }
}

$path = $_POST['path'];
$directory = $_POST['directory'];
$operation = $_POST['operation'];

$message = directoryOperations($path, $directory, $operation);

echo $message;