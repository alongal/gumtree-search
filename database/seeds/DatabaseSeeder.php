<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Filter;
use App\Search;
use App\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Search::truncate();
        Filter::truncate();
        User::truncate();
        Model::unguard();

        $this->call('SearchesSeeder');
        $this->call('FiltersSeeder');
        $this->call('UsersSeeder');
    }

}
