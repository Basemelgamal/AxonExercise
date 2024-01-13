<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function getCountryCodeAttribute(){
        $numericPhoneNumber = preg_replace('/[^0-9]/', '', $this->phone);
        $countryCode = null;
        if (strlen($numericPhoneNumber) > 0) {
            $countryCode = substr($numericPhoneNumber, 0, 3);
        }
        return $countryCode;
    }

    public function getPhoneNumberAttribute(){
        $numericPhoneNumber = preg_replace('/[^0-9]/', '', $this->phone);
        if (strlen($numericPhoneNumber) > 0) {
            $phoneNumber = ltrim($numericPhoneNumber, $this->countryCode);
        }
        return $phoneNumber;
    }

    public function getCountryAttribute(){
        $country = getCountryByCode($this->countryCode);
        return  $country;
    }

    public function getStateAttribute(){
        $state = getState($this->countryCode, $this->phoneNumber);
        return  $state;
    }
}
