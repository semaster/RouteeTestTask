<?php 

class CURL {

    /**
     * Use curl to perform GET method.
     *
     * @param    $url string
     * @return   data string
     */
    public function get(string $url) : string {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }
    /**
     * Use curl to perform PST method.
     *
     * @param    $url string, $post string, $headers string
     * @return   data string
     */
    public function post(string $url, string $post, array $headers) : string {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $post,
          CURLOPT_HTTPHEADER => $headers,
        ));

        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }


}
