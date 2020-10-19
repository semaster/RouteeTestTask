<?php 
declare(strict_types=1);

require_once(dirname(__FILE__).'/autoload/autoload.php');
require_once(dirname(__FILE__).'/config/settings.php');



$OpenWeatherMap = new OpenWeatherMap\WeatherDataByCityName(Config::get('openweathermap.apikey'));

$temperature = $OpenWeatherMap->getCurrentCelcium('Thessaloniki');

$Informer = new Routee\Informer(Config::get('routee.id'), Config::get('routee.secret'));

$result = $Informer->sendMessage(Config::get('receiver.phone'), $temperature);

echo 'task done';



