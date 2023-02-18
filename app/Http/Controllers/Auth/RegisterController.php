<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Providers\RouteServiceProvider;
use App\Services\CompanyService;
use App\Support\PlanSupport;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

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

    private Plan $plan;

    public function showRegistrationForm(Request $request)
    {
        $plan = Plan::find($request->plan);

        if (!$plan) {
            return redirect()->route('site.home.index');
        }

        if (!PlanSupport::validateWithToken($plan->id, $request->date, $request->random, $request->token)) {
            return redirect()->route('site.home.index');
        }

        return view('auth.register', compact('plan'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $this->plan = Plan::find($data['plan']);

        if (!$this->plan) {
            return redirect()->route('site.home.index');
        }

        if (!PlanSupport::validateWithToken($this->plan->id, $data['date'], $data['random'], $data['token'])) {
            return redirect()->route('site.home.index');
        }

        return Validator::make($data, [
            'plan' => ['required', 'string', 'min:3', 'max:255', 'exists:plans,id'],
            'company_name' => ['required', 'string', 'min:3', 'max:255', 'unique:companies,name'],
            'company_cnpj' => ['required', 'string', 'min:14', 'max:14', 'unique:companies,cnpj'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();
            $user = app(CompanyService::class)->make($this->plan, $data);
            DB::commit();
            return $user;
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
