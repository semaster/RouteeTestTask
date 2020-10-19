<?php


spl_autoload_register ('autoload');

Config::load('settings.php');

  /**
 * autoload basic function
 *
 * @param    $phone string, $temperature float
 * @return   string
 */
function autoload ($className) : void 
{
    $className = str_replace( "..", "", $className );
    $className = ltrim( $className, '\\' );
    $className = str_replace( '\\', '/', $className );
    $fileName = dirname(__FILE__).'/classes/'.$className.'.php';
    if (is_readable($fileName)) include_once($fileName); else throw new Exception($className.'  not found');
}

