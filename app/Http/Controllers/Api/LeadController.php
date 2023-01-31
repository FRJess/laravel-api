<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $success = true;

        $validator = Validator::make($data,
        [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',

        ],
        [
            'name.required' => 'Name is required',
            'name.min' => 'Name must have minimum :min characters',
            'name.max' => 'Name must have maximum :max characters',
            'mail.required' => 'Mail is required',
            'mail.email' => 'Mail address is not in a correct format',
            'mail.max' => 'Mail must have maximum :max characters',
            'message.required' => 'Message is required',

        ]
    );

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info@boolfolio.com')->send(new NewContact($new_lead));

        return response()->json(compact('success'));

    }
}
