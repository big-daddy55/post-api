<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function response($data, $message, $status = 200){
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
