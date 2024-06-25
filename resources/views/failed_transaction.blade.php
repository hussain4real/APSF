<x-home-layout>

    @if(session('error'))
    <div id="card" class="card text-center border-danger mx-auto" style="width: 30rem;">
        <h5 class="card-header bg-danger">Notice</h5>
        <div class="card-body">
            <h5 class="card-title alert alert-danger">{{session('error')}}</h5>

            <a href="{{route('training-programs.list')}}" class="btn btn-primary">Try again</a>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div id="card" class="card text-center border-success mx-auto">
        <h5 class="card-header bg-success">Notice</h5>
        <div class="card-body">
            <div class="card-title alert alert-success">{{ session('success') }}</div>
            <a href="{{ route('filament.admin.pages.my-profile') }}" class="btn btn-primary">View Profile</a>
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
        width: 100%;
        max-width: 80rem;
    }

    .card-title {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        white-space: normal !important;
        font-size: large !important;
    }


    @media (max-width: 768px) {
        .card {
            margin-top: 5rem;
            width: 85%;
        }

        .card-body .btn,
        .card-body .alert,
        address {
            font-size: 0.9rem;
        }

        address .p-2 {
            padding: 0.5rem;
        }

        .card-title {
            font-size: 1rem;
            white-space: normal;
        }
    }
</style>