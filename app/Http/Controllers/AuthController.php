<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param LoginRequest $request
     *
     * @return JsonResponse|Response
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token    = $user->createToken('authToken')->plainTextToken;
            $response = [
                'user'  => new AuthResource($user),
                'token' => $token
            ];

            return $this->success($response);
        }

        return $this->fail('Invalid credentials', 401);
    }


    /**
     * Creating  a new User.
     *
     * @param RegisterRequest $request
     *
     * @return Response
     */
    public function registration(Request $request)
    {
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success('User created successfully', 201);
    }

/**
 * Auth user
 */
    /**
     * @return Response
     */
    public function authUser()
    {
        $user = Auth::user();

        return $this->success($user);
    }


}
