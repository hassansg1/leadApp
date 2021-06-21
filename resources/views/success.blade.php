

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="HandheldFriendly" content="true" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms//stylebuilder/default.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms//stylebuilder/211662730354047.css" />
    <style type="text/css">
        .JotFormCardBuilder div.thankyou-page-content {
            padding: 30px 1%;
        }
        .thankyou-buttons {
            margin-top: 16px;
        }
        .thankYouButtonWrapper {
            display: flex;
            justify-content: center;
            padding-bottom: 25px;
            margin-top: 20px;
        }
        .ty-buttons {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height: 48px;
            border-width: 1px;
            border-style: solid;
            border-radius: 4px;
            padding: 0 20px;
            cursor: pointer;
            font-size: 16px;
            font-family: "inter", sans-serif;
        }
        .thankyou-button-icon {
            margin-right: 12px;
        }
        .thankYouFillAgainWrapper {
            margin-right: 8px;
        }
        .thankYouDownloadPDFWrapper {
            display: flex;
            width: 100%;
            border-top: 1px solid;
            padding-top: 25px;
        }
        .thankYouPDFList {
            display: flex;
            width: 100%;
            padding: 0 16px;
            flex-wrap: wrap;
            margin: 0;
        }
        .pdf-image-wrapper {
            margin-right: 16px;
        }
        .downloadPDFItem {
            display: flex;
            align-items: center;
            list-style: none;
            width: 100%;

        }
        .downloadPDFItem:not(:last-child) {
            margin-bottom: 16px;
        }
        .downloadPDFItem .thankyou-btn-wrapper {
            margin-left: auto;
        }
        .pdf-name-wrapper {
            overflow: hidden;
            margin-right: 16px;
        }
        .pdf-name {
            font-size: 15px;
            white-space: nowrap;
            text-overflow: ellipsis;
            display: block;
            overflow: hidden;
            width: 100%;
            max-width: 350px;
        }
        #footer {
            text-align: left;
            margin: -35px auto 0;
            font-size: 14px;
            width: 100%;
        }

        #footer > div {
            box-shadow: 0 4px 4px -1px rgba(0,0,0,0.1);
            background-color: #fff;
            padding: 12px 15px;
            overflow: hidden;
        }

        #footer > div > div { padding: 10px 0 10px 5px }
    </style>
    <title>Thank You!</title>
</head>
<body class="thankyouMode">
<div class="jfForm-wrapper">
    <div class="jfForm-backgroundContainer">
        <div class="jfForm-videoBg">
            <!-- HTML5 Video -->
            <video autoplay="" loop="" id="video-background" muted="" style="display: none;">
                <source src="" type="video/mp4">
            </video>
            <!-- YouTube Video -->
            <div class="jfFormVideoBg-foreground" style="display: none;">
                <iframe src="" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <div class="jfForm-backgroundOverlay"></div>
    <div class="jfThankYou-wrapper">
        <div class="jfThankYou">
            <div class="jfThankYou-imageWrapper">
                <svg id="jfThankYou-type-svg" class="jfThankYou-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" style="display: none">
                    <circle class="jfThankYou-image-circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="jfThankYou-image-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
                <img id="jfThankYou-type-image" class="jfThankYou-image" src="https://cdn.jotfor.ms/img/check-icon.png" style="display: none;" />
                <h1 class="jfThankYou-header form-header">
                    Thank You!
                </h1>
                <div class="jfThankYou-description form-subHeader">
                    Your submission has been received!
                </div>
                <div class="thankyou-buttons">
                    <div></div>
                </div>
                <div class="jfThankYou-submLink"></div>
                <div class="jfThankYou-buttonWrapper" style="display: none;">
                    <button class="jfThankYou-button" id="jfCard-welcome-start">

                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="jfForm-footer"></div>
