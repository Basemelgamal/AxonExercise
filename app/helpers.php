<?php

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
