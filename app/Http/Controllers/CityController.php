<?php

namespace App\Http\Controllers;


use App\Services\City\CreateService;
use App\Services\City\DeleteService;
use App\Services\City\ListService;
use App\Services\City\UpdateService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * Create a City
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $city = CreateService::run($request->all());
            return response()->json($city, Response::HTTP_CREATED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * list a countries
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return ListService::run([]);
    }

    /**
     * Update a City
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try{
            $city = UpdateService::run([ "data" => $request->all(), "id" => $id ]);
            return response()->json($city, Response::HTTP_ACCEPTED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Delete a City
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        try{
            $city = DeleteService::run([ "data" => $request->all(), "id" => $id ]);
            return response()->json($city, Response::HTTP_ACCEPTED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
