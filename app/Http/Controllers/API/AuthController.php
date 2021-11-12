<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            $response = [
                "status" => "error",
                "message" => 'Validator Error',
                "errors" => $validator->errors(),
                "content" => null,
            ];
            return response()->json($response,200);       
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $response = [
            'status' => 'success',
            'msg' => 'Register successfully',
            'errors' => null,
            'content' => [
                "status_code" => 200,
                "access_token" => $token,
                "token_type" => "Bearer"
            ],
        ];
        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            $response = [
                "status" => "error",
                "message" => 'Validator Error',
                "errors" => $validator->errors(),
                "content" => null,
            ];
            return response()->json($response,200);       
        }

        if (!Auth::attempt($request->only('email', 'password')))
        {
            $response = [
                "status" => "error",
                "message" => "Unauthorized",
                "errors" => null,
                "content" => null,
            ];
            return response()
                ->json($response, 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        $response = [
            "status" => "success",
            "message" => "Login Succefully",
            "errors" => null,
            "content" => [
                "status_code" => 200,
                "access_token" => $token,
                "token_type" => "Bearer"
            ],
        ];
        return response()->json($response,200);
    }

    // method for user logout and delete token
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $response = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];

        return response()->json($response,200);
    }
    public function logoutall(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        $response = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($response, 200);
    }
    public function me(Request $request)
    {
    return $request->user();
    }
}