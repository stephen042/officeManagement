<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\outputTable;
use Illuminate\Support\Facades\Auth;

class Output extends Component
{
    public $output;
    public $indicator;
    public $dataindicator;

    public $select;

    public function mount()
    {
        $stateid = Auth::user()->id;
        $this->output = outputTable::where("stateid", "=", "{$stateid}")->orderBy('id','DESC')->get();

        $this->indicator = collect();

    }

    public function render()
    {
        return view('livewire.output');
    }

    public function updatedselect($output_id)
    {
        $this->indicator = outputTable::where("id", "=", "{$output_id}")->get()->first();
        $this->dataindicator = $this->indicator['indicator'];
    }

}
