<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;


class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    
    */
    public function collection()
    {
        return User::where('role', 'admin')->select('name', 'username', 'email', 'status')->orderBy('id')->get();
    }
}
