<?php

namespace App\Http\Controllers;


use App\Services\Lounch\CreateDepositService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositController extends Controller
{
    /**
     * Create a Lounch
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deposit(Request $request, $user_id)
    {
        try{
            $lounch = CreateDepositService::run(["data" => $request->all(), "id" => $user_id]);
            return response()->json($lounch, Response::HTTP_CREATED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

}
