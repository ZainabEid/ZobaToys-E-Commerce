<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\CategoryRequest;
use App\Models\Category;
use App\Models\Wrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
        $wraps = Wrap::all(); 
        return view('adminDashboard.categories.create', compact('wraps'));
    } //end of ceate

    //Store ()
    public function store(CategoryRequest $request)
    { 
        $requested_data = $request->except(['_token']);
        Category::create($requested_data);

        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.categories.index');

    }//end of store



    public function edit(Category $category)
    {

       
        $wraps = Wrap::all(); 
        return view('adminDashboard.categories.edit', compact('category','wraps'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->except(['_token','_method']));
        session()->flash('success', __('site.updated-successfuly'));
        return redirect()->route('adminDashboard.categories.index');
    }


    public function destroy(Category $category)
    {
        if ( $category->products && $category->products->count() == 0 ) {
            $category->delete();
            session()->flash('success', __('site.deleted-successfuly'));
            return redirect()->route('adminDashboard.categories.index');
        }
        session()->flash('error', __('site.can\'t be deleted ther are products'));
        return redirect()->route('adminDashboard.categories.index');
        
    }
}
