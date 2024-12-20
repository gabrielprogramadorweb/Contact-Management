<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\User;
class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_contact()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => 'Teste Contato',
            'contact' => '123456789',
            'email' => 'teste@email.com',
        ];

        $response = $this->post('/contacts', $data);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('contacts', $data);
    }

    public function test_view_contacts_list()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Contact::factory(5)->create();

        $response = $this->get('/');
        $response->assertOk();
        $response->assertViewHas('contacts');
    }

    public function test_update_contact()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::factory()->create();

        $data = [
            'name' => 'Jane Doe',
            'contact' => '987654321',
            'email' => 'janedoe@example.com',
        ];

        $response = $this->put("/contacts/{$contact->id}", $data);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('contacts', $data);
    }

    public function test_delete_contact()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $contact = Contact::factory()->create();

        $response = $this->delete("/contacts/{$contact->id}");

        $response->assertRedirect('/');
        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
    }

}
