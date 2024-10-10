<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message, $code = 200, $isPaginated = false, $pagination = null): JsonResponse
    {
        if ($isPaginated) {
            $response = [
                'success' => true,
                'statusCode' => $code,
                'message' => $message,
                'data' => $result,
                ...$pagination,
            ];
        } else {
            $response = [
                'success' => true,
                'statusCode' => $code,
                'message' => $message,
                'data' => $result,
            ];
        }

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'statusCode' => $code,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
