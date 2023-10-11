<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $products = [
            [
                'name' => 'REDMI 12 (Silver, 128 GB / 4 GB RAM)',
                'price' => 8999,
                'image' => 'https://rukminim2.flixcart.com/image/312/312/xif0q/mobile/k/j/n/-original-imags37gyajqxkgp.jpeg',
                'description' => '4 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'REDMI 12 (Jade Black, 128 GB)  (4 GB RAM)',
                'price' => 9999,
                'image' => 'https://rukminim2.flixcart.com/image/416/416/xif0q/cases-covers/8/m/z/-original-imagtksk8jvgbtqv.jpeg',
                'description' => '4 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'SamsungGalaxy 12 (128 GB/4 GB RAM)',
                'price' => 11599,
                'image' => 'https://rukminim2.flixcart.com/image/416/416/xif0q/mobile/h/f/w/-original-imags37hy7uz2usv.jpeg',
                'description' => '4 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'REDMI 12 (Jade Black, 128 GB)  (4 GB RAM)',
                'price' => 8999,
                'image' => 'https://rukminim2.flixcart.com/image/416/416/xif0q/mobile/h/f/w/-original-imags37hy7uz2usv.jpeg',
                'description' => '4 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'REALME J1 (Jade White, 128 GB)  (8 GB RAM)',
                'price' => 10000,
                'image' => 'https://rukminim2.flixcart.com/image/312/312/xif0q/mobile/e/q/g/-original-imagtqqd4vcdzqdg.jpeg',
                'description' => '8 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'REDMI 10 (White, 128 GB)  (4 GB RAM)',
                'price' => 12000,
                'image' => 'https://rukminim2.flixcart.com/image/312/312/xif0q/mobile/0/x/v/-original-imagqadf2awzzmyf.jpeg',
                'description' => '4 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'REDMI 10 (Gray, 128 GB)  (4 GB RAM)',
                'price' => 9999,
                'image' => 'https://rukminim2.flixcart.com/image/312/312/xif0q/mobile/l/8/d/-original-imagqadpnygfnn2v.jpeg',
                'description' => '4 GB RAM | 128 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
            [
                'name' => 'REALME J2 (Jade Black, 64 GB)  (6 GB RAM)',
                'price' => 10999,
                'image' => 'https://rukminim2.flixcart.com/image/416/416/xif0q/mobile/h/f/w/-original-imags37hy7uz2usv.jpeg',
                'description' => '6 GB RAM | 64 GB ROM | Expandable Upto 1 TB
                17.25 cm (6.79 inch) Full HD+ Display
                50MP + 8MP + 2MP | 8MP Front Camera
                5000 mAh Battery
                Helio G88 Processor',
            ],
        ];

        DB::table('products')->insert($products);
    
    }
}
