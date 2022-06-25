<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller{
    public function index(){
        return view('frontend.admin.table');
    }
    public function edit(){
        return view('frontend.admin.table');
    }
    public function destroy(){
        return view('frontend.admin.table');
    }

}
