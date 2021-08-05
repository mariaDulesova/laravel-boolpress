<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        $data=$request->all();

        //1.Validation
        $validator = Validator::make($data, [
            'name'=>'required|max:60',
            'email'=> 'required|max:60',
            'message'=>'required'
             //aggiungendo un altro array in formato: 'name.requred'=>'Qui personalizzo il messaggio di errore
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }
        return response()->json($data);
    }
}
