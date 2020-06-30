<?php

namespace App\Containers\Firm\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllFirmsAction extends Action
{
    public function run(Request $request)
    {
        $firms = Apiato::call('Firm@GetAllFirmsTask', [], ['addRequestCriteria']);

        return $firms;
    }
}
