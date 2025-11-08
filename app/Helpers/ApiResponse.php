<?php

namespace App\Helpers;


class ApiResponse
{
    public static function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error($code = 400,$message = 'Error', $data = null,)
    {
        return response()->json([
            'status' => 'Error',
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }
}


