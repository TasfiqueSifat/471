<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AgentRegisterController extends Controller
{
    public function showForm() {
            return view('auth.agent-register');

        }
        public function register(Request $request)
        {
            
        $incomingFields = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $incomingFields['agent_flag'] = 1;
        
        $user = User::create($incomingFields);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

}