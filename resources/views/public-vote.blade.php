@php
    use App\Models\PublicVote;$publicVote = PublicVote::first();
@endphp
<style>
    .card-header {
        background: #033731;
        color: white;
    }

    #submit-button {
        background: #e56131;
        border-color: #e56131;
        margin: 0 1rem;
    }

    .btn-outline-info {
        color: #033731 !important;
        border-color: #033731;
    }

    .btn-outline-info:hover {
        color: white !important;
        background: #033731;
    }
</style>
<div class="container mt-1">
    @if(session('error'))
        <header class="pb-3 mb-4 border-bottom " >
            <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                {{--                    speaker anouncement svg--}}
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="alert alert-warning d-flex align-items-center justify-content-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="fs-4 ">{{session('error')}}</div>
                </div>
            </a>
        </header>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$publicVote->question}}</h3>
                </div>
                <div class="card-body">
                    <form id="voteForm">
                        @csrf
                        <div class="mb-3 form-check">
                            <input type="radio" id="option1" name="option" value="1" class="form-check-input">
                            <label class="form-check-label" for="option1">{{__('frontend.votes.option1')}}</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="radio" id="option2" name="option" value="2" class="form-check-input">
                            <label class="form-check-label" for="option2">{{__('frontend.votes.option2')}}</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="radio" id="option3" name="option" value="3" class="form-check-input">
                            <label class="form-check-label" for="option3">{{__('frontend.votes.option3')}}</label>
                        </div>
                        <button id="submit-button" type="submit" class="btn btn-primary">{{__('frontend.votes.rate')}}</button>
                    </form>
                    @auth
                    <button id="viewVotes" class="btn btn-outline-info d-flex mt-3">{{__('frontend.votes.view_ratings')}}</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const option1Text = @json(__('frontend.votes.option1'));
    const option2Text = @json(__('frontend.votes.option2'));
    const option3Text = @json(__('frontend.votes.option3'));
    const successText = @@json(__('frontend.votes.success'));

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('voteForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const voteOption = formData.get('option');

            fetch('/vote', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({option: voteOption})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);


                    } else {
                        alert(`${successText}`);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        //view votes
        document.getElementById('viewVotes').addEventListener('click', function () {
            fetch('/view-votes', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        alert(`${option1Text}: ${data.option1}\n${option2Text}: ${data.option2}\n${option3Text}: ${data.option3}`);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
