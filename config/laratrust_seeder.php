<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'purchases' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'vendors' => 'c,r,u,d',
            'suppliers' => 'c,r,u,d',
            'supplies' => 'c,r,u,d',
            'wraps' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
        ],

        'dashboard' => [
            'purchases' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'suppliers' => 'c,r,u,d',
            'supplies' => 'c,r,u,d',
            'wraps' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
        ],

        'master_vendor' =>[
            'admins' => 'c,r,u,d',
        ],

        'vendor' => [
            'groups' => 'r',
            'categories' => 'r',
            'wraps' => 'r',
            'vendors' => 'r,u',
            'admins' => 'r,u',
            'suppliers' => 'c,r,u,d',
            'supplies' => 'c,r,u,d',
            'purchases' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
        ],

        'shop' => [
            'wraps' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'products' => 'r,u',
            'pages' => 'c,r,u,d',
        ],

        'client' => [
            'categories' => 'r',
            'wraps' => 'r',
            'vendors' => 'r',
            'clients' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
        ],

        'factory' => [
            'purchases' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'suppliers' => 'c,r,u,d',
            'supplies' => 'c,r,u,d',
            'production' => 'c,r,u,d',
            'products' => 'c,r,u,d',
        ],
  
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
