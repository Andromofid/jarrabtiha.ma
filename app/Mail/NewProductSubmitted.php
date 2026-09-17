<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewProductSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Product $product,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau produit ajouté par un utilisateur',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin.new-product',
        );
    }
}
