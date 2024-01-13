<?php
namespace App\Repositories;

use App\Models\Customer;

class phoneNumberRepository
{
    public function index(){
        return Customer::get();
    }

    public function indexPaginated($perPage){
        return Customer::paginate($perPage);
    }
}
