<x-home-layout>


    <div class="containerr">
        <div class="grid">
            <div class="card">
                <h2 class="card_title">Student</h2>
                <p class="pricing">20$<span class="small">/per month</span></p>
                <p>Save $9</p>
                <hr>
                <ul class="features">
                    <li>One account</li>
                    <li>Unlimited songs</li>
                    <li>Customized playlist</li>
                </ul>
                <a href="#" class="cta_btn">Buy Now</a>
            </div>
            <div class="card">
                <h2 class="card_title">Personal</h2>
                <p class="pricing">39$<span class="small">/per month</span></p>
                <p>Save $15</p>
                <hr>
                <ul class="features">
                    <li>One account</li>
                    <li>Unlimited songs</li>
                    <li>Customized playlist</li>
                </ul>
                <a href="#" class="cta_btn">Buy Now</a>
            </div>
            <div class="card">
                <h2 class="card_title">Family</h2>
                <p class="pricing">60$<span class="small">/per month</span></p>
                <p>Save $25</p>
                <hr>
                <ul class="features">
                    <li>Six account</li>
                    <li>Unlimited songs</li>
                    <li>Customized playlist</li>
                </ul>
                <a href="#" class="cta_btn">Buy Now</a>
            </div>
        </div>
    </div>
{{--    <a href="https://youtu.be/RLReK22LWTo" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>--}}
</x-home-layout>
<style>
    /** {*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*    box-sizing: border-box;*/
    /*}*/

    /*body {*/
    /*    min-height: 100vh;*/
    /*    background: url("https://images.unsplash.com/photo-1598125443421-779f98323fe4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");*/
    /*    background-repeat: no-repeat;*/
    /*    background-size: cover;*/
    /*    color: white;*/
    /*    font-family: Roboto;*/
    /*    font-size: 16px;*/
    /*}*/

    .containerr {
        background: url("https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
        background-repeat: no-repeat;
        background-size: contain;
        min-height: 100vh;
        /*background: url("https://images.unsplash.com/photo-1598125443421-779f98323fe4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");*/
        /*background-repeat: no-repeat;*/
        /*background-size: contain;*/
        color: white;
        font-size: 16px;
        max-width: 150rem;
        margin: 2rem;
        /*padding: 0 2rem;*/
        /*height: 100%;*/
    }

    .grid {
        min-height: 100vh;

        /*background: rgba(147, 150, 155, 0.7);*/
        /*border-radius: 2rem;*/
        color: white;
        padding:2rem 2rem;
        display: grid;
        justify-content: center;
        align-items: center;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 4%;
    }

    .card {
        background: rgba(147, 150, 155, 0.4);

        padding: 1rem 1rem;
        align-items: center;
        /*background: rgba(255, 255, 255, 0.1);*/
        border: 2px solid rgba(173, 140, 140, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 25px;
    }

    .card_title {
        font-weight: normal;
        color: white;
        font-size: 36px;
        margin-bottom: 20px;
    }

    .pricing {
        font-weight: normal;
        font-size: 96px;
        color: antiquewhite;
    }

    .pricing .small {
        font-size: 16px;
        color: wheat;
    }

    hr {
        margin-top: 70px;
    }

    .features {
        margin: 40px 0;
        list-style-position: inside;
    }

    .features li {
        padding-bottom: 10px;
    }

    a.cta_btn {
        width: 100%;
        display: inline-block;
        text-align: center;
        background: rgba(21, 23, 24, 0.7);
        border-radius: 29px;
        padding: 20px 0;
        color: white;
        text-decoration: none;
        letter-spacing: 2px;
        transition: background .3s ease;
    }

    a.cta_btn:hover {
        background: #000;
    }
    .link {
        position: fixed;
        background-color: #D12322;
        padding: 23px 40px;
        right: -99px;
        border-radius: 5px;
        top: 50%;
        transform: translateY(-50%);
        transform: rotate(-90deg);
        font-size: 18px;
        font-weight: 500;
        color: #FFF;
        text-decoration: none;
        text-transform: capitalize;
        transition: all .1s ease-in-out;
    }

    .link i {
        padding-left: 7px;
    }

    .link:hover {
        text-decoration: underline;
        background-color: black;
    }
    @media only screen and (max-width: 1024px) {
        .grid {
            grid-template-columns: 1fr 1fr;
            gap: 2%;

        }
    }

    @media only screen and (max-width: 425px) {
        .grid {
            grid-template-columns: 1fr;
            gap: 2%;
            padding-bottom: 25%;
        }

        .container {
            padding: 0 1rem;
        }


        .card {
            padding: 30px;
        }

        .card_title {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .pricing {
            font-size: 52px;
        }

        hr {
            margin-top: 50px;
        }

        a.cta_btn {
            font-size: 11px;
        }
    }
</style>
