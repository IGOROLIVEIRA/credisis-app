<?php

namespace App\Http\Controllers;


use App\Services\Country\CreateService;
use App\Services\Country\ListService;
use App\Services\Country\UpdateService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    public function create(Request $request)
    {
        try{
            $country = CreateService::run($request->all());
            return response()->json($country, Response::HTTP_CREATED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    public function list(Request $request)
    {
        return ListService::run([]);
    }

    public function update(Request $request,  $id)
    {
        try{
            $country = UpdateService::run([ "data" => $request->all(), "id" => $id ]);
            return response()->json($country, Response::HTTP_ACCEPTED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
