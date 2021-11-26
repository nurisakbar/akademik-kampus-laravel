<?php
namespace App\Exports;
use App\Dosen;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DosenExport implements FromView
{
    public function view(): View
    {
        return view('dosen.excel', [
            'dosen' => Dosen::all()
        ]);
    }
}