<?php

use App\Rank;
use Illuminate\Database\Seeder;

class RanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::create(['name'=>'Banni']);
        Rank::create(['name'=>'Inscrit']);
        Rank::create(['name'=>'Membre']);
        Rank::create(['name'=>'Modo']);
        Rank::create(['name'=>'Admin']);
        Rank::create(['name'=>'super Admin']);
    }
}
