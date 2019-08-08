<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\SmapleRequest;
use Illuminate\Support\Facades\Input;

class SampleController extends Controller
{
    public function index() {
        $name = Input::get('name','Okazaki');
        return view('smaple',[
            'name' => $name
        ]);
    }

    public function store(SmapleRequest $request) {
        $name = Input::get('name','Okazaki');
//        $post = \Request::all();
        $name = $request->input('name');
        $body = $request->input('body');

        return view('smaple',[
            'name' => $name,
            'body' => $body,
//            'posts' => $post
        ]);
    }

}
