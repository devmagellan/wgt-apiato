<?php

namespace App\Containers\WGT\UI\API\Controllers;

use App\Containers\WGT\UI\API\Requests\CreateWGTRequest;
use App\Containers\WGT\UI\API\Requests\DeleteWGTRequest;
use App\Containers\WGT\UI\API\Requests\GetAllWGTSRequest;
use App\Containers\WGT\UI\API\Requests\FindWGTByIdRequest;
use App\Containers\WGT\UI\API\Requests\UpdateWGTRequest;
use App\Containers\WGT\UI\API\Transformers\WGTTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\WGT\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateWGTRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createWGT(CreateWGTRequest $request)
    {
        $wgt = Apiato::call('WGT@CreateWGTAction', [$request]);

        return $this->created($this->transform($wgt, WGTTransformer::class));
    }

    /**
     * @param FindWGTByIdRequest $request
     * @return array
     */
    public function findWGTById(FindWGTByIdRequest $request)
    {
        $wgt = Apiato::call('WGT@FindWGTByIdAction', [$request]);

        return $this->transform($wgt, WGTTransformer::class);
    }

    /**
     * @param GetAllWGTSRequest $request
     * @return array
     */
    public function getAllWGTS(GetAllWGTSRequest $request)
    {
        $wgts = Apiato::call('WGT@GetAllWGTSAction', [$request]);

        return $this->transform($wgts, WGTTransformer::class);
    }

    /**
     * @param UpdateWGTRequest $request
     * @return array
     */
    public function updateWGT(UpdateWGTRequest $request)
    {
        $wgt = Apiato::call('WGT@UpdateWGTAction', [$request]);

        return $this->transform($wgt, WGTTransformer::class);
    }

    /**
     * @param DeleteWGTRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteWGT(DeleteWGTRequest $request)
    {
        Apiato::call('WGT@DeleteWGTAction', [$request]);

        return $this->noContent();
    }
}
