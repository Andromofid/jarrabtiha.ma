<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);

        try {
            Mail::to("jarrabtihama@gmail.com")
                ->send(new ContactMessageMail(
                    name: $validated['name'],
                    email: $validated['email'],
                    contactSubject: $validated['subject'],
                    contactMessage: $validated['message'],
                ));
        } catch (Throwable $exception) {
            Log::error('Contact form email failed to send.', [
                'exception' => $exception,
            ]);
            dd($exception);

            return back()
                ->withInput()
                ->with('contact_error', 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer dans quelques instants.');
        }

        return back()->with('success', 'Votre message a bien été envoyé. Merci de nous avoir contactés 💗');
    }
}
