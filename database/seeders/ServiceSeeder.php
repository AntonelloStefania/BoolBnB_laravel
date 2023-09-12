<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['wi-fi', 'piscina','parcheggio privato', 'sauna', 'vista mare', 'portineria', 'servizio di trasporto', 'lavanderia', 'servizio in camera', 'sala lettura'];
        foreach($services as $service){
            $service_name = new Service();
            $service_name->service = $service;
            $service_name->save();
        }
    }
}
