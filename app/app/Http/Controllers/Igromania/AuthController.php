<?php

namespace App\Http\Controllers\Igromania;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\Auth\LoginRequest;
use App\Http\Requests\Game\Auth\RegistrationRequest;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registration']]);
    }



    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {

        $data = request(['email', 'password']);

        $token = auth()->attempt($data);

        if ($token) {
            return $this->respondWithToken($token);
        }

        return ApiResponse::response(401,'Unauthorized');

    }


    /**
     * @param  RegistrationRequest  $request
     * @return \Illuminate\Http\Response|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function registration(RegistrationRequest $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($request['password']);

        User::create($data);

        return ApiResponse::response(201, 'created');
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}
