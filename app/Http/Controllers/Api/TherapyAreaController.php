<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\TherapyArea;

use Illuminate\Http\JsonResponse;

class TherapyAreaController extends ApiController
{
    /**
     * @var TherapyArea
     */
    private $therapyArea;

    /**
     * TherapyAreaController constructor.
     *
     * @param TherapyArea $therapyArea
     */
    public function __construct(TherapyArea $therapyArea)
    {
        $this->therapyArea = $therapyArea;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return $this->respond([
            'therapy_areas' => $this->therapyArea->get()
        ]);
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $therapyArea = $this->therapyArea->with(['diseases'])
            ->findOrFail($id);

        return $this->respond([
            'therapy_area' => $therapyArea
        ]);
    }
}