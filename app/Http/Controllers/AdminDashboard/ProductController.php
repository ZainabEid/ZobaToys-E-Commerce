<?php

namespace App\Http\Controllers\adminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Wrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $request['in_sale'] = ($request->in_sale === 'true') ? true : false;

        $categories = Category::all();

        $products = Product::when($request->search, function($q) use ($request){

            return $q->whereTranslationLike('name','%'.$request->search.'%');

        })->when($request->category_id, function($qurey) use ($request){

            return $qurey->where('category_id',$request->category_id);

        })->when($request->in_sale, function($quer) use($request){
            return $quer->where('in_sale' , $request->in_sale);
        })->latest()->paginate(5);

        return view('adminDashboard.products.index', compact('categories','products'));
    }


    public function create()
    {
        $categories = Category::all();
        $wraps = Wrap::all();
        return view('adminDashboard.products.create', compact('wraps'));
    }


    public function handelingImages($images , $product)
    {
        /*
        steps to save default product images 
        1. $product_image = new Productimage();
        2. $product = Product::find(3);
        3. $product->productimage();
        4. $product->productimage()->save($product_image);
        */

        foreach($images as $image){

            // manage image uploading: fit, compress, hash, move to public/uploads
            $img = Image::make($image)
                ->fit(300,300)->Save(public_path('uploads/product_images/'.$image->hashName()));

            $product_image = new Productimage();
            $product_image->image = $image->hashName();
            $product->productimages()->save($product_image);
        }

         
    }//end of handling image function


    public function store(Request $request)
    {
        $request['category_ids'] = array_filter($request['category_ids']);

        ########## start validation rules ##########
        //   [nun localized fields]
        $rules = [
            'category_ids' => 'required|array|min:1',
            'images' => 'image',
            'perchase_price' => 'required',
            'price' => 'required',
            'in_sale' => '',
            'sale' => '',
            'stock' => 'required',
        ];

        //   [localized fields]
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name' => ['required', Rule::unique('product_translations', 'name')]];
            //$rules += [$locale.'.description' => 'required'];
        }
        ########## end validation rules ##########


        
        //submit validation and create a product
        $request->validate($rules);
        $requested_data = $request->except(['_token','images','category_ids','in_sale']);
        $requested_data['in_sale'] = ($request->in_sale === 'true') ? true : false; 
        $requested_data += [
            'vendor_id' => Auth::guard('admin')->user()->vendor->id,
        ];
        $product = Product::create($requested_data);
        $product->category()->attach($request['category_ids']);
        
        ########## if it is images add them to the product ##########
        if ($request->image) {

            $this->handelingImages($request->images , $product);
            
        }else{
            $product_image = new Productimage();
            $product->productimages()->save($product_image);
        }
        ########## end of image handling ##########
        
        
        

        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.products.index');
    } //end of store

    public function show(Product $product)
    {
        return view('adminDashboard.products.show', compact('product'));
    }// end of show

    public function edit(Product $product)
    {
        $categories = Category::all();  
        $wraps = Wrap::all();

        return view('adminDashboard.products.edit', compact('categories' , 'product','wraps'));
    }// end of edit

    public function update(Request $request, Product $product)
    {
        $request['category_ids'] = array_filter($request['category_ids']);
      
         ########## start validation rules ##########
        //   [nun localized fields]
        $rules = [
            'category_ids' => 'required|array|min:1',
            'images' => 'image',
            'perchase_price' => 'required',
            'price' => 'required',
            'in_sale' => '',
            'sale' => '',
            'stock' => 'required',
        ];

        //   [localized fields]
        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale.'.name' => ['required', Rule::unique('product_translations', 'name')->ignore($product->id,'product_id')]
            ];
            //$rules += [$locale.'.description' => 'required'];
        }
         ########## end validation rules ##########


        
        //submit validation and create a product
        $request->validate($rules);
        $requested_data = $request->except(['_token','_method','image','category_ids,in_sale']);
        
        $requested_data['in_sale'] = ($request->in_sale === 'true') ? true : false; 
       
        if ($request->image) {

            // remove the default image from database
            if( $product->productimages()->first()->image == 'default.png' ){
                $product->productimages()->first()->delete();
            }

             $this->handelingImages($request->image , $product);
        }
        
        
        $product->update($requested_data);
        $product->category()->detach();
        $product->category()->attach($request['category_ids']);
        session()->flash('success', __('site.edited-successfuly'));

        return redirect()->route('adminDashboard.products.index');
    }// end of update()

    public function destroy(Product $product)
    {
            /**
             * if the first image is not default
             * find all images name with this product id and delete them
             */
        if( $product->productimage()->first()->image != 'default.png' ){

            
            foreach ($product->productimage as $product_image) {
                Storage::disk('public_uploads')->delete('product_images/'.$product_image->image);
                //$product_image->delete();
            }
            
        }
        $product->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.products.index');

    }


    public function change_in_sale($in_sale,Product $product)
    {
        if ($in_sale == 'true') {
           // $this->show_change_sale($product);
        }
        $in_sale = ($in_sale === 'true') ? true : false;
            $product->update([
                'in_sale' => $in_sale,
            ]);
        return redirect()->back();   
    }//end of change in_sale

    //not used any more
    public function show_change_sale(Product $product)
    {
        dd('change the sale value');
        return view('adminDashboard.products._sale',compact('product'));
    }//end of show_change_sale
    
    public function change_sale(Request $request , Product $product)
    {
        $product->update([
            'sale' => $request->sale,
        ]);
        return redirect()->back();   

    }

}//end of controller
