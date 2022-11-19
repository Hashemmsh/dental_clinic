<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::orderBy('id')->paginate(10);
        return view('admin.services.index' , compact('services'));
    }

    public function create()
    {
       $services = Service::select('id')->get();
       return view('admin.services.create' , compact('services'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'service'=>'required',
            'description'=>'nullable',
            'price'=>'required',
        ]);
        Service::create([
            'service'=>$request->service,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>Auth()->id()
        ]);
        return redirect()->route('admin.services.index')->with('msg','تمت الأضافة بنجاح')->with('type','success');
    }

    public function show($id)
    {
        //
    }

    public function edit(Service $service)
    {
        //dd($service);
        $services = Service::select('id','service')->get();
        return view('admin.services.edit' , compact('service','services'));
    }

    public function update(Request $request, Service $service)
    {

        $request->validate([
            'service'=>'required',
            'description'=>'nullable',
            'price'=>'required',
        ]);
        $service->update([
            'service'=>$request->service,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>Auth()->id()
        ]);
        return redirect()->route('admin.services.index')->with('msg','تم التعديل بنجاح')->with('type','success');
    }

    public function destroy($id)
    {
       $services = Service::destroy($id);
       return redirect()->route('admin.services.index')->with('msg','تم الحذف بنجاح')->with('type','danger');

    }

    public function trash()
    {
        $services=Service::onlyTrashed()->get();
        return view('admin.services.trash',compact('services'));
    }

    public function restore($id)
    {
        Service::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.services.index')
        ->with('msg','تم الاستعادة بنجاح')
        ->with('type','success');
    }

    public function forcedelete($id)
    {
        $service= Service::onlyTrashed()->find($id);
        $service->forcedelete();
         return redirect()->route('admin.services.trash')->with('msg','تم الحذف نهائيا')->with('type','danger');
    }


}


