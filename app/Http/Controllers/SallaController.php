<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;
use chillerlan\QRCode\QRCode;
use App\Classes\LogoOptions;
use App\Classes\QRImageWithLogo;

class SallaController extends Controller
{
    public function to_base64_string(array $qr_data)
    {
        $generatedString = GenerateQrCode::fromArray($this->process($qr_data))->toBase64();

        return $generatedString;

        // > Output
        // AQVTYWxsYQIKMTIzNDU2Nzg5MQMUMjAyMS0wNy0xMlQxNDoyNTowOVoEBjEwMC4wMAUFMTUuMDA=
    }

    public function render(array $qr_data)
    {
        // data:image/png;base64, .........
        $displayQRCodeAsBase64 = GenerateQrCode::fromArray($this->process($qr_data))->render();

        return $displayQRCodeAsBase64;

        // now you can inject the output to src of html img tag :)
        // <img src="$displayQRCodeAsBase64" alt="QR Code" />
    }

    public function render_with_logo(array $qr_data, string $logo)
    {
        // Prepare ZATCA encrypted string
        $QRCodeDataAsBase64 = $this->to_base64_string($qr_data);

        $options = new LogoOptions;
        $options->version          = QRCode::VERSION_AUTO; // 10
        $options->eccLevel         = QRCode::ECC_H; //0b10;
        $options->imageBase64      = true;
        $options->logoSpaceWidth   = 20;
        $options->logoSpaceHeight  = 20;
        $options->scale            = 5;
        $options->imageTransparent = true;

        //header('Content-type: image/png');

        $qrOutputInterface = new QRImageWithLogo($options, (new QRCode($options))->getMatrix($QRCodeDataAsBase64));

        // dump the output, with an additional logo
        return $qrOutputInterface->dump(null, $logo);
    }

    public function process(array $qr_data)
    {
        return [
            new Seller($qr_data['seller_name']), // seller name
            new TaxNumber($qr_data['vat_number']), // seller tax number
            new InvoiceDate($qr_data['invoice_date']), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
            new InvoiceTotalAmount($qr_data['total_amount']), // invoice total amount
            new InvoiceTaxAmount($qr_data['vat_amount']) // invoice tax amount
            // TODO :: Support others tags
        ];
    }
}
