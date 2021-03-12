<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)

    {
        $groups = Group::when($request->search, function ($q) use ($request) {

            return $q->where('name','like', '%'.$request->search.'%')
            ->orWhere('description', 'like','%'.$request->search.'%' );
            
        })->latest()->paginate(5);

        return view('adminDashboard.groups.index', compact('groups'));
    }// end of index


    public function create()
    {
        return view('adminDashboard.groups.create');
    } //end of ceate

    public function store(GroupRequest $request)
    { 
     
        $requested_data = $request->except(['_token']);
        Group::create($requested_data);

        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.groups.index');

    }//end of store



    public function edit(Group $group)
    {
        return view('adminDashboard.groups.edit', compact('group'));
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->except(['_token','_method']));
        session()->flash('success', __('site.updated-successfuly'));
        return redirect()->route('adminDashboard.groups.index');
    }//end of update


    public function destroy(group $group)
    {
        if ($group->supplies && $group->supplies->count() == 0) {
            $group->delete();
            session()->flash('success', __('site.deleted-successfuly'));
            return redirect()->route('adminDashboard.groups.index');
        }
        session()->flash('error', __('site.can\'t be deleted ther are supplies'));
        return redirect()->route('adminDashboard.groups.index');

    }//end of destroy

}//end of groups controler
