<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                    ->assertSee('Lembrar-me')
                    ->assertPathIs('/login');
        });
    }

    public function testLogin()
    {
        $user = factory('App\User')->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
            ->type('email', $user->email)
            ->type('password', 'secret')
            ->press('Login')
            ->assertPathIs('/home');
        });
    }
}
