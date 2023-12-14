<?php

namespace App\Exports;

use App\Models\stakeHolderEngagementTracker;
use Maatwebsite\Excel\Concerns\FromCollection;

class stakeHolderEngagementTrackerCsv implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return stakeHolderEngagementTracker::get([
            'Date_of_interaction',
            'state',
            'Programme_Year_From',
            'Programme_Year_To',
            'quarter',
            'Type_of_Stakeholders',
            'Designation_of_Stakeholders',
            'output',
            'Plane_Theme',
            'Resolution_reached',
            'Action_taken_on_Resolution',
            'Date_Action_Taken',
        ]);
    }

    public function headings() :array {
        return 
        [   'Date of interaction',
            'State',
            'Programme Year',
            'Output',
            'Type of Stakeholders',
            'Designation of Stakeholders',
            'Output',
            'PLANE Theme',
            'Resolution Reached',
            'Action taken on Resolution',
            'Date Action Taken',
        ];
    }
}
