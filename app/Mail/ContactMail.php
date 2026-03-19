<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @param UploadedFile[] $files */
    public function __construct(public array $data, public array $files = []) {}

    public function envelope(): Envelope
    {
        $tipuri = [
            'reclamatie' => 'Reclamație',
            'sesizare'   => 'Sesizare',
            'informatie' => 'Solicitare informații',
            'altele'     => 'Altele',
        ];

        $tip = $tipuri[$this->data['subiect']] ?? ucfirst($this->data['subiect']);

        return new Envelope(
            subject: "[AquaServ] {$tip} — {$this->data['nume']}",
            replyTo: [$this->data['email']],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact',
        );
    }

    public function attachments(): array
    {
        return array_map(
            fn (UploadedFile $file) => Attachment::fromData(
                fn () => file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            )->withMime($file->getMimeType()),
            $this->files
        );
    }
}
