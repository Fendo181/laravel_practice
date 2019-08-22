<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmapleRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response;

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

    public function responseText(Request $request)
    {
        $response = Response::make('Hello Wold!');
        $response = response('HeYHeY!',
            Response::HTTP_ACCEPTED,
            [
                'content-type' => 'text/plain',
            ]
        );
        return $response;
    }

    public function responseView(Request $request)
    {
        $response = view('home');
    }


}
