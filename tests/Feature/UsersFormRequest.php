<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class UsersFormRequest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_FormRequest()
    { // teste sobre formrequest

        /** @var UsersFormRequest */

            $repository = $this->app->make(UsersFormRequest::class);
                $request = new Request();
                $request->nome = 'david orion';
                $request->email = "david@orm.com";
                $request->password = "12245345";
                $request->senha2 = "12245345";

                // Act
                $repository->User::create($request);

               // Assert
               $this->assertDatabaseHas('name', ['nome' => 'david orion']);
               $this->assertDatabaseHas('email', ['email' => 'david@orm.com']);
               $this->assertDatabaseHas('password', ['password' => '12245345']);
               $this->assertDatabaseHas('senha2', ['senha2' => '12245345']);

    }
}
