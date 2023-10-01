<?php

namespace App\Exports;

use App\Models\Event_tb;
use Maatwebsite\Excel\Concerns\FromCollection;

class stateEvent implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Event_tb::where("state_id","=","1")->get();
    }
}
