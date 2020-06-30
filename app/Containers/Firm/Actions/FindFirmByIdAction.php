<?php

namespace App\Containers\Firm\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindFirmByIdAction extends Action
{
    public function run(Request $request)
    {
        $firm = Apiato::call('Firm@FindFirmByIdTask', [$request->id]);

        return $firm;
    }
}
