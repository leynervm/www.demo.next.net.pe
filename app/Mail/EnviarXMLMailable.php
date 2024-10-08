<?php

namespace App\Mail;

use Modules\Facturacion\Entities\Comprobante;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class EnviarXMLMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $comprobante;

    public function __construct(Comprobante $comprobante)
    {
        $this->comprobante = $comprobante;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address(Config::get('mail.mailers.smtp.username'), $this->comprobante->sucursal->empresa->name),
            subject: 'RESUMEN DE VENTA DEL COMPROBANTE ' . $this->comprobante->seriecompleta,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.enviar-xml',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {

        // $code_comprobante = $this->comprobante->seriecomprobante->typecomprobante->code;
        // $filename = $this->comprobante->seriecompleta;
        // $rutazip = 'xml/' . $code_comprobante . '/' . $this->comprobante->sucursal->empresa->document . '-' . $code_comprobante . '-' . $filename . '.zip';


        // return [
        //     Attachment::fromStorageDisk('local', $rutazip)
        //         ->as($filename . '.zip')
        //         ->withMime('application/zip'),
        // ];
    }
}
