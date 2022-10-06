<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService{
    public static function register(Request $request){
        $validated = $request->all();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $token = $user->createToken('mobile')->plainTextToken;
        return ['user' => $user, 'token' => $token];
    }

    public static function login(Request $request)
    {
        $validated = $request->all();
        $user = User::where('phone', $validated['phone'])->first();
        $token = $user->createToken('mobile')->plainTextToken;
        Auth::login($user);
        return response()->json(['token' => $token]);
    }
}
