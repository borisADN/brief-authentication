<?php

namespace App\Http\Controllers;

use App\Http\Requests\authentication\LoginRequest;
use App\Http\Requests\authentication\RegisterationRequest;

use App\Interfaces\AuthenticationInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface){
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
                // return  $data;
                return redirect()->route('dashboard');
            } else {
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
            }
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, réessayez !');
        }

    }
    public function index(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('registeration');
    }
    public function registration(RegisterationRequest $request)
    {

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();
        
        // return view('dashboard');
if(Auth::check()){
            return redirect()->route('dashboard');

        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Correction du champ
        ];

    

        try {
            $user = $this->authInterface->registeration($data);

            Auth::login($user);
            return redirect()->route('dashboard');
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
