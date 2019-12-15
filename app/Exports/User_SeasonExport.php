<?php

namespace App\Exports;

use App\Models\User_season;
use Maatwebsite\Excel\Concerns\FromCollection;

class User_SeasonExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function collection()
    {
        return User_season::select('users_season.ID','users_ID','status_season.ID','status_season_ID')->join('status_season', 'users_season.ID','status_season.user_season_ID')->join('season_status', 'season_status.ID','status_season.season_status_ID')->where('users_status.season_ID',$this->id)->get();
    }

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
