<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\WrapRequest;
use App\Models\Wrap;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WrapController extends Controller
{ public function index(Request $request)
    {
        $wraps = Wrap::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%'.$request->search.'%');
            
        })->latest()->paginate(5);

        return view('adminDashboard.wraps.index', compact('wraps'));
    }

    public function create()
    {
        $wraps = Wrap::all(); 
        return view('adminDashboard.wraps.create', compact('wraps'));
    } //end of ceate

    //Store ()
    public function store(WrapRequest $request)
    { 
        $requested_data = $request->except(['_token']);
        Wrap::create($requested_data);

        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.wraps.index');

    }//end of store



    public function edit(Wrap $wrap)
    {
        $wraps = Wrap::all(); 
        return view('adminDashboard.wraps.edit', compact('wrap','wraps'));
    }

    public function update(WrapRequest $request, Wrap $wrap)
    {
        $wrap->update($request->except(['_token','_method']));
        session()->flash('success', __('site.updated-successfuly'));
        return redirect()->route('adminDashboard.wraps.index');
    }


    public function destroy(Wrap $wrap)
    {

        if ($wrap->categories && $wrap->categories->count() == 0) {
            $wrap->delete();
            session()->flash('success', __('site.deleted-successfuly'));
            return redirect()->route('adminDashboard.wraps.index');
        }
        session()->flash('error', __('site.can\'t be deleted ther are categories'));
        return redirect()->route('adminDashboard.wraps.index');
       
    }

}
