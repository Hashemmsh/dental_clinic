<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Apponment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
       // $d_count=Doctor::count();
     //   $a_count=Patient::count();

        # get all apponments in current month
        $month_apponments = Apponment::whereMonth('date', Carbon::now()->month)->get();


        return view('admin.index',compact('month_apponments'));




        
    }

}
