<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'=>'appartamento', 'icons'=>'https://a0.muscache.com/pictures/35919456-df89-4024-ad50-5fcb7a472df9.jpg'],
            ['name'=>'villa monofamiliare', 'icons'=>'https://a0.muscache.com/pictures/78ba8486-6ba6-4a43-a56d-f556189193da.jpg'],
            ['name'=>'stanze', 'icons'=>'https://a0.muscache.com/pictures/7630c83f-96a8-4232-9a10-0398661e2e6f.jpg'],
            ['name'=>'casa galleggiante', 'icons'=>'https://a0.muscache.com/pictures/c027ff1a-b89c-4331-ae04-f8dee1cdc287.jpg'],
            ['name'=>'camper', 'icons'=>'https://a0.muscache.com/pictures/31c1d523-cc46-45b3-957a-da76c30c85f9.jpg'],
            ['name'=> 'design', 'icons'=>'https://a0.muscache.com/pictures/50861fca-582c-4bcc-89d3-857fb7ca6528.jpg'],
            ['name'=>'bungalow', 'icons'=>'https://a0.muscache.com/pictures/732edad8-3ae0-49a8-a451-29a8010dcc0c.jpg'],
            ['name'=> 'tipiche', 'icons'=>'https://a0.muscache.com/pictures/33848f9e-8dd6-4777-b905-ed38342bacb9.jpg'],
            ['name'=> 'storiche', 'icons'=>'https://a0.muscache.com/pictures/33dd714a-7b4a-4654-aaf0-f58ea887a688.jpg']
        ];
        
        foreach($types as $type){
            $name = new Type();
            $name->name = $type['name'];
            $name->icons = $type['icons'];
            $name->slug = Str::slug($name->name);
            $name->save();
        }
    }
}
