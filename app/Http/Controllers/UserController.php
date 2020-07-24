<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
        //A função abaixo cria uma nova instância do objeto User//
    public function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->save();
        return response()->json($user);
        
    }
    
        //A função abaixo deleta uma instância do objeto User pelo id//
    public function deleteUser($id)
    {
    User::destroy($id);
    return response()->json(['Usuario deletado']);

    }

         //A função abaixo permite atualizar os dados existentes em uma instância do objeto User//
    public function updateUser(Request $request, $id)
    {
    $user = User::findOrFail($id);
    if($request->name)
    {
        $user->name = $request->name;
    }
    if($request->password)
    {
        $user->password = $request->password;
    }
    if($request->email)
    {
        $user->email = $request->email;
    }
    if($request->phoneNumber)
    {
        $user->phoneNumber = $request->phoneNumber;
    }
    $user->save();
    return response()->json($user);

    }

        //A função abaixo lista todas as instância do objeto User//
    public function listUser()
    {
        $user = User::all();
        return response()->json([$user]);

    }

        //A função abaixo busca por um determinado user pelo id, e permite sua visualização se encontrado//
    public function showUser($id)
    {
    $user = User::findOrFail($id);
    return response()->json($user);

    }


}
