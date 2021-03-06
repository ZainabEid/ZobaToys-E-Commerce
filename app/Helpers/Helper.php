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

// get the language flage helper
if (! function_exists('get_flag')) {
    function get_flag($language)
    {
        $flag ='';
        switch($language){
            case 'en':
                return $flag='us';
                break;
            case 'tr':
                return $flag='tr';
                break;
            default:
            $flag = 'eg';
        }
        return $flag;

    }//end of get_flag helper
}// end of get_flag chek exist





