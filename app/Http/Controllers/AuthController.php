<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationStoreRequest;

class AuthController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeServices $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function adminLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            if (!auth()->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'admin'])) {
                return redirect()->route('admin.login')->with('error', 'Credentials is invalid');
            }
            return redirect()->route('todos.index')->with('message', 'Login Successfully');
        }
        return view('admin.auth.login');
    }
    public function employeeLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            if (!auth()->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'employee'])) {
                return redirect()->route('employee.login')->with('error', 'Credentials is invalid');
            }
            return redirect()->route('tasks.index')->with('message', 'Login Successfully');
        }
        return view('employee.auth.login');
    }
    public function employeeRegistration(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
                'address' => 'nullable',
                'phone' => 'nullable',
            ]);
            $employee = $this->employeeService->createEmployee($validatedData);
            if (!auth()->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'employee'])) {
                return redirect()->route('employee.login')->with('error', 'Credentials is invalid');
            }
            return redirect()->route('tasks.index')->with('message', 'Registration Successfully');
        }
        return view('employee.auth.registration');
    }
    public function logout()
    {
        $user = Auth::user();
        if ($user && $user->user_type == 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->with('message', 'Logout Successfully');
        } else {
            Auth::logout();
            return redirect()->route('employee.login')->with('message', 'Logout Successfully');
        }
    }
}
