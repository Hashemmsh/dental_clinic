<?php

namespace App\Http\Controllers\Admin;

use ArPHP\I18N\Arabic;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Invoice_details;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InvoiceController extends Controller
{

    public function index()
    {

        Gate::authorize('all_invoice');
        $invoices = Invoice::orderBy('id')->paginate(5);
        return view('admin.invoices.index',compact('invoices'));
    }

    public function create()
    {
        Gate::authorize('add_invoice');
        $patients = Patient::select('id','name')->get();
        $services = Service::select('id','service','price')->get();
        return view('admin.invoices.create',compact('patients','services'));
    }

    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'invoice_number'=>'required',
            'invoice_date'=>'required',
            'patient_id'=>'nullable|exists:patients,id|:',
            'service_id'=>'nullable|exists:services,id|:',
            'laboratories'=>'nullable',
            'discount'=>'required',
            'total'=>'required',
            'paid'=>'required',
            'remaining'=>'required',

        ]);

            Invoice::create([
            'invoice_number'=>$request->invoice_number,
            'invoice_date'=>$request->invoice_date,
            'patient_id'=>$request->patient_id,
            'service_id'=>$request->service_id,
            'laboratories'=>$request->laboratories,
            'discount'=>$request->discount,
            'status'=>'غير مدفوعة',
            'value_status'=>2,
            'total'=>$request->total,
            'paid'=>$request->paid,
            'remaining'=>$request->remaining,
            'user_id'=>Auth()->id()
        ]);
        $invoice_id = Invoice::latest()->first()->id;
        Invoice_details::create([
            'id_invoice' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'status' => 'غير مدفوعة',
            'value_status' => 2,
            'note' => $request->note,
            'user_id' => Auth()->id(),
        ]);

        return redirect()->route('admin.invoices.index')->with('msg','تم الأضافة  بنجاح')->with('type','success');

    }

    public function show($id)
    {
        $invoices= Invoice::find($id);
        return view('admin.invoices.show',compact('invoices'));
    }

    public function edit(Invoice $invoice)
    {
        Gate::authorize('edit_invoice');
        $patients = Patient::select('id' , 'name')->get();
        $services = Service::select('id','service','price')->get();
        return view('admin.invoices.edit',compact('invoice','patients','services'));
    }


    public function update(Request $request, Invoice $invoice)
    {
      //  dd($request);
        $request->validate([
            'invoice_number'=>'required',
            'invoice_date'=>'required',
            'patient_id'=>'nullable|exists:patients,id|:',
            'service_id'=>'nullable|exists:services,id|:',
            'laboratories'=>'nullable',
            'discount'=>'required',
            'total'=>'required',
            'paid'=>'required',
            'remaining'=>'required',
        ]);

            $invoice->update([
                'invoice_number'=>$request->invoice_number,
                'invoice_date'=>$request->invoice_date,
                'patient_id'=>$request->patient_id,
                'service_id'=>$request->service_id,
                'laboratories'=>$request->laboratories,
                'discount'=>$request->discount,
                'status'=>'غير مدفوعة',
                'value_status'=>2,
                'total'=>$request->total,
                'paid'=>$request->paid,
                'remaining'=>$request->remaining,
                'user_id'=>Auth()->id()
        ]);

          return redirect()->route('admin.invoices.index')->with('msg','تم التعديل بنجاح')->with('type','success');
    }

    public function destroy($id)
    {
        Gate::authorize('delete_invoice');
        Invoice::destroy($id);
        return redirect()->route('admin.invoices.index')->with('msg','تم الحذف بنجاح')->with('type','danger');
    }

    public function trash()
    {
        $invoices=Invoice::onlyTrashed()->get();
        return view('admin.invoices.trash',compact('invoices'));
    }

    public function restore($id)
    {
        Invoice::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.invoices.index')
        ->with('msg','تم الاستعادة بنجاح')
        ->with('type','success');

    }

    public function forcedelete($id)
    {
        $invoice = Invoice::onlyTrashed()->find($id);
        $invoice->forcedelete();
         return redirect()->route('admin.invoices.trash')->with('msg','تم الحذف نهائيا')->with('type','danger');
    }


    public function invoice_status_update($id, Request $request)
    {

        $invoices = Invoice::findOrFail($id);

        if ($request->status === 'مدفوعة') {

            $invoices->update([
                'value_status' => 1,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
            ]);
            //dd($request);

             Invoice_details::create([
                'id_invoice' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'status' => $request->status,
                'value_status' => 1,
                'note' => $request->note,
                'payment_date' => $request->payment_date,
                'user_id' => Auth()->id(),
            ]);
        }

        else {
            $invoices->update([
                'value_status' => 3,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
            ]);
            Invoice_details::create([
                'id_invoice' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'status' => $request->status,
                'value_status' => 3,
                'note' => $request->note,
                'payment_date' => $request->payment_date,
                'user_id' => Auth()->id(),
            ]);
        }

        return redirect()->route('admin.invoices.index')->with('msg' ,'تم تعديل حالة الدفع')->with('type','success');
    }

    public function print($id)
    {
        $invoices= Invoice::find($id);
        return view('admin.invoices.print',compact('invoices'));
    }

    public function invoice_status_show($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        return view('admin.invoices.status_update', compact('invoice'));
    }

    public function invoice_paid()
    {
        Gate::authorize('paid_invoice');
        $invoices = Invoice::where('value_status', 1)->get();
        return view('admin.invoices.invoice_paid',compact('invoices'));
    }

    public function invoice_unpaid()
    {
        Gate::authorize('unpaid_invoice');
        $invoices = Invoice::where('value_status',2)->get();
        return view('admin.invoices.invoice_unpaid',compact('invoices'));
    }

    public function invoice_partial()
    {
        Gate::authorize('partial_invoice');
        $invoices = Invoice::where('value_status',3)->get();
        return view('admin.invoices.invoice_partial',compact('invoices'));

    }

    public function pdf()
    {
        $invoices = Invoice::all();
        // dd($doctors);
        $reportHtml = view('admin.invoices.pdf',[ 'invoices' => $invoices ])->render();

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


