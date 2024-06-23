<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            background: url('assets/imgs/apsf/seals/apsf_letterhead.png') center/cover no-repeat;
        }

        .invoice {
            background: transparent;
            width: 100%;
            padding: 50px;
        }

        .logo {
            width: 4cm;
        }

        .signature {
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
        }

        table td {
            padding: 0.45rem !important;
        }

        table td {
            font-size: 15px;
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
                /* auto is the initial value */
                margin: 30px 0;
                /* this affects the margin in the printer settings */
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



            #logoForm {
                display: none;
            }

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
                /* Remove default body margin */
                padding: 0;
                /* Remove default body padding */
            }

            textarea {
                resize: none;
            }

            .signature {
                width: 2.5cm !important;
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

        .text-right {
            text-align: right
        }

        .flex-container {
            display: flex;
        }

        [data-editable="true"] {
            border: 1px dashed #ddd;
            padding: 5px;
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
            .col-12 {
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
    </style>
    <div class="flex-container">

        <!-- invoice generator -->
        <section class="invoice-section">
            <div class="container">

                <div class="invoice table-responsive" id="invoice-container">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <img alt="Logo" id="uploadedLogo" src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69.webp')}}" class="logo">
                            <form id="logoForm">
                                <input type="file" accept="image/*" id="logoInput" onchange="handleLogoChange()">
                            </form>
                        </div>
                        <div class="col-12 col-md-5 text-right-md">
                            <h1 class="document-type display-4">
                                <div data-editable="true">INVOICE</div>
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
                            Invoice Date: 01/01/2022
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
                                    <th data-editable="true">VAT</th>
                                    <th data-editable="true">Total Price</th>
                                    <th class="hide-elements">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span data-editable="true">Yearly Membership Subscription</span></td>
                                    <td class="text-right"><span data-editable="true" data-field="quantity" data-editable-type="number">1</span></td>
                                    <td>year</td>
                                    <td class="text-right"><span data-editable="true" data-field="pu-ht" data-editable-type="number">500</span><span class="currency">$</span></td>
                                    <td class="text-right"><span data-editable="true" data-field="tva" data-editable-type="number">0</span>%</td>
                                    <td class="text-right"><span data-editable="true" data-field="total-ht" data-editable-type="number">500</span><span class="currency">$</span></td>
                                    <td class="text-right hide-elements"><button class="btn btn-sm btn-danger" onclick="deleteRow(this)">-</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-xs btn-success" onclick="addNewRow()">+</button>
                    <div class="row">
                        <div class="col-12 col-md-8"></div>
                        <div class="col-12 col-md-4">
                            <table class="table table-sm text-right">
                                <tbody>
                                    <tr>
                                        <td><strong>Total Price (Excl. VAT)</strong></td>
                                        <td class="text-right" id="total-ht">3,700.00 <span class="currency">$</span></td>
                                    </tr>
                                    <tr>
                                        <td>VAT 0%</td>
                                        <td class="text-right" id="total-tva">740.00 <span class="currency">$</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Price (Incl. VAT)</strong></td>
                                        <td class="text-right" id="total-ttc">4,440.00 <span class="currency">$</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="conditions">
                    <div data-editable="true">
                        In your kind settlement and with our thanks. <br>
                        Payment terms: payment upon receipt of invoice. <br>
                        Payment by bank transfer. <br>
                        Please indicate the invoice number on your payment. <br>
                    </div>
                    </p>
                    <p class="bottom-page text-right">
                    <div data-editable="true">
                        ARAB PRIVATE SCHOOLS FEDERATION - CR No. 1538734 <br>
                        P O Box 755, Al Rumais, Barka - 328, SULTANATE OF OMAN <br>
                        Bldg. No. 164, Zone 26 C-ring Road, Doha, Qatar - Tel.
                        +974 554 81589 - https://arab-psf.com <br>
                        IBAN FR76 1470 7034 0031 4211 7882 825 - SWIFT CCBPFRPPMTZ <br>
                    </div>
                    <!-- signature with image upload -->
                    <div class="row">
                        <div class="col-12 col text-right">
                            <img alt="Signature" src="{{asset('assets/imgs/apsf/seals/apsf_seal.png')}}" class="signature" id="uploadedSignature">
                            <form id="signatureForm">
                                <input type="file" accept="image/*" id="signatureInput" onchange="handleSignatureChange()">
                            </form>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </section>

        <!-- settings -->
        <section class="hide-elements settings-section">
            <h4 class="text-center">Settings</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Currency:</strong></td>
                        <td>
                            <select onchange="getSelectedCurrency()" id="select-currency" class="form-select">
                                <option value="$">USD</option>
                                <option value="€">EUR</option>
                                <option value="£">GBP</option>
                                <!-- Add more currency options as needed -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-success btn-block" onclick="printInvoice()">Print Invoice</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</div>



<script>
    // Get the parent div
    var parentDiv = document.getElementById("invoice-container");
    const currency = getSelectedCurrency()

    calculateTotals()
    // Add click event listener to the parent div
    parentDiv.addEventListener("click", function(event) {
        //editable element
        if (event.target.getAttribute("data-editable")) {

            const editableDiv = event.target;

            if (event.target.getAttribute("data-editable-type") && event.target.getAttribute("data-editable-type") == "number") {

                // Create an input element
                var inputElement = document.createElement("input");

                // Set input properties
                inputElement.type = "number";
                var divWidth = event.target.offsetWidth;
                divWidth += (divWidth * 0.8)
                inputElement.style.width = divWidth + "px";
                inputElement.value = editableDiv.innerText;
                inputElement.className = "transparent-input,text-right";
                // Replace the div with the input
                editableDiv.replaceWith(inputElement);

            } else {

                // Create an input element
                var inputElement = document.createElement("textarea");

                // Set input properties
                var divHeight = event.target.offsetHeight;
                inputElement.style.height = divHeight + "px !importat";
                var divWidth = event.target.offsetWidth;
                divWidth += (divWidth)
                inputElement.style.width = divWidth + "px";
                inputElement.value = editableDiv.innerText;
                inputElement.className = "transparent-input,text-right";
                // Replace the div with the input
                editableDiv.replaceWith(inputElement);

            }

            // Add event listener to handle editing completion
            inputElement.addEventListener("blur", function() {
                event.target.innerText = inputElement.value;
                inputElement.replaceWith(event.target);
                calculateTotals()
            });

            // Focus on the input for immediate editing
            inputElement.focus();
        }
    });


    function calculateTotals() {
        console.log('calculateTotals triggered')
        // Get all rows in the table body
        var tableRows = document.querySelectorAll('#table tbody tr');

        // Initialize total HT, total TVA, and total TTC
        var totalHT = 0;
        var totalTVA = 0;
        var totalTTC = 0;

        // Loop through each row
        tableRows.forEach(function(row) {
            // Get relevant cells in the row
            var quantityCell = row.querySelector('[data-field="quantity"]');
            var puHTCell = row.querySelector('[data-field="pu-ht"]');
            var tvaCell = row.querySelector('[data-field="tva"]');
            var totalHTCell = row.querySelector('[data-field="total-ht"]');

            if (quantityCell && puHTCell && tvaCell && totalHTCell) {
                // Extract numeric values from cells
                var quantity = parseFloat(quantityCell.textContent);
                var puHT = parseFloat(puHTCell.textContent);
                var tvaPercentage = parseFloat(tvaCell.textContent);
                var totalHTValue = parseFloat(totalHTCell.textContent);

                // Calculate total HT for the current row
                var rowTotalHT = quantity * puHT;

                totalHTCell.innerText = rowTotalHT
                // Update total HT, total TVA, and total TTC
                totalHT += rowTotalHT;
                totalTVA += rowTotalHT * (tvaPercentage / 100);
                totalTTC += rowTotalHT * (1 + tvaPercentage / 100);
            }

        });

        // Display the calculated totals
        document.getElementById('total-ht').innerText = totalHT.toFixed(2) + currency
        document.getElementById('total-tva').innerText = totalTVA.toFixed(2) + currency
        document.getElementById('total-ttc').innerText = totalTTC.toFixed(2) + currency

    }


    function addNewRow() {
        // Get the table body
        var tableBody = document.querySelector('#table tbody');

        // Create a new row
        var newRow = tableBody.insertRow();

        // Array of column values for the new row
        var columnValues = ['New Description', 1, 'Unit', 0, 0, 0];


        // Loop through each column and create cells
        for (var i = 0; i < columnValues.length; i++) {
            var cell = newRow.insertCell(i);

            var span = document.createElement('span');

            switch (i) {

                case 0:
                    span.setAttribute('data-field', 'description')
                    break;

                case 1:
                    span.setAttribute('data-field', 'quantity')
                    break;

                case 2:
                    span.setAttribute('data-field', 'unity')
                    break;

                case 3:
                    span.setAttribute('data-field', 'pu-ht')
                    break;

                case 4:
                    span.setAttribute('data-field', 'tva')
                    break;

                case 5:
                    span.setAttribute('data-field', 'total-ht')
                    break;


                default:
                    break;
            }

            // Create editable content (input for numbers, div for other columns)
            if (i === 1 || i === 3 || i === 4 || i === 5) {
                cell.className = 'text-right'
                span.setAttribute('data-editable-type', 'number');
                span.setAttribute('data-editable', 'true');
                span.innerText = columnValues[i]
                cell.appendChild(span);

                cell.addEventListener('change', function() {
                    calculateTotals();
                });

                if (i == 4) {
                    var perCentSpan = document.createElement('span');
                    perCentSpan.innerText = '%'
                    cell.appendChild(perCentSpan);


                }

                if (i == 3 || i == 5) {
                    var currencySpan = document.createElement('span');
                    currencySpan.innerText = currency
                    cell.appendChild(currencySpan);
                }
            } else {
                span.textContent = columnValues[i];
                span.setAttribute('data-editable', 'true');
                cell.appendChild(span);
            }
        }

        var actionCell = newRow.insertCell(6);
        actionCell.className = 'text-right'
        var button = document.createElement('button');
        button.className = 'btn btn-sm btn-danger'
        button.innerText = '-'
        actionCell.appendChild(button);

        actionCell.addEventListener('click', function(e) {
            deleteRow(e.target);
        });

        calculateTotals()
    }

    function deleteRow(button) {
        const row = button.closest('tr');
        row.remove();
        calculateTotals();
    }



    function handleLogoChange() {
        const logoInput = document.getElementById('logoInput');
        const uploadedLogo = document.getElementById('uploadedLogo');

        const file = logoInput.files[0];

        if (file) {
            // Use FileReader to read the selected file
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the source of the image to the base64-encoded content of the file
                uploadedLogo.src = e.target.result;
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    }

    function handleSignatureChange() {
        const signatureInput = document.getElementById('signatureInput');
        const uploadedSignature = document.getElementById('uploadedSignature');

        const file = signatureInput.files[0];

        if (file) {
            // Use FileReader to read the selected file
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the source of the image to the base64-encoded content of the file
                uploadedSignature.src = e.target.result;
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    }


    function printInvoice() {
        window.print()
    }

    function getSelectedCurrency() {
        console.log('getSelectedCurrency triggred')
        // Get the select element
        var selectElement = document.getElementById("select-currency");

        // Get the selected index
        var selectedIndex = selectElement.selectedIndex;

        // Get the selected option element
        var selectedOption = selectElement.options[selectedIndex];

        // Log the selected option value and text
        console.log("Selected Value: " + selectedOption.value);

        document.querySelector('.currency').innerText = selectedOption.value

        return selectedOption.value
    }
</script>