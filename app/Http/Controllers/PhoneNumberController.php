<?php

namespace App\Http\Controllers;

use App\Http\Services\PhoneNumberService;
use App\Http\Resources\PhonesResource;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    protected $phoneNumberService;
    public function __construct(PhoneNumberService $phoneNumberService){
        $this->phoneNumberService = $phoneNumberService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phones');
    }

    public function getDataTable(Request $request)
    {
        $customers = $this->phoneNumberService->index($request);
        $results = PhonesResource::collection($customers);
        return response()->json([
                'data'      =>  $results,
                'pagination' => [
                    'current_page' => $customers->currentPage(),
                    'last_page' => $customers->lastPage(),
                    'per_page' => $customers->perPage(),
                    'total' => $customers->total(),
                ],
            ]);
    }
}
