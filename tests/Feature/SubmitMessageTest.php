<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\User;

class SubmitMessageTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCannotSeeForm()
    {
        $response = $this->get('/messages/new');

        $response->assertRedirect('/login');
    }

    public function testGuestCannotSubmitForm()
    {
        $response = $this->post('/messages', [
            'title' => 'Test Title',
            'body' => 'Test message boy.',
        ]);

        $this->assertDatabaseMissing('messages', [
            'title' => 'Test Title',
        ]);

        $response->assertRedirect('/login');
    }

    public function testUserCanSeeForm()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession([ 'user' => 'test' ])
            ->get('/messages/new');

        $response->assertStatus(200);
    }

    public function testUserCanSubmitNewMessage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession([ 'user' => 'test' ])
            ->post('/messages', [
                'title' => 'Test Title',
                'body' => 'Test message boy.',
            ]);

        $this->assertDatabaseHas('messages', [
            'title' => 'Test Title',
        ]);

        $response->assertHeader('Location', url('/'));
    }

    public function testMessageNotCreatedOnFailedValidation()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession([ 'user' => 'test' ])
            ->post('/messages');

        $response->assertSessionHasErrors([ 'title', 'body' ]);
    }
}
