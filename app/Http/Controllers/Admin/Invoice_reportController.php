<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Invoice_reportController extends Controller
{
    public function index()
    {
        return view('admin.reports.invoice_report');
    }

    public function search_invoice(Request $request)
    {

    $rdio = $request->rdio;


       // في حالة البحث بنوع الفاتورة
       if ($rdio == 1) {


              // في حالة عدم تحديد تاريخ
           if ($request->type && $request->start_at =='' && $request->end_at =='') {

            //*:select all
              $invoices = Invoice::select('*')->where('status','=',$request->type)->get();
              $type = $request->type;
              return view('admin.reports.invoice_report',compact('type'))->withDetails($invoices);
           }


           // في حالة تحديد تاريخ استحقاق
           else {

             $start_at = date($request->start_at);
             $end_at = date($request->end_at);
             $type = $request->type;

            // dd($start_at);

             $invoices = Invoice::whereBetween(DB::raw('DATE(invoice_date)'), array($start_at, $end_at))->where('status','=',$request->type)->get();
             return view('admin.reports.invoice_report',compact('type','start_at','end_at'))->withDetails($invoices);

           }



       }
   //====================================================================

   // في البحث برقم الفاتورة
       else {

           $invoices = Invoice::select('*')->where('invoice_number','=',$request->invoice_number)->get();
           return view('admin.reports.invoice_report' )->withDetails($invoices);

       }

       }
    }


