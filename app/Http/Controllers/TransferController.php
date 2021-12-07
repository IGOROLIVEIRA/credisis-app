<?php

namespace App\Http\Controllers;


use App\Services\Lounch\CreateTransferService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferController extends Controller
{
    /**
     * Create a Lounch
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transfer(Request $request, $user_id)
    {
        try{
            $lounch = CreateTransferService::run(["data" => $request->all(), "id" => $user_id]);
            return response()->json($lounch, Response::HTTP_CREATED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

}
