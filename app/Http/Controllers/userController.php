<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function register() 
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request) 
    {
        $request -> validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'pseudo' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $user = new User([
            'firstName' => $request -> firstName,   
            'lastName' => $request -> lastName,   
            'pseudo' => $request -> pseudo,   
            'email' => $request -> email,  
            'password' 
                => Hash::make($request -> password),
            'admin' => false
        ]);
        $user -> save();
        return redirect() 
            -> route('login')
            -> with('success', 'inscription succed, please login');
    }

    public function login() 
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request -> validate([
            'inputRegister' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['pseudo' => $request -> inputRegister, 'password' => $request -> password])) {
            $request -> session() -> regenerate();
            return redirect() -> intended('/');
        } elseif (Auth::attempt(['email' => $request -> inputRegister, 'password' => $request -> password])) {
            $request -> session() -> regenerate();
            return redirect() -> intended('/');
        }

        return back() 
            -> with('error', 'wrong identifier or password');
    }

    public function changePersoInfos() 
    {
        $data['title'] = 'Personnel Informations';
        return view('user/changePersoInfos', $data);
    }

    public function changePersoInfos_action(Request $request)
    {
        $request -> validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'pseudo' => 'required',
            'email' => 'required',
            'old_password' => 'required|current_password',
            'new_password' => 'same:new_password_confirmation'
        ]);
        $user = User::find(Auth::id());
        $user -> firstName = $request -> firstName; 
        $user -> lastName = $request -> lastName;
        $user -> pseudo = $request -> pseudo;
        $user -> email = $request -> email;
        if ($request -> new_password != "" OR $request -> new_password != null) {
            $user -> password = Hash::make($request -> new_password);
        } 
        
        $user -> save();
        $request -> session() -> regenerate();

        return back() -> with('success', 'informations up to date');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function users() 
    {
        $data['users'] = User::orderBy('create_at', 'ASC')->paginate(20);
        return view('user.users', $data);
    }

    public function searchUser(Request $request)
    {
        $movieSearched = trim($request -> get('inputSearchMovie'));
        $data['users'] = User::query()
                ->where('pseudo', 'like', "%{$movieSearched}%")
                ->orWhere('synopsis', 'like', "%{$movieSearched}%")
                ->orderBy('created_at', 'desc')
                ->get();

        return view('user.users', $data);
    }
}
