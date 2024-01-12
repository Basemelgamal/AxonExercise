<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'state',
        'country_code',
        'phone_number',
    ];

    function filterPhoneNumbers($query, $request)
    {
        return $query->when(isset($request->country) && !is_null($request->country), function($q) use ($request){
            return $q->where('country', $request->country);
        });
    }
}
