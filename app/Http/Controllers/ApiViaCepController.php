<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiViaCepController extends Controller
{
    public function getCEP($cep)
    {
        try {
            $url = 'viacep.com.br/ws/'.$cep.'/json/';
            $headers = ['Content-Type' => 'application/json'];

            $getCEP = $this->newCurlGet($url, null, $headers);
            if (!$getCEP['status']) {
                return $getCEP['errors'];
            }

            $data = json_decode($getCEP['data'], true);

            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function newCurlGet($url, $type = 'GET', $headers)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($http_code >= 200 || $http_code <= 299) {
            return ['status' => true, 'data' => $response];
        } else {
            return ['status' => false, 'errors' => $response];
        }
    }
}
