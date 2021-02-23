<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    { 

        $rules = [];

        foreach(config('translatable.locales') as $locale){
            $rules += [
                $locale.'.name' => ['required', Rule::unique('wrap_translations','name')],
                $locale.'.description' => ['required', Rule::unique('wrap_translations','description')]
        ]; 
        }

        $request->validate($rules);

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

    public function update(Request $request, Wrap $wrap)
    {
        $rules = [];

        foreach(config('translatable.locales') as $locale){
            $rules += [
                $locale.'.name' => ['required', Rule::unique('wrap_translations','name')->ignore($wrap->id,'wrap_id')],
                $locale.'.description' => ['required', Rule::unique('wrap_translations','description')->ignore($wrap->id,'wrap_id')]
             ]; 
        }

        $request->validate($rules);

        $wrap->update($request->except(['_token','_method']));
        session()->flash('success', __('site.updated-successfuly'));
        return redirect()->route('adminDashboard.wraps.index');
    }


    public function destroy(Wrap $wrap)
    {
        $wrap->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.wraps.index');
    }

}
