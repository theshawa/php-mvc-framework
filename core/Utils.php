<?php

namespace core;

class Utils
{
    /**
     * @param string $path
     * @return string
     */
    public static function formatPath(string $path): string
    {
        return trim($path, "/");
    }
}