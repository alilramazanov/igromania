<?php

namespace App\Http\Controllers\Igromania;

use App\Http\Controllers\Controller;
use App\Http\Requests\Igromania\Auth\LoginRequest;
use App\Http\Requests\Igromania\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 *  @OA\Post(
 *     path="/auth/registration",
 *     tags={"Auth"},
 *     summary="registration",
 *     @OA\Response (
 *          response=201,
 *          description="Created",
 *     ),
 *
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/UserDto")
 *      )
 * ),
 *
 *  @OA\Post(
 *     path="/auth/login",
 *     tags={"Auth"},
 *     summary="login",
 *     @OA\Response (
 *          response=200,
 *          description="Ok",
 *     ),
 *
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
 *      )
 * ),
 */

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registration']]);
    }



    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {

        $data = request(['email', 'password']);

        $token = auth()->attempt($data);

        if ($token) {
            return $this->respondWithToken($token);
        }

        return response('Unauthorized',401);

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

        return response('Created', 201);
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
