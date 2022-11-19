<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_expense');

        $expenses = Expense::with('user')->orderBy('id')->paginate(5);
        return view('admin.expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_expense');
        $expenses = Expense::select('id','product')->get();

        return view('admin.expenses.create',compact('expenses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'total'=>'required',
            'date'=>'required',
        ]);
        Expense::create([
            'product'=>$request->product,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'total'=>$request->total,
            'date'=>$request->date,
            'user_id'=>Auth()->id()
        ]);
        return redirect()->route('admin.expenses.index')->with('msg','تمت الأضافة بنجاح')->with('type','success');
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
    public function edit(Expense  $expense )
    {
        Gate::authorize('edit_expense');
        $expenses = Expense::select('id','product')->get();
        return view('admin.expenses.edit',compact('expense','expenses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Expense  $expense )
    {
        $request->validate([
            'product'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'total'=>'required',
            'date'=>'required',
        ]);
        $expense->update([
            'product'=>$request->product,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'total'=>$request->total,
            'date'=>$request->date,
            'user_id'=>Auth()->id()
        ]);
        return redirect()->route('admin.expenses.index')->with('msg','تمت التعديل بنجاح')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_expense');
        Expense::destroy($id);
        return redirect()->route('admin.expenses.index')->with('msg','تم الحذف بنجاح')->with('type','danger');
    }
     /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $expenses = Expense::onlyTrashed()->get();
        return view('admin.expenses.trash',compact('expenses'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Expense::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.expenses.index')->with('msg','تم الاستعادة بنجاح')->with('type','success');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $expense = Expense::onlyTrashed()->find($id);

        $expense->forcedelete();
        return redirect()->route('admin.expenses.trash')->with('msg','تم الحذف  نهائيا')->with('type','danger');
    }

    public function print()
    {
      $expenses = Expense::all();
      return view('admin.expenses.print',compact('expenses'));

    }
}


