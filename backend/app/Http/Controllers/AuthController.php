<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(
        private AuthManager $auth,
    ) {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!$this->auth->attempt($credentials)) {
            throw new AuthenticationException();
        }

        $request->session()->regenerate();

        return new JsonResponse(['message' => 'Authenticated.']);
    }

    public function logout()
    {
    }
}
