# E-commerce website:
    Ahmed Emam youtube channel 

## E-commerce front-end:
[E-commerce front-end html theme](https://drive.google.com/file/d/1_rqDOwfbhboUE_Lm2EAPv0FeTXdQWkMZ/view)
[second vidoe](https://www.youtube.com/watch?v=j52j68tBCqQ&list=PLCm7ZeRfGSP6NeupdX_K9-Qm3ROqGud-t&index=2)

1. **creating laravel project:**
    - terminal: /www> 'laravel new ZobaToys-E-Commerce' // is not working
    - 'composer global require "laravel/installer"'
    - path= %path%,C:\Users\Zainab Eid\AppData\Roaming\Composer\vendor\bin
    - 'laravel new ZobaToys-E-Commerce' 
    - php artisan key:generate // make security for sessions and some issues
    
2. **Setting the default laravel authentication:** 
    - 'composer require laravel/ui'
    - 'php artisan ui vue --auth' 
    - npm install && npm run dev

3.  **to prevent routing to .env:**
    - move *.htaccess, index.php, robots.txt* to root
    - index.php: remove "../" from ../render, ../bootstrap
    - .htaccess : add the following code
        '''
        ### Disable Directory listing
            Options -Indexes
            # block files which needs to be hidden // in here specify .example extension of the file
            <Files ~ "\.(env|json|config.js|md|gitignore|gitattributes|lock)$">
                Order allow,deny
                Deny from all
            </Files>
            # in here specify full file name sperator '|'
            <Files ~ "(artisan)$">
                Order allow,deny
                Deny from all
            </Files>
        ''' 
4. **project structure:** 
    - dont need public folder
    - root: create assets folder instead
    - /views: create /admins, /front/includes folders
    - /views/layouts: create admin.blade, site.blade

5. implement front-end html in laravel blade view system
    - /layouts/site: past html front-end page
        - if there is any js,css move make assets
        - shif+alt+f to fix indentation
        - add @include('header') to each header and footer
        - add @yield('content') before content
    - move headers and footer to /front/includes file 
    - move content to /front/home: 
        - @extends('layout.site)
        - @section('content) add cutted html code here @endsection
    


# Admin Front-end
[Admin Pannel theme](https://drive.google.com/file/d/1HRKYrwx22vz7lea-9WTYKYhx_MpiT6K1/view)
[Third vidoe](https://www.youtube.com/watch?v=rKVzM5nsbXI&list=PLCm7ZeRfGSP6NeupdX_K9-Qm3ROqGud-t&index=3)

6. **implement admin front-end files in the program:**
    - put all downloaded files in the assets folder
    - /layout/admin.blade: past index.html
        - add asset('assets/') to all css and js internal files
        - add @include('') before header, sidebar, footer
        - add @yield('') before title and content
    - create and move header, footer, sidebar codes to its files under /admin/includes
    - create and move content to /admin/dashboard:
        - @extend('layouts.admin')
        - @section('title') Title @endsection, @section('content')

7. **Route Setting:**
    - create /routes/admin.php
        - route to view('/admin/dashboard')
    - in /app/Providers/RouteServiceProvider
       - @map(): add route name '$this->mapAdminRoutes()' 
       - @mapAdminRoutes(){//copy past the prev setting for web and chang the path}

# login admins
[forth video](https://www.youtube.com/watch?v=v6t5nYeJ-k0&list=PLCm7ZeRfGSP6NeupdX_K9-Qm3ROqGud-t&index=5)

8. Login admin to dashboard:
    - **Config auth:**  /app/config/auth.php:
        - ***authentication gard section :*** add guard to admins DB table
            'admin' => ['driver' => 'session',  // or api in other cases
                       'provider'   => 'admins'] // admin is the table name
        - *** providers section:*** add Admin Model
            'admins' => ['driver' => 'eloquent', 'model' => App\Models\Admin::class,], // set the model name
        - resetting passward: 
    - **Make admin Model,controller DB:**
        - php artisan make:model Models\Admin -m 
        - php artisan make:controller Admin\AdminController
        - Admin Model:
            - class extends Authenticatable , user the user as Authenticatable
            -  fillable: name, email, phone, photo, passward, created_at, updated_at
            - use Notifiable in the Admin class
        - in migrate file: set table's cols
    - **create Login View:**
        - /layout/login:
            - asste files: 
            - notify
        - /admin/auth/login from html file :
            - add @error to email and password, asste files, add scrf, and form action="{{route('admin.login')}}" 
    - **Manage Routes:**
        ```
         Route::group(['prefix'=> 'admin', 'namespace' => 'Admin', 'middleware' => 'guest:admin', ],function(){
             Route::get('login',logincontroller@getlogin);
             Route::post('login' , loginControtter@login)->name('admin.login);
         })
         ```

    - **LoginController:** 
        - getlogin()return view('admin.auth.login');
        - login(LoginRequest $request){
            - // validation and error messages is done in LoginRequest
            -   //check if login is correct redirect to dashboard if not redirect back to login with errors
            
            ```--```
            $remember_me = $request->has('remember_me') ? true : false;
            if(auth()->guard('admin')->attempt([ 'email' => $request->input('email') , 'password' => $request->input('password') ])){
            // notify()-Success('تما الدخول بنجاح');
                return redirect()->route('admin.dashboard');
            }
            //notify()->error('خطأ في البيانات برجاء المحاولة مجددا');
            return redirect()->back()->with(['error' => 'خطأ في البيانات'])->withInput($request->all());
            ```--```
    - **LoginRequest:**
        - php artisan make:request LoginRequest
        - LoginRequest: 
            - authorize() { `return true` } // to allow admins to login
                // laravel sets this to false by defult not to allow any one to login unless developer permits
            - rules() // validation `['email' => 'required|email', 'password' => 'required']`
            - messages() //error massages: `['email.required' ='please enter valid email' , 'password.valid' => 'please enter correct password']`
    - ***middleware setting:*** if admin is login and went to login
        - *** RedirectifAuthenticated:*** // check guard is home or admin
           ` return ($guard=='admin') ?  redirect(RouteServiceProvider::ADMIN) :  redirect(RouteServiceProvider::HOME) ;`
        - ***RouteServiceProvider:*** // Set The path to the "admin" route for your application.
           ` public const ADMIN = '/admin';`
        - ***Authenticate:*** 
            redirectTo(){
            `return (Request::is('admin/*')) ? route('admin.login') :  route('login');`
    - **Register the master admin throw  tinker:** we can use seeder instead
        - php artisan tinker:
        `---`
         $admin = new() App\Models\Admin()
         $admin->name = "Zainab Eid"
         $admin->email = "zainabeid2012@gmail.com
         $admin->password = bcrypt("qwertyuiop")
         $admin->phone = 114033369
         $admin->save()
         `---`
__note__ : very annoying error about multi routing [too many redirects] :
    - I used the steps in the multi route gide to revise my code
    - I transfered the auth routes to the main web route
    - I transfered the admin login blade too to the views/auth directory
    - I used middleware in controller with second attripute as laracast QA:
>>>>>
        You can not have auth:crm and guest:crm for the same route. That is why you get too many redirects. You can have either auth:crm or guest:crm on one route. And if that route is not API route then you should have also web middleware. You can have something like following:

        $this->middleware('guest:crm', ['only' => ['login']);
    

## HELPER FUNCTIONS:
1. make a new directory in root or app or anywhare calded helpers and create the new php file
2. write in side it function only function functionname(){return 'name';}
3. activate auto-load: // any function can be called publically 
    1. vendor/composer.json: inside "autoload" : {} make "files" : []array that include the helper files path
4. run >> composer dump-autoload


## MAKE:REQUEST for validations
1. php artisan make:request AdminRequest
2. turn the authorisation to true
3. in the rules (){return [ 'name' => 'required|string|max:100' , 'state' => 'in:0,1'] }: 
4. messages(){return ['name.required' => 'please enter your name', 'name.string' => 'name must be in letters only', 'name.max' =>'maximum letteris 100 letter', 'in': entered value is not correct];}
5. in controller store(AdminRequest $request)
6. 'name' => ['required', Rule::unique('tables','name')->ignore($this->table)] // in the Request instead of ['ignore($category->id,'category_id')']
 7. 

## TRY and Catch 
1. put try catch in database createing or updating 
2. reirect()->route()->with(['success'=>'entered_successfully']);
3. catch(/Exception $ex){ reirect()->route()->with(['error'=>'error_message ']);}

## error messages in alert


## locale_lang helper function:
1. return config::get(app.locale

## save_image helper function:
save_image($folder, $image){
    $image->store('/',$folder);
    $filename= $$image->hashName();
    $path = 'images/'.$folder.'/'.$filename;
    return $path;
}

## useful functions:
1. $value_with_no_index = array_value($collection)
2. ModelName::insertGetId(['name'=>'value'])
3. ModelNAme::insert($array_of_rows)
4. DB::BeginTransactions() , DB::commit, DB::rollback()
5.   

## observers:
1. php artisan make:observe ModelNameObserer --model=Models/ModelName
2. write the code in this class it will be called outomatically