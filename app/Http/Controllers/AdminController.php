<?php

namespace App\Http\Controllers;

use App\Models\deliverable_table;
use App\Models\deliverableTbale;
use App\Models\outputTable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        if ($request->method() == "GET") {
            // to get state info
            $stateinfo = User::where('role', "=", "0")->get();

            // TO get output info
            $tabledata = outputTable::orderBy('id', 'DESC')->get();

            // To get deliverables
            $Dinfo = deliverable_table::get();

            return view('admin.dashboard', [
                "stateinfo" => $stateinfo,
                "tabledata" => $tabledata,
                "Dinfo" => $Dinfo,
            ]);
        }
    }

    public function state(Request $request)
    {
        if ($request->method() == "GET") {

            $stateinfo = User::where('role', "=", "0")
                ->orderBy('id', 'DESC')
                ->get();

            return view('admin/create-state.index', [
                "stateinfo" => $stateinfo,
            ]);
        }

        $request->validate([
            "state" => ["required", "unique:users"],
            "password" => "required",
        ]);

        $data = (object) $request->all();

        $result = User::insert([
            "state" => "$data->state",
            "password" => "$data->password",
            "role" => "0"
        ]);

        if ($result) {
            return redirect('/admin/create-state')->with('message', 'New State Created Successfully');
        }
    }

    function state_edit(Request $request, User $user)
    {

        if ($request->method() == "GET") {

            return view('admin.create-state.edit', [
                "user" => $user
            ]);
        }

        $data = $request->all();
        $user->update($data);

        return back()->with('message', 'state Updated Successfully');
    }

    public function state_delete(User $user)
    {

        $user->delete();

        return redirect('/admin/create-state')->with('error', 'State Deleted successfully :)');
    }

    public function indicator(Request $request)
    {

        if ($request->method() == "GET") {

            $state = User::where("role", "=", "0")->get();
            $outputTable = outputTable::orderBy('id', 'DESC')->get();
            return view("admin/create-indicator.index", [
                "outputTable" => $outputTable,
                "state" => $state,
            ]);
        }

        $request->validate([
            "state" => "required",
            "output" => "required",
            "indicator" => "required",
            "target" => "required",
            "stateid" => "required",
        ]);

        $data = (object) $request->all();

        // dd($data);

        $result = outputTable::insert([
            "state" => "$data->state",
            "output" => "$data->output",
            "indicator" => "$data->indicator",
            "target" => "$data->target",
            "stateid" => "$data->stateid",
        ]);

        if ($result) {
            return back()->with('message', 'Data Created Successfully');
        } else {
            return back()->with('error', 'Some went wrong Please Retry');
        }
    }

    public function indicator_edit(Request $request, outputTable $outputTable)
    {

        if ($request->method() == "GET") {

            return view('admin.create-indicator.edit', [
                "outputTable" => $outputTable
            ]);
        }

        $data = $request->all();

        $result = $outputTable->update($data);

        if ($result) {
            return back()->with('message', 'Data Updated Suucessfully');
        } else {
            return back()->with('error', 'something went wrong Retry');
        }
    }

    public function indicator_delete(outputTable $outputTable)
    {

        $outputTable->delete();

        return back()->with('message', 'Data Deleted Successfully');
    }

    public function create_deliverable(Request $request, $id)
    {

        if ($request->method() == "GET") {

            $outputinfo = outputTable::where("id", "=", "$id")->get()->first();
            $deliverables = deliverable_table::where("outputid", "=", "$outputinfo->id")
                ->where("stateid", "=", "$outputinfo->stateid")
                ->orderBy('id', 'DESC')
                ->get();
            return view('admin/create-indicator.create-deliverable', [
                "outputinfo" => $outputinfo,
                "deliverables" => $deliverables,
            ]);
        }

        $request->validate([
            "deliverable" => "required"
        ]);

        $data = (object) $request->all();

        $result = deliverable_table::insert([
            "deliverable" => "$data->deliverable",
            "stateid" => "$data->stateid",
            "state" => "$data->state",
            "outputid" => "$id"
        ]);

        if ($result) {
            return back()->with('message', 'Deliverable Created Successfully');
        } else {
            return back()->with('error', 'Deliverable not created refresh and Retry');
        }
    }


    public function create_deliverable_edit(Request $request, deliverable_table $deliverable_table)
    {

        if ($request->method() == "GET") {

            return view("admin/create-indicator.edit-deliverable", [
                "deliverable_table" => $deliverable_table
            ]);
        }

        $data = $request->all();
        // dd($data);
        $deliverable_table->update($data);

        return back()->with('message', 'Deliverable Updated Successfully');
    }

    public function create_deliverable_delete(deliverable_table $deliverable_table)
    {

        $deliverable_table->delete();

        return back()->with('error', 'Deliverable deleted Successfully');
    }

    public function deliverable_approve(Request $request)
    {

        if ($request->method() == "GET") {

            $deliverableTbale = deliverableTbale::orderBy('id', 'DESC')->get();
            $deliverableapprove = deliverableTbale::where("status", "=", "1")->orderBy('id', 'DESC')->get();

            return view('admin/deliverable-approve.index', [
                "tabledata" => $deliverableTbale,
                "deliverableapprove" => $deliverableapprove,
            ]);
        }
    }

    public function deliverable_approve_edit(Request $request, deliverableTbale $deliverableTbale)
    {

        if ($request->method() == "GET") {

            $outputinfo = outputTable::where("id", "=", "$deliverableTbale->outputid")->get()->first();

            return view('admin.deliverable-approve.edit', [
                "deliverableTbale" => $deliverableTbale,
                "outputinfo" => $outputinfo,
            ]);
        }

        $data = $request->all();
        $result = $deliverableTbale->update($data);

        if ($result) {
            return redirect()->route('deliverable_approve', $deliverableTbale->id)->with('message', 'Deliverable Approved Successfully');
        }
    }

    // for viewing single states 
    public function stateinfo(Request $request, User $user)
    {
        if ($request->method() == "GET") {

            $userinfo = User::where("id", "$user->id")
                ->where("role", "=", "0")
                ->get()
                ->first();

            $outputinfo = outputTable::where("stateid", "=", "$user->id")->get();

            return view('admin.states.index', [
                "userinfo" => $userinfo,
                "outputinfo" => $outputinfo,
            ]);
        }
    }

    public function statesDetails(Request $request, User $user, outputTable $outputTable)
    {
        if ($request->method() == "GET") {

            // $outputTableinfo = outputTable::where("id", "=", "$outputTable->id")
            //     ->where("stateid", "=", "$outputTable->stateid")
            //     ->get()->first();

            $delivrableinfo = deliverable_table::where("stateid", "=", "$outputTable->stateid")
                ->where("outputid", "=", "$outputTable->id")
                ->get();

            $achievedinfo = deliverableTbale::where("stateid", "=", "$outputTable->stateid")
                ->where("outputid", "=", "$outputTable->id")
                ->get();
            // dd($delivrableinfo);

            // for getting year distinct 
            $year = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
            ->where("stateid", "=", "{$outputTable->stateid}")
            ->select('Year')
            ->groupBy('Year')
            ->get();
            $yeardata = Carbon::now()->format('Y');
            // dd($yeardata);
            $sum_of_quarter1 = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
            ->where("stateid", "=", "{$outputTable->stateid}")
            ->where("status", "=", "2")
            ->where("quarter", "=", "1")
            ->where("Year","=","$yeardata")
            ->sum('acheived');

            $sum_of_quarter2 = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
            ->where("stateid", "=", "{$outputTable->stateid}")
            ->where("status", "=", "2")
            ->where("quarter", "=", "2")
            ->sum('acheived');

            $sum_of_quarter3 = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
            ->where("stateid", "=", "{$outputTable->stateid}")
            ->where("status", "=", "2")
            ->where("quarter", "=", "3")
            ->sum('acheived');

            $sum_of_quarter4 = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
            ->where("stateid", "=", "{$outputTable->stateid}")
            ->where("status", "=", "2")
            ->where("quarter", "=", "4")
            ->sum('acheived');

            // dd($editinfodistinct);
            return view('admin.states.state-details', [
                "outputTableinfo" => $outputTable,
                "delivrableinfo"  => $delivrableinfo,
                "year" => $year,
                "achievedinfo"  => $achievedinfo,
                "sum_of_quarter1" => $sum_of_quarter1,
                "sum_of_quarter2" => $sum_of_quarter2,
                "sum_of_quarter3" => $sum_of_quarter3,
                "sum_of_quarter4" => $sum_of_quarter4,

            ]);
        }
    }

    public function selectedChart( Request $request, deliverableTbale $deliverableTbale)
    {
        
    }
}
