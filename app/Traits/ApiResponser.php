<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser{
    /**
     * Standard Response for the success request
     */
    public function successResponse($data,$code=Response::HTTP_OK){
        return response()->json(['data' => $data],$code);
    }

    /**
     * Standard response for the error request
     */
    public function errorResponse($message,$code){
        return response()->json(['error' => $message, 'code' => $code],$code);
    }

}