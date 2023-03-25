<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetDoneTodo;
use App\Http\Requests\CreateTodo;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array of Todo
     */
    public function index()
    {
        return response(
            TodoResource::collection(
                ['tasks' => Todo::select(['id', 'task', 'done'])
                    ->orderBy('task')
                    ->get()
                ]
            )
        );
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requuse App\Http\Resources\est
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodo $request)
    {
        $payload = TodoResource::filterInput($request);

        $todo = app(Todo::class);
        $todo->fill($payload);
        $todo->save();

        return response($todo->toArray(), Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(SetDoneTodo $request)
    {
        $todo = app(Todo::class)->findOrFail($request->input('task'));
        switch($todo->done) {
            case 0:
                $todo->done = 1;
                break;
            default:
                $todo->done = 0;
        }
        $todo->save();
        return response($todo->toArray(), Response::HTTP_OK);
    }
}
