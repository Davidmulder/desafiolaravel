<?php
namespace App\Http\Controllers;

use App\Http\Requests\ApiUsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Http\Response;
use App\Models\User;

use Illuminate\Http\Request;

class ApiUsersController extends Controller
{
    //
    public function index(Request $request)
    {
        $query=User::query(); ##busca com query

        if($request->has('name'))
        {
            $query->where('name',$request->name);
        }

        return $query->paginate('3'); ##paginação por 5 paginas
       // return Series::all(); #todos
    }

    public function store(ApiUsersRequest $request) ## cadastro de usuario
    {
        
             
        $data=$request->all();   ##pega todos os dados menos token
        $data['password']=Hash::make($data['password']);        
        $user=User::create($data); ## cria os dados

        return response()->json(['messagem'=> 'Usuario cadastrado'],201);
    }

    public function show(int $users)
    {   
        $usersModel=User::find($users);
        if($usersModel===null)
        {
            return response()->json(['messagem'=> 'Usuario não encontrada'],404);
        }
        return $usersModel;
    }

    
}
