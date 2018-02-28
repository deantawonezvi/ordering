<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailsController extends Controller
{
    public function updateMobile(Request $request){
        $this->updateMobileRule($request->all())->validate();

        $user = User::findOrFail($request->user);
        $user->mobile = $request->mobile;
        $user->save();

        return redirect()->back();
    }

    private function updateMobileRule(array $data){
        return Validator::make($data, [
            'mobile'   => 'required|numeric|min:10',
        ]);
    }

}
