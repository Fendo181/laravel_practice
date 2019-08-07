<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SampleController extends Controller
{
    public function index() {
        $name = Input::get('name','Okazaki');
        return view('smaple',[
            'name' => $name
        ]);
    }

}
