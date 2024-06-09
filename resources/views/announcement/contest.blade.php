<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Modals · Bootstrap v5.3</title>
    <!-- 
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/modals/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> -->

    <style>
        .modal-sheet .modal-dialog {
            width: 380px;
            transition: bottom 0.75s ease-in-out;
        }

        .modal-sheet .modal-footer {
            padding-bottom: 2rem;
        }




        /* .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        } */
    </style>


</head>

<body>

    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSheet">
        Launch demo modal
    </button> -->

    <div class="modal fade bg-body-transparent p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <p>This is a modal sheet, a variation of the modal that docs itself to the bottom of the viewport like the newer share sheets in iOS.</p>
                </div>
                <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                    <button type="button" class="btn btn-lg btn-primary">Save changes</button>
                    <button id="dismissButton" type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> -->

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if the modal has already been shown
        if (!localStorage.getItem('modalShown')) {
            // Show the modal after 10 seconds
            setTimeout(function() {
                var myModal = new bootstrap.Modal(document.getElementById('modalSheet'), {
                    keyboard: false
                });
                myModal.show();
                // Mark the modal as shown in localStorage
                localStorage.setItem('modalShown', 'true');
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
    // document.addEventListener('DOMContentLoaded', function() {  setTimeout(function() { var myModal = new bootstrap.Modal(document.getElementById('modalSheet'), { keyboard: false }); myModal.show(); }, 10000);  });
</script>

</html>