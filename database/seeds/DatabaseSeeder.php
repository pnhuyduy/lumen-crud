<?php

use App\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Author::class, 50000)->create();
      // for ($i=0; $i < ; $i++) {
      //   factory(Author::class, 500)->create();
      // }
    }
}
