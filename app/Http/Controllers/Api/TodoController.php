<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTodo;
use App\Http\Resources\TodoResource;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array of Todo
     */
    public function index()
    {
        return TodoResource::collection(Todo::orderBy('task')->latest()->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateTodo $request)
    {
        $todo = app(Todo::class);
        $todo->fill($request->input());
        $todo->save();
        return $todo->toArray();
    }


}
