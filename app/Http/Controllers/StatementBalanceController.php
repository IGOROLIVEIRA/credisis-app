<?php

namespace App\Http\Controllers;


use App\Services\Lounch\StatementBalanceService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatementBalanceController extends Controller
{
    /**
     * Create a Lounch
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function statement(Request $request, $user_id)
    {
        try{
            $statement = StatementBalanceService::run(["data" => $request->all(), "user_id" => $user_id]);
            return response()->json($statement, Response::HTTP_ACCEPTED);
        }catch(Exception $err){
            return response()->json([
                'errors' => empty(json_decode($err->getMessage())) ? $err->getMessage() : json_decode($err->getMessage())
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }

}
