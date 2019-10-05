<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Emails;
use Auth;

class EmailsController extends Controller {

    public function store(Request $request) {

        $data = $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'to' => 'required|email',
            'message' => 'required',
        ]);

        return Emails::create([
                    'subject' => $data['subject'],
                    'to' => $data['to'],
                    'message' => $data['message'],
                    'user_id' => $data['user_id'],
                    'state_id' => 1,
        ]);
    }

    public function show($user_id) {
        $emails = \App\Emails::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')
                ->with(['state']);
        echo json_encode($emails->get());
    }

    public function update($user_id) {

        //Codigo para enviar emails
        
        $emails = \App\Emails::where('user_id', $user_id)->update(['state_id' => 2]);
        echo json_encode($emails);
    }

}
