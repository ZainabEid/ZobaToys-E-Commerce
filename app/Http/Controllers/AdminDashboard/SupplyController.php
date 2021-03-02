<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class SupplyController extends Controller
{
  
    public function index(Request $request )
    {

        $supplies = Supply::when($request->search, function($q) use ($request){
            return $q->where('name', 'like', '%'.$request->search.'%')
            ->orWhere('color','like','%'.$request->search.'%');
        })->when($request->supplier_id, function($q) use($request){
            return $q->where('supplier_id',$request->supplier_id);
        })->when($request->group_id, function($q) use($request){
            return $q->where('group_id',$request->group_id);
        })->latest()->paginate(5);

        
        $suppliers = Supplier::all();
        
        $groups = Group::all();
        return view('adminDashboard.supplies.index', compact('supplies', 'suppliers','groups' ));
        
    }// end of index

   
    public function create()
    {
       $suppliers = Supplier::all();
       $groups = Group::all();
        return view('adminDashboard.supplies.create' ,compact('suppliers','groups'));

    }// end of create


    public function handelingImages($image)
    {
        // manage image uploading: fit, compress, hash, move to public/uploads
        $supply_image = Image::make($image)
            ->fit(300,300)->Save(base_path('assets/uploads/supply_images/'.$image->hashName()));

        return $supply_image->basename;

    }//end of handling image function

  
    public function store(Request $request)
    {
       
        $request->validate([
            'supplier_id'=>'required',
            'group_id'=>'required',
            'name'=>'required',
            'color'=>'required',
            'purchase_price'=>'required',
            'image'=>'image',
            'stock'=>'required',
            'stock_unit'=>'required',
        ]);

        
        $requested_data = $request->except(['_token','image']);
        
        
        ########## if it is images add them to the supply ##########
        if ($request->image) {
            
           $requested_data['image']= $this->handelingImages($request->image);
            
        }
        ########## end of image handling ##########
        
        
        $supply = Supply::create($requested_data);
        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.supplies.index');

    }// end of store

   
    public function show(Supply $supply)
    {
        //
    }// end of show

   
    public function edit(Supply $supply)
    {
        $suppliers = Supplier::all();
        $groups = Group::all();
        return view('adminDashboard.supplies.edit', compact('supply', 'suppliers','groups'));

    }// end of edit

    
    public function update(Request $request, Supply $supply)
    {
        $request->validate([
            'supplier_id'=>'required',
            'group_id'=>'required',
            'name'=>'required',
            'color'=>'required',
            'purchase_price'=>'required',
            'image'=>'image',
            'stock'=>'required',
            'stock_unit'=>'required',
        ]);
        
        $requested_data = $request->except(['_token','_method','image']);

        
        ########## start image handling ##########
        if ($request->image) {
            // remove old image from starage 
            if($supply->image != 'default.png' || $request->image != $supply->image){
                Storage::disk('assets_uploads')->delete('supply_images/'.$supply->image);
            }
            $requested_data['image'] = $this->handelingImages($request->image);
        }
        ########## end of image handling ##########
        
        
        $supply->update($requested_data);
        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.supplies.index');

    }// end of update

   
    public function destroy(Supply $supply)
    {
         // remove old image from starage 
         if($supply->image != 'default.png'){
            Storage::disk('assets_uploads')->delete('supply_images/'.$supply->image);
        }

        $supply->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.supplies.index');
    }//end of destroy
}
