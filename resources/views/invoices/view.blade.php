@php
use App\TransactionStatus;
$success = $transaction->status == TransactionStatus::SUCCESS;
$pending = $transaction->status == TransactionStatus::PENDING;
$failed = $transaction->status == TransactionStatus::FAILED;
@endphp
<div>
    <style>
        body {
            background: #ddd;
            padding: 40px;
        }

        textarea {
            width: 100% !important;
            border: 1px solid #ddd !important;
        }

        .container {
            min-height: 29.7cm;
            margin: auto;
        }

        .invoice {
            background: #fff;
            width: 100%;
            padding: 50px;
        }

        .logo {
            margin-bottom: 1rem;
            width: 4cm;
        }

        .signature {
            margin: 1rem 0;
            width: 4cm;
        }

        .document-type {
            text-align: right;
            color: #444;
        }

        .conditions {
            font-size: 0.7em;
            color: #666;
        }

        .bottom-page {
            font-size: 0.7em;
        }

        table {
            font-size: 12px !important;
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            padding: 0.45rem !important;
            border: 1px solid #ddd;
        }

        table th {
            background: #f9f9f9;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .text-right {
            text-align: right;
        }

        .flex-container {
            display: flex;
        }

        [data-editable="true"] {
            border: 1px dashed #ddd;
            padding: 5px;
        }

        .hide-elements {
            /* display: none; */
        }

        @media print {

            [data-editable="true"] {
                border: none !important
            }

            .invoice {
                display: block;
            }

            .hide-elements {
                display: none;
            }

            @page {
                size: auto;
                margin: 30px 0;
            }

            .container {
                width: 100% !important;
            }

            .invoice {
                font-size: 13px !important;
                color: black !important;
                padding: 0 !important;
            }

            .btn {
                display: none;
            }

            #logoForm,
            #signatureForm {
                display: none;
            }

            table td {
                padding: 0.45rem !important;
            }

            .table> :not(caption)>*>* {
                color: black !important;
                font-size: 10px !important;
            }

            body {
                margin: 0;
                padding: 0;
            }

            textarea {
                resize: none;
            }

            .signature {
                width: 2.5cm !important;
            }

            .bg-green-600 {
                background-color: #34d399 !important;
            }

            .bg-yellow-600 {
                background-color: #fbbf24 !important;
            }

            .bg-red-600 {
                background-color: #ef4444 !important;
            }

            .text-white {
                color: white !important;
            }

            .font-semibold {
                font-weight: 600 !important;
            }

            .rounded-md {
                border-radius: 0.375rem !important;
            }
        }

        .editable {
            cursor: pointer;
        }

        .transparent-input {
            border: none;
            background: transparent;
            outline: none;
        }

        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
            }

            .logo {
                width: 50vw;
            }

            .document-type,
            .conditions,
            .bottom-page,
            table td {
                font-size: 3vw;
            }

            .invoice {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {

            .col-12,
            .col-12-md-7,
            .col-12-md-5,
            .col-12-md-8,
            .col-12-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .text-right {
                text-align: left;
            }

            .text-right-md {
                text-align: left;
            }
        }

        .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-success {
            color: #fff;
            background-color: #e4622c;
            border-color: #e4622c;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-xs {
            padding: 0.25rem 0.4rem;
            font-size: 0.75rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <div class="flex-container">

        <!-- invoice generator -->
        <section class="invoice-section">
            <div class="container">

                <div class="invoice table-responsive" id="invoice-container">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <img alt="Logo" id="uploadedLogo" src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69.webp')}}" class="logo">
                        </div>
                        <div class="col-12 col-md-5 text-right-md">
                            <h1 class="document-type display-4">
                                <div data-editable="true">RECEIPT</div>
                            </h1>
                            <div class="text-right" data-editable="true">No. 90T-17-01-0123</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <p>
                            <div data-editable="true">Arab Private Schools Federation</div><br>
                            <div data-editable="true">
                                P O Box 755, Al Rumais, Barka <br> 328 SULTANATE OF OMAN
                            </div>
                            </p>
                        </div>
                        <div class="col-12 col-md-5 text-right-md">
                            <p>
                            <div data-editable="true">
                                Energies54 <br>
                                Client Ref. C00022 <br>
                                12 Rue de Verdun <br>
                                54250 JARNY
                            </div>
                            </p>
                        </div>
                    </div>
                    <h6>
                        <div data-editable="true">
                            RECEIPT Date: 01/01/2022
                        </div>
                    </h6>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-editable="true">Description</th>
                                    <th data-editable="true">Quantity</th>
                                    <th data-editable="true">Unit</th>
                                    <th data-editable="true">Unit Price</th>

                                    <th data-editable="true">Status</th>
                                    <th data-editable="true">Total Price</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span data-editable="true">Yearly Membership Subscription</span></td>
                                    <td class="text-right"><span data-editable="true" data-field="quantity" data-editable-type="number">1</span></td>
                                    <td>year</td>
                                    <td class="text-right"><span data-field="pu-ht">{{$transaction->amount}}</span><span class="currency">$</span></td>

                                    <td class="text-center font-semibold rounded-md text-white {{$success ? 'bg-green-600' : ($pending ? 'bg-yellow-600' : 'bg-red-600')}}">{{$transaction->status}}</td>
                                    <td class="text-right"><span data-field="total-ht">{{$transaction->amount}}</span><span class="currency">$</span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-8"></div>
                        <div class="col-12 col-md-4">
                            <table class="table table-sm text-right">
                                <tbody>
                                    <tr>
                                        <td><strong>Total Price (Incl. VAT)</strong></td>
                                        <td class="text-right" id="total-ttc">{{$transaction->amount}} <span class="currency">$</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="bottom-page text-right">
                    <div data-editable="true">
                        ARAB PRIVATE SCHOOLS FEDERATION - CR No. 1538734 <br>
                        P O Box 755, Al Rumais, Barka - 328, SULTANATE OF OMAN <br>
                        Bldg. No. 164, Zone 26 C-ring Road, Doha, Qatar - Tel.
                        +974 554 81589 - https://arab-psf.com
                    </div>
                    <!-- signature with image upload -->
                    <div class="row">
                        <div class="col-12 col text-right">
                            <img alt="Signature" src="https://fakeimg.pl/600x400?text=Signature" class="signature" id="uploadedSignature">

                        </div>
                    </div>
                    <div class="row hide-elements">
                        <div class="col-12 col text-left">
                            <button class="btn btn-success btn-block" onclick="window.print()">Print Invoice</button>
                        </div>

                        </p>
                    </div>
                </div>
        </section>
    </div>
</div>