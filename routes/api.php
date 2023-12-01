<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUsersController;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use function PHPUnit\Framework\returnSelf;
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API modelo de apis
|--------------------------------------------------------------------------
|
| • Crie uma API RESTful em Laravel para processar o registro de usuários.
• Valide os dados recebidos da solicitação, incluindo a confirmação de senha.
• Retorne uma resposta apropriada para o front-end (por exemplo, sucesso ou
  erro) no formato JSON.
  Gerar toker de resposta
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// List usuario
Route::get('/users', [ApiUsersController::class, 'index']);

//postagem de usuario
Route::post('/users', [ApiUsersController::class, 'store']);

// List uma usuario
Route::get('/users/{users}', [ApiUsersController::class, 'show']);


Route::post('/login',function(Request $request){

    $credentials=$request->only(['email','password']);
    if(Auth::attempt($credentials)===false)  #se não estive logado
    {
        return response()->json('Unauthorized',401);
    }
    $user =Auth::user();
    $token = $user->createToken('Laravel Password ')->plainTextToken;  #gera toker
    return response()->json($token);

});



