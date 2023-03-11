<?php

namespace App\Mail;

// use App\Models\Permohonan;
// use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
// use Illuminate\Queue\SerializeModels;

class MailPermohonan extends Mailable
{
  // use Queueable, SerializeModels;

  public $view, $email_prop;

  public function __construct(string $view, array $email_prop)
  {
    $this->view = $view;
    $this->prop = $email_prop;
  }


  // Get the attachments for the message.
  public function attachments()
  {
    if (isset($this->prop['attach_file'])) {
      $no_resi = $this->prop['no_resi'];
      return [
      Attachment::fromPath("berita-acara/$no_resi/berita-acara.pdf")
        ->as('berita-acara.pdf')
        ->withMime('application/pdf'),
      ];
    }
  }


  // Get the message content definition.
  public function content(): Content
  {
    return new Content(
      view: "email.permohonan-{$this->view}",
      with: $this->prop,
    );
  }
}
