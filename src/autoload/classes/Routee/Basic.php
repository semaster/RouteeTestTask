<?php

namespace Routee;

use CURL;

class Basic 
{
    /**
     * @apiKey String
     */    
    protected $applicationID;
    protected $applicationSecret;
    protected $token;
    protected $message;
    protected $oauthPoint='https://auth.routee.net/oauth/token';
    protected $connectPoint='https://connect.routee.net/sms';
    /**
     * constructor
     *
     * @param    $id string, $secret string
     * @return   void
     */
    public function __construct(string $id, string $secret)   {
        $this->applicationID = $id;
        $this->applicationSecret = $secret;
        $this->token();
    }
      /**
     * get token for Routee service
     *
     * @param    no
     * @return   void
     */
    protected function token() : void   {
        $b64auth = base64_encode($this->applicationID . ':' . $this->applicationSecret);
        try {
            $result = CURL::post(
                $this->oauthPoint, 
                http_build_query(['grant_type' => 'client_credentials']),
                array(
                    "authorization: Basic {$b64auth}",
                    "content-type: application/x-www-form-urlencoded"
                )
            );

            $this->token = json_decode($result)->access_token;

        } catch (Exception $e) {
            return;
        }
    }
      /**
     * send message by Routee service
     *
     * @param    $this
     * @return   string
     */
    protected function send() : string  {
        try {
            $response = CURL::post(
                $this->connectPoint, 
                json_encode([
                    'body' => $this->message['body'],
                    'to'   => $this->message['to'],
                    'from' => $this->message['from'],
                ]),
                array(
                    "authorization: Bearer  {$this->token}",
                    "content-type: application/json"
                )
            );

            return 'Message sent';

        } catch (Exception $e) {
            return "Could not send";
        }
    }
}