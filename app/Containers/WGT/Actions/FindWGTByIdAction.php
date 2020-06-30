<?php

namespace App\Containers\WGT\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindWGTByIdAction extends Action
{
    public function run(Request $request)
    {
        $wgt = Apiato::call('WGT@FindWGTByIdTask', [$request->id]);

        return $wgt;
    }
}
