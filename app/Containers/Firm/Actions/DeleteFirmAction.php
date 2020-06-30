<?php

namespace App\Containers\Firm\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteFirmAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Firm@DeleteFirmTask', [$request->id]);
    }
}
