<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%'.$request->search.'%');
            
        })->latest()->paginate(5);

        return view('adminDashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('adminDashboard.categories.create');
    } //end of ceate

    //Store ()
    public function store(Request $request)
    { 
        $rules = [];

        foreach(config('translatable.locales') as $locale){
            $rules += [$locale.'.name' => ['required', Rule::unique('category_translations','name')] ]; 
        }

        $request->validate($rules);

        $requested_data = $request->except(['_token']);
        Category::create($requested_data);

        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.categories.index');

    }//end of store



    public function edit(Category $category)
    {
        return view('adminDashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [];

        foreach(config('translatable.locales') as $locale){
            $rules += [$locale.'.name' => ['required', Rule::unique('category_translations','name')->ignore($category->id,'category_id')] ]; 
        }

        $request->validate($rules);

        $category->update($request->except(['_token','_method']));
        session()->flash('success', __('site.updated-successfuly'));
        return redirect()->route('adminDashboard.categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.categories.index');
    }
}
