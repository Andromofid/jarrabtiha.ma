<?php

namespace Tests\Feature;

use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_can_be_rendered(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('Contactez-nous');
    }

    public function test_valid_contact_submission_sends_email(): void
    {
        Mail::fake();
        config(['mail.admin_email' => 'jarrabtihama@gmail.com']);

        $payload = [
            'name' => 'Sara Test',
            'email' => 'sara@example.com',
            'subject' => 'Suggestion produit',
            'message' => 'Bonjour, je voudrais proposer un nouveau produit à tester.',
        ];

        $response = $this->from(route('contact'))->post(route('contact.send'), $payload);

        $response
            ->assertRedirect(route('contact'))
            ->assertSessionHas('success', 'Votre message a bien été envoyé. Merci de nous avoir contactés 💗');

        Mail::assertSent(ContactMessageMail::class, function (ContactMessageMail $mail) {
            $replyTo = $mail->envelope()->replyTo;

            return $mail->hasTo(config('mail.admin_email'))
                && $replyTo[0]->address === 'sara@example.com'
                && $replyTo[0]->name === 'Sara Test';
        });
    }

    public function test_contact_email_is_sent_to_configured_admin_email(): void
    {
        Mail::fake();
        config(['mail.admin_email' => 'admin@example.com']);

        $this->post(route('contact.send'), [
            'name' => 'Nadia',
            'email' => 'nadia@example.com',
            'subject' => 'Question',
            'message' => 'Bonjour, pouvez-vous me renseigner sur Jarrabtiha ?',
        ]);

        Mail::assertSent(ContactMessageMail::class, fn (ContactMessageMail $mail) => $mail->hasTo('admin@example.com'));
    }

    public function test_validation_rejects_empty_fields(): void
    {
        Mail::fake();

        $response = $this->from(route('contact'))->post(route('contact.send'), []);

        $response
            ->assertRedirect(route('contact'))
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        Mail::assertNothingSent();
    }

    public function test_validation_rejects_invalid_email(): void
    {
        Mail::fake();

        $response = $this->from(route('contact'))->post(route('contact.send'), [
            'name' => 'Sara Test',
            'email' => 'not-an-email',
            'subject' => 'Question',
            'message' => 'Bonjour, ceci est un message valide.',
        ]);

        $response->assertSessionHasErrors(['email']);
        Mail::assertNothingSent();
    }

    public function test_validation_rejects_message_shorter_than_minimum(): void
    {
        Mail::fake();

        $response = $this->from(route('contact'))->post(route('contact.send'), [
            'name' => 'Sara Test',
            'email' => 'sara@example.com',
            'subject' => 'Question',
            'message' => 'Court',
        ]);

        $response->assertSessionHasErrors(['message']);
        Mail::assertNothingSent();
    }

    public function test_authenticated_user_can_view_contact_page_with_prefilled_fields(): void
    {
        $user = User::factory()->create([
            'name' => 'Meryem Amrani',
            'email' => 'meryem@example.com',
        ]);

        $response = $this->actingAs($user)->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('value="Meryem Amrani"', false);
        $response->assertSee('value="meryem@example.com"', false);
    }
}
