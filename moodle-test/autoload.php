<?php

declare(strict_types=1);

// Define the autoloader function
spl_autoload_register(function ($class) {
    // Define the path to the src directory
    $srcDirectory = __DIR__ . '/src';

    // Convert the class name to a path by replacing namespace separators with directory separators
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // Full path to the file
    $filePath = $srcDirectory . DIRECTORY_SEPARATOR . $classPath;

    // Search for the class file recursively in the src directory
    if (file_exists($filePath)) {
        require_once $filePath;
        return;
    }

    // If the class file wasn't found in the initial directory, search recursively
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcDirectory)) as $file) {
        if ($file->isFile() && $file->getBasename() === basename($classPath)) {
            require_once $file->getRealPath();
            return;
        }
    }
});