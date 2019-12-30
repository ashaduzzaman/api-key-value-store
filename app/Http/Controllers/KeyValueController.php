<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeyValue;


class KeyValueController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keys')) {
            $key_arr = explode (",", $request->keys);

            $keyValues = KeyValue::whereIn('key', $key_arr)->pluck('value', 'key');
            return response()->json($keyValues, 200);

        }else{
            $keyValues = KeyValue::pluck('value', 'key');
            return response()->json($keyValues, 200);
        }
    }

    public function store(Request $request)
    {
        $values = KeyValue::create([
            'key' => $request->key,
            'value' => $request->value
        ]);

        $responseData = "Successfully Stored.";

        return response()->json($responseData, 200);
    }

    public function update(Request $request){
        foreach($request->all() as $key => $value) {
            KeyValue::where('key', $key)->update([
                'value' => $value
            ]);
        }

        $responseData = "Successfully Updated.";

        return response()->json($responseData, 200);
    }
}
