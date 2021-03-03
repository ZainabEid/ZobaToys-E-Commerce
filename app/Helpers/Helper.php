<?php

// save imagae helper
if (! function_exists('save_image')) {
    function save_image($folder, $image)
    {
       // dd($image->getClientOriginalName());

       
        $img = Intervention\Image\Facades\Image::make($image)
                ->fit(300,300)
                ->save(base_path('assets/uploads/'.$folder.'/'.$image->hashName()));

        return $img;

    }//end of save_image helper
}// end of save_image chek exist



