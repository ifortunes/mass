<?php

namespace App\Http\Controllers\API\Application;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\Application\{
    ApplicationFilterRequest,
    ApplicationCreateRequest,
    ApplicationUpdateRequest
};

use App\Services\API\Application\ApplicationService;
use App\Traits\ApiResponser;

class ApplicationController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
//        $this->middleware('auth:sanctum')->except('index');
    }

    public function index(ApplicationFilterRequest $request, ApplicationService $service)
    {
        return $service->index($request->getDto());
    }

    /**
     * @param ApplicationCreateRequest $request
     * @param ApplicationService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ApplicationCreateRequest $request, ApplicationService $service)
    {
        $dto = $request->getDto();

        if ($service->store($dto)) {
            return $this->success([], __('Application accepted'), 201);
        }

        return $this->error(__('Error when creating an application'), 200);
    }

    /**
     * @param ApplicationUpdateRequest $request
     * @param $id
     * @param ApplicationService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ApplicationUpdateRequest $request, $id, ApplicationService $service)
    {
        $dto = $request->getDto();

        if ($service->update($dto, $id)) {
            return $this->success([], __('The application has been successfully updated'), 200);
        }

        return $this->error(__('Error when creating an application'), 200);
    }

    /**
     * @param $id
     * @param ApplicationService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, ApplicationService $service)
    {
        if ($service->destroy($id)) {
            return $this->success([], __('The application was successfully deleted'), 200);
        }

        return $this->error(__('Error deleting the application'), 200);
    }
}
