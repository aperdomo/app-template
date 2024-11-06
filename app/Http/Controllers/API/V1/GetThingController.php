<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\ListThingsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\GetThingRequest;
use App\Http\Requests\API\V1\GetThingsRequest;
use App\Http\Resources\API\V1\ThingResource;
use App\Services\ThingService;
use Illuminate\Http\JsonResponse;

class GetThingController extends Controller
{
    /**
     * @param ThingService $thingService a service to grab `things` with.
     */
    public function __construct(
        protected readonly ThingService $thingService
    ) {
    }

    /**
     * @param GetThingRequest $request
     * @return JsonResponse
     */
    public function __invoke(
        GetThingRequest $request
    ): JsonResponse
    {
        return response()->json(
            ThingResource::make(
                $this->thingService->find(
                    $request->input('thing_id')
                )
            )
        );
    }
}
