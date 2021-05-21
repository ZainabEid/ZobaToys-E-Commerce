<?php

namespace App\Http\Controllers\AdminDashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\AdminRequest;
use App\Models\Admin;
use App\Role;
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
        //dd( auth_user()->vendor->name);

        // master_admin can see all admin data others can see only there
        $roles = auth_user()->hasRole('super_admin') ?  Role::where('name', 'NOT LIKE', 'super_admin')->pluck('name')->toArray() : auth_user()->roles()->first()->name;

        $admins = Admin::whereRoleIS($roles)->with('roles')

                    // when roles is vendor find admins where vendor_id is LIKE auth_user->vendor->id
                    ->when($roles == 'vendor', function ($qur) {

                        return $qur->with('vendor')->where('id', 'LIKE', auth_user()->vendor->id);
                        
                    //serch query
                    })->where(function ($q) use ($request) {

                        return $q->when($request->search, function ($query) use ($request) {

                            return  $query->where('name', 'like', '%' . $request->search . '%')
                                ->orWhere('email', 'like', '%' . $request->search . '%');
                        });
                    })->latest()->paginate(10);

        return view('adminDashboard.admin.index', compact('admins'));
    } // end of admin index


    public function show(Admin $admin)
    {
        return view('adminDashboard.admin.show', compact('admin'));
    } // end of show admin 



    /** create: create new admin,  */
    public function create()
    {
        $roles = ['shop-admin' => 'shop', 'vendor-admin' => 'vendor', 'zoba-toys-company-admin ' => 'factory'];
        $roles = auth_user()->hasRole('super_admin') ?  Role::where('name', 'NOT LIKE', 'super_admin')->pluck('name')->toArray() : auth_user()->roles()->first()->name;

        return view('adminDashboard.admin.create', compact('roles'));
    } // end of create new admin

    /** store: validate , permition , store new admin in db,  */
    public function store(AdminRequest $request)
    {
        try {
            $request_data = $request->except(['password', 'password_confirmation', 'role', 'photo']);

            // password encryption
            $request_data['password'] = bcrypt($request->password);

            // manage image uploading
            if ($request->photo) {
                save_image('admin_images', $request->photo);
                $request_data['photo'] = $request->photo->hashName();
            }

            // store admin data into database
            $admin = Admin::create($request_data);
            $admin->attachRole($request->role);

            // //add permissions (old one)
            // $admin->attachRole('admin');
            // $admin->syncPermissions($request->permissions);

            //session alert success
            session()->flash('success', __('site.added-successfuly'));

            return redirect()->route('adminDashboard.admin.index');
        } catch (\Exception $ex) {
            throw $ex;
            session()->flash('error', __('site.there-are-error'));
            return redirect()->back();
        }
    } //end of store()

    public function edit(Admin $admin)
    {
        return view('adminDashboard.admin.edit', compact('admin'));
    } // end of edit

    public function update(AdminRequest $request, Admin $admin)
    {
        $request_data = $request->except(['photo']);


        // manage image uploading
        if ($request->photo) {
            if ($admin->photo != 'default.jpg') {
                Storage::disk('assets_uploads')->delete('admin_images/' . $admin->photo);
            }
            save_image('admin_images', $request->photo);
            $request_data['photo'] = $request->photo->hashName();
        }

        // store data in the DB
        $admin->update($request_data);

        // add permissions to and admin
        //$admin->syncPermissions($request->permissions);

        session()->flash('success', __('site.updated-successfuly'));

        return redirect()->route('adminDashboard.admin.index');
    } // end of update

    public function destroy(Admin $admin)
    {
        if ($admin->photo != 'default.jpg') {
            Storage::disk('assets_uploads')->delete('admin_images/' . $admin->photo);
        }
        $admin->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->back('adminDashboard.admin.index');
    }
}
