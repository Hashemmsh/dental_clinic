<?php

namespace App\Http\Controllers\Admin;
use App\Models\Doctor;
use ArPHP\I18N\Arabic;
use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PatientController extends Controller
{

    public function index()
    {


        Gate::authorize('all_patient');
           $count=20;
           if(request()->has('count') && request()->count != 'All'  ){
               $count = request()->count;
           }
           if(request()->has('count') && request()->count == 'All'  ){
               $count = Patient::count();
           }

           if(request()->has('search')){

            if(Auth::user()->type == 'supAdmin') {
                $patients= Patient::with('doctor')->where('name','like', '%' . request()->search .'%')->orWhere('name','like','%'. request()->search .'%')->orderBy('id')->paginate( $count);
            }else {
                $patients= Patient::with('doctor')->where('doctor_id', Auth::id())->where('name','like', '%' . request()->search .'%')->orWhere('name','like','%'. request()->search .'%')->orderBy('id')->paginate( $count);
            }



            }else{

                if(Auth::user()->type == 'supAdmin') {
                    $patients= Patient::orderByDesc('id')->paginate($count);
                }else {
                    $patients= Patient::orderByDesc('id')->where('doctor_id', Auth::id())->paginate($count);
                }



            }

        return view('admin.patients.index',compact('patients'));
    }

    public function create()
    {
        Gate::authorize('add_patient');
        $doctors=Doctor::select('id','name')->get();
        return view('admin.patients.create',compact('doctors'));
    }

    public function store(Request $request)
    {
          // /   dd($request->all());

        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'nullable',
            'note'=>'nullable',
            'doctor_id'=>'nullable|exists:doctors,id|:'

        ]);
         // dd($request->all());


        //   foreach( $request->File('image') as $image){
        //     $img_name= rand().time().$request->file('image')->getClientOriginalName();
        //     $request->file('image')->move(public_path('uploads/patients'), $img_name );

        // }
        $img_name=null;
        if($request->hasFile('image')){
           $img_name= rand().time().$request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('uploads/patients'), $img_name );
       }


          Patient::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$img_name,
            'note'=>$request->note,
            'doctor_id'=>$request->doctor_id,
            'user_id'=>Auth()->id()

        ]);

          return redirect()->route('admin.patients.index')->with('msg','تم اضافة المريض/ة بنجاح')->with('type','success');

    }

    public function show($id)
    {
         $patient = Patient::find($id);
         return view('admin.patients.show',compact('patient'));
    }

    public function edit(Patient $patient)
    {
        Gate::authorize('edit_patient');
           $doctors = Doctor::select('id' , 'name')->get();
           return view('admin.patients.edit',compact('patient','doctors'));
    }

    public function update(Request $request , Patient $patient )
    {
       // dd($request);
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'nullable',
            'note'=>'required',
            'doctor_id'=>'nullable|exists:doctors,id|:'

          ]);
          $img_name=$patient->image;
          if($request->hasFile('image')){
          $img_name= rand().time().$request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/patients'), $img_name );
          }

          $patient->update([
            'name'=>$request->name,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$img_name,
            'note'=>$request->note,
            'doctor_id'=>$request->doctor_id,
            'user_id'=>Auth()->id()
          ]);

          return redirect()->route('admin.patients.index')->with('msg','تم التعديل المريض/ة بنجاح')->with('type','success');
    }

    public function destroy($id)
    {
        Gate::authorize('delete_patient');
        Patient::destroy($id);
        return redirect()->route('admin.patients.index')->with('msg','تم الحذف بنجاح')->with('type','danger');
    }

    public function trash()
    {
        $patients=Patient::onlyTrashed()->get();
        return view('admin.patients.trash',compact('patients'));
    }

    public function restore($id)
    {
        Patient::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.patients.index')
        ->with('msg','تم الاستعادة بنجاح')
        ->with('type','success');
    }

    public function forcedelete($id)
    {
        $patient= Patient::onlyTrashed()->find($id);
          File::delete(public_path('upload/patients/'.$patient->image));
          $patient->forcedelete();
           return redirect()->route('admin.patients.trash')->with('msg','تم الحذف نهائيا')->with('type','danger');
    }

    public function print()
    {
        $patients= Patient::all();
        return view('admin.patients.print',compact('patients'));
    }

     public function PDF()
    {
        $patients = Patient::all();
        // dd($doctors);
        $reportHtml = view('admin.patients.pdf',[ 'patients' => $patients ])->render();

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




