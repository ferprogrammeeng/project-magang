<?php

namespace App\Mail;

// use App\Models\Permohonan;
// use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
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


  public function content()
  {
    return new Content(
      view: "email.permohonan-{$this->view}",
      with: $this->prop,
    );
  }
}
