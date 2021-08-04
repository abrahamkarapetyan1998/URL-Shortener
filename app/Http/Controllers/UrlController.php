<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
   public function  index(Request $request){
    $data = $request->all();
   
    $validator = Validator::make($data, [
        'url' => 'required|url'
    ]);
    
    if($validator->fails()){
       
        return response()->json([
            'success' => 'false',
            'errors'  => $validator->errors()->all(),
        ], 400);
    }
    $result =  parse_url($data['url']);

    return response()->json(array('msg'=> $result['host']), 200);
    }
}
