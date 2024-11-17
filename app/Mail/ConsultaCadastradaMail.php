<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Consulta;

class ConsultaCadastradaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $consulta;
    public $profissional;
    /**
     * Create a new message instance.
     */
    public function __construct(Consulta $consulta){
        $this->consulta = $consulta;
        $this->profissional = $consulta->profissionalConsulta->profissional; // Pega o profissional associado a consulta
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Consulta confirmada!',
        );
    }

    public function build(){
        return $this->subject('Sua consulta foi cadastrada com sucesso!')
                    ->view('emails.consulta_cadastrada');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
