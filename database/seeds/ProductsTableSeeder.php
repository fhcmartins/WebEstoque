<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $classificationsIDs = DB::table('classifications')
            ->select('id')
            ->get();
        
        $providersIDs = DB::table('providers')
            ->select('id')
            ->get();


        for ($i=1; $i <= 20 ; $i++) {

            DB::table('products')->insert([
                    'descricao' => $faker->text(100),
                    'qtd' => $faker->randomNumber(),
                    'prc_venda' => $faker->randomFloat(2, 100, 200),
                    'prc_compra' => $faker->randomFloat(2, 100, 200),

                    'providers_id' => $faker->randomElement($providersIDs)->id,
                    'classifications_id' => $faker->randomElement($classificationsIDs)->id,

                    'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
