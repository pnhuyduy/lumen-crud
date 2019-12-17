<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser {

  public function successResponse($data, $code = Response::HTTP_OK)
  {
    /**
    * Build success response
    *
    * @return Illuminate\Http\JsonResponse
    */
    return response()->json(['data' => $data], $code);
  }

  public function errorResponse($message, $code)
  {
    /**
    * Build error response
    *
    * @return Illuminate\Http\JsonResponse
    */
    return response()->json([
      'error' => $message,
      'code' => $code
    ], $code);
  }
}
