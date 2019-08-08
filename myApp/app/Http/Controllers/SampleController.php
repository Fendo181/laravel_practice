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

    public function store() {
        $name = Input::get('name','Okazaki');
        $post = \Request::all();
        var_dump($post);
        return view('smaple',[
            'name' => $name,
            'posts' => $post
        ]);
    }

}
