<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoConfirmadoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;

    public function __construct($pedido)
    {
        $this->pedido = $pedido;
    }

    public function build()
    {
        $pdf = Pdf::loadView('pdf.recibo', ['pedido' => $this->pedido]);

        return $this->subject('Recibo de tu pedido')
                    ->markdown('emails.pedido')
                    ->attachData($pdf->output(), 'recibo.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
