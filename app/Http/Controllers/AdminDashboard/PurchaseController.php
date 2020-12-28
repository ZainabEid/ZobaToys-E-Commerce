<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
   
    public function index(Request $request)
    {
    
        $purchases = Purchase::whereHas('supplier',function($q) use ($request){
            return $q->where('name', 'LIKE', '%'. $request->search .'%');
        })->paginate(5);

        return view('adminDashboard.purchases.index', compact('purchases'));

    }// end of index

    public function supplies(Purchase $purchase)
    {
        $supplies = $purchase->supplies;
        return view('adminDashboard.purchases._supplies', compact('supplies','purchase'));

    }// end of supplies

    public function create()
    {// goto choose the supplier view (named:create)
        
        $suppliers = Supplier::all();
        return view('adminDashboard.purchases.create', compact('suppliers'));
    
    }//end of create

    public function store(Request $request)
    {//redirect to supplier.purchase.create

        $supplier = Supplier::findOrFail($request->supplier_id);
        return redirect()->route('adminDashboard.suppliers.purchases.create' , $supplier );
   
    }//end of store
    
    public function destroy(Purchase $purchase)
    {
        foreach ($purchase->supplies as $supply) {
            
            $supply->update([
                'stock' => $supply->stock + $supply->pivot->quantity,
            ]);

        }// end of foreach

        $purchase->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.purchases.index');
    }//end of destroy

    
   
}// end of purchase controller
