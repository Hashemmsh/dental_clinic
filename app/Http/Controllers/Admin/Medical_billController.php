<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Medicine;
use Faker\Provider\Medical;
use App\Models\Medical_bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class Medical_billController extends Controller
{


    public function index()
    {
        Gate::authorize('add_medical_bill');

        $count=5;

        if(request()->has('count') && request()->count != 'All'  ){
            $count = request()->count;
        }

        if(request()->has('count') && request()->count == 'All'  ){
            $count = Medical_bill::count();
        }

        if(request()->has('search')){
            $query = request()->search;
            $medical_bills = Medical_bill::whereHas('patient', function($patientQuery) use ($query){
                $patientQuery->where('name', 'LIKE', '%'.$query.'%' );
            })->paginate($count);
           //$medical_bills= Medical_bill::with('doctor')->where('name','like', '%' . request()->search .'%')->orWhere('name','like','%'. request()->search .'%')->orderBy('id')->paginate( $count);
         }else{

          $medical_bills= Medical_bill::orderBy('id')->paginate($count);

         }

        return view('admin.medical_bills.index',compact('medical_bills'));
    }

    public function create(Medical_bill $medical_bills)
    {
        Gate::authorize('add_medical_bill');
        $doctors = Doctor::select('id','name')->get();
        $patients = Patient::select('id','name')->get();
        $medicines = Medicine::select('id','name')->get();
        $services = Service::select('id','service')->get();
        return view('admin.medical_bills.create',compact('doctors','patients','medicines','services'));
    }

    public function store(Request $request)
    {
       //dd($request);
        $request->validate([
            'patient_id'=>'nullable|exists:patients,id|:',
            'tooth'=>'required',
            'service_id'=>'nullable|exists:doctors,id|:',
            'prescription'=>'required',
            'doctor_id'=>'nullable|exists:doctors,id|:',
            'image' => 'nullable',
            'medicine_id'=>'nullable|exists:medicines,id|:'
          ]);

         $img_name=null;
             if($request->hasFile('image')){
                $img_name= rand().time().$request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('uploads/medical_bills'), $img_name );
            }
        // if($request->hasFile('image'))
        //  {
        //     foreach($request->file('image') as $image)
        //     {
        //         $name=$image->getClientOriginalName();
        //         $image->move(public_path().'/uploads/medical_bills/', $name);
        //         $data[] = $name;
        //     }
        //  }
        //   $medical_bills= new Medical_bill();
        //   $medical_bills->image=json_encode($data);
        //   $medical_bills->save();
          Medical_bill::create([
            'patient_id'=>$request->patient_id,
            'tooth'=>$request->tooth,
            'service_id'=>$request->service_id,
            'prescription'=>$request->prescription,
            'doctor_id'=>$request->doctor_id,
            'image'=>$img_name,
            'medicine_id'=>$request->medicine_id,
            'user_id'=>Auth()->id()
          ]);
          return redirect()->route('admin.medical_bills.index')->with('msg','تمت اضافة الكشفية بنجاح')->with('type','success');
    }

    public function show($id)
    {

        $medical_bill= Medical_bill::find($id);
        return view('admin.medical_bills.show',compact('medical_bill'));
    }


    public function edit(Medical_bill $medical_bill)
    {
        Gate::authorize(' edit_medical_bill');
        $patients= Patient::select('id' ,'name')->get();
        $doctors= Doctor::select('id' ,'name')->get();
        $medicines= Medicine::select('id' ,'name')->get();
        $services= Service::select('id' ,'service')->get();
        return view('admin.medical_bills.edit',compact('medical_bill','patients','doctors','medicines','services'));
    }

    public function update(Request $request, Medical_bill $medical_bill)
    {

       $request->validate([
         'patient_id'=>'nullable|exists:patients,id|:',
         'tooth'=>'required',
         'service_id'=>'nullable|exists:doctors,id|:',
        'prescription'=>'required',
        'doctor_id'=>'nullable|exists:doctors,id|:',
        'image' => 'required',
        'medicine_id'=>'nullable|exists:medicines,id|:'
      ]);
           $img_name=$medical_bill->image;
            if($request->hasFile('image')){
              $img_name= rand().time().$request->file('image')->getClientOriginalName();
               $request->file('image')->move(public_path('uploads/medical_bills'), $img_name );
            }
        //dd($medical_bill);
        $medical_bill->update([
            'patient_id'=>$request->patient_id,
            'tooth'=>$request->tooth,
            'service_id'=>$request->service_id,
            'prescription'=>$request->prescription,
            'doctor_id'=>$request->doctor_id,
            'image'=>$img_name,
            'medicine_id'=>$request->medicine_id,
            'user_id'=>Auth()->id()
          ]);

          return redirect()->route('admin.medical_bills.index')->with('msg','تم تعديل  الكشفية بنجاح')->with('type','success');
    }

    public function destroy($id)
    {
        Gate::authorize('delete_medical_bill');
        Medical_bill::destroy($id);
        return redirect()->route('admin.medical_bills.index')->with('msg','تم الحذف بنجاح')->with('type', 'danger');
    }

    public function trash()
    {
        $medical_bills=Medical_bill::onlyTrashed()->get();
        return view('admin.medical_bills.trash',compact('medical_bills'));
    }

    public function restore($id)
    {
        Medical_bill::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.medical_bills.index')->with('msg','تم الاستعادة بنجاح')->with('type','success');
    }

    public function forcedelete($id)
    {
        $medical_bills= Medical_bill::onlyTrashed()->find($id);
         File::delete(public_path('upload/medical_bills/'.$medical_bills->image));
        $medical_bills->forcedelete();
         return redirect()->route('admin.medical_bills.trash')->with('msg','تم الحذف نهائيا')->with('type','danger');

    }

    public function print($id)
    {
        $medical_bill= Medical_bill::find($id);
        return view('admin.medical_bills.print',compact('medical_bill'));
    }


}
