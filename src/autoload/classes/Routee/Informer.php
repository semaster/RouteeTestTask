<?php

namespace Routee;


class Informer extends Basic 
{
      /**
     * send message by Routee service
     *
     * @param    $phone string, $temperature float
     * @return   string
     */
    public function sendMessage(string $phone, float $temperature) : string  {

        $this->message['body'] = ($temperature > 20) ? 
                    "Your name and Temperature more than 20C. <{$temperature}>" :
                    "Your name and Temperature less than 20C. <{$temperature}>" ;

        $this->message['to']   = $phone;
        $this->message['from'] = 'amdTelecom';

        return $this->send();

    }

}