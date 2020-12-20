# ZobaToys-E-Commerce:
    E-commerce web application with mutli-languages and Admin Control pannel with POS system made with php/laravel by me [Zainab Eid]. the site is specialized in providing fun educational toys and services in different categuaries and for different ages with admin control pannel and POS system made with php/laravel by me [Zainab Eid]

_______________________________________________________________________________________________

## Bugs-To-Fix:
1. create category doesnt see traslatable trait and locales : __php artisan config:cache__
2. if un authenticated admindashboard request redirect to admindashboard/login not site/login: 
3.  >> delete product images ....................................... [X]
        . in products.edit.blade only one form works either delete or update
        . using javascript without form is not responding
4.  General error: 3780 Referencing column 'product_id' and referenced column 'id' in foreign key constraint  order_product_product_id_foreign' are incompatible.
    sol... 
    1. spelling check
    2. $table->bigInteger('product_id')->unsigned();
    3. in function down ():  
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('order_product');
        Schema::enableForeignKeyConstraints();
    4.  $table->id(); in the parent table && $table->bigInteger('product_id')->unsigned() in child table __works__
5. changing js is not working : __in browser: ctrl + shift + R__
_______________________________________________________________________________________________

## Site and  Admin panel Features: [16 DONE :)]
    - Multi lang ..........................................................  [Done]
    - Admin Guard Auth ....................................................  [Done]
    - Admin model, migrations, ............................................  [Done]
    - Admins rules and permissions ........................................  [Done]
    - laratrust:seeder(master_admin) ......................................  [Done]
    - admins/index & adminController@index and Delete:.....................  [Done]
        - show all admins
        - search admins by name or email
        - add, edit, delete buttons and function
        - manage delete function
    - admins/create, admins/edit & adminController@... : ..................  [Done]
        - create new admin form
        - managing admin photo in controller
        - show admin last data in edit page
        - update admin new data to db
    - categories table, model, controller, route, managing ................. [Done]
        - categories search ...............................................  [X]
    - translatable name and description for category ....................... [Done] 
    - products table, model, controller route, translatable ................ [Done]
        - search by name or by category .................................... [Done]
        - multi imagaes for one product insert and show in index ........... [Done] 
            >> edit, show .................................................. [Done]
            >> delete product images ....................................... [X]
            >> if admin has permission to crud product then give hime the same permission to images
        - edit and update products ......................................... [Done]
        - delete proucts ................................................... [Done]
    - client model ......................................................... [Done]
    - orders model ......................................................... [Done]
        - create order from cient index
        - add new order page
            - show all categories and product 
            - show the order card 
                - increase and decrese quentity
                - automatic count totals

    _____________________________________Git Push order model___________________________________


## Application Database Structure:

**Adminstration Tables: // for Admin Panel** [10 Tables]
- Admins :  // managers, employees, 
- salarys_payment: // [affects expenses]
- Supplier: // felt vendors, silicon buyers, 
    -->> suppliement: // role materials description , tools, 
    -->> suppliment_order: [affect expences]
- Productions_process_descryption: // production-steps-desc, needs, cost, spend-time // for one product
    -->> simple_production_execution: // production time, quantities, production process, 
    -->> complex_production_execution: // for many products/production process
- expenses: // from producion, suppplying, 
- incomes: // from order payment

**Users Tables: for site files**  [11 Tables]
- inventory // toys-in-stock-details, // has many prooduct [place of stock , role materials]
    - Products: // toys .......................................................... [Done]
        -->> - photos // toys-photos, ............................................ [Error]
        -->> - categories, //O2M ................................................. [Done]
- Services: // color partys, consultant // setting nextplane
- Users: // Cutomers, shops, groups, libraries
- Orders: //by cutomers or admins // user has many orders
    -->> order_products: // one order as many products
    -->> order_invoice: // one order one invoice // created after confirmed order
    -->> payment: // one invoice one payment // created after recieving money [affects incomes]
    -->> shipment: // one invoice one shipment // created after shipping order

... 
simple production:  // human body production
    - production process: how to produce , time need, felt need, cost need [master admin adds]
    - production execution: send the production process to execution, sent_at, real_cost, real_produced_quentity, simple or complex  [affect expences] [affects inventory]

complex production: // human body , puzzles, customized
    -complex poducion execution: production process_id , poducion execution_id
...