<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Business Solution</title>
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon"  href="{{ asset('img/apple-touch-icon.png') }}">
</head>

<body>
<header>
    <h4 class="topr">
        Get Funded In 24hours-Talk To An Agent Today
    </h4>
    <div class="container">

        <div class="hdrInnr">

            <a href="/" class="logo">
                <img src="{{ asset('img/RainFall-Logo.png') }}" alt="img">
            </a>
            <a class="contactBtn"  href="tel:949-204-0303">
                contct us
            </a>
        </div>

    </div>
    <h4 class="bottomr">
        Need <span>$35K</span> ? Easy! We Have Secured <span>$50 Million</span> In Funding.
    </h4>
</header>
<section id="hero">
    <div class="container">
        <div class="heroWraper">
            <div class="lft">
                <h1>
                    Pandemic Affecting Your Business?
                </h1>
                <h2>wait!</h2>
                <h3>Before You Call It Quits.</h3>

                <a href="#form" class="button">
                    Get $1 Million Today
                </a>
            </div>
            <div class="rght">
                <img src="{{ asset('img/imgrght.png') }}" alt="img">
            </div>
        </div>
    </div>
</section>
<section id="form">
    <div class="container">
        @include('first_form')
</section>
<section id="cvts">
    <div class="container">
        <div class="cvts">
            <div class="lft">
                <h2>Did The SBA Deny You?
                </h2>
                <p>
                    Stop Letting COVID Affect Your Cash Flow. <br>
                    We're here to get your business back on track.
                </p>
                <a href="#form" class="button">
                    Get $1 Million Today
                </a>
            </div>
            <div class="rght">
                <img src="{{ asset('img/srvrght.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<section id="service">
    <div class="container">
        <h2 class="titel">
            Why do business owners love us?
        </h2>
        <div class="srvceWrapper">
            <div class="srvcdiv">
                <div class="icon">
                    <img src="{{ asset('img/time.png') }}" alt="">
                </div>
                <h3>Get Paid In Seconds.</h3>
                <p>Process requests at optimum speed. Faster than you can order delivery.</p>
            </div>
            <div class="srvcdiv">
                <div class="icon">
                    <img src="{{ 'img/documents.png' }}" alt="">
                </div>
                <h3>Simple Terms.
                </h3>
                <p>The most favorable options and term loans. No, squinting your eyes to read the fine print.
                </p>
            </div>
            <div class="srvcdiv">
                <div class="icon">
                    <img src="{{ 'img/money-exchange.png' }}" alt="">
                </div>
                <h3>Repayable.
                </h3>
                <p>Caters directly to your business needs like no other in the market.</p>
            </div>
        </div>
        <div class="bottomBtn">
            <a href="#form" class="button">
                Get $1 Million Today
            </a>
        </div>
    </div>
</section>
</body>

</html>
<script>
    document.getElementsByClassName("embedOptionsButton").style.display = "none";
</script>
<style>
    .embedOptionsButton{
        display: none !important;
    }
</style>