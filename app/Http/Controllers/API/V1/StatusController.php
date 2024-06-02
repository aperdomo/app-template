<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        $sql = <<<SQL
            SELECT * FROM INFORMATION_SCHEMA.TABLES LIMIT 1;
SQL;

        // Pings DB ...
        DB::statement($sql);

        return response()->json(
            [
                'status' => 'ok',
            ]
        );
    }
}
