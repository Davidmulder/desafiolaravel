<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UsersFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    // pagina index

    public function Index(Request $request)
    {
        $uses=User::all(); 
        

        return view('usuario.index')->with("usuario",$uses);      

    }

    public function create()
    {
        return view('usuario.create');           

    }

    public function store(UsersFormRequest $request)
    {
        // dd($request);
        /*criei um UsersFormRequest para validar os dados*/

        

         $data=$request->except(['_token']);   ##pega todos os dados menos token
         $data['password']=Hash::make($data['password']);        
         $user=User::create($data); ## cria os dados
        
         return redirect()->route('usuario.index');          

    }
}
