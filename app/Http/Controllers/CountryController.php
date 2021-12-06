<?php

namespace App\Http\Controllers;


use App\Services\CreateCountryService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    public function create(Request $request)
    {
        try{
            CreateCountryService::run($request->all());
            return response()->json([
                "message" => "success"
            ], Response::HTTP_CREATED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
