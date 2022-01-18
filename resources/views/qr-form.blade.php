<!DOCTYPE html>
<html>

<head>
    <title>QR Code Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="data:image/x-icon;base64,AAABAAEAEBACAAAAAACwAAAAFgAAACgAAAAQAAAAIAAAAAEAAQAAAAAAQAAAAAAAAAAAAAAAAgAAAAAAAAAAAAAA////AAKnAAB6MgAASlIAAEtCAAB7AAAAAnkAAP/YAACDBQAAUGMAAPy/AAACQAAAel4AAEpSAABK0gAAel4AAAJAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <img class="p-2" src="/images/qr_scan_me.png" alt="QR Code Image" style="width: 200px;">
                <p class="fw-light fs-2"><small>Create QR Code according to <a href="https://zatca.gov.sa/en/E-Invoicing/Pages/default.aspx" target="_blank">ZATCA E-Invoicing</a> Regulations</small></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 order-md-2 text-center my-4">
                        {!! null !== session('file_url') ? session('file_url') : 'Please fill out the form and click the button below to generate the QR Code.' !!}
                    </div>
                    <div class="col-md-9 order-md-1">
                        <form method="post" action="{{route('generate-qr-image')}}">
                            @csrf
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label" for="seller_name">Seller Name</label>
                                <input class="form-control form-control-lg" type="text" id="seller_name" name="seller_name" value="{{ old('seller_name') }}">
                                <p class="form-text">Example: My Company</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="vat_number">VAT Number</label>
                                <input class="form-control form-control-lg" type="text" id="vat_number" name="vat_number" value="{{ old('vat_number') }}">
                                <p class="form-text"><small>Example: 310000000000000</small></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="invoice_date">Date and Time</label>
                                <input class="form-control form-control-lg" type="datetime" id="invoice_date" name="invoice_date" value="{{ old('invoice_date') }}">
                                <p class="form-text"><small>Example: 2022-12-15 14:41:15</small></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="total_amount">Total Amount (with VAT)</label>
                                <input class="form-control form-control-lg" type="text" id="total_amount" name="total_amount" value="{{ old('total_amount') }}">
                                <p class="form-text"><small>Example: 2000.00</small></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="vat_amount">VAT Amount</label>
                                <input class="form-control form-control-lg" type="text" id="vat_amount" name="vat_amount" value="{{ old('vat_amount') }}">
                                <p class="form-text"><small>Example: 300.00</small></p>
                            </div>
                            <h5 class="card-title mb-3 mt-4">Options</h5>
                            <div class="ms-4 mb-3">
                                <div class="mb-3">
                                    <input class="form-check-input" type="checkbox" id="qr_logo" name="qr_logo" {{ old('qr_logo') == 'on' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="qr_logo">Add an image in the center of the QR Code</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qr_options" id="option1" value="download" checked>
                                    <label class="form-check-label" for="option1">
                                        Download QR Code image
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qr_options" id="option2" value="store">
                                    <label class="form-check-label" for="option2">
                                        Save QR Code image to server
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qr_options" id="option3" value="pdf">
                                    <label class="form-check-label" for="option3">
                                        Generate PDF with QR Code image
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create QR Code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>