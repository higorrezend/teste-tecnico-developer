<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Uuid;

class LoginController extends Controller
{
    protected $defaultUsername, $defaultPassword;

    public function __construct () {
        $this->defaultUsername = 'teste@dealersites.com.br';
        $this->defaultPassword = 'DealerSites@2020';
    }

    public function auth (Request $request) {
        if ($request->has('username', 'password')) {
            return $this->checkAuthCredentials($request);
        }
        return Response::json([
            'status' => 'error',
            'message' => 'Invalid request!'
        ], 400, [], JSON_NUMERIC_CHECK);
    }

    private function checkAuthCredentials ($request) {
        $credentials = $this->credentialsIsValid($request);
        if ($credentials) {
            return Response::json([
                'data' => $credentials,
                'status' => 'success',
                'message' => 'Successfully authenticated!'
            ], 201, [], JSON_NUMERIC_CHECK);
        }
        return Response::json([
            'status' => 'error',
            'message' => 'User does not exist or password is invalid!'
        ], 401, [], JSON_NUMERIC_CHECK);
    }

    private function credentialsIsValid ($request) {
        if ($request->username == $this->defaultUsername && $request->password == $this->defaultPassword) {
            return $this->createCredentials();
        }
        return false;
    }

    private function createCredentials () {
        return [
            'token' => base64_encode(base64_encode(
                json_encode([
                    'token' => 'c7d44474-a444-4783-9fdc-f8a8fcf575ba',
                    'user' => [
                        'id' => Uuid::uuid4(),
                        'name' => 'Desenvolvedor',
                        'image' => [
                            'url' => '/assets/profile/profile.png'
                        ]
                    ]
                ])
            ))
        ];
    }
}


