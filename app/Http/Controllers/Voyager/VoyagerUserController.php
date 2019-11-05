<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;

class VoyagerUserController extends BaseVoyagerUserController
{
    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (app('VoyagerAuth')->user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => app('VoyagerAuth')->user()->role_id,
                'user_belongsto_role_relationship'     => app('VoyagerAuth')->user()->role_id,
                'user_belongstomany_role_relationship' => app('VoyagerAuth')->user()->roles->pluck('id')->toArray(),
            ]);
        }

        parent::update($request, $id);
        return redirect()
        ->route("voyager.users.edit", $id)
        ->with([
            'message'    => __('voyager::generic.successfully_updated')." User",
            'alert-type' => 'success',
        ]);
    }
}
