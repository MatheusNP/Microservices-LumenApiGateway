<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser
{

    /**
     * Build success responses;
     *
     * @param string $data
     * @param integer $code
     * @return Response
     */
    public function successResponse(string $data, int $code = Response::HTTP_OK): Response
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build error responses;
     *
     * @param string|array $message
     * @param integer $code
     * @return JsonResponse
     */
    public function errorResponse($message, int $code): JsonResponse
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Undocumented function
     *
     * @param string $message
     * @param integer $code
     * @return Response
     */
    public function errorMessage(string $message, int $code): Response
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
