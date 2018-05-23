<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DatabaseTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        $user = factory('App\User')->create(['name'=> 'kenia']);

        $this->assertDatabaseHas('users', [
            'name'=> 'kenia'
        ]);
    }
}
