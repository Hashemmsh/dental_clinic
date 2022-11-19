<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Apponment;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ApponmentController extends Controller
{

    public function index()
    {
        Gate::authorize('all_apponment');

        $count = 5;

           if(request()->has('count') && request()->count != 'All'  ){

              $count = request()->count;

            }
            if(request()->has('count') && request()->count == 'All'  ){

               $count = Apponment::count();

            }

          if(request()->has('search')){

            $query = request()->search;
            $apponments = Apponment::whereHas('patient', function($patientQuery) use ($query){
                $patientQuery->where('name', 'LIKE', '%'.$query.'%' );
            })->paginate($count);

        //    $apponments= Apponment::with('patient')->where('patient_id','like', '%' . request()->search .'%')->orWhere('patient_id','like','%'. request()->search .'%')->orderBy('id')->paginate( $count);


           }else{

           $apponments = Apponment::orderByDesc('id')->paginate($count);

             }

       return view('admin.apponments.index',compact('apponments'));
    }

    public function create()
    {
        Gate::authorize('add_apponment');
        $patients = Patient::select('id','name')->get();
        $doctors  = Doctor::select('id','name')->get();
        return view('admin.apponments.create',compact('patients','doctors'));
    }

    public function store(Request $request)
    {
     // dd($request);
        $request->validate([

            'patient_id'=>'nullable|exists:patients,id',
            'doctor_id'=>'nullable|exists:doctors,id',
            'date'=>'required',
            'note'=>'nullable'

        ]);
        Apponment::create([

            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'note'=>$request->note,
            'status'=>'انتظار',
            'user_id'=>Auth()->id()

        ]);
        return redirect()->route('admin.apponment.index')->with('msg','تمت الأضافة بنجاح')->with('type','success');
    }

    public function show($id)
    {
        //
    }

    public function edit(Apponment $apponment)
    {
        Gate::authorize('edit_apponment');
        $doctors  = Doctor::select('id','name')->get();
        $patients = Patient::select('id','name')->get();
        return view('admin.apponments.edit',compact('apponment','doctors','patients'));
    }

    public function update(Request $request, Apponment $apponment)
    {
        //dd($request);
        $request->validate([

            'patient_id'=>'nullable|exists:patients,id|not_in:',
            'doctor_id'=>'nullable|exists:doctors,id|not_in:',
            'date'=>'required',
            'note' =>'nullable',

        ]);
         $apponment->update([

            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor_id,
            'date'=>$request->date,
            'note'=>$request->note,
            'status'=>'انتظار',
            'user_id'=>Auth()->id()

        ]);
        return redirect()->route('admin.apponment.index')->with('msg','تمت التعديل بنجاح')->with('type','success');
    }

    public function destroy($id)
    {
        Gate::authorize('delete_apponment');
        Apponment::destroy($id);
        return redirect()->route('admin.apponment.index')->with('msg','تم الحذف بنجاح')->with('type','danger');
    }

    public function trash()
    {
        $apponments = Apponment::onlyTrashed()->get();
        return view('admin.apponments.trash',compact('apponments'));
    }

    public function restore($id)
    {
        Apponment::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.apponment.index')->with('msg','تم الاستعادة بنجاح')->with('type','success');
    }

    public function forcedelete($id)
    {
        $apponment = Apponment::onlyTrashed()->find($id);

        $apponment->forcedelete();
        return redirect()->route('admin.apponments.trash')->with('msg','تم الحذف الموظف نهائيا')->with('type','danger');
    }

    //change status
    public function approved($id)
    {
        $apponment = Apponment::find($id);
        $apponment->status='وصول';
        $apponment->save();
        return redirect()->back();

    }

    public function canceled($id)
    {
        $apponment = Apponment::find($id);
        $apponment->status='ألغاء';
        $apponment->save();
        return redirect()->back();

    }



}
