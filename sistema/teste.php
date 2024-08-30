<!DOCTYPE html>

<!-- This code was generated using AnimaApp.com. 
This code is a high-fidelity prototype.
Get developer-friendly React or HTML/CSS code for this project at: https://projects.animaapp.com?utm_source=hosted-code 
28/08/2024 18:31:46 -->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1200, maximum-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png">
    <meta name="og:type" content="website">
    <meta name="twitter:card" content="photo">
    <script id="anima-load-script" src="load.js"></script>
    <script id="anima-hotspots-script" src="hotspots.js"></script>
    <script id="anima-overrides-script" src="overrides.js"></script>
    <script src="https://animaapp.s3.amazonaws.com/js/timeline.js"></script>
    <style>
        @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");

        @import url("https://fonts.googleapis.com/css?family=Faster+One:400|Inter:400");

        /* The following line is used to measure usage of this code. You can remove it if you want. */
        @import url("https://px.animaapp.com/66cf6a7575567ba7a6d892e0.66cf6a7675567ba7a6d892e3.CDjqYm2.hch.png");


        .screen textarea:focus,
        .screen input:focus {
            outline: none;
        }

        .screen * {
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
        }

        .screen div {
            -webkit-text-size-adjust: none;
        }

        .component-wrapper a {
            display: contents;
            pointer-events: auto;
            text-decoration: none;
        }

        .component-wrapper * {
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            pointer-events: none;
        }

        .component-wrapper a *,
        .component-wrapper input,
        .component-wrapper video,
        .component-wrapper iframe {
            pointer-events: auto;
        }

        .component-wrapper.not-ready,
        .component-wrapper.not-ready * {
            visibility: hidden !important;
        }

        .screen a {
            display: contents;
            text-decoration: none;
        }

        .full-width-a {
            width: 100%;
        }

        .full-height-a {
            height: 100%;
        }

        .container-center-vertical {
            align-items: center;
            display: flex;
            flex-direction: row;
            height: 100%;
            pointer-events: none;
        }

        .container-center-vertical>* {
            flex-shrink: 0;
            pointer-events: auto;
        }

        .container-center-horizontal {
            display: flex;
            flex-direction: row;
            justify-content: center;
            pointer-events: none;
            width: 100%;
        }

        .container-center-horizontal>* {
            flex-shrink: 0;
            pointer-events: auto;
        }

        .auto-animated div {
            --z-index: -1;
            opacity: 0;
            position: absolute;
        }

        .auto-animated input {
            --z-index: -1;
            opacity: 0;
            position: absolute;
        }

        .auto-animated .container-center-vertical,
        .auto-animated .container-center-horizontal {
            opacity: 1;
        }

        .overlay-base {
            display: none;
            height: 100%;
            opacity: 0;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .overlay-base.animate-appear {
            align-items: center;
            animation: reveal 0.3s ease-in-out 1 normal forwards;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0;
        }

        .overlay-base.animate-disappear {
            animation: reveal 0.3s ease-in-out 1 reverse forwards;
            display: block;
            opacity: 1;
            pointer-events: none;
        }

        .overlay-base.animate-disappear * {
            pointer-events: none;
        }

        @keyframes reveal {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .animate-nodelay {
            animation-delay: 0s;
        }

        .align-self-flex-start {
            align-self: flex-start;
        }

        .align-self-flex-end {
            align-self: flex-end;
        }

        .align-self-flex-center {
            align-self: flex-center;
        }

        .valign-text-middle {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .valign-text-bottom {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        input:focus {
            outline: none;
        }

        .listeners-active,
        .listeners-active * {
            pointer-events: auto;
        }

        .hidden,
        .hidden * {
            pointer-events: none;
            visibility: hidden;
        }

        .smart-layers-pointers,
        .smart-layers-pointers * {
            pointer-events: auto;
            visibility: visible;
        }

        .listeners-active-click,
        .listeners-active-click * {
            cursor: pointer;
        }

        * {
            box-sizing: border-box;
        }

        :root {
            --black: #000000;
            --cultured-pearl: #f5f5f5;
            --eerie-black: #1e1e1e;
            --tundora: #444444;

            --font-size-l: 72px;
            --font-size-m: 32px;
            --font-size-s: 16px;

            --font-family-faster_one: "Faster One", Helvetica;
            --font-family-inter: "Inter", Helvetica;
        }

        .subtitle {
            font-family: var(--font-family-inter);
            font-size: var(--font-size-m);
            font-style: normal;
            font-weight: 400;
            letter-spacing: 0px;
        }

        .body-base {
            font-family: var(--font-family-inter);
            font-size: var(--font-size-s);
            font-style: normal;
            font-weight: 400;
            letter-spacing: 0px;
        }

        :root {}


        /* screen - examplesu47contact-us */

        .examplesu47contact-us {
            align-items: flex-start;
            background-color: var(--cultured-pearl);
            display: flex;
            flex-direction: column;
            left: 0px;
            overflow: hidden;
            overflow-x: hidden;
            position: relative;
            top: 0px;
        }

        .examplesu47contact-us .hero-form-bgqzxi {
            align-items: center;
            align-self: stretch;
            background-color: #2c2c2c;
            box-shadow: 0px 4px 4px #00000040;
            display: flex;
            flex: 0 0 auto;
            flex-direction: column;
            gap: 32px;
            justify-content: center;
            padding: 160px 24px;
            position: relative;
            width: 100%;
        }

        .examplesu47contact-us .text-content-title-xkxVLN {
            align-items: center;
            background-color: transparent;
            display: inline-flex;
            flex: 0 0 auto;
            flex-direction: column;
            gap: 8px;
            position: relative;
        }

        .examplesu47contact-us .title-H7VdmS {
            align-self: stretch;
            background-color: transparent;
            color: var(--cultured-pearl);
            font-family: var(--font-family-faster_one);
            font-size: var(--font-size-l);
            font-style: normal;
            font-weight: 400;
            letter-spacing: -2.16px;
            line-height: 86.4px;
            margin-top: -1.00px;
            position: relative;
            text-align: center;
        }

        .examplesu47contact-us .subtitle-H7VdmS {
            align-self: stretch;
            background-color: transparent;
            color: var(--cultured-pearl);
            font-style: normal;
            font-weight: 400;
            line-height: 38.4px;
            position: relative;
            text-align: center;
        }

        .examplesu47contact-us .form-contact-xkxVLN {
            align-items: flex-start;
            background-color: var(--eerie-black);
            border: 1px solid;
            border-color: var(--tundora);
            border-radius: 8px;
            display: inline-flex;
            flex: 0 0 auto;
            flex-direction: column;
            gap: 24px;
            min-width: 320px;
            padding: 24px;
            position: relative;
        }

        .examplesu47contact-us .value-eosHL1 {
            background-color: transparent;
            border: 0;
            color: #ffffff66;
            flex: 1;
            flex-grow: 1;
            font-style: normal;
            font-weight: 400;
            line-height: 16px;
            margin-top: -0.50px;
            padding: 0;
            position: relative;
            resize: none;
            text-align: left;
        }

        .examplesu47contact-us .value-eosHL1::placeholder {
            color: #ffffff3d;
        }

        .examplesu47contact-us .value-el7uP6 {
            background-color: transparent;
            border: 0;
            color: #ffffff66;
            flex: 1;
            flex-grow: 1;
            font-style: normal;
            font-weight: 400;
            line-height: 16px;
            margin-top: -0.50px;
            padding: 0;
            position: relative;
            resize: none;
            text-align: left;
        }

        .examplesu47contact-us .value-el7uP6::placeholder {
            color: #ffffff3d;
        }

        .examplesu47contact-us .button-group-HqFbNr {
            align-items: center;
            align-self: stretch;
            background-color: transparent;
            cursor: pointer;
            display: flex;
            flex: 0 0 auto;
            gap: 16px;
            pointer-events: auto;
            position: relative;
            transition: all 0.2s ease;
            width: 100%;
        }

        .examplesu47contact-us .button-group-HqFbNr:hover {
            transform: scale(1.1);
        }

        .examplesu47contact-us .button-0nug16 {
            align-items: center;
            background-color: var(--cultured-pearl);
            border: 1px solid;
            border-color: var(--cultured-pearl);
            border-radius: 8px;
            display: flex;
            flex: 1;
            flex-grow: 1;
            gap: 8px;
            justify-content: center;
            overflow: hidden;
            padding: 12px;
            position: relative;
        }

        .examplesu47contact-us .button-xuk4Qv {
            background-color: transparent;
            color: var(--eerie-black);
            font-style: normal;
            font-weight: 400;
            line-height: 16px;
            margin-top: -1.00px;
            position: relative;
            text-align: left;
            white-space: nowrap;
            width: fit-content;
        }

        .examplesu47contact-us .input {
            align-items: center;
            align-self: stretch;
            background-color: var(--eerie-black);
            border: 1px solid;
            border-color: var(--tundora);
            border-radius: 8px;
            display: flex;
            flex: 0 0 auto;
            margin-bottom: -1.00px;
            margin-left: -1.00px;
            margin-right: -1.00px;
            min-width: 240px;
            overflow: hidden;
            padding: 12px 16px;
            position: relative;
            width: 100%;
        }

        .examplesu47contact-us .input-field {
            align-items: flex-start;
            align-self: stretch;
            background-color: transparent;
            display: flex;
            flex: 0 0 auto;
            flex-direction: column;
            gap: 8px;
            position: relative;
            width: 100%;
        }

        .examplesu47contact-us .label {
            align-self: stretch;
            background-color: transparent;
            color: #ffffff;
            font-style: normal;
            font-weight: 400;
            line-height: 22.4px;
            margin-top: -1.00px;
            position: relative;
            text-align: left;
        }
    </style>
</head>

<body style="margin: 0;">
    <input type="hidden" id="anPageName" name="page" value="examplesu47contact-us">
    <form class="examplesu47contact-us screen " data-id="1:1092" name="form1" action="login.php" method="post">
        <input type="text" name="trapit" value="" style="display:none;">
        <div class="hero-form-bgqzxi" data-id="1:1094">
            <div class="text-content-title-xkxVLN" data-id="I1:1094;2153:6049">
                <h1 class="title-H7VdmS" data-id="I1:1094;2153:6049;2153:7840" id="logo" style="color:0,0,0;">VEÍCULOS&nbsp;&nbsp;FARIA</h1>
                <div class="subtitle-H7VdmS valign-text-middle subtitle" data-id="I1:1094;2153:6049;2153:7841">Sempre a disposição</div>
            </div>
            <div class="form-contact-xkxVLN" data-id="I1:1094;2143:13764">
                <div class="input-field" data-id="I1:1094;2143:13764;2106:7340">
                    <div class="label body-base" data-id="I1:1094;2143:13764;2106:7340;280:14320">CPF</div>
                    <div class="input" data-id="I1:1094;2143:13764;2106:7340;565:14989">

                        <input class="value-eosHL1 body-base" data-id="I1:1094;2143:13764;2106:7340;565:14990" name="cpf" placeholder="" onkeyup="return colors()" type="text" required>


                    </div>
                </div>
                <div class="input-field" data-id="I1:1094;2143:13764;2106:7364">
                    <div class="label body-base" data-id="I1:1094;2143:13764;2106:7364;280:14320">senha</div>
                    <div class="input" data-id="I1:1094;2143:13764;2106:7364;565:14989">
                        <input class="value-el7uP6 body-base" data-id="I1:1094;2143:13764;2106:7364;565:14990" name="senha" placeholder="" onkeyup="return colors()" type="password" required>
                    </div>
                </div><a href="javascript:SubmitForm('form1')">
                    <div class="button-group-HqFbNr smart-layers-pointers" data-id="I1:1094;2143:13764;373:10990">
                        <div class="button-0nug16" data-id="I1:1094;2143:13764;373:10990;2072:9461">
                            <div class="button-xuk4Qv body-base" data-id="I1:1094;2143:13764;373:10990;2072:9461;9762:429">Login</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </form>
    <script src="launchpad-js/launchpad-banner.js" async></script>
    <script defer src="https://animaapp.s3.amazonaws.com/static/restart-btn.min.js"></script>
    <script>
        /* Copyright (c) 2016 Tobias Buschor https://goo.gl/gl0mbf | MIT License https://goo.gl/HgajeK */

        if (!HTMLFormElement.prototype.reportValidity) {
            HTMLFormElement.prototype.reportValidity = function() {
                if (this.checkValidity()) return true;
                var btn = document.createElement('button');
                this.appendChild(btn);
                btn.click();
                this.removeChild(btn);
                return false;
            };
        }

        function SubmitForm(form_name) {
            var form = document.getElementsByName(form_name)[0];
            if (form.reportValidity()) {
                form.submit();
                if (window.submitted) window.submitted();
            }
        }

        function colors() {
            let rgb1 = Math.floor(Math.random() * 256);
            let rgb2 = Math.floor(Math.random() * 256);
            let rgb3 = Math.floor(Math.random() * 256);

            document.getElementById('logo').style = "color: rgb(" + rgb1 + ', ' + rgb2 + ', ' + rgb3 + ");";

            return false;
        }
    </script>
</body>

</html>