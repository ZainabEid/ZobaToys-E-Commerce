<?php

// get the language flage helper

use Illuminate\Support\Facades\Auth;

if (!function_exists('get_flag')) {
    function get_flag($language)
    {
        $flag = '';
        switch ($language) {
            case 'en':
                return $flag = 'us';
                break;
            case 'tr':
                return $flag = 'tr';
                break;
            default:
                $flag = 'eg';
        }
        return $flag;
    } //end of get_flag helper
} // end of check exist

// Remove nulled values of translatable fields helper
if (!function_exists('remove_translatable_nulls')) {
    function remove_translatable_nulls($request)
    {
        $requested_translations = [];

        foreach (config('translatable.locales') as $locale) {
            $requested_translations += [$locale  => array_filter($request[$locale])];
        }
        return  $requested_translations;
    } //end of remove_translatable_nulls helper
} // end of check exist

// get the language app_locale_lang helper
if (!function_exists('app_locale_language')) {
    function app_locale_language()
    {
        return app()->getLocale();
    } //end of app_locale_language helper
} // end of check exist

// get the language default_language helper
if (!function_exists('default_language')) {
    function default_language()
    {
        return config('translatable.locale');
    } //end of default_language helper
} // end of check exist

// save imagae helper
if (!function_exists('save_image')) {
    function save_image($folder, $image)
    {
        // dd($image->getClientOriginalName());


        $img = Intervention\Image\Facades\Image::make($image)
            ->fit(300, 300)
            ->save(base_path('assets/uploads/' . $folder . '/' . $image->hashName()));

        return $img;
    } //end of save_image helper
} // end of check exist


