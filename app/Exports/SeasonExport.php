<?php

namespace App\Exports;

use App\Http\Variables;
use App\Models\Season;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SeasonExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $season = Season::select('date_start_reg','date_end_reg','date_start_mobility','date_end_mobility','count_students','count_registrations','mobility_ID','mobility.partner_university_ID','partner_university.name')->join('mobility','season.mobility_ID','mobility.ID')->join('partner_university','partner_university.ID','mobility.partner_university_ID')->get();
        return $season;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return[
            'Začiatok registrácie',
            'Koniec registrácie',
            'Začiatok pobytu',
            'Koniec pubytu',
            'Maximalny počet prihlásených',
            'Maximalny počet registrovaných',
            'ID Mobility',
            'ID partnerskej univerzity',
            'Nazov partnerskej univerzity',

        ];
    }
}
