<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponseTrait
{
    public function responseSuccess($message = 'successful', $data = []): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function responseCreated($data = []): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_CREATED,
            'message' => 'successfully created',
            'data' => $data
        ]);
    }

    public function responseMsgOnly($msg = 'success'): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $msg
        ]);
    }

    public function responseUser($user, $token, $msg = 'success', $is_register = false): JsonResponse
    {
        return response()->json([
            'code'  => $is_register ? Response::HTTP_CREATED : Response::HTTP_OK,
            'message' => $msg,
            'user' => $user,
            'token' => $token
        ]);
    }
}
