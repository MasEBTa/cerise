<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Logika tambahan setelah autentikasi login berhasil
        // Lakukan penanganan token saat login di sini
        $token = $user->createToken('sanctum-token')->plainTextToken;

        // Simpan token ke dalam sesi atau tempat lain yang sesuai dengan kebutuhan Anda
        $request->session()->put('api_token', $token);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // tambahan
            // Ambil token dari sesi atau tempat lain yang Anda simpan saat login
            $token = $request->session()->get('api_token');

            // Hapus token dari sesi atau tempat lain yang Anda gunakan
            $request->session()->forget('api_token');
        
            // Lakukan penanganan token saat logout di sini
            // Misalnya, jika Anda menggunakan Sanctum, hapus token dari database
            Auth::user()->tokens()->where('tokenable_id', Auth::id())->delete();
        // end tambahan
        
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            // tambahan
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }   
}