</body>
<script type="text/javascript">
    function sanitizeSVG(svg, isColoredIcon) {
        if (isColoredIcon) {
            var viewBoxFinder = new RegExp('(viewBox|enable-background)');
            var isThereAnyViewBox = viewBoxFinder.test(svg);
            if (isThereAnyViewBox === false) {
                var viewBoxString = 'viewBox="0 0 32 32" preserveAspectRatio="xMinYMin meet"';
                var fixerString = '<svg ' + viewBoxString;
                return svg.replace(/<svg/, fixerString);
            }
            return svg;
        }
        // Pattern below is for finding out which method is used in the Line Icon SVG file
        var fillOrStrokePattern = new RegExp('stroke="(?!none)', 'gi');
        var coloredStroke = fillOrStrokePattern.test(svg);
        var applyFillOrStroke = coloredStroke ? '<svg class="iconSvgStroke" fill="none" ' : '<svg class="iconSvgFill" stroke="none" ';
        return svg.replace(/'/g, '"')
            .replace(/(fill="|stroke=")(.+?)"/gi, '')
            .replace(/<!--[\s\S]*?-->/g, ' ')
            .replace(/<\?xml.*?>/, '')
            .replace(/id="([a-z0-9\-_]+)"/gi, '')
            .replace(/\s+/g, ' ')
            .replace(/<svg/, applyFillOrStroke)
            .trim();
    }

    function extractYoutubeVideoId(url) {
        var youtubeRegex = /^.*(youtu\.be\/|vi?\/|u\/\w\/|embed\/|\?vi?=|&vi?=)([^#&?]*).*/;
        var matches = url.match(youtubeRegex);
        if (matches && matches.length > 2) {
            return matches[2];
        }
        return url;
    }

    var imageSource = "https://cdn.jotfor.ms/img/check-icon.png";
    var sourceType = "Default";
    var isColoredIcon = false;
    var videoBgContainer = document.querySelector(".jfForm-videoBg");
    var thankYouIconSvg = document.getElementById('jfThankYou-type-svg');
    var thankYouIconImage = document.getElementById('jfThankYou-type-image');
    var videoType = "none";

    // Video background handlings
    if(videoType === 'youtube') {
        var youtubeContainer = document.querySelector('.jfFormVideoBg-foreground');
        youtubeContainer.style.display = 'block';
    } else if (videoType === 'html5') {
        var html5Container = document.getElementById('video-background');
        html5Container.style.display = 'block';
    }

    if(sourceType === 'JotFormIcon') {
        var svgContainer = document.createElement('div');
        svgContainer.className = 'iconSvg';
        svgContainer.setAttribute("style", "width: 100px; height: 100px; margin: 0 auto;");
        svgContainer.innerHTML = sanitizeSVG('', isColoredIcon);

        var svgNode = svgContainer.children[0];
        svgNode.setAttribute("style", "width: 100%; height: 90px;");
        svgNode.setAttribute("id", "jfThankYou-type-svg");

        thankYouIconSvg.replaceWith(svgContainer);
        thankYouIconImage.style.display = 'none';
    } else {
        var isDefault = imageSource.indexOf('img/check-icon.png') !== -1; // :(
        if (isDefault) {
            thankYouIconSvg.style.display = 'inline-block';
        } else {
            thankYouIconImage.style.display = 'inline-block';
        }
    }
    setTimeout(function() {
        window.parent.postMessage({ action: 'submission-completed' }, '*');
        window.parent.postMessage('exitFullscreen::211662730354047', '*');
    }, 1300);

    // Prevent duplicate submission on mobile safari, #2391271
    var isMobileSafari = (/.*(iphone|ipad|ipod).*1[1-9]_.*(version).*(safari)/i).test(window.navigator.userAgent);
    if (isMobileSafari) {
        var origin = 'https://www.jotform.com/';
        var url = origin + '211662730354047';
        // be sure of being same origin before using referrer
        if (document.referrer && document.referrer.indexOf(origin) !== -1) {
            url = document.referrer;
        }
        window.history.replaceState("", "", url);
    }
</script>


</html>
