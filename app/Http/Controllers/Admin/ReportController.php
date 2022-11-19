<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Report;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Medicine;
use App\Models\Apponment;
use Faker\Provider\Medical;
use App\Models\Medical_bill;
use Illuminate\Http\Request;
use App\Models\Company_invoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_report');
        $d_count=Doctor::count();
        $p_count=Patient::count();
        $a_count=Apponment::count();
        $s_count=Service::count();
        $mb_count=Medical_bill::count();
        $me_count=Medicine::count();
        $IPm_earning= Invoice::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->sum('total');
        $IPy_earning= Invoice::whereYear('created_at',date('Y'))->sum('total');
        $CIm_earning= Company_invoice::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->sum('total');
        $CIy_earning= Company_invoice::whereYear('created_at',date('Y'))->sum('total');
        $Ed_earning= Expense::whereDay('created_at',date('d'))->sum('total');
        $Em_earning= Expense::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->sum('total');
        $Ey_earning= Expense::whereYear('created_at',date('Y'))->sum('total');

      return view('admin.reports.index',compact('d_count','p_count','a_count','s_count','mb_count','me_count','IPm_earning','IPy_earning','CIm_earning','CIy_earning','Ed_earning','Em_earning','Ey_earning'));
        // return view('admin.reports.index' , compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        //
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        //
    }


// public function search_invoices(Request $request){

//         $rdio = $request->rdio;

//           // في حالة البحث بنوع الفاتورة
//           if ($rdio == 1) {

//             // في حالة عدم تحديد تاريخ
//             if ($request->type && $request->start_at =='' && $request->end_at =='') {

//                $invoices = Invoice::select('*')->where('status','=',$request->type)->get();
//                $type = $request->type;
//                return view('admin.reports.index',compact('type'))->with($invoices);
//             }

//             // في حالة تحديد تاريخ استحقاق
//             else {

//               $start_at = date($request->start_at);
//               $end_at = date($request->end_at);
//               $type = $request->type;

//               $invoices = Invoice::where('invoice_date',[$start_at,$end_at])->where('status','=',$request->type)->get();
//               return view('admin.reports.index',compact('type','start_at','end_at'))->with($invoices);

//             }



//         }

//     //====================================================================

//     // في البحث برقم الفاتورة
//         else {

//             $invoices = Invoice::select('*')->where('invoice_number','=',$request->invoice_number)->get();
//             return view('admin.reports.index')->with($invoices);

//         }
// }


}


