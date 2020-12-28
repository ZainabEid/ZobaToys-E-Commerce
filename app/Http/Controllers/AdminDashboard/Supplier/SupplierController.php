<?php

namespace App\Http\Controllers\AdminDashboard\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
       
        $suppliers = Supplier::when($request->search,function($q) use($request){
            return $q->where('name', 'like', '%'.$request->search.'%')
            ->orWhere('address', 'like', '%'.$request->search.'%')
            ->orWhere('supplies', 'like', '%'.$request->search.'%');

        })->latest()->paginate(5);

       return view('adminDashboard.suppliers.index', compact('suppliers'));
    }

    
    public function create()
    {
        return view('adminDashboard.suppliers.create');

    }

   
    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required',
            'phone' =>'required|array|min:1',
            'phone.0' =>'required',
            'address'=>'required',
            'supplies'=>'required',
            'description'=>'',

        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
        Supplier::create($request_data);
        session()->flash('success', __('site.added-successfuly'));
        return redirect()->route('adminDashboard.suppliers.index');
    }

   

   
    public function edit(Supplier $supplier)
    {
        return view('adminDashboard.suppliers.edit', compact('supplier'));
    }


   
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name'=>'required',
            'phone' =>'required|array|min:1',
            'phone.0' =>'required',
            'address'=>'required',
            'supplies'=>'required',
            'description'=>'',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        $supplier->update($request_data);
        session()->flash('success',__('site.updated-successfuly'));
        return redirect()->route('adminDashboard.suppliers.index');
    
    }

    
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        session()->flash('success',__('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.suppliers.index');
    }
}
