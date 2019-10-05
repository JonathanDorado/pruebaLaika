<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitiesController extends Controller {

    public function index($country_code) {
        $countries = \App\Cities::where('country_code', '=', $country_code)->orderBy('name','asc');
        echo json_encode($countries->get());
    }

}
