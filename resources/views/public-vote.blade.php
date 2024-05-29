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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$publicVote->question}}</h3>
                </div>
                <div class="card-body">
                    <form id="voteForm">
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
                        <button id="submit-button" type="submit" class="btn btn-primary">Vote</button>
                        <button id="viewVotes" class="btn btn-outline-info">View Votes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('voteForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const voteOption = formData.get('option');

            fetch('/vote', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{){ csrf_token() }}'
                },
                body: JSON.stringify({option: voteOption})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        alert(data.success);
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
                        alert(`Option 1: ${data.option1}\nOption 2: ${data.option2}\nOption 3: ${data.option3}`);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
