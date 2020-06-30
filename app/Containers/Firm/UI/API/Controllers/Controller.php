<?php

namespace App\Containers\Firm\UI\API\Controllers;

use App\Containers\Firm\UI\API\Requests\CreateFirmRequest;
use App\Containers\Firm\UI\API\Requests\DeleteFirmRequest;
use App\Containers\Firm\UI\API\Requests\GetAllFirmsRequest;
use App\Containers\Firm\UI\API\Requests\FindFirmByIdRequest;
use App\Containers\Firm\UI\API\Requests\UpdateFirmRequest;
use App\Containers\Firm\UI\API\Transformers\FirmTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Firm\Services\FirmService;

/**
 * Class Controller
 *
 * @package App\Containers\Firm\UI\API\Controllers
 */
class Controller extends ApiController
{

    /**
     * @var FirmService $service
     */
    private $service;

    /**
     * @param FirmService $service
     */
    public function __construct(FirmService $service)
    {
        $this->service = $service;
    }
    /**
     * @param CreateFirmRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFirm(CreateFirmRequest $request)
    {
        $firm = Apiato::call('Firm@CreateFirmAction', [$request]);

        return $this->created($this->transform($firm, FirmTransformer::class));
    }

    /**
     * @param FindFirmByIdRequest $request
     * @return array
     */
    public function findFirmById(FindFirmByIdRequest $request)
    {
        $firm = Apiato::call('Firm@FindFirmByIdAction', [$request]);

        return $this->transform($firm, FirmTransformer::class);
    }

    /**
     * @param GetAllFirmsRequest $request
     * @return array
     */
    public function getAllFirms(GetAllFirmsRequest $request)
    {
        $firms = Apiato::call('Firm@GetAllFirmsAction', [$request]);

        return $this->transform($firms, FirmTransformer::class);
    }

    /**
     * @param UpdateFirmRequest $request
     * @return array
     */
    public function updateFirm(UpdateFirmRequest $request)
    {
        $firm = Apiato::call('Firm@UpdateFirmAction', [$request]);

        return $this->transform($firm, FirmTransformer::class);
    }

    /**
     * @param DeleteFirmRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFirm(DeleteFirmRequest $request)
    {
        Apiato::call('Firm@DeleteFirmAction', [$request]);

        return $this->noContent();
    }

    public function attachEmployee($root, array $data): array
    {
        $this->service->attachEmployee($data['firmId'], $data['userId'], Arr::only($data, 'position'));

        return ['message' => trans('messages.firm.employee_attached')];
    }

    /**
     * @param null $root
     * @param array $data
     * @return array
     */
    public function detachEmployee($root, array $data): array
    {
        $this->service->detachEmployees($data['firmId'], $data['userId'], $data['position']);

        return ['message' => trans('messages.firm.employee_detached')];
    }
}
