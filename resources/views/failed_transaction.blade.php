<x-home-layout>
    @if(session('error'))
    <div id="card" class="card text-center border-danger mx-auto" style="width: 30rem;">
        <h5 class="card-header bg-danger">Notice</h5>
        <div class="card-body">
            <h5 class="card-title alert alert-danger">{{session('error')}}</h5>

            <a href="{{route('subscribe')}}" class="btn btn-primary">Try again</a>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div id="card" class="card text-center border-success mx-auto" style="width: 30rem;">
        <h5 class="card-header bg-success">Notice</h5>
        <div class="card-body">
            <h5 class="card-title alert alert-success">{{session('success')}}</h5>

            <a href="{{route('filament.admin.pages.my-profile')}}" class="btn btn-primary">View Profile</a>
        </div>
    </div>
    @endif
    @if (session()->has('info'))
    <div id="card" class="card text-center border-info mx-auto" style="width: 30rem;">
        <h5 class="card-header bg-info">Notice</h5>
        <div class="card-body">
            <h5 class="card-title alert alert-info">{{session('info')}}</h5>

            <address class="d-flex flex-column">
                <strong class="fs-4">Contact Information:</strong><br>
                <a class="p-2" href="mailto:info@arab-psf.com">
                    <i class="fas fa-envelope"></i>
                    <span> info@arab-psf.com </span>
                </a>
                <br>
                <!--phone number -->
                <a class="p-2" href="tel:+968 99871199">
                    <i class="fas fa-phone"></i>
                    <span> +968 99871199 </span>
                </a>
            </address>
        </div>
    </div>
    @endif
</x-home-layout>
<style>
    .card {
        margin-top: 10rem;
        float: none;
        /* Ensure the card is centered */
        width: 90%;
        /* Default to a percentage-based width for better responsiveness */
        max-width: 30rem;
        /* Maximum width to maintain layout integrity on larger screens */
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 5rem;
            /* Adjust top margin on smaller screens */
            width: 85%;
            /* You can adjust this percentage based on your design needs */
        }

        .card-body .btn,
        .card-body .alert,
        address {
            font-size: 0.9rem;
            /* Adjust font size for smaller screens */
        }

        address .p-2 {
            padding: 0.5rem;
            /* Adjust padding for smaller screens */
        }
    }

    .card-title {
        word-wrap: break-word;
        /* Break long words to prevent overflow */
        overflow-wrap: break-word;
        /* Ensure overflow text is handled properly */
        overflow: hidden;
        /* Hide overflow */
        text-overflow: ellipsis;
        /* Add ellipsis to text that overflows the container */
        white-space: nowrap;
        /* Prevent text from wrapping to a new line */
    }

    @media (max-width: 768px) {
        .card-title {
            font-size: 1rem;
            /* Adjust font size for smaller screens */
            white-space: normal;
            /* Allow text to wrap on smaller screens */
        }
    }
</style>