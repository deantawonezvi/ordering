<?php
/**
 * Created by PhpStorm.
 * User: deant
 * Date: 2/28/18
 * Time: 10:35 AM
 */

namespace App\Services;


use App\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateUserService
{
    public function create(array $data){

        try {
            DB::beginTransaction();
            $user = User::create([
                'name'       => $data['name'],
                'mobile'     => $data['mobile'],
                'email'      => $data['email'],
                'password'   => bcrypt($data['password']),
            ]);
            DB::commit();
            return $user;

        } catch (Exception $e) {

            DB::rollback();

            Log::debug($e->getTraceAsString());

            abort(500);

        }

    }


}