<?php
namespace app\functions;

use Exception;

/**
 * Description of Registry
 */
abstract class Registry {

    private static $registry = array();

    public static function set($key, $value, $protect = FALSE) {
        if ($protect && array_key_exists($key, self::$registry)) {
            throw new Exception("$key is already in registry");
        }
        self::$registry[$key] = $value;
    }

    public static function get($key) {
        return array_key_exists($key, self::$registry) ? self::$registry[$key] : NULL;
    }

}