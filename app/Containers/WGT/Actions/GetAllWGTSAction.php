<?php

namespace App\Containers\WGT\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllWGTSAction extends Action
{
    public function run(Request $request)
    {
        $wgts = Apiato::call('WGT@GetAllWGTSTask', [], ['addRequestCriteria']);

        return $wgts;
    }
}
