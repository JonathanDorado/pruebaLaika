<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunicipalitiesController extends Controller {

    public function index($city_id) {
        $municipalities = \App\Municipalities::where('city_id', '=', $city_id)->orderBy('name','asc');
        echo json_encode($municipalities->get());
    }

}
