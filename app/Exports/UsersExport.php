<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Log;

class UsersExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {

        $users = User::orderBy('id', 'ASC')->get();
        Log::info(['$paramList' => $users]);

        return view('users.excel.export', compact('users'));

    }
}
