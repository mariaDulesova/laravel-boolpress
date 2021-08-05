<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Lead;

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
        };

        //2. Salvo i dati inseriti nel DB
            //a. Creo un istanza
            $lead = new Lead();
            //b. Assegno i valori con l'aiuto di fillable
            $lead->fill($data);
            //c. Salvo i dati
            $lead->save();

        return response()->json($data);
    }
}
