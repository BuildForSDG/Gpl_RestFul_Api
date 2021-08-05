<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User as ModelsUser;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'integer',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = ModelsUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' =>  Str::random(10),
            'type' => $request['type'] ? $request['type']  : 0
        ]);

        return response()->json([
            'message' => 'user successfully created',
            'user' => $user
        ], 201);
    }


    /**
     * @OA\Post(
     *      path="/api/v1/user/login",
     *      operationId="login",
     *      tags={"Auth"},
     *      summary="user login",
     *      description="user can login with credentials",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        // Here, we get the user credentials from the request
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Here, we verify the user credentials if correct and generate a new token for the user.
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('GPL Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response()->json($response, 200);
        } else {
            return response()->json(['error' => 'Unauthorized User !'], 401);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/v1/user/logout",
     *      operationId="Logout",
     *      tags={"Auth"},
     *      summary="user logout",
     *      description="user logout",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      security={{ "apiAuth": {} }},
     *     )
     */
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
    /**
     * @OA\Get(
     *      path="/api/v1/user/profile",
     *      operationId="User Profile",
     *      tags={"Auth"},
     *      summary="user Profile",
     *      description="User Profile Details",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      security={{ "apiAuth": {} }},
     *     )
     */
    public function profile()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
