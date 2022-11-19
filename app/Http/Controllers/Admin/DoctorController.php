<?php

namespace App\Http\Controllers\Admin;





// use Mpdf\Mpdf;
use App\Models\Doctor;
use ArPHP\I18N\Arabic;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Dflydev\DotAccessData\Data;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_doctor');
        $doctors = Doctor::with('user')->orderBy('id')->paginate(5);
        return view('admin.doctor.index',compact('doctors'));
    }

    public function create()
    {
         Gate::authorize('add_doctor');
       $roles = Doctor::select('id','name')->get();
      $roles = Role::all();
        return view('admin.doctor.create', compact('roles'));
        dd($roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        Doctor::create([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'user_id'=>Auth::id()
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => bcrypt(123456789),
            'role_id' => $request->role_id
        ]);


        return redirect()->route('admin.doctors.index')->with('msg','تمت الأضافة بنجاح')->with('type','success');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.show',compact('doctor'));
    }


    public function edit(Doctor $doctor)
    {
        Gate::authorize('edit_doctor');
        $doctors = Doctor::select('id','name')->get();
        return view('admin.doctor.edit',compact('doctor','doctors'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
       $doctor->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);
        return redirect()->route('admin.doctors.index')->with('msg','تم التعديل بنجاح')->with('type','success');
    }


    public function destroy($id)
    {
        Gate::authorize('delete_doctor');
        Doctor::destroy($id);
        return redirect()->route('admin.doctors.index')->with('msg','تم الحذف بنجاح')->with('type','danger');
    }

    public function trash()
    {
      $doctors = Doctor::onlyTrashed()->get();
       return view('admin.doctor.trash',compact('doctors'));
    }

   public function restore($id)
    {
       Doctor::onlyTrashed()->find($id)->restore();
       return redirect()->route('admin.doctors.index')->with('msg','تم الاستعادة بنجاح')->with('type','success');

    }

   public function forcedelete($id)
   {

      $doctor = Doctor::onlyTrashed()->find($id);

       $doctor->forcedelete();
       return redirect()->route('admin.doctors.trash')->with('msg','تم الحذف  نهائيا')->with('type','danger');
   }

   public function print()
    {
      $doctors = Doctor::all();
      return view('admin.doctor.print',compact('doctors'));

    }

     public function pdf()
    {
        $doctors = Doctor::all();
        // dd($doctors);
        $reportHtml = view('admin.doctor.pdf',[ 'doctors' => $doctors ])->render();

        $arabic = new Arabic();
        $p = $arabic->arIdentify($reportHtml);

        for ($i = count($p)-1; $i >= 0; $i-=2) {
            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
        }

        $pdf = Pdf::loadHTML($reportHtml);
        return $pdf->download('purchase.pdf');

        // $mpdf = new mPDF();
        // $mpdf->WriteHTML('<h1>Hello world!</h1>');
        // $mpdf->Output();

        // $data = [
        //     'foo' => 'bar'
        //   ];
        //   $pdf = PDF::loadView('pdf.document', $data);
        //   return $pdf->stream('document.pdf');

//         require_once __DIR__ . '/vendor/autoload.php';
//         $doctors = Doctor::all();
// //         $mpdf= new Mpdf\Mpdf([
// //             'mode'=>'UTF-8','format' => [400, 400],'autoScriptToLang'=>true,'autoLangToFont'=>true
// // ]);

//         $mpdf = new Mpdf();
//         $mpdf->WriteHTML(view('admin.doctor.pdf',compact('doctors')));
//         $mpdf->Output();

    }

}
