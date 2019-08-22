<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmapleRequest;
use Illuminate\Validation\Factory;
use Illuminate\Support\Facades\Input;

class SampleController extends Controller
{
    public function index() {
        $firstName = Input::get('firstName','endo');
        $lastName = Input::get('lastName','futoshi');
        $memo = Input::get('memo','特になし');
        return view('sample',[
            'firstName' => $firstName,
            'lastName'=> $lastName,
            'memo' => $memo
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
