<?php

namespace App\Services;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TodoServices
{
    public function todos()
    {
        try {
            return $todos = Todo::with('user')->latest()->get(['id','user_id','title','description','due_date_time','priority','status']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function createTodo($data)
    {
        try {
            $todo['user_id'] = $data['user_id'];
            $todo['title'] = $data['title'] ?? '';
            $todo['description'] = $data['description'] ?? '';
            $todo['due_date_time'] = $data['due_date_time'] ?? '';
            $todo['priority'] = $data['priority'] ?? null;
            $todo = Todo::create($todo);
            return $todo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function todoShow($id)
    {
        try {
            $todo = Todo::with('user')->findOrFail($id);
            return $todo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function todoUpdate($data,$id)
    {

        try {
            $todo['user_id'] = $data['user_id'];
            $todo['title'] = $data['title'] ?? '';
            $todo['description'] = $data['description'] ?? '';
            $todo['due_date_time'] = $data['due_date_time'] ?? '';
            $todo['priority'] = $data['priority'] ?? null;
            $todo = Todo::findOrFail($id)->update($todo);
            return $todo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteTodo($id)
    {
        try {
            Todo::findOrFail($id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function todoEmployees()
    {
        try {
            $users = User::where(['user_type'=>'employee'])->get(['id', 'name', 'email','phone','address','user_type']);
            return $users;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function employeeTodos($userId){
        try {
           return $todos = Todo::with('user')->where(['user_id'=>$userId,'status'=>'pending'])->latest()->get(['id','user_id','title','description','due_date_time','priority','status']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function taskComplete($userId){
        try {
           return $todos = Todo::with('user')->where(['user_id'=>$userId,'status'=>'complete'])->latest()->get(['id','user_id','title','description','due_date_time','priority','status']);
        } catch (\Exception $e) {
           return $e->getMessage();
        }
    }
    public function todoStatus($id){
        try {
            return $todos = Todo::findOrFail($id)->update(['status'=>'complete']);
         } catch (\Exception $e) {
             return $e->getMessage();
         }
    }
    public function roles(){
        try {
            return $roles = Role::all();
         } catch (\Exception $e) {
             return $e->getMessage();
         }
    }
    public function permissionAll(){
        try {
            return $permissions = Permission::all();
         } catch (\Exception $e) {
             return $e->getMessage();
         }
    }

}
