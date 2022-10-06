<?php

declare(strict_types=1);

class Loader {

    /**
     * @param string $className
     * @return void
     */
    public static function loadByClassName(string $className): void
    {
        $classNameData = explode('\\', $className);
        $classNameFullPath = __DIR__ . '/' . implode(DIRECTORY_SEPARATOR, $classNameData);
        require_once($classNameFullPath . '.php');
    }
}
