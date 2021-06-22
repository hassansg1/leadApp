<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
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
            <a class="contactBtn" href="#">
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

        <iframe
                id="JotFormIFrame-211662730354047"
                title="-"
                onload="window.parent.scrollTo(0,0)"
                allowtransparency="true"
                allowfullscreen="true"
                allow="geolocation; microphone; camera"
                src="https://form.jotform.com/211662730354047"
                frameborder="0"
                style="
      min-width: 100%;
      height:539px;
      border:none;"
                scrolling="no"
        >
        </iframe>
        <script type="text/javascript">
            var ifr = document.getElementById("JotFormIFrame-211662730354047");
            if (ifr) {
                var src = ifr.src;
                var iframeParams = [];
                if (window.location.href && window.location.href.indexOf("?") > -1) {
                    iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
                }
                if (src && src.indexOf("?") > -1) {
                    iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
                    src = src.substr(0, src.indexOf("?"))
                }
                iframeParams.push("isIframeEmbed=1");
                ifr.src = src + "?" + iframeParams.join('&');
            }
            window.handleIFrameMessage = function(e) {
                if (typeof e.data === 'object') { return; }
                var args = e.data.split(":");
                if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
                if (!iframe) { return; }
                switch (args[0]) {
                    case "scrollIntoView":
                        iframe.scrollIntoView();
                        break;
                    case "setHeight":
                        iframe.style.height = args[1] + "px";
                        break;
                    case "collapseErrorPage":
                        if (iframe.clientHeight > window.innerHeight) {
                            iframe.style.height = window.innerHeight + "px";
                        }
                        break;
                    case "reloadPage":
                        window.location.reload();
                        break;
                    case "loadScript":
                        if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
                        var src = args[1];
                        if (args.length > 3) {
                            src = args[1] + ':' + args[2];
                        }
                        var script = document.createElement('script');
                        script.src = src;
                        script.type = 'text/javascript';
                        document.body.appendChild(script);
                        break;
                    case "exitFullscreen":
                        if      (window.document.exitFullscreen)        window.document.exitFullscreen();
                        else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
                        else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
                        else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
                        else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
                        break;
                }
                var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
                if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
                    var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
                    iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
                }
            };
            window.isPermitted = function(originUrl, whitelisted_domains) {
                var url = document.createElement('a');
                url.href = originUrl;
                var hostname = url.hostname;
                var result = false;
                if( typeof hostname !== 'undefined' ) {
                    whitelisted_domains.forEach(function(element) {
                        if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
                            result = true;
                        }
                    });
                    return result;
                }
            }
            if (window.addEventListener) {
                window.addEventListener("message", handleIFrameMessage, false);
            } else if (window.attachEvent) {
                window.attachEvent("onmessage", handleIFrameMessage);
            }
        </script>
    </div>
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