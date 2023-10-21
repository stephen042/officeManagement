<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use App\Models\Event_tb;
use App\Models\outputTable;
use App\Exports\EventExport;
use Illuminate\Http\Request;
use App\Models\event_loc_bene;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\deliverableTbale;
use App\Models\deliverable_table;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class HandlerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->method() == "GET") {
            return view("index");
        }


        $data = (object) $request->all();

        $user = User::where("state", "=", "$data->state")->get()->first();

        if (!empty($user) && $data->password == $user->password) {

            $request->session()->regenerate();
            Auth::loginUsingId($user->id);
            if ($user->role == 0) {
                return redirect('/dashboard')->with('message', 'Welcome Back');
            } elseif ($user->role == 1) {
                return redirect('/admin')->with('message', 'Welcome Back Admin');
            }
        } else {
            return redirect('/')->with('error', 'invalid detials');
        }
    }

    public function dashboardindex(Request $request)
    {
        if ($request->method() == "GET") {

            $stateid = Auth::user()->id;

            $outputTableinfo = outputTable::where("stateid", "=", "{$stateid}")->orderBy('id', 'DESC')->get();
            // dd($outputTable);
            return view("dashboard.index", [
                'outputTable' => $outputTableinfo
            ]);
        }
    }

    public function home(Request $request)
    {
        if ($request->method() == "GET") {
            return view("index");
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
                ->orderBy('id', 'DESC')
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

        // to get state
        $state  = User::where("id", "=", "$outputinfo->stateid")->get()->first();
        // to validate the data
        $request->validate([
            "year" => "required",
            "quarter" => "required",
            "MoVs" => "required",
            "acheived" => "required"
        ]);

        $year = date('Y', strtotime($data->year));
        // converting output to string so database can accept
        $data->MoVs = implode(", ", $data->MoVs);

        // inserting into the deliverable_Table
        $result = deliverableTbale::insert([
            "Year" => "$year",
            "quarter" => "$data->quarter",
            "Deliverable" => "$data->deliverable",
            "acheived" => "$data->acheived",
            "MoVs"      => "$data->MoVs",
            "outputid" => "$id",
            "stateid" => "$outputinfo->stateid",
            "state" => "$state->state",
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
        $user = user::where("id", "=", "$outputinfo->stateid")->get()->first();

        $editinfo = deliverableTbale::where("outputid", "=", "{$data->idpdf}")
            ->where("stateid", "=", "{$outputinfo->stateid}")
            ->where("Year", "=", "{$data->yearpdf}")
            ->where("quarter", "=", "{$data->quarterpdf}")
            ->get();

        $sum_of_achieved = deliverableTbale::where("outputid", "=", "{$data->idpdf}")
            ->where("stateid", "=", "{$outputinfo->stateid}")
            ->where("Year", "=", "{$data->yearpdf}")
            ->where("quarter", "=", "{$data->quarterpdf}")
            ->where("status", "=", "2")
            ->sum('acheived');

        // dd($sum_of_achieved);
        // $sum_of_achieved = $sum_of_achieved_get->sum('acheived');
        $date = Carbon::now()->format('Y-m-d-H-i-a');

        $pdf = Pdf::loadView('invoice', [
            'outputinfo' => $outputinfo,
            'editinfo' => $editinfo,
            'sum_achieved' => $sum_of_achieved,
        ]);
        return $pdf->download($user->state . '_report' . $date . '.pdf');
    }

    public function event(Request $request)
    {
        if ($request->method() == "GET") {

            $state_id = Auth::user()->id;
            $location_bene = event_loc_bene::whereNotNull('location_of_training')
                ->whereNotNull('target_bene')
                ->get();

            return view('dashboard.event.index', [
                "eventdata" => Event_tb::where("state_id", "=", "$state_id")->get(),
                "location_bene" => $location_bene,
            ]);
        }

        $validated = request()->validate([
            "year" => "required",
            "type_of_event" => "required",
            "title_of_event" => "required",
            "output" => "required",
            "location_of_training" => "required",
            "target_bene" => "required",
            "venue_of_training" => "required",
            "quarter" => "required",
            "expected_no_days" => "required|numeric",
            "actual_no_days" => "required|numeric",
            "start_date" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "p_female" => "required|numeric",
            "p_male" => "required|numeric",
            "p_pwd_male" => "required|numeric",
            "p_pwd_female" => "required|numeric",
            "p_total" => "required|numeric",
            "activity_code" => "required",
            "MoVs" => "required",
            "indicator_no" => "required",
            "indicator" => "required",
        ]);



        $validated['state_id'] = Auth::user()->id;
        $validated['year'] = date("Y", strtotime($validated['year']));

        // converting output to string so database can accept
        $validated['output'] = implode(", ", $validated['output']);
        // converting output to string so database can accept
        $validated['MoVs'] = implode(", ", $validated['MoVs']);

        // to get the output number
        $indicator = outputTable::where("indicator", "=", "{$validated['indicator']}")->get()->first();

        $validated['indicator_no'] = $indicator->output;

        // dd($validated);

        if ($validated) {
            Event_tb::create($validated);

            return back()->with('message', 'Record Created Successfully');
        } else {
            return back()->with('error', 'error :)Record was not created ');
        }

        return back()->with('error', 'Record was not created ');
    }

    // public function state_csv(Request $request){
    //     $date = Carbon::now()->format('Y-m-d-H-i-a');
    //     return Excel::download( new stateEvent , 'stateEvent-record-'.$date.'.csv');
    // }

    public function edit_event(Request $request, Event_tb $event_tb)
    {

        if ($request->method() == "GET") {

            // converting output to array
            // $output_data = explode(",",$event_tb->output);
            $location_bene = event_loc_bene::get();
            // dd($location_bene);
            return view("dashboard.event.edit_event", [
                // "output_data" => $output_data,
                "event_tb" => $event_tb,
                "location_bene" => $location_bene,
            ]);
        }

        $update = $request->validate([
            "output" => "required",
            "location_of_training" => "required",
            "target_bene" => "required",
            "indicator_no" => "required",
            "indicator" => "required",
        ]);

        $update = $request->all();

        $update['output'] =  implode(", ", $update['output']);
        $update['indicator_no'] = (float) $update['indicator_no'];
        // dd($update);

        $result = $event_tb->update($update);
        if ($result) {
            return back()->with('message', 'Record updated Successfully');
        } else {
            return back()->with('error', 'error :)Record was not updated ');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'you have logout successfully');
    }
}
