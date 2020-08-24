# ZobaToys-E-Commerce:
    E-commerce web application with mutli-languages and Admin Control pannel with POS system made with php/laravel by me [Zainab Eid]. the site is specialized in providing fun educational toys and services in different categuaries and for different ages with admin control pannel and POS system made with php/laravel by me [Zainab Eid]

## Site Features:
    - Multi lang
    - search, browse, buy products
    - 

## Admin panel Features: 
    - manage sales, profits, products
    - manage employees, employees permitions

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
- inventory // toys-in-stock-details, // has many prooduct
    - Products: // toys 
        -->> - photos // toys-photos, 
        -->> - categories, Categories_products //M2M
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