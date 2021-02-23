<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(WrapsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(SuppliesTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
    }
}
