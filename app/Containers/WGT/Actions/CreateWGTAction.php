<?php

namespace App\Containers\WGT\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateWGTAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $wgt = Apiato::call('WGT@CreateWGTTask', [$data]);

        return $wgt;
    }
}
