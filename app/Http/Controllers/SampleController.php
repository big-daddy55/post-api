<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    
    public function index() {
        return [
            "Eeeeiiii",
            "Wo maame baako",
            "Wo papa bebreee"
        ];
    }

    public function show($id, $name) {
        return [
            "id" => $id,
            "name" => $name
        ];
       
    }
}
