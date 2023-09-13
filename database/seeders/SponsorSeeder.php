<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            ['name' => 'base', 'time' => '24','price'=>'2.99'],
            ['name' => 'avanzato', 'time' => '72','price'=>'5.99'],
            ['name' => 'pro', 'time' => '144','price'=>'9.99'],
        ];

        foreach ($sponsors as $sponsorData) {
            $sponsor = new Sponsor();
            $sponsor->name = $sponsorData['name'];
            $sponsor->time = $sponsorData['time'];
            $sponsor->price = $sponsorData['price'];
            $sponsor->save();
        }
       }

    }

