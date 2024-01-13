<?php
namespace App\Http\Services;

use App\Repositories\phoneNumberRepository;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class PhoneNumberService
{
    protected $phoneNumberRepository;
    public function __construct(phoneNumberRepository $phoneNumberRepository){
        $this->phoneNumberRepository = $phoneNumberRepository;
    }

    public function index($request){
        $perPage = $request->input('perPage', 10);

        if((!is_null($request->state) && is_string($request->state)) || (!is_null($request->country) && is_string($request->country))){
            $result = $this->filter($request);
            $customers = $this->paginate($result, $perPage, $request->page);
        }else{
            $customers = $this->phoneNumberRepository->indexPaginated($perPage);
        }

        return $customers;
    }

    private function filter($request){
        $state      = !is_null($request->state) ? Str::upper($request->state) : null;
        $country    = !is_null($request->country) ? Str::ucfirst($request->country) : null;

        $result = $this->phoneNumberRepository->index();

        $array = [];
        foreach($result as $phone){
            if(!is_null($state) && $phone->state == $state && !is_null($country) && $phone->country == $country){
                array_push($array, $phone);
            }elseif(!is_null($state) && $phone->state == $state && is_null($country)){
                array_push($array, $phone);
            }elseif(!is_null($country) && $phone->country == $country && is_null($state)){
                array_push($array, $phone);
            }
        }
        return collect($array);
    }

    private function paginate($collection, $perPage, $page){
        $itemsPerPage = $perPage;

        $currentPage = request()->query('page', 1);

        $currentPageItems = $collection->slice(($currentPage - 1) * $itemsPerPage, $itemsPerPage);

        return new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $itemsPerPage,
            $currentPage
        );
    }
}
