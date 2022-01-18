<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateRequest;
use App\Http\Controllers\SallaController;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class QRController extends Controller
{
    private $logo;
    protected $temporary_image_file_name;
    protected $temporary_image_file_path;
    protected $temporary_pdf_file_name;
    protected $base64_image_string;
    protected $base64_image_string_without_header;

    public function __construct()
    {
        $this->logo = 'images/lion_head.png'; // https://www.silhouette.pics/83600/free-lion-head-tattoo-download.php
        $this->temporary_image_file_name = time() . '.png';
        $this->temporary_image_file_path = 'qr_images/' . $this->temporary_image_file_name;
        $this->temporary_pdf_file_name = time() . '.pdf';
    }

    public function index()
    {
        return view('qr-form');
    }

    public function generate(GenerateRequest $request, SallaController $salla)
    {
        $qr_data = $request->validated();
        $base64_image = "";

        if ($request->has('qr_logo')) {
            $this->base64_image_string = $salla->render_with_logo($qr_data, $this->logo);
        } else {
            $this->base64_image_string = $salla->render($qr_data);
        }

        switch ($request->qr_options) {
            case "download":
                return $this->download_image();
                break;
            case "store":
                return $this->store_image();
                break;
            case "pdf":
                return $this->pdf_file_with_image();
                break;
        }
    }

    public function download_image()
    {
        $base64_image_string_without_header = $this->decode_base64($this->base64_image_string);

        return response()->streamDownload(function () use ($base64_image_string_without_header) {
            echo $base64_image_string_without_header;
        }, $this->temporary_image_file_name);
    }

    public function store_image()
    {
        $base64_image_string_without_header = $this->decode_base64($this->base64_image_string);
        Storage::disk('uploads')->put($this->temporary_image_file_path, $base64_image_string_without_header);

        return redirect()->route('qr-form')->with('file_url', $this->image_html($this->temporary_image_file_path));
    }

    public function pdf_file_with_image()
    {
        $data = [
            'title' => 'Invoice number: IN-123456789',
            'date' => date('m/d/Y'),
            'qr_image' => $this->image_html($this->base64_image_string),
        ];

        // First method
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->download();

        // Second method
        $pdf = PDF::loadView('pdf-with-qr', $data);

        return $pdf->download($this->temporary_pdf_file_name);
    }

    public function decode_base64($base64_encoded_string)
    {
        $search = array('data:image/png;base64,', ' ');
        $replace = array('', '+');
        $string_without_base64_header = str_replace($search, $replace, $base64_encoded_string);
        $decoded_string = base64_decode($string_without_base64_header);

        return $decoded_string;
    }

    public function image_html($base64_file)
    {
        return '<img style="width: 200px;" src="' . $base64_file . '" alt="QR Code" />';
    }
}
