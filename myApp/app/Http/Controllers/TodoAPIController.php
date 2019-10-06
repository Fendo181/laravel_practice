<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
 
class TodoAPIController extends Controller
{
    public function index()
    {
        return new TodoCollection(Todo::paginate());
    }
 
    public function show(Todo $todo)
    {
        return new TodoResource($todo->load([]));
    }

    public function store(Request $request)
    {
        return new TodoResource(Todo::create($request->all()));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());

        return new TodoResource($todo);
    }

    public function destroy(Request $request, Todo $todo)
    {
        $todo->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
