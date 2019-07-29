<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('items')->insert([
            'name' => 'Samsung Galaxy S9',
            'description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
            'price' => 698.88
        ]);

        DB::table('items')->insert([
            'name' => 'Apple iPhone X',
            'description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
            'price' => 983.00
        ]);

        DB::table('items')->insert([
            'name' => 'Google Pixel 2 XL',
            'description' => 'New condition
• No returns, but backed by eBay Money back guarantee',
            'price' => 675.00
        ]);

        DB::table('items')->insert([
            'name' => 'LG V10 H900',
            'description' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue. SAR EU 0.59 W/kg (head).',
            'price' => 159.99
        ]);

        DB::table('items')->insert([
            'name' => 'Huawei Elate',
            'description' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
            'price' => 68.00
        ]);

        DB::table('items')->insert([
            'name' => 'HTC One M10',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'price' => 129.99
        ]);
    }
}
