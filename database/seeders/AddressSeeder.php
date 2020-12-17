<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'zip' => '110',
            'city' => '台北市',
            'area' => '信義區',
            'road' => '松仁路',
            'no' => '58',
            'floor' => '14',
            'full_address' => '台北市信義區松仁路58號14樓'
        ]);
        Address::create([
            'zip' => '106',
            'city' => '台北市',
            'area' => '大安區',
            'road' => '仁愛路四段',
            'no' => '29-2',
            'full_address' => "台北市大安區仁愛路四段29-2號"
        ]);
        Address::create([
            'zip' => '106',
            'city' => '台北市',
            'area' => '大安區',
            'road' => '仁愛路四段',
            'no' => '99',
            'floor' => '1',
            'full_address' => '台北市大安區仁愛路四段99號1樓'
        ]);
    }
}
