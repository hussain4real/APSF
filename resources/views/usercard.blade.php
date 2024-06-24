{{--
@php
use App\Models\User;
use Carbon\Carbon;
$user = User::find(8);
$expiryDate = Carbon::parse($user->subscription->ends_at)->format('m/y');

@endphp
--}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    @font-face {
        font-family: Bahij_TheSansArabic-Plain;
        src: url('{{ asset(' assets/fonts/Bahij_TheSansArabic-Plain.ttf') }}') format('truetype');
        font-weight: normal;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Bahij_TheSansArabic-Plain', sans-serif;
    }

    .wrapper {
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: transparent;
    }

    .credit-card {
        /* width: 460px;
        height: 260px; */
        width: 33rem;
        height: 18rem;
        overflow: hidden;
        position: relative;
        background: url("{{asset('assets/imgs/apsf/user_profile_card/apsf_user_card.webp')}}");
        /* background: src="{{asset('assets/imgs/apsf/user_profile_card/apsf_user_card.webp')}}"; */

        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }

    .help-msg {
        position: absolute;
        left: 20px;
        top: 20px;
        font-size: 12px;
        letter-spacing: 2px;
        word-spacing: 5px;
    }

    .chip {
        width: 64px;
        position: absolute;
        top: 60px;
        left: 20px;
    }

    .signal-icon {
        width: 64px;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
    }

    .card-type {
        position: absolute;
        right: 10px;
        bottom: 10px;
        width: 60px;
        padding: 0 0.5rem;
        border-radius: 50%;
    }

    .card-name {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        word-spacing: 10px;
        letter-spacing: 3px;
        font-size: 19px;
    }

    .card-number {
        position: absolute;
        bottom: 70px;
        left: 20px;
        word-spacing: 15px;
        letter-spacing: 3px;
        font-size: 20px;
    }

    .exp-date {
        position: absolute;
        bottom: 20px;
        left: 20px;
        display: flex;
        gap: 20px;

        p:nth-child(2) {
            letter-spacing: 5px;
        }
    }

    /* .wrapper {
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #000000e9;

        .credit-card {
            width: 460px;
            height: 260px;
            overflow: hidden;
            position: relative;

            .card-front,
            .card-back {
                width: calc(100% - 10px);
                height: calc(100% - 10px);
                border-radius: 10px;
                color: darkred;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                transition: transform 0.5s ease-in-out;
            }

            .card-front {
                z-index: 3;
                background: src="{{asset('assets/imgs/apsf/user_profile_card/')}}";
                /* background: rgb(227, 98, 44); */
    /* background: linear-gradient(148deg,
                        rgba(227, 98, 44, 1) 0%,
                        rgba(251, 134, 43, 1) 18%,
                        rgba(4, 81, 75, 1) 37%,
                        rgba(1,57,50,1) 54%,
                        rgba(1,57,50,1) 70%,
                        rgba(1,57,50,1) 86%,
                        rgba(1,57,50,1) 100%); */
    /* box-shadow: 3px 5px 7px rgba(255, 255, 255, 0.3); */

    /* .help-msg {
        position: absolute;
        left: 20px;
        top: 20px;
        font-size: 12px;
        letter-spacing: 2px;
        word-spacing: 5px;
    }

    .chip {
        width: 64px;
        position: absolute;
        top: 60px;
        left: 20px;
    }

    .bank-logo {
        width: 158px;
        position: absolute;
        right: 10px;
    }

    .signal-icon {
        width: 64px;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
    }

    .card-type {
        position: absolute;
        right: 10px;
        bottom: 10px;
        width: 60px;
        border-radius: 50%;
    }

    .card-name {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        word-spacing: 10px;
        letter-spacing: 3px;
        font-size: 19px;
    }

    .card-number {
        position: absolute;
        bottom: 70px;
        left: 20px;
        word-spacing: 15px;
        letter-spacing: 3px;
        font-size: 20px;
    }

    .exp-date {
        position: absolute;
        bottom: 20px;
        left: 20px;
        display: flex;
        gap: 20px;

        p:nth-child(2) {
            letter-spacing: 5px;
        }
    }
    }

    .card-back {
        z-index: 1;
        background: rgb(9, 255, 0);
        background: linear-gradient(148deg,
                rgba(9, 255, 0, 1) 0%,
                rgba(12, 207, 87, 1) 18%,
                rgba(174, 237, 53, 1) 37%,
                rgba(249, 215, 41, 1) 54%,
                rgba(255, 150, 45, 1) 69%,
                rgba(251, 134, 43, 1) 87%,
                rgba(186, 4, 4, 1) 100%);
        box-shadow: 3px 5px 7px rgba(255, 255, 255, 0.3);

        .black-bar {
            position: absolute;
            left: 0;
            right: 0;
            top: 20px;
            height: 45px;
            background: #333333f1;
        }

        .sign-info {
            text-transform: uppercase;
            position: absolute;
            top: 70px;
            left: 50%;
            transform: translateX(-50%);
        }

        .sign-area {
            position: absolute;
            left: 20px;
            right: 130px;
            top: 100px;
            height: 40px;
            background: #ddddddf1;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border: 1px solid #eee;
        }

        .cvc {
            position: absolute;
            right: 20px;
            top: 100px;
            padding: 8px;
            background: #111111f1;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            color: #eee;
        }

        .terms {
            font-size: 10px;
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            color: #333;
        }
    }
    }
    } */

    */
</style>
<div class="wrapper">
    <div class="credit-card">
        <div class="help-msg">
            <p>info@arab-psf.com</p>
        </div>
        <img src="{{asset('assets/imgs/apsf/user_profile_card/pngtree-credit-card-chip-shopping-png-image_11198229.png')}}" alt="Chip" class="chip">
        <img src="https://www.freeiconspng.com/thumbs/wireless-icon-png/wireless-icon-png-2.png" alt="" class="signal-icon">
        <img src="{{$user->profile_photo_url}}" alt="" class="card-type">
        <div class="card-name">
            <h3>{{$user->name}}</h3>
        </div>
        <div class="card-number">
            <h3>{{$user->membership_id}}</h3>
        </div>
        <div class="exp-date">
            <p>Valid Till</p>
            <p>{{$expiryDate}}</p>
        </div>
        <!-- <div class="card-front">
            <div class="help-msg">
                <p>Call 0000 For Help</p>
            </div>
            <img src="https://png.pngtree.com/png-vector/20231223/ourmid/pngtree-credit-card-chip-shopping-png-image_11198229.png" alt="Chip" class="chip">
            <img src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69.webp')}}" alt="" class="bank-logo">
            <img src="https://www.freeiconspng.com/thumbs/wireless-icon-png/wireless-icon-png-2.png" alt="" class="signal-icon">
            <img src="{{$user->profile_photo_url}}" alt="" class="card-type">
            <div class="card-name">
                <h3>{{$user->name}}</h3>
            </div>
            <div class="card-number">
                <h3>XXXX XXXX XXXX 0123</h3>
            </div>
            <div class="exp-date">
                <p>Valid Till</p>
                <p>05/30</p>
            </div>
        </div>
        <div class="card-back">
            <div class="black-bar"></div>
            <p class="sign-info">authorized signature</p>
            <div class="sign-area"></div>
            <div class="cvc">CVC - 000</div>
            <p class="terms">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quis necessitatibus architecto nisi maiores placeat similique eligendi, perferendis consectetur inventore velit, impedit molestiae animi odit mollitia optio harum fuga, perspiciatis commodi sapiente totam nulla ipsa!
            </p>
        </div> -->
    </div>
</div>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const card = document.querySelector(".credit-card");
        const card_back = document.querySelector(".card-back");
        const card_front = document.querySelector(".card-front");
        const card_num = document.querySelector(".card-number h3");

        card.onmouseover = () => {
            card_num.textContent = "0000 0000 0000 0123";
        };
        card.onmouseout = () => {
            card_num.textContent = "XXXX XXXX XXXX 0123";
        };

    });
</script> -->