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

}
