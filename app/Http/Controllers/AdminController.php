<?php

namespace App\Http\Controllers;

use App\Models\deliverable_table;
use App\Models\outputTable;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function index(Request $request){

        if ($request->method() == "GET") {
            // to get state info
            $stateinfo = User::where('role',"=","0")->get();

            // TO get output info
            $tabledata = outputTable::orderBy('id','DESC')->get();

            // To get deliverables
            $Dinfo = deliverable_table::get();

            return view('admin.dashboard',[
                "stateinfo" => $stateinfo,
                "tabledata" => $tabledata,
                "Dinfo" => $Dinfo,
            ]);
        }
    }
}
