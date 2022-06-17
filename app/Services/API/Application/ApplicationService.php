<?php

namespace App\Services\API\Application;

use App\Events\API\Application\ApplicationActions;
use App\DTO\API\Application\{
    ApplicationFilterDTO,
    ApplicationCreateDTO,
    ApplicationUpdateDTO
};
use App\Http\Resources\API\Application\ApplicationListCollection;
use App\Models\Application;

final class ApplicationService
{
    /**
     * @return ApplicationListCollection
     */
    public function index(ApplicationFilterDTO $request)
    {
        return new ApplicationListCollection(Application::filtered($request)->get());
    }

    /**
     * @param ApplicationUpdateDTO $request
     * @param $id
     * @return mixed
     */
    public function update(ApplicationUpdateDTO $request, $id)
    {
        $application = Application::findOrFail($id);

        return $application->update([
            'status' => $request->getStatus(),
            'responsible_id' => $request->getResponsibleId(),
            'comment' => $request->getComment()
        ]);
    }

    /**
     * @param ApplicationCreateDTO $request
     * @return mixed
     */
    public function store(ApplicationCreateDTO $request)
    {
        return Application::create([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'message' => $request->getMessage(),
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        return $application->delete();
    }
}
