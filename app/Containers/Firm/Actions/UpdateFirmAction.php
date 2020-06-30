<?php

namespace App\Containers\Firm\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateFirmAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $firm = Apiato::call('Firm@UpdateFirmTask', [$request->id, $data]);

        return $firm;
    }
}
