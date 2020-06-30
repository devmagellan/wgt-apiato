<?php

namespace App\Containers\Firm\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateFirmAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $firm = Apiato::call('Firm@CreateFirmTask', [$data]);

        return $firm;
    }
}
