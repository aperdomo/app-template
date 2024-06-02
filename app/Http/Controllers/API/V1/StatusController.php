<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        return response()->json(
            [
                'status' => 'ok'
            ]
        );
    }
}
