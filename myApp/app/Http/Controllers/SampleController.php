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

    public function store(SmapleRequest $request)
    {
        $inputs = $request->all();

        return view('sample',[
            'firstName' => $inputs['firstName'],
            'lastName'=>  $inputs['lastName'],
            'memo' =>  $inputs['memo']
        ]);
    }

}
