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

        $countryCode = null;
        if (strlen($numericPhoneNumber) > 0) {
            $countryCode = substr($numericPhoneNumber, 0, 3);
            $phoneNumber = ltrim($numericPhoneNumber, $countryCode);

        }

        return $phoneNumber;
    }

    public function getCountryAttribute(){
        // Cameroon     | Country code = +237 | regex = \(237\)\ ?[2368]\d{7,8}$
        // Ethiopia     | Country code = +251 | regex = \(251\)\ ?[1-59]\d{8}$ Morocco | Country code = +212 | regex = \(212\)\ ?[5-9]\d{8}$
        // Mozambique   | Country code = +258 | regex = \(258\)\ ?[28]\d{7,8}$
        // Uganda       | Country code = +256 | regex = \(256\)\ ?\d{9}$
        $numericPhoneNumber = preg_replace('/[^0-9]/', '', $this->phone);

        $countryCode = null;
        if (strlen($numericPhoneNumber) > 0) {
            $countryCode = substr($numericPhoneNumber, 0, 3);
        }

        $country = \getCountryByCode($countryCode);

        return  $country;
    }
}
