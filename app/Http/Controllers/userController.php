<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $data['users'] = User::orderBy('created_at', 'ASC')->paginate(20);

        // $data['users'] = User::query()
        //     ->join('comments', 'users.pseudo', '=', 'comments.pseudo')
        //     ->join('likes', 'user.pseudo', '=', 'likes.pseudo')
        //     ->select('*')
        //     ->count('likes.pseudo')
        //     ->count('comments.pseudo')
        //     ->get();

        return view('user.users', $data);
    }

    public function searchUser(Request $request)
    {
        $userSearched = trim($request -> get('inputSearchUser'));
        $data['users'] = User::query()
                ->where('pseudo', 'like', "%{$userSearched}%")
                ->orWhere('email', 'like', "%{$userSearched}%")
                ->orderBy('created_at', 'ASC')
                ->get();

        return view('user.users', $data);
    }

    public function destroy(User $user)
    {
        $data['userAdmin'] = User::query()
            ->where('admin', '=', 1)
            ->get();

        $countUserAdmin = count($data['userAdmin']);
        if ($user->id == Auth::user()->id && $countUserAdmin == 1) {
            return redirect() -> route('users')
            -> with('success', 
                'You\'re the last admin. This site needs at last one administrator');
        } elseif ($user->id == Auth::user()->id && $countUserAdmin > 1) {
            $user->delete();
            return redirect() -> route('home')
                -> with('success', 'Your account has been deleted successfully');
        }

        $user->delete();
    
        return redirect() -> route('users')
            -> with('success', $user->pseudo.' has been deleted successfully');
    }

    public function edit(User $user)
    {
        return view('user.detailUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data['userAdmin'] = User::query()
            ->where('admin', '=', 1)
            ->get();
            
        $countUserAdmin = count($data['userAdmin']);
        if ($id == Auth::user()->id && $countUserAdmin == 1) {
            return redirect() -> route('users')
            -> with('success', 
                "You're the last admin. This site needs at last one administrator");
        }

        $user = User::find($id);
        $user -> admin = $request -> admin;
        $user -> save();

        if ($user -> admin == true) {
            return redirect() -> route('users')
            -> with('success', $user->pseudo.' is Administrateur now');
        } else {
            return redirect() -> route('home')
            -> with('success', $user->pseudo.' is simple user now');
        }
    }


    // public function humanTiming($time)
    // {
    //     $time = time() - $time; // to get the time since that moment
    //     $time = ($time<1)? 1 : $time;
    //     $tokens = array (
    //         31536000 => 'year',
    //         2592000 => 'month',
    //         604800 => 'week',
    //         86400 => 'day',
    //         3600 => 'hour',
    //         60 => 'minute',
    //         1 => 'second'
    //     );
                    
    //     foreach ($tokens as $unit => $text) {
    //         if ($time < $unit) continue;
    //         $numberOfUnits = floor($time / $unit);
    //         return (($numberOfUnits > 1) ?'s':'');
    //     }   
    // }
}
