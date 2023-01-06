<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function loginTest(){
        $this->get('/login')->assertStatus(200)->assertSee('login');
    }
    /** @test */
    public function loginAuth()
    {
        // $user = User::create([
        //     "name" => "Cristian",
        //     "email" => "prueba@gmail.com",
        //     "password" => bcrypt("administrador")
        // ]);

        $this->get('/login')->assertSee('login');
        //permite comprobar si la ruta existe y comprueba si hay una etiqueta login
        //enviamos la las crenciales que queremos comprobar
        $credentials = [
            "email" => "admin",
            "password" => "admin"
        ];
        //enviamos por el metodo post con las credenciales
        $response = $this->post('/login', $credentials);
        //si todo esta correcto nos va redirigir a la vista home
        $response->assertRedirect('dashboard');
        //comprueba que las credenciales existen
        $this->assertCredentials($credentials);
    }
    /** @test */
    public function loginAuthinvalid()
        //Comprobar a un usuario invalido
    {
        //enviamos cualquier credencial de prueba
        $credentials = [
            "email" => "users@mail.com",
            "password" => "secret"
        ];
        //comprueba que dichas credenciales no esta registrada
        //en la base de datos
        $this->assertInvalidCredentials($credentials);
    }
    /** @test */
    public function loginRequireUserAuth()
    {
        $credentials = [
            "email" => null,
            "password" => "passd123",
        ];

        $response = $this->from('/login')->post('/login', $credentials);
        $response->assertRedirect('/login')->assertSessionHasErrors([
            //    'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ]);
    }
    /** @test */
    public function loginRequirePasswordAuth()
    {
        $credentials = [
            "email" => "test@gmail.com",
            "password" => null
        ];

        $response = $this->from('/login')->post('/login', $credentials);
        $response->assertRedirect('/login')
            ->assertSessionHasErrors([]);
        }










}
