<?php

namespace OpenWeatherMap;

class WeatherDataByCityName extends Basic 
{
	  /**
     * get current temperature in celcium by city
     *
     * @param    $cityName string
     * @return   float
     */
    public function getCurrentCelcium(string $cityName) :float   {
    	
        $response = $this->request([
            'q' => $cityName,
        ]);

        $tmp = json_decode($response);

        return $tmp->main->temp - 273.15;

    }

}

