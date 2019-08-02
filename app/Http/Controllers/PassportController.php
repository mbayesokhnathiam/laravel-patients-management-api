<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
class PassportController extends Controller
{
    //
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
     public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'profile'=>'required|numeric'
        ]);
        
        
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_id'=> $request->profile
        ]);
 
        // $token = $user->createToken('consultation')->accessToken;

      
        $token = $user->createToken('Registration');
        $token->token->expires_at = Carbon::now()->addDays(1);
        $token->token->save();
       
        // return response()->json(['token' => $token], 200);

        return response()->json([
            'user' => $user,
             'token' => $token->accessToken,
             'Expire at'=> Carbon::parse($token->token->expires_at)->toDateTimeString()
            ], 200);
    }



 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // $credentials = [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];
 
        // if (auth()->attempt($credentials)) {
        //     $token = auth()->user()->createToken('TutsForWeb')->accessToken;
        //     return response()->json(['token' => $token], 200);
        // } else {
        //     return response()->json(['error' => 'UnAuthorised'], 401);
        // }


        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = auth()->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        // if ($request->remember_me)
        $token->expires_at = Carbon::now()->addDays(2);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user' =>$user->name,
            'iduser'=>$user->id,
            'img' =>$user->img,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
 

    public function logout(Request $request)
    {
        // $request->user()->token()->revoke();
       
        $request->user()->token()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
