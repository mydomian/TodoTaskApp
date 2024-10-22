<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Services\TodoServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoStoreRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected $todoService;
    public function __construct(TodoServices $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display pending listing of the resource.
     */
    public function index()
    {
        $todos = $this->todoService->employeeTodos(Auth::id());
        return view('employee.todo.index',compact('todos'));
    }
    /**
     * Display complete listing of the resource.
     */
    public function taskComplete()
    {
        $todos = $this->todoService->taskComplete(Auth::id());
        return view('employee.todo.complete',compact('todos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('create todo')) {
            abort(403, 'Unauthorized action.');
        }
        $users = $this->todoService->todoEmployees();
        return view('employee.todo.create',compact('users'));

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
        return view('employee.todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!auth()->user()->can('edit todo')) {
            abort(403, 'Unauthorized action.');
        }
        $users = $this->todoService->todoEmployees();
        $todo = $this->todoService->todoShow($id);
        return view('employee.todo.edit',compact('todo','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoStoreRequest $request, string $id)
    {
        if (!auth()->user()->can('edit todo')) {
            abort(403, 'Unauthorized action.');
        }
        $todo = $this->todoService->todoUpdate($request->validated(), $id);
        return back()->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!auth()->user()->can('delete todo')) {
            abort(403, 'Unauthorized action.');
        }
        $this->todoService->deleteTodo($id);
        return back()->with('warning','Deleted Successfully');
    }

    public function todoStatus($id){
        $this->todoService->todoStatus($id);
        return back()->with('message','Completed Successfully');
    }
}
