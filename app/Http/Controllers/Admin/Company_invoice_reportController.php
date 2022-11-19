<?php

namespace App\Http\Controllers\Admin;

use ArPHP\I18N\Arabic;
use Illuminate\Http\Request;
use App\Models\Company_invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class Company_invoice_reportController extends Controller
{
    public function index()
    {
        return view('admin.reports.company_invoice_report');
    }

    public function search_company_invoice(Request $request)
    {
        $rdio = $request->rdio;


        // في حالة البحث بنوع الفاتورة
        if ($rdio == 1) {


               // في حالة عدم تحديد تاريخ
            if ($request->type && $request->start_at =='' && $request->end_at =='') {

             //*:select all
               $company_invoice = Company_invoice::select('*')->where('status','=',$request->type)->get();
               $type = $request->type;
               return view('admin.reports.company_invoice_report',compact('type'))->withDetails($company_invoice);
            }


            // في حالة تحديد تاريخ استحقاق
            else {

              $start_at = date($request->start_at);
              $end_at = date($request->end_at);
              $type = $request->type;

              $company_invoice = Company_invoice::whereBetween('date',[$start_at,$end_at])->where('status','=',$request->type)->get();
              return view('admin.reports.company_invoice_report',compact('type','start_at','end_at'))->withDetails($company_invoice);

            }



        }
    //====================================================================

    // في البحث برقم الفاتورة
        else {

            $company_invoice = Company_invoice::select('*')->where('invoice_number','=',$request->invoice_number)->get();
            return view('admin.reports.company_invoice_report' )->withDetails($company_invoice);

        }

    }

}
