<?php

namespace App\Http\Controllers\AdminDashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {

        $this->middleware(['permission:create_admins'])->only('create');
        $this->middleware(['permission:read_admins'])->only('index');
        $this->middleware(['permission:update_admins'])->only('edit');
        $this->middleware(['permission:delete_admins'])->only('distroy');
        
    }
    
    public function index(Request $request)
    {
        $admins = Admin::whereRoleIS('admin')->when($request->search,function($query) use ($request){

                return  $query->where('name','like','%'.$request->search.'%');
            })->latest()->paginate(5);


        return view('adminDashboard.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('adminDashboard.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | min:10 | max:13',
            'photo' => '',
            'password' => 'required | min:6 | confirmed',
            
        ]);

        $request_data = $request->except(['password'], 'password_confirmation', 'permissions');
        $request_data['password'] = bcrypt($request->password);

        $admin = Admin::create($request_data);
        $admin->attachRole('admin');
        $admin->syncPermissions($request->permissions);

        session()->flash('success',__('site.added-successfuly'));
        
        return redirect()->route('admin.index');
    }

    public function edit(Admin $admin)
    {
        return view('adminDashboard.admin.edit',compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        // ther is no data in the request :()
        
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | min:10 | max:13',
            'photo' => '',
            
        ]);
        
        $request_data = $request->except(['permissions']);
        $admin->update($request_data);
        $admin->syncPermissions($request->permissions);

        session()->flash('success',__('site.updated-successfuly'));
       
        return redirect()->route('admin.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success',__('site.deleted-successfuly'));
        return redirect()->route('admin.index');
        
    }
}
