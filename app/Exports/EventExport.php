<?php

namespace App\Exports;

use App\Models\Event_tb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EventExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Event_tb::get([
            'year',
            'type_of_event',
            'title_of_event',
            'output',
            'location_of_training',
            'target_bene',
            'venue_of_training',
            'quarter',
            'expected_no_days',
            'actual_no_days',
            'start_date',
            'end_date',
            'p_female',
            'p_male',
            'pwd',
            'p_total',
            'activity_code',
            'MoVs',
            'indicator_no',
            'indicator',
        ]);
    }
    public function headings() :array {
        return 
        [   'Year',
            'Type of Event',
            'Title of Event',
            'Output',
            'Location of training',
            'Target Beneficiaries',
            'Venue of the Training',
            'Quarter',
            'Expected No of Days',
            'Actual No of Days',
            'Start Date',
            'End Date',
            'Female',
            'Male',
            'PWD',
            'Total',
            'Activity Code',
            'MoVs',
            'Indicator Number',
            'Indicator',
        ];
    }
}
