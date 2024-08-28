<?php

namespace App\Http\Controllers;

use App\Http\Requests\authentication\ForgottenPasswordRequest;
use App\Http\Requests\authentication\LoginRequest;
use App\Http\Requests\authentication\OtpCodeRequest;
use App\Http\Requests\authentication\RegisterationRequest;



use App\Interfaces\AuthenticationInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function handle_login(Request $request)
    {
        // return $request;
        $data = [
            'email' => $request->email,
            'password' => $request->password, // Correction du champ
        ];

        // return  $data;

        try {
            if ($this->authInterface->login($data)) {

                return redirect()->route('dashboard');
            } else {
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
            }
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, réessayez !');
        }
    }
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('registeration');
    }
    public function registration(RegisterationRequest $request)
    {


        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, 
        ];
        try {
            $user = $this->authInterface->registeration($data);

            Auth::login($user);
            return redirect()->route('dashboard');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, réessayez !');
        }
    }

    public function forgottenPassword(ForgottenPasswordRequest $request)
    {
        $data = [
            'email' => $request->email,
        ];

        try {
            if ($this->authInterface->forgottenPassword($data['email'])) {
                return redirect()->route('otpCode');
            } else {

               
                return back()->with('error', 'Email non trouvé.');
              
            }
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, réessayez !');
        }
    }

    public function checkOtpCode(\App\Http\Requests\authentication\OtpCodeRequest $request)
    {
        $data = [
            'email' => $request->email,
            'code' => $request->code,
        ];

        try {
            $code = $this->authInterface->checkOtpCode($data);
            if (!$code) {
                
                return back()->with('error', 'Code de confirmation invalide.');
            } else {
                return redirect()->route('newPassword');
            }
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, réessayez !');
        }
    }

    public function newPassword(OtpCodeRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'passwordConfirm' => $request->passwordConfirm, 
            'code' => $request->code,
        ];

        $user = $this->authInterface->newPassword($data);
        
        try {
            if (!$user) {
 
                return back()->with('error', 'Impossible de faire la mise à jour, veuillez réessayer.');
            } else {
                return redirect()->route('dashboard');
            }
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, réessayez !');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
