<?php

namespace App\Http\Controllers\adminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{

    public function index(Request $request)
    {

        $categories = Category::all();

        $products = Product::when($request->search, function($q) use ($request){

            return $q->whereTranslationLike('name','%'.$request->search.'%');

        })->when($request->category_id, function($qurey) use ($request){

            return $qurey->where('category_id',$request->category_id);

        })->latest()->paginate(5);

        return view('adminDashboard.products.index', compact('categories','products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('adminDashboard.products.create', compact('categories'));
    }


    public function handelingImages(Request $request)
    {
        if ($request->hasFile('image')) {
 
            foreach($request->file('image') as $file){
     
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
     
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
                //get file extension
                $extension = $file->getClientOriginalExtension();
     
                //filename to store [$filename.'_'.uniqid().'.'.$extension]
                $filenametostore = $filename.$extension; // ==    $filenamewithextension
     
                Storage::put('public/product_images/'. $filenametostore, fopen($file, 'r+'));
                Storage::put('public/images/thumbnail/'. $filenametostore, fopen($file, 'r+'));
     
                //Resize image here
                $thumbnailpath = public_path('storage/images/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
            }
        }
    }//end of handling image function


    public function store(Request $request)
    {
        
        ########## start validation rules ##########
        //   [nun localized fields]
        $rules = [
            'category_id' => 'required',
            'images' => 'image',
            'perchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        //   [localized fields]
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale.'.name' => ['required', Rule::unique('product_translations', 'name')]];
            //$rules += [$locale.'.description' => 'required'];
        }
        ########## end validation rules ##########

        /*
        steps to save default product images 
        1. $product_image = new Productimage();
        2. $product = Product::find(3);
        3. $product->productimage();
        4. $product->productimage()->save($product_image);
        */
        
        //submit validation and create a product
        $request->validate($rules);
        
        
        $requested_data = $request->except(['_token','image']);
        $product = Product::create($requested_data);

        
        ########## add images to the product if it is exist ##########
        if ($request->image) {
            foreach($request->file('image') as $image){
                //$path = $image->store('uploads/product_images');
               // dd($image);

                // manage image uploading: fit, compress, hash, move to public/uploads
                $img = Image::make($image)
                ->fit(300,300)->Save(public_path('uploads/product_images/'.$image->hashName()));
                $product_image = new Productimage();
                $product_image->image = $image->hashName();
                $product->productimage()->save($product_image);
            }
            
        }else{
            $product_image = new Productimage();
            $product->productimage()->save($product_image);
        }
        ########## end of image handling ##########
        
        
        

        session()->flash('success', __('site.added-successfuly'));

        return redirect()->route('adminDashboard.products.index');
    } //end of store

    public function show(Product $product)
    {
        //
    }// end of show

    public function edit(Product $product)
    {
        $categories = Category::all();  
        return view('adminDashboard.products.edit', compact('categories' , 'product'));
    }// end of edit

    public function update(Request $request, Product $product)
    {
        // dd($request->image[0]->getClientOriginalName());
        // start validation rules \\

        //   [nun localized fields]
        $rules = [
            'category_id' => 'required',
            'images' => 'image',
            'perchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        //   [localized fields]
        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale.'.name' => ['required', Rule::unique('product_translations', 'name')->ignore($product->id,'product_id')]
            ];
            //$rules += [$locale.'.description' => 'required'];
        }
        // end validation rules \\
        
        //submit validation and create a product
        $request->validate($rules);
        $requested_data = $request->except(['_token','_method','image']);
        
        // add images to the product id it is exist
        // images[] is an array
        // $product_images = [];
        if ($request->image) {
            if($product->photo != 'default.jpg' ){
                Storage::disk('public_uploads')->delete('uploads/product_images/'.$product->photo);
            }
            foreach($request->image as $image){
                $path = $image->store('uploads/product_images/');
                // manage image uploading: fit, compress, hash, move to public/uploads
                $img = Image::make($path)
                ->fit(300,300)->Save(public_path('uploads/product_images/'.$path->hashName()));
                $product->productimages()->image = $path->hashName();
                $product->push();
            }
            
        }else{
            // $product->productimages->create([]);
        }
        
        
        
        
        $product->update($requested_data);
        session()->flash('success', __('site.edited-successfuly'));

        return redirect()->route('adminDashboard.products.index');
    }// end of update()


    public function destroy(Product $product)
    {
        if($product->photo != 'default.jpg' ){
            Storage::disk('public_uploads')->delete('uploads/product_images/'.$product->photo);
        }
        $product->delete();
        session()->flash('success', __('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.products.index');

    }
}
