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
            ['sponsor_type' => 'giornaliero', 'sponsor_time' => '1'],
            ['sponsor_type' => 'settimanale', 'sponsor_time' => '7'],
            ['sponsor_type' => 'mensile', 'sponsor_time' => '30'],
        ];

        foreach ($sponsors as $sponsorData) {
            $sponsor = new Sponsor();
            $sponsor->sponsor_type = $sponsorData['sponsor_type'];
            $sponsor->sponsor_time = $sponsorData['sponsor_time'];
            $sponsor->save();
        }
       }

    }

