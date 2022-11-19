<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_medicine');

          $count=5;

           if(request()->has('count') && request()->count != 'All'  ){

              $count = request()->count;
           }
           if(request()->has('count') && request()->count == 'All'  ){

              $count = Medicine::count();
           }

          if(request()->has('search')){

           $medicines= Medicine::with('doctor')->where('name','like', '%' . request()->search .'%')->orWhere('name','like','%'. request()->search .'%')->orderBy('id')->paginate( $count);

           }else{

           $medicines= Medicine::orderBy('id')->paginate($count);
             }

       return view('admin.medicines.index',compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_medicine');
          $doctors=Doctor::select('id','name')->get();

        return view('admin.medicines.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'indictions'=>'required',
            'symptoms'=>'required',
            'details'=>'required',
            'doctor_id'=>'nullable|exists:doctors,id'
        ]);
        Medicine::create([
            'name'=>$request->name,
            'indictions'=>$request->indictions,
            'symptoms'=>$request->symptoms,
            'details'=>$request->details,
            'doctor_id'=>$request->doctor_id,
        ]);
        return redirect()->route('admin.medicines.index')->with('msg','تمت الأضافة بنجاح')->with('type','success');
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
    public function edit(Medicine $medicine)
    {
        Gate::authorize('edit_medicine');
        $doctors= Doctor::select('id','name')->get();
        return view('admin.medicines.edit',compact('medicine','doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name'=>'required',
            'indictions'=>'required',
            'symptoms'=>'required',
            'details'=>'required',
            'doctor_id'=>'nullable|exists:doctors,id'
        ]);
        $medicine->update([
            'name'=>$request->name,
            'indictions'=>$request->indictions,
            'symptoms'=>$request->symptoms,
            'details'=>$request->details,
            'doctor_id'=>$request->doctor_id,
        ]);
        return redirect()->route('admin.medicines.index')->with('msg','تم التعديل بنجاح')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_medicine');
        Medicine::destroy($id);
        return redirect()->route('admin.medicines.index')->with('msg','تم الحذف بنجاح')->with('type','danger');
    }
     /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $medicines=Medicine::onlyTrashed()->get();
        return view('admin.medicines.trash',compact('medicines'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Medicine::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.medicines.index')->with('msg','تم الاستعادة بنجاح')->with('type','success');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $medicines= Medicine::onlyTrashed()->find($id);

        $medicines->forcedelete();
        return redirect()->route('admin.medicines.trash')->with('msg','تم الحذف الموظف نهائيا')->with('type','danger');
    }

}


