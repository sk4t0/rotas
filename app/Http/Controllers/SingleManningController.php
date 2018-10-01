<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Rota;
use App\Models\Staff;
use App\Library\SingleManning;
Use Kumuwai\DataTransferObject\Laravel5DTO;

class SingleManningController extends Controller
{
    public function show($id) {

        $rota = Rota::findOrFail($id);
        $singleManningObject = new SingleManning($rota);
        $singleManning = Laravel5DTO::make($singleManningObject->singleManningArray);
        $staff = Staff::all();
        return view('la.single_manning.show', [
            'no_header' => true,
            'no_padding' => "no-padding",
            'singleManning' => $singleManning->toArray(),
            'rota' => $rota,
            'staff' => $staff
        ]);

    }
}
