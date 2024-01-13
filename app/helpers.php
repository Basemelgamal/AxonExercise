<?php

use Illuminate\Support\Facades\Validator;

if(!function_exists('getCountryByCode')){
    function getCountryByCode($countryCode){
        $cleanCountryCode = ltrim($countryCode, '+');
        switch ($cleanCountryCode) {
            case +212:
                return 'Morocco';
                break;
            case +237:
                return 'Cameroon';
                break;
            case +251:
                return 'Ethiopia';
                break;
            case +258:
                return 'Mozambique';
                break;
            case +256:
                return 'Uganda';
                break;
            default:
                return null;
                break;
        }
    }
}

if(!function_exists('getState')){
    function getState($countryCode, $phoneNumber){
        $cleanCountryCode = ltrim($countryCode, '+');

        $phoneData = [
            'country_code' => $cleanCountryCode,
            'phone_number' => $phoneNumber,
        ];

        $allowedCountryCodes = [
            '237' => '/^[2368]\d{7,8}$/',
            '251' => '/^[1-59]\d{8}$/',
            '212' => '/^[5-9]\d{8}$/',
            '258' => '/^[28]\d{7,8}$/',
            '256' => '/^d{9}$/',
        ];

        $pregMatch = preg_match($allowedCountryCodes[$phoneData['country_code']], $phoneNumber);

        return $pregMatch == 0 ? 'NOK' : 'OK';
    }
}
