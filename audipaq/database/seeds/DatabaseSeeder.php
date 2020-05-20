<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
            $this-> call (prioridad::class);
        	$this-> call (tipousuario::class);
        	$this-> call (estatus::class);
            $this-> call (empresa::class);
            $this-> call (persona::class);
        	
    
    }
}
