<?php

namespace OpenWeatherMap;

use CURL;

class Basic 
{
    /**
     * @apiKey String, $apiPoint string
     */    
    protected $apiKey;
    protected $apiPoint='https://api.openweathermap.org/data/2.5/weather';

    /**
     * constructor
     *
     * @param    $apiKey string
     * @return   void
     */
    public function __construct(string $apiKey)   {
        $this->apiKey = $apiKey;
    }
    /**
     * request performer
     *
     * @param    $params array
     * @return   string
     */
    protected function request(array $params=[]) : string   {
        $params['appid']=$this->apiKey;
        try {
            return CURL::get($this->apiPoint.'?'.http_build_query($params));
        } catch (Exception $e) {
            return 'OpenWeatherMap request error';
        }
    }

}