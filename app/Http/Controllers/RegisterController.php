<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    private function createAccessToken($user, $message): JsonResponse
    {
        $success['token'] = $user->createToken('auth_token', ['*'], now()->addDay())->plainTextToken;
        $success['name'] =  $user->name;
        $success['email'] = $user->email;

        return $this->sendResponse($success, $message);
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return $this->createAccessToken($user, 'User registered successfully.');
    }

    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->first();

            return $this->createAccessToken($user, 'User login successfully.');
        } else {
            return $this->sendError('Email or password is wrong.', ['error' => 'Email or password is wrong.'], 400);
        }
    }
}
