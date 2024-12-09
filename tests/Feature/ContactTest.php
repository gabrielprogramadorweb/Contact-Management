<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contact;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_contact()
    {
        $data = [
            'name' => 'John Doe',
            'contact' => '123456789',
            'email' => 'johndoe@example.com',
        ];

        $response = $this->post('/contacts', $data);

        $response->assertRedirect('/contacts');
        $this->assertDatabaseHas('contacts', $data);
    }

    public function test_view_contacts_list()
    {
        Contact::factory(5)->create();

        $response = $this->get('/contacts');

        $response->assertOk();
        $response->assertViewHas('contacts');
    }

    public function test_update_contact()
    {
        $contact = Contact::factory()->create();

        $data = [
            'name' => 'Jane Doe',
            'contact' => '987654321',
            'email' => 'janedoe@example.com',
        ];

        $response = $this->put("/contacts/{$contact->id}", $data);

        $response->assertRedirect('/contacts');
        $this->assertDatabaseHas('contacts', $data);
    }

    public function test_delete_contact()
    {
        $contact = Contact::factory()->create();

        $response = $this->delete("/contacts/{$contact->id}");

        $response->assertRedirect('/contacts');
        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
    }
}
