<?php

namespace App\Http\Controllers;


use App\Services\State\CreateService;
use App\Services\State\DeleteService;
use App\Services\State\ListService;
use App\Services\State\UpdateService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StateController extends Controller
{
    /**
     * Create a state
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $state = CreateService::run($request->all());
            return response()->json($state, Response::HTTP_CREATED);
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
     * Update a state
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try{
            $state = UpdateService::run([ "data" => $request->all(), "id" => $id ]);
            return response()->json($state, Response::HTTP_ACCEPTED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Delete a state
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        try{
            $state = DeleteService::run([ "data" => $request->all(), "id" => $id ]);
            return response()->json($state, Response::HTTP_ACCEPTED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }
}
