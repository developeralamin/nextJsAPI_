<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Success mesage
     */
    public function success($data, $status_code = 200)
    {
        return response([
            'status' => 'success',
            "data" => $data
        ], $status_code);
    }

    /**
     * 
     * failure mesage
     * 
     */
    public function fail($message, $status_code = 401)
    {
        return response([
            'status' => 'fail',
            "message" => $message
        ], $status_code);
    }
}
