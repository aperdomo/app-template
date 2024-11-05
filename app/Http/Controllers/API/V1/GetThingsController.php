<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\ListThingsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\GetThingsRequest;
use App\Http\Resources\API\V1\ThingResource;
use App\Services\ThingService;
use Illuminate\Http\JsonResponse;

class GetThingsController extends Controller
{
    /**
     * @param ThingService $thingService a service to grab `things` with.
     */
    public function __construct(
        protected readonly ThingService $thingService
    ) {
    }

    /**
     * @param GetThingsRequest $request
     * @return JsonResponse
     */
    public function __invoke(
        GetThingsRequest $request
    ): JsonResponse
    {
        return ThingResource::collection(
            $this->thingService->paginatedList(
                ListThingsFilter::fromRequest($request)
            )
        )->response();
    }
}
