<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['appartamento', 'villa monofamiliare','casa a sbarre', 'casa a schiera', 'attico', 'chalet', 'bungalow', 'storica', 'loft'];
        foreach($types as $type){
            $name = new Type();
            $name->type = $type;
            $name->save();
        }
    }
}
