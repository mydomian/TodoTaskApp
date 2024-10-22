<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\TodoServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoStoreRequest;

class TodoController extends Controller
{
    protected $todoService;
    public function __construct(TodoServices $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = $this->todoService->todos();
        return view('admin.todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->todoService->todoEmployees();
        return view('admin.todo.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoStoreRequest $request)
    {
        $todo = $this->todoService->createTodo($request->validated());
        return back()->with('message','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = $this->todoService->todoShow($id);
        return view('admin.todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = $this->todoService->todoEmployees();
        $todo = $this->todoService->todoShow($id);
        return view('admin.todo.edit',compact('todo','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoStoreRequest $request, string $id)
    {
        $todo = $this->todoService->todoUpdate($request->validated(), $id);
        return back()->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->todoService->deleteTodo($id);
        return back()->with('warning','Deleted Successfully');
    }
}
