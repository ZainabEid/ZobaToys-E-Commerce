<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\VendorRequest;
use App\Models\Admin;
use App\Models\Vendor;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class VendorController extends Controller
{
   
    public function index(Request $request)
    {
        $vendors = Vendor::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%'.$request->search.'%');
            
        })->latest()->paginate(5);

        return view('adminDashboard.vendors.index', compact('vendors'));
   
    }//end of index

  
    public function create()
    {
        $admins = Admin::all(); 
        return view('adminDashboard.vendors.create', compact('admins'));
    
    }//end of create

   
    public function store(VendorRequest $request)
    {
        $request_data = $request->except(['logo']);

         // manage logo uploading
         if ($request->logo) {
            $img = Image::make($request->logo)
                ->fit(300,300)->Save(base_path('assets/uploads/vendor_logos/'.$request->logo->hashName()));
            $request_data['logo'] = $request->logo->hashName();
        }


        // store admin data into database
        $vendor = Vendor::create($request_data);
      
        //session alert success
        session()->flash('success',__('site.added-successfuly'));

        return redirect()->route('adminDashboard.vendors.index');
    }// end of store

    
    public function show(Vendor $vendor)
    {
        //
    }

 
    public function edit(Vendor $vendor)
    {
        $admins = Admin::all(); 
        return view('adminDashboard.vendors.edit', compact('admins','vendor'));
    }

   
    public function update(VendorRequest $request, Vendor $vendor)
    {
        $request_data = $request->except(['logo']);

         // manage logo uploading
         if ($request->logo) {
             if ($vendor->logo != 'default.png') {
                Storage::disk('assets_uploads')->delete('vendor_logos/'.$vendor->logo);
             }
             // manage image uploading: fit(300,300), compress, hash, move to uploads/vendor_logos folder
            save_image('vendor_logos', $request->logo);
           
            $request_data['logo'] = $request->logo->hashName();
        }


        // store admin data into database
        $vendor->update($request_data);
      
        //session alert success
        session()->flash('success',__('site.added-successfuly'));

        return redirect()->route('adminDashboard.vendors.index');
    }// end of update

  
    public function destroy(Vendor $vendor)
    {
       
        if($vendor->logo != 'default.png' ){
            Storage::disk('assets_uploads')->delete('vendor_logos/'.$vendor->logo);
        }
        $vendor->delete();
        session()->flash('success',__('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.vendors.index');

    }//end of destroy   
}// end of vendor controller
