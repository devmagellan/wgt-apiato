<?php

namespace App\Containers\WGT\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteWGTAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('WGT@DeleteWGTTask', [$request->id]);
    }
}
