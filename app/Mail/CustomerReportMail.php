<?php

namespace App\Mail;

use App\Models\CustomerInspection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public CustomerInspection $customerInspection;

    public function __construct(CustomerInspection $customerInspection)
    {
        $this->customerInspection = $customerInspection;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Inspection Report - ' . $this->customerInspection->inspection_no,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'customers.inspection_report_mail.index',
            with: [
                'inspection' => $this->customerInspection,
                'companyName' => 'PIFFERS SECURITY SERVICES'
            ],
        );
    }

   public function attachments(): array
{
    $attachments = [];

    if ($this->customerInspection->inspection_attach) {

        $path = public_path($this->customerInspection->inspection_attach);

        if (file_exists($path)) {
            $attachments[] = Attachment::fromPath($path);
        }
    }

    $pdf = Pdf::loadView('customers.inspection_report_mail.index', [
        'inspection' => $this->customerInspection,
                'companyName' => 'PIFFERS SECURITY SERVICES'
    ]);

    $attachments[] = Attachment::fromData(
        fn () => $pdf->output(),
        'inspection-report-' . $this->customerInspection->inspection_no . '.pdf'
    )->withMime('application/pdf');

    return $attachments;
}
}