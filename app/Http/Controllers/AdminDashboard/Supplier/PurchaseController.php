<?php

namespace App\Http\Controllers\AdminDashboard\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\PurchaseRequest;
use App\Http\Requests\AdminDashboard\SupplyRequest;
use App\Models\Group;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create(Supplier $supplier)
    {
        $purchases = $supplier->purchases()->with('supplies')->paginate(5);
        return view('adminDashboard.suppliers.purchases.create', compact('supplier','purchases'));
    }// end of create

   
    public function store(PurchaseRequest $request, Supplier $supplier)
    {
       $this->attach_purchase($request,$supplier);

       session()->flash('success', __('site.added_successfully'));
       return redirect()->route('adminDashboard.purchases.index');

    }// end of store


    
    public function edit(Supplier $supplier , Purchase $purchase)
    {
        $groups = Group::with('supplies')->get();
       return view('adminDashboard.suppliers.purchases.edit', compact('supplier','purchase','groups'));
        
    }// end of edit

    
    public function update(  Supplier $supplier, Purchase $purchase,PurchaseRequest $request)
    {

        $this->detach_purchase($purchase);
        
        $this->attach_purchase($request,$supplier);

        session()->flash('success',__('site.updated-successfuly'));
        return redirect()->route('adminDashboard.purchases.index');

    }// end of update

   
    public function destroy(Purchase $purchase, Supplier $supplier)
    {
        //
    }// end of destroy

    private function attach_purchase($request,$supplier)      
    {
        $purchase = $supplier->purchases()->create([]);
       $purchase->supplies()->attach($request->supplies);


       $total_price = 0;

        foreach(  $request->supplies as $supply_id => $requested_supply ){  

            $supply = Supply::FindOrFail($supply_id);
            $total_price += $supply->purchase_price * $requested_supply['quantity'];
            
            $supply->update([
                'stock' => $supply->stock - $requested_supply['quantity']
                ]);
                
        }//end of foreach
            
       $purchase -> update(['total_price' => $total_price]);
    }//end of attach purchase

    private function detach_purchase($purchase)
    {
        
        foreach ($purchase->supplies as $supply) {
            
            $supply->update([
                'stock' => $supply->stock + $supply->pivot->quantity,
            ]);

        }// end of foreach

        $purchase->delete();
    }// end of detach purchase


    public function cancel(Supplier $supplier, Purchase $purchase)
    {
        
    }// end of cancel

    public function approve(Supplier $supplier, Purchase $purchase)
    {
        
    }// end of approve

    public function ship(Supplier $supplier, Purchase $purchase)
    {
        
    }// end of ship

    public function deliverd(Supplier $supplier, Purchase $purchase)
    {
        
    }// end of deliverd
    

}// end of supplier/purchase contrller
