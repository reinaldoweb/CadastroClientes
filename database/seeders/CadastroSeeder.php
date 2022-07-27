<?php

namespace Database\Seeders;

use App\Models\Cadastro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadastroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Cadastro::factory()->count(100)->create();
    }
}
