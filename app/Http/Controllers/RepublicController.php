<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;

class RepublicController extends Controller


{
        //A função abaixo cria uma nova instância do objeto Republic//
    public function createRepublic(Request $request){
        $republic = new Republic;
        $republic->republicName = $request->republicName;
        $republic->description = $request->description;
        $republic->postalCode = $request->postalCode;
        $republic->privateRoom = $request->privateRoom;
        $republic->roomPrice = $request->roomPrice;
        $republic->save();
        return response()->json($republic);
        
    }

        //A função abaixo busca por uma determinada republica pelo id, e permite sua visualização se encontrada//
    public function showRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        return response()->json($republic);

    }

        //A função abaixo lista todas as instância do objeto Republic//
    public function listRepublic()
    {
        $republic = Republic::all();
        return response()->json([$republic]);

    }

        //A função abaixo permite atualizar os dados existentes em uma instância do objeto Republic//
    public function updateRepublic(Request $request, $id)
    {
        $republic = Republic::findOrFail($id);
        if($request->republicName)
        {
            $republic->epublicName = $request->republicName;
        }
        if($request->description)
        {
            $republic->description = $request->description;
        }
        if($request->postalCode)
        {
            $republic->postalCode = $request->postalCode;
        }
        if($request->privateRoom)
        {
            $republic->privateRoom = $request->privateRoom;
        }
        if($request->roomPrice)
        {
            $republic->roomPrice = $request->roomPrice;
        }
        $republic->save();
        return response()->json($republic);

    }

        //A função abaixo deleta uma instância do objeto Republic pelo id//
    public function deleteRepublic($id)
    {
        Republic::destroy($id);
        return response()->json(['Produto deletado']);

    }


    public function addUser($id, $user_id){
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($id);
        $republic->user_id = $user_id;
        $republic->save();
        return responde()->json($republic);

    }

    public function removeUser($id, $user_id){
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($id);
        $republic->user_id = NULL;
        $user->save();
        return response()->json($user);
    }

}
