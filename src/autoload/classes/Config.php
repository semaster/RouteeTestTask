<?php

class Config {
    /*** @var array The store for all objects     */
    static private $store = array();
    /**
     * load settings from file
     *
     * @param    $filename string
     * @return   void
     */
    static public function load(string $fileName) : void
    {
        //load from config folder only
        $path = dirname(__DIR__)."/../config/".$fileName;
        //check if can read file
        if (is_readable($path)) $arr = include_once($path);
        //load settings array from file
        if(is_array($arr)) self::$store = $arr;
    }
    /**
     * get parameter from settings array by key
     *
     * @param    $name string
     * @return   void
     */
    static public function get(string $name) : string
    {
        $object = self::$store;
        foreach (explode('.', $name) as $segment) {
            if (!self::exists($object, $segment))  throw new Exception("Object key does not exist");
            $object = $object[$segment];
        }

        return isset($object) ? $object : null;
    }

    /*** Determine if the given key exists in the provided array.*/
    static public function exists(array $object, string $segment) : string
    {
        if ($object instanceof ArrayAccess) {
            return $object->offsetExists($segment);
        }
        return array_key_exists($segment, $object);
    }

}