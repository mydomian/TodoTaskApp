<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeServices
{
    public function employees()
    {
        try {
            return $todos = User::whereUserType('employee')->latest()->get(['id','name','email','access_code','address','phone','user_type']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function createEmployee($data)
    {
        try {
            $employee['name'] = $data['name'];
            $employee['email'] = $data['email'] ?? '';
            $employee['address'] = $data['address'] ?? null;
            $employee['phone'] = $data['phone'] ?? null;
            $employee['password'] = Hash::make($data['password']) ?? '';
            $employee['access_code'] = $data['password'] ?? '';
            $employee = User::create($employee);
            return $employee;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function employeeShow($id)
    {
        try {
            $employee = User::findOrFail($id);
            return $employee;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function employeeUpdate($data,$id)
    {

        try {
            $employee['name'] = $data['name'];
            $employee['email'] = $data['email'] ?? '';
            $employee['address'] = $data['address'] ?? null;
            $employee['phone'] = $data['phone'] ?? null;
            $employee['password'] = Hash::make($data['password']) ?? '';
            $employee['access_code'] = $data['password'] ?? '';
            $employee = User::findOrFail($id)->update($employee);
            return $employee;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteEmployee($id)
    {
        try {
            User::findOrFail($id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
