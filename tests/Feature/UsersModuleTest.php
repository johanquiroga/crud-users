<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_users_list()
    {
        factory(User::class)->create([
            'name' => 'Joel'
        ]);

        factory(User::class)->create([
            'name' => 'Ellie',
        ]);

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('Joel')
            ->assertSee('Ellie');
    }

    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

    /** @test */
    function it_displays_the_users_details_page()
    {
        $user = factory(User::class)->create([
            'name' => 'Johan Quiroga',
        ]);

        $this->get('/usuarios/'.$user->id)
            ->assertStatus(200)
            ->assertSee('Johan Quiroga');
    }

    /** @test */
    function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear nuevo usuario');
    }

    /** @test */
    function it_loads_the_edit_user_page()
    {
        $this->get('/usuarios/5/edit')
            ->assertStatus(200)
            ->assertSee('Editando el usuario: 5');

        $this->get('/usuarios/texto/edit')
            ->assertStatus(404);
    }

    /** @test */
    function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();
        $this->post('/usuarios', [
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '123456',
        ])->assertRedirect(route('users'));

        $this->assertCredentials([
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
            'password' => '123456',
        ]);
    }

    /** @test */
    function the_name_field_is_required()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => '',
                'email' => 'duilio@styde.net',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertDatabaseMissing('users', [
            'email' => 'duilio@styde.net'
        ]);
    }

    /** @test */
    function the_email_field_is_required()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Duilio',
                'email' => '',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Duilio'
        ]);
    }

    /** @test */
    function the_email_must_be_valid()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Duilio',
                'email' => 'correo-no-valido',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Duilio',
            'email' => 'correo-no-valido'
        ]);
    }

    /** @test */
    function the_email_must_be_unique()
    {
        factory(User::class)->create([
            'email' => 'duilio@styde.net'
        ]);

        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '123456',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Duilio',
            'email' => 'duilio@styde.net'
        ]);
    }

    /** @test */
    function the_password_field_is_required()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
        ]);
    }

    /** @test */
    function the_password_field_must_have_at_least_6_characters()
    {
        $this->from('usuarios/nuevo')
            ->post('/usuarios', [
                'name' => 'Duilio',
                'email' => 'duilio@styde.net',
                'password' => '123',
            ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Duilio',
            'email' => 'duilio@styde.net',
        ]);
    }
}
