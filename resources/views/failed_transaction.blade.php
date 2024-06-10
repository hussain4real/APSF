<x-home-layout>
    @if(session('error'))
    <div id="card" class="card text-center border-danger mx-auto" style="width: 30rem;">
        <h5 class="card-header bg-danger">Notice</h5>
        <div class="card-body">
            <h5 class="card-title alert alert-danger">{{session('error')}}</h5>
            <p class="card-text">{{ __('We could not process your transaction') }}</p>
            <a href="{{route('subscribe')}}" class="btn btn-primary">Try again</a>
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