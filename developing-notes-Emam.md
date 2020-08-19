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
       - @mapAdminRoutes(){//copy past the prev setting for web and chang the middleware and path}

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
        - php artisan make:controller admin\AdminController
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
    - ***middleware setting:***
        -*** RedirectifAuthenticated:*** // check guard is home or admin
           ` return ($guard=='admin') ?  redirect(RouteServiceProvider::ADMIN) :  redirect(RouteServiceProvider::HOME) ;`
        - ***RouteServiceProvider:*** // Set The path to the "admin" route for your application.
           ` public const ADMIN = '/admin';`
        - ***Authenticate:*** 
            redirectTo(){
            `return (Request::is('admin/*')) ? route('admin.login') :  route('login');`
    - **Register the master admin throw  tinker:**
        - php artisan tinker:
        `---`
         $admin = new() App\Models\Admin()
         $admin->name = "Zainab Eid"
         $admin->email = "zainabeid2012@gmail.com
         $admin->password = bcrypt("qwertyuiop")
         $admin->phone = 114033369
         $admin->save()
         `---`

9. 
         


        


        
        

        
 

    
