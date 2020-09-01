<?php

namespace App\Http\Controllers\AdminDashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    /** constructor: setting middlewares */ 
    public function __construct()
    {
        $this->middleware(['permission:create_admins'])->only('create');
        $this->middleware(['permission:read_admins'])->only('index');
        $this->middleware(['permission:update_admins'])->only('edit');
        $this->middleware(['permission:delete_admins'])->only('distroy');
    }
    
    /** index: show all admins,  */ 
    public function index(Request $request)
    {
        $admins = Admin::whereRoleIS('admin')->where(function($q) use ($request){
            return $q->when($request->search,function($query) use ($request){
            
                return  $query->where('name','like','%'.$request->search.'%')
                            -> orWhere('email','like','%'.$request->search.'%');
                            
            });
        })->latest()->paginate(5);
        

        return view('adminDashboard.admin.index', compact('admins'));
    }
    
    /** create: create new admin,  */ 
    public function create()
    {
        return view('adminDashboard.admin.create');
    }
    
    /** store: validate , permition , store new admin in db,  */ 
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:admins',
            'phone' => 'required | min:10 | max:13',
            'photo' => 'image',
            'password' => 'required | min:6 | confirmed',
            'permissions' => 'required | min:1',


        ]);

        // password encryption
        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'photo']);
        $request_data['password'] = bcrypt($request->password);
        
        // manage image uploading
        if ($request->photo) {
            $img = Image::make($request->photo)
                ->fit(300,300)->Save(public_path('uploads/admin_images/'.$request->photo->hashName()));
            $request_data['photo'] = $request->photo->hashName();
        }


        // store admin data into database
        $admin = Admin::create($request_data);
      
        //add permissions
        $admin->attachRole('admin');
        $admin->syncPermissions($request->permissions);

        //session alert success
        session()->flash('success',__('site.added-successfuly'));

        return redirect()->route('admin.index');
    }//end of store()

    public function edit(Admin $admin)
    {
        return view('adminDashboard.admin.edit',compact('admin'));
    }// end of edit

    public function update(Request $request, Admin $admin)
    {
        // ther is no data in the request :()

        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('admins')->ignore($admin->id),
            ],
            'phone' => 'required | min:10 | max:13',
            'photo' => 'image',
            'permissions' => 'required | min:1',

        ]);

        $request_data = $request->except(['permissions', 'photo']);


        // manage image uploading
        if ($request->photo) {
            if($admin->photo != 'default.jpg' ){
                Storage::disk('public_uploads')->delete('admin_images/'.$admin->photo);
            }
            Image::make($request->photo)
                ->fit(300,300)->Save(public_path('uploads/admin_images/'.$request->photo->hashName()));
            $request_data['photo'] = $request->photo->hashName();
        }

        // store data in the DB
        $admin->update($request_data);

        // add permissions to and admin
        $admin->syncPermissions($request->permissions);

        session()->flash('success',__('site.updated-successfuly'));

        return redirect()->route('admin.index');
    }// end of update

    public function destroy(Admin $admin)
    {
        if($admin->photo != 'default.jpg' ){
            Storage::disk('public_uploads')->delete('admin_images/'.$admin->photo);
        }
        $admin->delete();
        session()->flash('success',__('site.deleted-successfuly'));
        return redirect()->back('admin.index');

    }
}
