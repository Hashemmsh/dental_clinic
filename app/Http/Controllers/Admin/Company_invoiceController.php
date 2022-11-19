<?php

namespace App\Http\Controllers\Admin;

use ArPHP\I18N\Arabic;
use Illuminate\Http\Request;
use App\Models\Company_invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Company_invoice_details;

class Company_invoiceController extends Controller
{

    public function index()
    {

        Gate::authorize('all_company_invoice');
        $company_invoices = Company_invoice::orderBy('id')->paginate(5);
        return view('admin.company_invoices.index',compact('company_invoices'));
    }


    public function create()
    {
        Gate::authorize('add_company_invoice');

        $company_invoices = Company_invoice::select('id','company_name')->get();

        return view('admin.company_invoices.create',compact('company_invoices'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'invoice_number'=>'required',
            'company_name'=>'required',
            'product'=>'required',
            'quantity'=>'required',
            'price'=>'nullable',
            'total'=>'required',
           'date'=>'required',
           'paid'=>'required',
           'remaining'=>'required',
        ]);

        Company_invoice::create([

            'invoice_number'=>$request->invoice_number,
            'company_name'=>$request->company_name,
            'product'=>$request->product,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'total'=>$request->total,
            'status'=>'غير مدفوعة',
            'value_status'=>2,
            'date'=>$request->date,
            'paid'=>$request->paid,
            'remaining'=>$request->remaining,
            'user_id'=>Auth()->id()

        ]);
        $company_invoice_id = Company_invoice::latest()->first()->id;
        Company_invoice_details::create([
            'id_company_invoice' => $company_invoice_id,
            'invoice_number' => $request->invoice_number,
            'status' => 'غير مدفوعة',
            'value_status' => 2,
            'note' => $request->note,
            'user_id' => Auth()->id(),
        ]);
        return redirect()->route('admin.company_invoices.index')->with('msg','تم الأضافة  بنجاح')->with('type','success');

    }


    public function show($id)
    {
        $company_invoices= Company_invoice::find($id);
        return view('admin.company_invoices.show',compact('company_invoices'));
    }


    public function edit(Company_invoice $company_invoice)
    {
        Gate::authorize('edit_company_invoice');

        $company_invoices = Company_invoice::select('id','company_name')->get();
        return view('admin.company_invoices.edit',compact('company_invoice','company_invoices'));

    }


    public function update(Request $request,Company_invoice $company_invoice)
    {
        $request->validate([
            'invoice_number'=>'required',
            'company_name'=>'required',
            'product'=>'required',
            'quantity'=>'required',
            'price'=>'nullable',
            'total'=>'required',
           'date'=>'required',
           'paid'=>'required',
           'remaining'=>'required',
        ]);

        $company_invoice->update([

            'invoice_number'=>$request->invoice_number,
            'company_name'=>$request->company_name,
            'product'=>$request->product,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'total'=>$request->total,
            'status'=>'غير مدفوعة',
            'value_status'=>2,
            'date'=>$request->date,
            'paid'=>$request->paid,
            'remaining'=>$request->remaining,
            'user_id'=>Auth()->id()

        ]);
        return redirect()->route('admin.company_invoices.index')->with('msg','تم التعديل  بنجاح')->with('type','success');

    }


    public function destroy($id)
    {
        Gate::authorize('delete_company_invoice');

        Company_invoice::destroy($id);
        return redirect()->route('admin.company_invoices.index')->with('msg','تم الحذف بنجاح')->with('type','danger');

    }

    public function trash()
    {
        $company_invoices = Company_invoice::onlyTrashed()->get();
        return view('admin.company_invoices.trash',compact('company_invoices'));
    }

    public function restore($id)
    {
        Company_invoice::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.company_invoices.index')->with('msg','تم الاستعادة بنجاح')->with('type','success');
    }

    public function forcedelete($id)
    {
        $company_invoices = Company_invoice::onlyTrashed()->find($id);

        $company_invoices->forcedelete();
        return redirect()->route('admin.doctors.trash')->with('msg','تم الحذف  نهائيا')->with('type','danger');
    }

    public function company_status_update($id, Request $request)
    {

        $company_invoice = Company_invoice::findOrFail($id);

        if ($request->status === 'مدفوعة') {

            $company_invoice->update([
                'value_status' => 1,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
            ]);
            //dd($request);

            Company_invoice_details::create([
                'id_company_invoice' => $request->company_invoice_id,
                'invoice_number' => $request->invoice_number,
                'status' => $request->status,
                'value_status' => 1,
                'note' => $request->note,
                'payment_date' => $request->payment_date,
                'user_id' => Auth()->id(),
            ]);
        }

        else {
            $company_invoice->update([
                'value_status' => 3,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
            ]);
            Company_invoice_details::create([
                'id_company_invoice' => $request->company_invoice_id,
                'invoice_number' => $request->invoice_number,
                'status' => $request->status,
                'value_status' => 3,
                'note' => $request->note,
                'payment_date' => $request->payment_date,
                'user_id' => Auth()->id(),
            ]);
        }

        return redirect()->route('admin.company_invoices.index')->with('msg' ,'تم تعديل حالة الدفع')->with('type','success');
    }

    public function print($id)
    {


        $company_invoices= Company_invoice::find($id);
        return view('admin.company_invoices.print',compact('company_invoices'));
    }

    public function company_status_show($id)
    {
        $company_invoice = Company_invoice::where('id', $id)->first();
        return view('admin.company_invoices.status_update', compact('company_invoice'));
    }

    public function company_invoice_paid()
    {
        Gate::authorize('paid_company_invoice');

        $company_invoices = Company_invoice::where('value_status', 1)->get();
        return view('admin.company_invoices.paid',compact('company_invoices'));
    }

    public function company_invoice_unpaid()
    {
        Gate::authorize('unpaid_company_invoice');

        $company_invoices = Company_invoice::where('value_status',2)->get();
        return view('admin.company_invoices.unpaid',compact('company_invoices'));

    }

    public function company_invoice_partial()
    {
        Gate::authorize('partial_company_invoice');

        $company_invoices = Company_invoice::where('value_status',3)->get();
        return view('admin.company_invoices.partial',compact('company_invoices'));

    }
    public function pdf()
    {
        $company_invoices = Company_invoice::all();
        // dd($doctors);
        $reportHtml = view('admin.company_invoices.pdf',[ 'company_invoices' => $company_invoices ])->render();

        $arabic = new Arabic();
        $p = $arabic->arIdentify($reportHtml);

        for ($i = count($p)-1; $i >= 0; $i-=2) {
            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
        }

        $pdf = Pdf::loadHTML($reportHtml);
        return $pdf->download('purchase.pdf');

    }


}


