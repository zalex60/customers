<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionsSeeder extends Seeder
{

    public function run()
    {
        Region::create(['id_reg'=>1,'description'=>'I. Centro','status'=>'A']);
        Region::create(['id_reg'=>3,'description'=>'II. Centro Sur','status'=>'A']);
        Region::create(['id_reg'=>2,'description'=>'III. Suroeste','status'=>'A']);
        Region::create(['id_reg'=>4,'description'=>'III. Suroeste','status'=>'A']);
        Region::create(['id_reg'=>5,'description'=>'V. Noroeste','status'=>'A']);
        Region::create(['id_reg'=>6,'description'=>'VI. Norte','status'=>'A']);
        Region::create(['id_reg'=>7,'description'=>'VII. Sureste','status'=>'A']);
        Region::create(['id_reg'=>8,'description'=>'VIII. Sur','status'=>'A']);
    }
}
