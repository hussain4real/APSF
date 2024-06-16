<style>
    @import url("https://fonts.googleapis.com/css?family=Fira+Code&display=swap");

    * {
        margin: 0;
        padding: 0;
        font-family: "Fira Code", monospace;
    }

    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #ecf0f1;
    }

    .container {
        text-align: center;
        margin: auto;
        padding: 4em;

        img {
            width: 256px;
            height: 225px;
        }

        h1 {
            margin-top: 1rem;
            font-size: 35px;
            text-align: center;

            span {
                font-size: 60px;
            }
        }

        p {
            margin-top: 1rem;
        }

        p.info {
            margin-top: 4em;
            font-size: 12px;

            a {
                text-decoration: none;
                color: rgb(84, 84, 206);
            }
        }
    }
    a.back-home {
        display: inline-block;
        border: 2px solid #E4622C;
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
        margin-top: 1rem;
        font-weight: 600;
        padding: 0.75rem 1rem 0.6rem;
        transition: all 0.2s linear;
        box-shadow: 0 15px 15px -11px rgba(0, 0, 0, 0.4);
        background: #E4622C;
        border-radius: 6px;
    }

    /* .back-home {
        display: inline-block;
        border: 2px solid #E4622C;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        padding: 0.75rem 1rem 0.6rem;
        transition: all 0.2s linear;
        box-shadow: 0 15px 15px -11px rgba(0, 0, 0, 0.4);
        background: #E4622C;
        border-radius: 6px;
    } */

    .back-home:hover {
        background: #E4622C;
        color: #ddd;
    }
</style>
<div class="container">
    <img src="https://i.imgur.com/qIufhof.png" />

    <h1>
        <span>500</span> <br />
        Internal server error
    </h1>
    <p>We are currently trying to fix the problem.</p>
    <a class="back-home" href="{{ route('welcome') }}">Go back to home</a>
</div>
</div>