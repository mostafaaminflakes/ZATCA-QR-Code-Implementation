<p align="center"><br><img src="./public/images/qr_scan_me.png" width="150"></p>

A Laravel application to generate QR Codes required for e-invoicing standard by [ZATCA](https://zatca.gov.sa/en/E-Invoicing/Pages/default.aspx) in Saudi Arabia.
You can use it as a ready-made code template for your projects to support ZATCA QR codes.

This application is built using the following libraries:

-   [Salla ZATCA](https://github.com/SallaApp/ZATCA) implementation.
-   [Chillerlan](https://github.com/chillerlan/php-qrcode) QR Code library
-   Barryvdh [DOMPDF Wrapper](https://github.com/barryvdh/laravel-dompdf) for Laravel.

## Features

-   Download QR code image directly.
-   Save QR code image to server.
-   Generate PDF with QR code image.
-   Add an image in the center of the QR code image.

## Usage

To get started, this is all you need to do:

```bash
$ git clone https://github.com/mostafaaminflakes/ZATCA-QR-Code-Implementation.git
$ cd ZATCA-QR-Code-Implementation
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan serve
```

## Reading the QR Code information

You can read the QR Code information using [E-Invoice QR Reader KSA](https://play.google.com/store/apps/details?id=com.posbankbh.einvoiceqrreader). It's designed to display the QR Code contents of any E-Invoice that is compliant with the Zakat and Tax Authority in Saudi Arabia.

## Contributions

For bug reports or feature requests, please share them with us [here](https://github.com/mostafaaminflakes/ZATCA-QR-Code-Implementation/issues).
