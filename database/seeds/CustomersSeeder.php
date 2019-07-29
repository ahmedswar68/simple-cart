<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => 'Ahmed',
            'last_name' => 'Swar',
            'email' => 'ahmedswar68@gmail.com',
            'store_credit' => 10000.00
        ]);
    }
}
