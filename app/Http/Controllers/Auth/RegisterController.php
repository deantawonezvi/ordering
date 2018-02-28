<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmAccountEmail;
use App\Mail\EmailConfirmed;
use App\Services\CreateUserService;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest');
    }

    public function confirmEmail($token){

        try {
            $user = User::whereToken($token)->firstOrFail();
            $user->hasVerified();
            Mail::to($user->email)->send(new EmailConfirmed($user));
        } catch (ModelNotFoundException $e) {
            return redirect('login');
        }

        return redirect('login')->with('status', 'Your email is verified. Please login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @param CreateUserService $create_user_service
     * @return User
     * @internal param array $data
     */
    protected function register(Request $request, CreateUserService $create_user_service){
        $this->validator($request->all())->validate();

        event(new Registered($user = $create_user_service->create($request->all())));

        Mail::to($user->email)->send(new ConfirmAccountEmail($user));

        return $this->registered($request, $user)
            ?: redirect('/login')->with('status', "An email was sent to your address. Please confirm to proceed");

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'mobile'   => 'required|numeric|min:10',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

}
