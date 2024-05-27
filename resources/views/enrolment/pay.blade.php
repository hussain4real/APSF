
<style>

       h1 {
           margin: 0;
       }

    p {
        margin: 0;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-weight: 500;
    }

    .pricing-card {
        width: 700px;
        font-family: 'Puppins', sans-serif;
        display: flex;
        margin: 75px auto;
        border-radius: 2rem;
        box-shadow: 10px 10px 10px 0 rgba(2, 24, 6,0.5);
    }

    .card-left {
        text-align: center;
        background: linear-gradient(65deg, #033733 , #dc2430);
        color: #fff;
        width: 30%;
        padding: 85px 20px;
        border-radius: 6px 0 0 6px;
    }

    .card-left h1 {
        text-transform: uppercase;
        margin-bottom: 1rem;
        font-size: 24px;
    }

    .card-left p {
        font-size: 60px;
        margin: 2rem 0;
    }

    .dollar {
        font-size: 24px;
        position: relative;
        top: -26px;
    }

    .card-right {
        text-align: left;
        background: #fff;
        width: 70%;
        color: $red;
        border-radius: 0 6px 6px 0;
        padding: 40px 40px;
    }

    .card-right h1 {
        margin-bottom: 15px;
        color: #292e31;
        opacity: 0.9;
    }

    .card-right ul {
        margin-bottom: 40px;
    }

    .card-right li {
        padding-bottom: 6px;
    }

    .button {
        text-decoration: none;
        color: #fff;
        background: #e56131;
        padding: 20px 80px;
        border-radius: 100px;
        transition: all 500ms ease;
    }

    .button:hover {
        background: purple;
    }
</style>
<div class="pricing-card">
    <div class="card-left">
        <h1>{{$trainingProgram->title}}</h1>
        <p><span class="dollar">$</span>{{$trainingProgram->cost}}</p>
        <h4>{{$trainingProgram->instructor_name}}</h4>
    </div>
    <div class="card-right">
        <h1>{{$trainingProgram->instructor}}</h1>
        <ul>
            <li>&mdash; {{$trainingProgram->duration}}</li>
            <li>&mdash; {{$trainingProgram->mode_of_delivery}}</li>
            <li>&mdash; {{$trainingProgram->type}}</li>
            <li>&mdash; {{$trainingProgram->start_date->diffForHumans()}}</li>
        </ul>
{{--        <a href="#" class="button">Pay</a>--}}
        <div>
            {{ $action->getModalAction('make_payment') }}
        </div>
    </div>
</div>
