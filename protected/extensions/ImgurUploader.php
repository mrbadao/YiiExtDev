<?php

class ImgurUploader extends CApplicationComponent
{
    public $refreshToken;
    public $client_id;
    public $client_secret;
    public $user_id;

    const ImgUrAPI_ALIAS_PASTH = "application.vendors.ImgUrAPI";
    const  TOKEN_URL = "https://api.imgur.com/oauth2/token";

    const UPLOAD_URL = 'https://api.imgur.com/3/image.json';
    const  IMG_URL = "https://api.imgur.com/3/account/mrbadao/images";

    const  TIMEOUT = 30;

    public function getImages()
    {
        $postFields = array(
            "refresh_token" => $this->refreshToken,
            "client_id" => $this->client_id,
            "client_secret" => $this->client_secret,
            "grant_type" => "refresh_token",
        );

        $result = self::excuteHTTPSRequest(self::TOKEN_URL, null,$postFields);

        if(isset($result['access_token'])) $accessToken = $result['access_token'];
        else return null;

        $result = self::excuteHTTPSRequest(self::IMG_URL, $accessToken);

        $_images = '';
        Yii::import(self::ImgUrAPI_ALIAS_PASTH.".models.Image", true);

        foreach ($result['data'] as $item) {
            $_images[] = new Image($item);
        }

        return $_images;
    }

    private function excuteHTTPSRequest($url, $accessToken = null, $postFields = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => self::TIMEOUT,
            CURLOPT_RETURNTRANSFER => 1,

            CURLOPT_SSL_VERIFYPEER => false,
        ));

        if ($accessToken) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization:Bearer " . $accessToken));
        }else{
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization:Client-ID ".$this->client_id));
        }

        if ($postFields) {
            $fields_string = '';
            foreach ($postFields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }
            rtrim($fields_string, '&');
            curl_setopt($curl,CURLOPT_POST, count($postFields));
            curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
        }

        $out = curl_exec($curl);
        curl_close($curl);

        return json_decode($out, true);
    }
}