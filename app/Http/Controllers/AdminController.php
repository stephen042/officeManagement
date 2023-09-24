<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\outputTable;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\deliverableTbale;
use App\Models\deliverable_table;
use App\Models\Event_tb;
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
            $sum_of_quarter = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
                ->where("stateid", "=", "{$outputTable->stateid}")
                ->where("status", "=", "2")
                ->where("Year", "=", "$yeardata")
                ->sum('acheived');

            // dd($editinfodistinct);
            return view('admin.states.state-details', [
                "outputTableinfo" => $outputTable,
                "delivrableinfo"  => $delivrableinfo,
                "year" => $year,
                "achievedinfo"  => $achievedinfo,
                "sum_of_quarter" =>  $sum_of_quarter,

            ]);
        }
    }

    public function selectedChart(Request $request, User $user, outputTable $outputTable)
    {
        // $sum_of_data = '';
        $request->validate([
            "yearChart" => "required",
        ]);

        $data = (object) $request->all();

        $sum_of_data = deliverableTbale::where("outputid", "=", "{$outputTable->id}")
            ->where("stateid", "=", "{$outputTable->stateid}")
            ->where("status", "=", "2")
            ->where("Year", "=", "$data->yearChart")
            ->sum('acheived');
        // dd($sum_of_data);
        $target_remaining = $outputTable->target - $sum_of_data;


        return back()->with('sum_of_data', $sum_of_data)->with('target_remaining', $target_remaining)->with('year', $data->yearChart);
    }

    public function stateinfoPdf(Request $request, User $user)
    {

        $date = Carbon::now()->format('Y-m-d');

        $outputinfo = outputTable::where("stateid", "=", "$user->id")->get()->first();
        $editinfo = deliverableTbale::select("output_tables.output", "output_tables.target", "output_tables.indicator", "deliverable_tbales.*")
            ->where("output_tables.stateid", "=", "$user->id")
            ->orderBy('deliverable_tbales.id', 'DESC')
            ->leftjoin('output_tables', 'deliverable_tbales.outputid', '=', 'output_tables.id')
            ->get();

        $pdf = Pdf::loadView('statespdf', [
            'outputinfo' => $outputinfo,
            'editinfo' => $editinfo,
            // 'sum_achieved' => $sum_of_achieved,
        ])
            ->setPaper('a4', 'landscape');
        return $pdf->download($user->state . '_report' . $date . '.pdf');
    }

    public function profile(Request $request, User $user)
    {

        if ($request->method() == "GET") {

            return view('admin.profile.index', [
                "user" => $user
            ]);
        }


        $data = $request->all();

        $result = $user->update($data);

        if ($result) {
            return redirect()->route('profile', $user->id)->with('message', 'Profile Updated Successfully');
        }
    }

    public function event(Request $request)
    {

        if ($request->method() == "GET") {
            
            return view('admin.event.index',[
                "eventdata" => Event_tb::get(),
            ]);
        }
    }

    public function event_delete(Event_tb $event_tb)
    {

        $event_tb->delete();

        return back()->with('error', 'Event Deleted successfully :)');
    }
}
