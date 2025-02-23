<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authServices;

    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        return $this->authServices->authenticate($request);
    }

    public function store(Request $request)
    {
        return $this->authServices->store($request);
    }

    public function logout(Request $request)
    {
        return $this->authServices->logout($request);
    }
}
