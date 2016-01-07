<?php
namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:7',
            'password' => 'required|regex:/Y15CTFSUN$/i|min:6',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /*public function postLogin(Request $request)
    {
         $validation = $this->validate($request, [
                'name' => 'required', 
                            'password' => 'required',
            ]);
         if($validation->fails()){
             return back()->withInput();
         }

      $input = $request->only(['name', 'password']);
            if($this->auth->attempt($input)){
                return redirect()->intended($this->redirectPath());
            }
        return redirect->back()->withInput();
    }*/

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password')))
        {
            return redirect('/');
        }
 
        return redirect('/auth/login')->withErrors([
            'email' => "Error: Incorrect username or password",
        ]);
    }

}