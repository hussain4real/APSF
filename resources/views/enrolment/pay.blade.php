
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
        font-family: 'Open Sans';
        display: flex;
        margin: 75px auto;
        box-shadow: 15px 30px 30px 0 rgba(220, 36, 48, 0.15);
    }

    .card-left {
        text-align: center;
        background: linear-gradient(65deg, #7b4397 , #dc2430);
        color: #fff;
        width: 30%;
        padding: 85px 20px;
        border-radius: 6px 0 0 6px;
    }

    .card-left h1 {
        text-transform: uppercase;
        margin-bottom: 2px;
        font-size: 24px;
    }

    .card-left p {
        font-size: 60px;
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
        <h1>Gold</h1>
        <p><span class="dollar">$</span>17</p>
    </div>
    <div class="card-right">
        <h1>Features:</h1>
        <ul>
            <li>&mdash; Looks great</li>
            <li>&mdash; HTML / CSS only</li>
            <li>&mdash; Feature 3</li>
            <li>&mdash; Feature 4</li>
        </ul>
        <a href="#" class="button">Pay</a>
    </div>
</div>
