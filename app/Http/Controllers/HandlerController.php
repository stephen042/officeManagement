<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use App\Models\outputTable;
use Illuminate\Http\Request;
use App\Models\deliverableTbale;
use App\Models\deliverable_table;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class HandlerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->method() == "GET") {
            return view("welcome");
        }


        $data = (object) $request->all();

        $user = User::where("state", "=", "$data->state")->get()->first();

        if (!empty($user) && $data->password == $user->password) {

            $request->session()->regenerate();
            Auth::loginUsingId($user->id);
            return redirect('/dashboard')->with('message', 'Welcome Back');
        } else {
            return redirect('/')->with('error', 'invalid detials');
        }
    }

    public function dashboardindex(Request $request)
    {
        if ($request->method() == "GET") {

            $stateid = Auth::user()->stateid;

            $outputTableinfo = outputTable::where("stateid", "=", "{$stateid}")->get();
            // dd($outputTable);
            return view("dashboard.index", [
                'outputTable' => $outputTableinfo
            ]);
        }
    }

    public function home(Request $request)
    {
        if ($request->method() == "GET") {
            return view("welcome");
        }
    }

    public function edit_indicator(Request $request, $id)
    {
        if ($request->method() == "GET") {
            // to get the data(Output & indicator) associated with the deliverable
            $outputinfo = outputTable::where("id", "=", "{$id}")->get()->first();

            // to get the table data of acheived data
            $editinfo = deliverableTbale::where("outputid", "=", "{$id}")
            ->where("stateid", "=", "{$outputinfo->stateid}")
            ->get();

            // for getting year distinct 
            $editinfodistinct = deliverableTbale::where("outputid", "=", "{$id}")
            ->where("stateid", "=", "{$outputinfo->stateid}")
            ->select('Year')
            ->groupBy('Year')
            ->get();

            // to get the deliverable associated to the current output
            $deliverableinfo = deliverable_table::where("outputid", "=", "{$id}")
            ->where("stateid", "=", "{$outputinfo->stateid}")
            ->get();

            // dd($editinfo);
            return view("dashboard.edit_indicator", [
                'editinfo' => $editinfo,
                'deliverableinfo' => $deliverableinfo,
                'editinfodistinct' => $editinfodistinct,
                'outputinfo' => $outputinfo,
            ]);
        }

        $data = (object) $request->all();

        // to collect the current output datas
        $outputinfo = outputTable::where("id", "=", "{$id}")->get()->first();

        // to validate the data
        $request->validate([
            "year" => "required",
            "quarter" => "required",
            "deliverable" => "required",
            "acheived" => "required"
        ]);

        $year = date('Y', strtotime($data->year));
        // inserting into the deliverable_Table
        $result = deliverableTbale::insert([
            "Year" => "$year",
            "quarter" => "$data->quarter",
            "Deliverable" => "$data->deliverable",
            "acheived" => "$data->acheived",
            "outputid" => "$id",
            "stateid" => "$outputinfo->stateid",
            "status" => "1",
        ]);

        if ($result) {
            return redirect()->route('edit_indicator', [$id])->with('message', 'Data  submitted Successfully');
        }
    }

    public function invoice(Request $request)
    {
        if ($request->method() == "GET") {

            return view('invoice');
        }

        $data = (object) $request->all();

        // to validate the data
        $request->validate([
            "yearpdf" => "required",
            "quarterpdf" => "required",
        ]);

        // to collect the current output datas
        $outputinfo = outputTable::where("id", "=", "{$data->idpdf}")->get()->first();
        $user = user::where("stateid","=","$outputinfo->stateid")->get()->first();

        $editinfo = deliverableTbale::where("outputid", "=", "{$data->idpdf}")
            ->where("stateid", "=", "{$outputinfo->stateid}")
            ->where("Year", "=", "{$data->yearpdf}")
            ->where("quarter", "=", "{$data->quarterpdf}")
            ->get();

            $sum_of_achieved = 0;
            $date = Carbon::now()->format('Y-m-d-H-i-a');

        $pdf = Pdf::loadView('invoice', [
            'outputinfo' => $outputinfo,
            'editinfo' => $editinfo,
            'sum_of_achieved' => $sum_of_achieved,
        ]);
        return $pdf->download($user->state.'_report'.$date.'.pdf');
    }


    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'you have logout successfully');
    }
}
