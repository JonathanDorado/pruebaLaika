<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller {

    public function index() {
        $countries = \App\Countries::all();
        echo json_encode($countries);
    }

}
