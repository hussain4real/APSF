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
    @if (session()->has('info'))
    <div id="card" class="card text-center border-info mx-auto" style="width: 30rem;">
        <h5 class="card-header bg-info">Notice</h5>
        <div class="card-body">
            <h5 class="card-title alert alert-info">{{session('info')}}</h5>

            <address>
                <strong>Contact Information:</strong><br>
                <a href="mailto:info@arab-psf.com">
                    <i class="fas fa-envelope"></i>
                    <span> info@arab-psf.com </span>
                </a>
                <!--phone number -->
                <a href="tel:+968 99871199">
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
        /* Added */
        float: none;
        /* Added */
    }
</style>