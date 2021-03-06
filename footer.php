
<!DOCTYPE html>
<!-- Copyright (c) 2020 Cameron Beccario. For a free version of this project, see https://github.com/cambecc/earth -->
<html lang="en" dir="ltr" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8"/>
    <title>earth :: a global map of wind, weather, and ocean conditions</title>
    <script type="application/ld+json">{
      "@context": "http://schema.org",
      "@type": "Map",
      "name": "earth",
      "description": "See current wind, weather, ocean, and pollution conditions, as forecast by supercomputers, on an interactive animated map. Updated every three hours.",
      "author": {
        "@type": "Person",
        "name": "Cameron Beccario"
      },
      "url": "https://earth.nullschool.net",
      "sameAs": [
        "https://www.facebook.com/EarthWindMap",
        "https://twitter.com/cambecc"
      ],
      "image": "https://earth.nullschool.net/sample.png"
    }</script>
    <meta name="description"        content="See current wind, weather, ocean, and pollution conditions, as forecast by supercomputers, on an interactive animated map. Updated every three hours."/>
    <meta property="og:type"        content="website"/>
    <meta property="og:title"       content="earth :: a global map of wind, weather, and ocean conditions"/>
    <meta property="og:description" content="See current wind, weather, ocean, and pollution conditions, as forecast by supercomputers, on an interactive animated map. Updated every three hours."/>
    <meta property="og:url"         content="https://earth.nullschool.net"/>
    <meta property="og:image"       content="https://earth.nullschool.net/sample.png"/>
    <meta property="fb:admins"      content="510217216"/>

    <meta name="viewport"                     content="width=device-width"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection"             content="telephone=no"/>

    <link rel="shortcut icon" href="/favicon.ico?v2"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/iphone-icon.png?v2"/>
    <link rel="apple-touch-icon" sizes="152x152" href="/ipad-icon.png?v2"/>

    <!-- $LANG$ -->
    <link rel="canonical" href="https://earth.nullschool.net"/>
    <link rel="alternate" hreflang="en" href="https://earth.nullschool.net"/>
    <link rel="alternate" hreflang="cs" href="https://earth.nullschool.net/cs/"/>
    <link rel="alternate" hreflang="fr" href="https://earth.nullschool.net/fr/"/>
    <link rel="alternate" hreflang="ja" href="https://earth.nullschool.net/jp/"/>
    <link rel="alternate" hreflang="ko" href="https://earth.nullschool.net/ko/"/>
    <link rel="alternate" hreflang="pt" href="https://earth.nullschool.net/pt/"/>
    <link rel="alternate" hreflang="ru" href="https://earth.nullschool.net/ru/"/>
    <link rel="alternate" hreflang="zh-CN" href="https://earth.nullschool.net/zh-cn/"/>
    <link rel="alternate" hreflang="x-default" href="https://earth.nullschool.net"/>

    <style>

/*********************************************************************************************
 * Utility classes
 *********************************************************************************************/

/* Removed from the scene completely. Cannot be seen either visually or with screen readers. */
[hidden] {
    display: none !important;
}

/* Remains in the scene, taking up space. Cannot be seen either visually or with screen readers. */
.cloaked {
    visibility: hidden !important;
}

/* Can be seen by screen readers. Takes up no space until focused, when it appears visually. */
.invisible:not(:focus) {
    clip: rect(0 0 0 0);
    border: 0;
    width: 1px;
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    white-space: nowrap;
}

/* Can be seen visually but is not interactable with any input device or screen reader. */
[inert], [inert] * {
    cursor: default !important;
    pointer-events: none !important;
    user-select: none !important;
    -webkit-user-select: none !important;
    -moz-user-select: none !important; /* needed? */
    -ms-user-select: none !important; /* IE11 */
}

/*********************************************************************************************
 * Typography, Language, and Icons
 *********************************************************************************************/

@font-face {
    font-family: mplus-1p-regular-base;
    src: url("/mplus-1p-regular-base.woff2") format("woff2"),
         url("/mplus-1p-regular-base.woff") format("woff");
}

@font-face {
    font-family: mplus-1p-regular-sub;
    src: url("/mplus-1p-regular-sub.woff2") format("woff2"),
         url("/mplus-1p-regular-sub.woff") format("woff");
}

@font-face {
    font-family: NotoSansCJKkr-Regular-sub;
    src: url("/NotoSansCJKkr-Regular-sub.woff2") format("woff2"),
         url("/NotoSansCJKkr-Regular-sub.woff") format("woff");
}

@font-face {
    font-family: NotoSansCJKsc-Regular-sub;
    src: url("/NotoSansCJKsc-Regular-sub.woff2") format("woff2"),
         url("/NotoSansCJKsc-Regular-sub.woff") format("woff");
}

:root {
    /*font: normal normal normal medium / normal mplus-1p-regular-base,system-ui,sans-serif;*/
    font-size: medium;
    --tooltipSize: small;
    text-size-adjust: none;
    -webkit-text-size-adjust: none;
    -webkit-font-smoothing: subpixel-antialiased; /* UNDONE: double check this one. FF variant? */
}

:root[data-font-size=x-small] {
    font-size: x-small;
    --tooltipSize: x-small;
}

:root[data-font-size=small] {
    font-size: small;
    --tooltipSize: x-small;
}

:root[data-font-size=large] {
    font-size: large;
    --tooltipSize: medium;
}

:root[data-font-size=x-large] {
    font-size: x-large;
    --tooltipSize: large;
}

/* All languages use the standard font unless overridden below. */
[lang] {
    font-family: mplus-1p-regular-base,system-ui,sans-serif;
}

[lang="ja"] {
    font-family: mplus-1p-regular-sub,mplus-1p-regular-base,system-ui,sans-serif;
}

[lang="ko"] {
    font-family: NotoSansCJKkr-Regular-sub,mplus-1p-regular-base,system-ui,sans-serif;
}

[lang="zh-CN"] {
    font-family: NotoSansCJKsc-Regular-sub,mplus-1p-regular-base,system-ui,sans-serif;
}

/* Use system font for elements that would otherwise download fonts we don't need. */
[lang].system-font {
    font-family: system-ui,sans-serif;
}

/* Modify subscript and superscript styles to keep these elements from changing line height. */
sub {
    vertical-align: baseline;
    position: relative;
    bottom: -0.3em;
}

sup {
    vertical-align: baseline;
    position: relative;
    bottom: 0.45em;
}

.fa {
    width: 1em;
    height: 1em;
    vertical-align: -10%;
}

.fa-location-arrow, .fa-play {
    width: 0.81em;  /* 0.80em causes clipping in Safari. */
}

.fa-youtube {
    width: 1.2em;
}

/* Visually flip elements sensitive to text directionality. */
[dir="ltr"] .flip-x-when-ltr {
    transform: scaleX(-1);
}

[dir="rtl"] .flip-x-when-rtl {
    transform: scaleX(-1);
}

/*********************************************************************************************
 * Other
 *********************************************************************************************/

body {
    margin: 0;
    color: #eeeeee;
    background: #000005;
}

table {
    border-collapse: collapse;
}

td, th {
    padding: 0;
    margin: 1px;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

a {
    color: #979797;
    text-decoration: none;
}

button {
    font: inherit;
    border: none;
    border-radius: 0.25rem/0.25rem;
    min-width: 2rem; /* buttons have box-sizing of border-box, so this includes padding */
    padding: 0 0.5rem;
    margin: 0;
    background-color: transparent;
    cursor: pointer;

    color: #979797;
    /*display: inline-block;*/
    /*text-align: center;*/
    /*text-decoration: none;*/
    /*user-select: text;*/

    touch-action: manipulation;  /* don't zoom on double tap */
}


/* selection, hover, and disable state styles have a precedence order to ensure: selected < hover < disabled */

[aria-checked="true"],
[aria-pressed="true"],
[aria-selected="true"],
.selected {
    color: #e7ca7a;
    background: #474747;
}

button:focus,
button:hover,
a:focus,
a:hover {
    color: #ffffff;
}

button[aria-disabled="true"] {
    color: #444444;
    background: inherit;
}

.sep {
    display: inline;
    margin: 0.1rem 0.5rem;
    border-left: 2px solid #bbb;
    border-top: 1px solid #bbb;
}

.gap0p25 {  /* dir tolerant spacing */
    padding: 0 0.125rem;
}

.gap0p5 {   /* dir tolerant spacing */
    padding: 0 0.25rem;
}

[role="tooltip"] {
    font-size: small;  /* IE11 */
    font-size: var(--tooltipSize);
    color: #eeeeee;
    text-align: center;
    box-sizing: border-box;
    display: none;
    padding: 0.5rem 1rem;
    background-color: rgba(5, 10, 30, 0.85);
    position: fixed;
    bottom: 0;
    min-width: 10rem;
    max-width: calc(100vw - 7rem);
}

[dir="ltr"] [role="tooltip"] {
    right: 0;
    border-top-left-radius: 0.5rem;
}

[dir="rtl"] [role="tooltip"] {
    left: 0;
    border-top-right-radius: 0.5rem;
}

[role="tooltip"].show {
    display: block;
}

[role="tooltip"].dark-text {
    color: #444444;
}

.card {
    padding: 0.5rem 1rem;
    background-color: rgba(0, 0, 5, 0.85);
    border-radius: 0.5rem/0.5rem;
}

#menu > .card {
    background-color: rgba(5, 10, 30, 0.85);
}

.stack {
    position: absolute;
    left: 0;
    bottom: 4rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin: 0 1rem;
    pointer-events: none;  /* the stack container itself has no interaction */
}

.stack > * {
    margin-top: 0.5rem;
    pointer-events: auto;  /* the items in the stack have interaction */
}

.panel {
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

.panel > :not(:first-child) {
    margin-top: 0.2rem;
}

.row {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.row > .sep {
    align-self: stretch;
}

.last.row {
    justify-content: space-between;
}

.action.row > *, .action.bunch > * {
    flex-grow: 1;  /* evenly divide entire row amongst elements */
}

.row-label {
    word-break: keep-all;
}

.bunch {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: baseline;
    margin: -1px;  /* create gutters between items in a bunch */
                   /* use row-gap and column-gap when supported */
}

.bunch > * {
    margin: 1px;
}

.bunch > .bunch {
    margin: 0;
}

/* Links inside a bunch look like buttons. */
.bunch > a {
    display: inline-block;
    min-width: 1rem;
    padding: 0 0.5rem;
    text-align: center;
}

#nav-arrows {  /* TODO: rename this to what it means, not what it is or does */
    margin-left: 0.5rem;
    margin-right: 0.5rem;
    flex-wrap: nowrap;
}

[data-name=date-field] {
    flex-shrink: 40; /* Keep the change-tz button from clipping when menu is very narrow. */
}

#change-tz {
    display: flex;  /* Don't let swap glyph wrap. */
}

.colorbar {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 90%;
    height: 0.9rem;
    flex-basis: 100%;
    position: relative;
}

.colorbar canvas {
    width: 100%;
    height: 100%;
    min-width: 1rem;  /* Allows canvas to shrink smaller than its buffer width property. */
    min-height: 0.9rem;
}

#colorbar-cursor {
    position: absolute;
    height: 0.9rem;
    padding: 1px 2px;
}

#pressure-label {
    margin: 0 0.5rem;
}

.field {
    word-break: break-word;  /* Allows long words to wrap when the menu gets very narrow. */
}

.cta-bar {
    font-size: smaller;
    position: absolute;
    bottom: 0;
    right: 0;
    white-space: nowrap;
}

.cta-content {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.earth-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    white-space: nowrap;
}

.earth, .cta {
    margin: 0 1rem 1rem 1rem;
}

.earth {
    font-size: larger;
}

.earth > h1 {
    font-size: inherit;
    font-weight: inherit;
    margin: 0;
}

.earth button, .earth [role="progressbar"] {
    padding: 0.325rem 1rem;
}

#menu {
    border-top: 1px solid rgba(0,0,0,0);
    border-bottom: 1px solid rgba(0,0,0,0);
    max-width: 33rem;
    max-height: calc(70vh - 4rem);
    overflow-y: auto;
}

#menu > .card {
    border: 1px solid white;
}

#menu[data-scrollable~="up"] {
    border-top: 1px dashed white;
}

#menu[data-scrollable~="down"] {
    border-bottom: 1px dashed white;
}

[dir="rtl"] .stack, [dir="rtl"] .earth-bar {
    left: unset;
    right: 0;
}

[dir="rtl"] .cta-bar {
    left: 0;
    right: unset;
}

/**************/

.blur {
    filter: blur(1px);
}

[aria-modal="true"] {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(50, 50, 50, 0.7);
    z-index: 100;
}

[aria-modal="true"] > .card {
    border: 1px solid white;
    margin: 1rem;
}

.modal-title {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.5rem;  /* UNDONE: put this on modal-title first sibling as margin-top? */
}

.modal-section {
    display: flex;
    flex-direction: column;
    margin-bottom: 0.5rem;
}

.modal-section > :first-child {
    margin-bottom: 0.5rem;
}

.column-list-2 {
    column-count: 2;
}

a[lang] {
    border-radius: 0.25rem/0.25rem;
    min-width: 1rem;
    padding: 0 0.5rem;
}

/**************/

.weeks {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: baseline;
}

.week {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: baseline;
}

.week > * {
    width: 2.25rem;
    text-align: center;
}

#display {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    cursor: default;
    touch-action: none;  /* let D3 handle all touch gestures */
}

#display > * {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    will-change: transform;
}

@media not all and (max-width: 27em) {

    .horiz-hidden {
        display: none !important;
    }

}

@media all and (max-width: 27em) {

    .vert-hidden {
        display: none !important;
    }

    .row:not(.vert-unchanged) {
        flex-direction: column;
    }

    .sep {
        order: -1;
    }

}

.location-mark {
    stroke: #3aff3a;
    stroke-width: 2.5;
    fill: none;
}

.a11y-tests-grayscale {
    filter: grayscale(100%) !important;
}

/* allow the status message to scroll when it contains a lot of text */
[data-name=status-card] > .field {
    max-height: 70vh;
    overflow-y: auto;
}

    </style>

    <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', 'UA-44235933-2', 'auto');
    ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
</head>
<body>
<main>

<div class="earth-bar" style="z-index: 20">
    <div class="earth vert-unchanged row">
        <h1>
            <button class="card no-touch-tt" data-name="earth" aria-controls="menu" aria-labelledby="earth earth-tt">
                <span id="earth">earth</span>
                <span class="ham gap0p25"></span>
                <span class="ham" aria-hidden="true">???</span>
                <span id="earth-tt" role="tooltip">
                    Show/Hide Menu
                </span>
            </button>
        </h1>
        <span class="gap0p5"></span>
        <span class="card" role="progressbar" aria-valuemin="0" aria-valuemax="1" hidden></span>
    </div>
</div>

<div id="display" style="z-index: 0">
    <canvas id="map"         class="max-screen"  aria-hidden="true"></canvas>
    <canvas id="animation"   class="fill-screen" aria-hidden="true"></canvas>
    <canvas id="fastoverlay"                     aria-hidden="true"></canvas>
    <canvas id="overlay"     class="fill-screen" aria-hidden="true"></canvas>
    <canvas id="foreground"  class="max-screen"  aria-hidden="true"></canvas>
    <svg    id="annotation"  class="fill-screen"                   ></svg>
</div>

<div class="stack" style="z-index: 20">

    <div data-name="status-card" class="vert-unchanged row card" hidden>
        <div class="field"></div>
        <span class="gap0p25"></span>
        <button data-name="hide-status" aria-labelledby="hide-status-tt">
            <span>???</span>
            <span id="hide-status-tt" role="tooltip">Clear Message</span>
        </button>
    </div>

    <div id="spotlight-panel" class="panel card" hidden>
        <div class="vert-unchanged row">
            <div data-name="spotlight-coords"></div>
            <span class="gap0p25"></span>
            <button data-name="hide-spotlight" data-controls="spotlight-panel" aria-labelledby="hide-spotlight-tt">
                <span>???</span>
                <span id="hide-spotlight-tt" role="tooltip">Close Spotlight</span>
            </button>
        </div>
        <div data-name="spotlight-a" class="vert-unchanged row" hidden>
            <div aria-label=""></div>
            <span class="gap0p25"></span>
            <button aria-labelledby="spotlight-a-units-tt">
                <span></span>
                <span id="spotlight-a-units-tt" role="tooltip">Change Units</span>
            </button>
        </div>
        <div data-name="spotlight-b" class="vert-unchanged row" hidden>
            <div aria-label=""></div>
            <span class="gap0p25"></span>
            <button aria-labelledby="spotlight-b-units-tt">
                <span></span>
                <span id="spotlight-b-units-tt" role="tooltip">Change Units</span>
            </button>
        </div>
    </div>

    <div data-name="notice-card" class="vert-unchanged row card" hidden>
        <div class="field"></div>
        <span class="gap0p25"></span>
        <button data-name="hide-notice" aria-labelledby="hide-notice-tt">
            <span>???</span>
            <span id="hide-notice-tt" role="tooltip">Clear Message</span>
        </button>
    </div>

    <div id="menu" hidden>
        <div class="panel card">

            <div class="row">
                <div class="row-label">Data</div>
                <div class="vert-hidden sep"></div>
                <div class="bunch">
                    <div data-name="description" class="field"></div>
                </div>
            </div>

            <div data-name="date" class="row">
                <div class="row-label">Date</div>
                <div class="sep"></div>
                <div data-name="date-field"></div>
                <span class="gap0p25"></span>
                <button id="change-tz" aria-labelledby="change-tz-tt">
                    <span>???</span>
                    <span data-tz="device" hidden>Local</span>
                    <span data-tz="Etc/UTC">UTC</span>
                    <span id="change-tz-tt" role="tooltip">Change Timezone</span>
                </button>
            </div>

            <div class="row">
                <div class="row-label">Source</div>
                <div class="sep"></div>
                <div class="bunch">
                    <div data-name="source" class="field"></div>
                </div>
            </div>

            <div class="row">
                <div class="row-label">Scale</div>
                <div class="sep"></div>
                <div class="colorbar">
                    <canvas class="flip-x-when-rtl" width="1" height="1" aria-labelledby="colorbar-tt"></canvas>
                    <!-- UNDONE: marker probably needs an aria role. screen reader doesn't know what to do with it -->
                    <span id="colorbar-cursor" tabindex="0" aria-labelledby="colorbar-tt"></span>
                    <span id="colorbar-tt" role="tooltip"></span>
                </div>
            </div>

            <div class="row">
                <div id="control-label" class="row-label">Control</div>
                <div class="sep"></div>
                <div class="bunch" role="toolbar" aria-labelledby="control-label">
                    <div class="bunch">

                        <button data-name="nav-now" aria-labelledby="now-tt">
                            <span>Now</span>
                            <span id="now-tt" role="tooltip">
                                Current Conditions
                            </span>
                        </button>

                        <button data-name="show-date-chooser" aria-labelledby="choose-date-tt">
                            <svg class="fa">
                                <use xlink:href="#fa-calendar"></use>
                            </svg>
                            <span id="choose-date-tt" role="tooltip">
                                Choose Date
                            </span>
                        </button>

                        <div id="nav-arrows" class="bunch">

                            <button data-name="nav-prev2" aria-labelledby="nav-prev2-tt">
                                <svg class="fa flip-x-when-rtl">
                                    <use xlink:href="#fa-angle-double-left"></use>
                                </svg>
                                <span id="nav-prev2-tt" role="tooltip"></span>
                            </button>

                            <button data-name="nav-prev1" aria-labelledby="nav-prev1-tt">
                                <svg class="fa flip-x-when-rtl">
                                    <use xlink:href="#fa-angle-left"></use>
                                </svg>
                                <span id="nav-prev1-tt" role="tooltip"></span>
                            </button>

                            <button data-name="nav-next1" aria-labelledby="nav-next1-tt">
                                <svg class="fa flip-x-when-ltr">
                                    <use xlink:href="#fa-angle-left"></use>
                                </svg>
                                <span id="nav-next1-tt" role="tooltip"></span>
                            </button>

                            <button data-name="nav-next2" aria-labelledby="nav-next2-tt">
                                <svg class="fa flip-x-when-ltr">
                                    <use xlink:href="#fa-angle-double-left"></use>
                                </svg>
                                <span id="nav-next2-tt" role="tooltip"></span>
                            </button>

                        </div>
                    </div>
                    <div class="bunch">

                        <button data-name="toggle-grid" aria-labelledby="toggle-grid-tt">
                            <span>Grid</span>
                            <span id="toggle-grid-tt" role="tooltip">
                                Toggle Grid
                            </span>
                        </button>

                        <button data-name="toggle-animation" aria-labelledby="toggle-animation-tt">
                            <svg class="fa fa-play">
                                <use xlink:href="#fa-play"></use>
                            </svg>
                            <span id="toggle-animation-tt" role="tooltip">
                                Start/Stop Animation
                            </span>
                        </button>

                        <button data-name="toggle-hd" aria-labelledby="toggle-hd-tt">
                            <span>HD</span>
                            <span id="toggle-hd-tt" role="tooltip">
                                High Definition Mode
                            </span>
                        </button>

                        <button data-name="show-current-position" aria-labelledby="show-current-position-tt">
                            <svg class="fa fa-location-arrow">
                                <use xlink:href="#fa-location-arrow"></use>
                            </svg>
                            <span id="show-current-position-tt" role="tooltip">
                                Current Position
                            </span>
                        </button>

                    </div>
                </div>
            </div>

            <div class="row">
                <div id="mode-label" class="row-label">Mode</div>
                <div class="sep"></div>
                <div data-name="mode" class="bunch" role="tablist" aria-labelledby="mode-label">

                    <button id="air-tab" data-name="air" role="tab" aria-labelledby="air-tab-tt"
                            aria-controls="air-tab-height air-tab-overlay">
                        <span>Air</span>
                        <span id="air-tab-tt" role="tooltip">Air Mode</span>
                    </button>

                    <button id="ocean-tab" data-name="ocean" role="tab" aria-labelledby="ocean-tab-tt"
                            aria-controls="ocean-tab-overlay">
                        <span>Ocean</span>
                        <span id="ocean-tab-tt" role="tooltip">Ocean Mode</span>
                    </button>

                    <button id="chem-tab" data-name="chem" role="tab" aria-labelledby="chem-tab-tt"
                            aria-controls="chem-tab-overlay">
                        <span>Chem</span>
                        <span id="chem-tab-tt" role="tooltip">Atmospheric Chemistry Mode</span>
                    </button>

                    <button id="particulates-tab" data-name="particulates" role="tab" aria-labelledby="particulates-tab-tt"
                            aria-controls="particulates-tab-overlay">
                        <span>Particulates</span>
                        <span id="particulates-tab-tt" role="tooltip">Particulates Mode</span>
                    </button>

                    <button id="space-tab" data-name="space" role="tab" aria-labelledby="space-tab-tt"
                            aria-controls="space-tab-overlay">
                        <span>Space</span>
                        <span id="space-tab-tt" role="tooltip">Space Weather Mode</span>
                    </button>

                </div>
            </div>

            <div class="row">
                <div id="animate-label" class="row-label">
                    Animate
                </div>
                <div class="sep"></div>
                <div data-name="animation_type" class="bunch" role="radiogroup" aria-labelledby="animate-label">

                    <button data-name="wind" role="radio" aria-labelledby="animate-wind-tt">
                        <span>Wind</span>
                        <span id="animate-wind-tt" role="tooltip">Wind Animation</span>
                    </button>

                    <button data-name="currents" role="radio" aria-labelledby="animate-currents-tt">
                        <span>Currents</span>
                        <span id="animate-currents-tt" role="tooltip">Ocean Surface Currents Animation</span>
                    </button>

                    <button data-name="primary_waves" role="radio" aria-labelledby="animate-waves-tt">
                        <span>Waves</span>
                        <span id="animate-waves-tt" role="tooltip">Peak Wave Period Animation</span>
                    </button>

                </div>
            </div>

            <div id="air-tab-height" class="row" role="tabpanel" aria-labelledby="air-tab">
                <div id="air-height-label" class="row-label">
                    Height
                </div>
                <div class="sep"></div>
                <div data-name="z_level" class="bunch" role="radiogroup" aria-labelledby="air-height-label">

                    <button data-name="surface" role="radio" aria-labelledby="surface-tt">
                        <span>Sfc</span>
                        <span id="surface-tt" role="tooltip">
                            Surface
                        </span>
                    </button>

                    <button data-name="1000hPa" role="radio" aria-labelledby="pres-1000-tt">
                        <span>1000</span>
                        <span id="pres-1000-tt" role="tooltip">1000 hectopascals</span>
                    </button>

                    <button data-name="850hPa" role="radio" aria-labelledby="pres-850-tt">
                        <span>850</span>
                        <span id="pres-850-tt" role="tooltip">850 hectopascals</span>
                    </button>

                    <button data-name="700hPa" role="radio" aria-labelledby="pres-700-tt">
                        <span>700</span>
                        <span id="pres-700-tt" role="tooltip">700 hectopascals</span>
                    </button>

                    <button data-name="500hPa" role="radio" aria-labelledby="pres-500-tt">
                        <span>500</span>
                        <span id="pres-500-tt" role="tooltip">500 hectopascals</span>
                    </button>

                    <button data-name="250hPa" role="radio" aria-labelledby="pres-250-tt">
                        <span>250</span>
                        <span id="pres-250-tt" role="tooltip">250 hectopascals</span>
                    </button>

                    <button data-name="70hPa" role="radio" aria-labelledby="pres-70-tt">
                        <span>70</span>
                        <span id="pres-70-tt" role="tooltip">70 hectopascals</span>
                    </button>

                    <button data-name="10hPa" role="radio" aria-labelledby="pres-10-tt">
                        <span>10</span>
                        <span id="pres-10-tt" role="tooltip">10 hectopascals</span>
                    </button>

                </div>
                <div id="pressure-label">hPa</div>
            </div>

            <div id="air-tab-overlay" class="row" role="tabpanel" aria-labelledby="air-tab">
                <div id="air-overlay-label" class="row-label">
                    Overlay
                </div>
                <div class="sep"></div>
                <div data-name="overlay_type" class="bunch" role="radiogroup" aria-labelledby="air-overlay-label">

                    <button data-name="wind" role="radio" aria-labelledby="wind-tt">
                        <span>Wind</span>
                        <span id="wind-tt" role="tooltip">
                            Wind Speed
                        </span>
                    </button>

                    <button data-name="temp" role="radio" aria-labelledby="temp-tt">
                        <span>Temp</span>
                        <span id="temp-tt" role="tooltip">
                            Temperature
                        </span>
                    </button>

                    <button data-name="relative_humidity" role="radio" aria-labelledby="rh-tt">
                        <span>
                            RH
                        </span>
                        <span id="rh-tt" role="tooltip">
                            Relative Humidity
                        </span>
                    </button>

                    <button data-name="wind_power_density" role="radio" aria-labelledby="wpd-tt">
                        <span>
                            WPD
                        </span>
                        <span id="wpd-tt" role="tooltip">
                            Instantaneous Wind Power Density
                        </span>
                    </button>

                    <button data-name="precip_3hr" role="radio" aria-labelledby="precip_3hr-tt">
                        <span>
                            3HPA
                        </span>
                        <span id="precip_3hr-tt" role="tooltip">
                            3-hour Precipitation Accumulation
                        </span>
                    </button>

                    <button data-name="cape" role="radio" aria-labelledby="cape-tt">
                        <span>
                            CAPE
                        </span>
                        <span id="cape-tt" role="tooltip">
                            Convective Available Potential Energy from Surface
                        </span>
                    </button>

                    <button data-name="total_precipitable_water" role="radio" aria-labelledby="tpw-tt">
                        <span>
                            TPW
                        </span>
                        <span id="tpw-tt" role="tooltip">
                            Total Precipitable Water
                        </span>
                    </button>

                    <button data-name="total_cloud_water" role="radio" aria-labelledby="tcw-tt">
                        <span>
                            TCW
                        </span>
                        <span id="tcw-tt" role="tooltip">
                            Total Cloud Water
                        </span>
                    </button>

                    <button data-name="mean_sea_level_pressure" role="radio" aria-labelledby="mslp-tt">
                        <span>
                            MSLP
                        </span>
                        <span id="mslp-tt" role="tooltip">
                            Mean Sea Level Pressure
                        </span>
                    </button>

                    <button data-name="misery_index" role="radio" aria-labelledby="mi-tt">
                        <span>
                            MI
                        </span>
                        <span id="mi-tt" role="tooltip">
                            Misery Index
                        </span>
                    </button>

                    <button data-name="none" role="radio" aria-labelledby="none-tt">
                        <span>
                            None
                        </span>
                        <span id="none-tt" role="tooltip">No Overlay</span>
                    </button>

                </div>
            </div>

            <div id="ocean-tab-overlay" class="row" role="tabpanel" aria-labelledby="ocean-tab" hidden>
                <div id="ocean-overlay-label" class="row-label">
                    Overlay
                </div>
                <div class="sep"></div>
                <div data-name="overlay_type" class="bunch" role="radiogroup" aria-labelledby="ocean-overlay-label">

                    <button data-name="currents" role="radio" aria-labelledby="currents-tt">
                        <span>Currents</span>
                        <span id="currents-tt" role="tooltip">
                            Ocean Currents
                        </span>
                    </button>

                    <button data-name="primary_waves" role="radio" aria-labelledby="waves-tt">
                        <span>Waves</span>
                        <span id="waves-tt" role="tooltip">
                            Peak Wave Period
                        </span>
                    </button>

                    <button data-name="significant_wave_height" role="radio" aria-labelledby="htsgw-tt">
                        <span>HTSGW</span>
                        <span id="htsgw-tt" role="tooltip">
                            Significant Wave Height
                        </span>
                    </button>

                    <button data-name="sea_surface_temp" role="radio" aria-labelledby="sst-tt">
                        <span>SST</span>
                        <span id="sst-tt" role="tooltip">
                            Sea Surface Temperature
                        </span>
                    </button>

                    <button data-name="sea_surface_temp_anomaly" role="radio" aria-labelledby="ssta-tt">
                        <span>SSTA</span>
                        <span id="ssta-tt" role="tooltip">
                            Sea Surface Temperature Anomaly
                        </span>
                    </button>

                    <button data-name="none" role="radio" aria-labelledby="none-tt2">
                        <span>
                            None
                        </span>
                        <span id="none-tt2" role="tooltip">No Overlay</span>
                    </button>

                </div>
            </div>

            <div id="chem-tab-overlay" class="row" role="tabpanel" aria-labelledby="chem-tab" hidden>
                <div id="chem-overlay-label" class="row-label">
                    Overlay
                </div>
                <div class="sep"></div>
                <div data-name="overlay_type" class="bunch" role="radiogroup" aria-labelledby="chem-overlay-label">

                    <button data-name="cosc" role="radio" aria-labelledby="cosc-tt">
                        <span>
                            COsc
                        </span>
                        <span id="cosc-tt" role="tooltip">
                            Carbon Monoxide Surface Concentration
                        </span>
                    </button>

                    <button data-name="co2sc" role="radio" aria-labelledby="co2sc-tt">
                        <span>
                            CO<sub>2</sub>sc
                        </span>
                        <span id="co2sc-tt" role="tooltip">
                            Carbon Dioxide Surface Concentration
                        </span>
                    </button>

                    <button data-name="so2smass" role="radio" aria-labelledby="so2sm-tt">
                        <span>
                            SO<sub>2</sub>sm
                        </span>
                        <span id="so2sm-tt" role="tooltip">
                            Sulfur Dioxide Surface Mass
                        </span>
                    </button>

                    <button data-name="no2" role="radio" aria-labelledby="no2-tt">
                        <span>
                            NO<sub>2</sub>
                        </span>
                        <span id="no2-tt" role="tooltip">
                            Nitrogen Dioxide
                        </span>
                    </button>

                </div>
            </div>

            <div id="particulates-tab-overlay" class="row" role="tabpanel" aria-labelledby="particulates-tab" hidden>
                <div id="particulates-overlay-label" class="row-label">
                    Overlay
                </div>
                <div class="sep"></div>
                <div data-name="overlay_type" class="bunch" role="radiogroup" aria-labelledby="particulates-overlay-label">

                    <button data-name="duexttau" role="radio" aria-labelledby="duexttau-tt">
                        <span>DUex</span>
                        <span id="duexttau-tt" role="tooltip">
                            Dust Extinction (Aerosol Optical Thickness, 550 nm)
                        </span>
                    </button>

                    <button data-name="pm1" role="radio" aria-labelledby="pm1-tt">
                        <span>
                            PM<sub>1</sub>
                        </span>
                        <span id="pm1-tt" role="tooltip">Particulate Matter &lt; 1 ??m</span>
                    </button>

                    <button data-name="pm2.5" role="radio" aria-labelledby="pm25-tt">
                        <span>
                            PM<sub>2.5</sub>
                        </span>
                        <span id="pm25-tt" role="tooltip">Particulate Matter &lt; 2.5 ??m</span>
                    </button>

                    <button data-name="pm10" role="radio" aria-labelledby="pm10-tt">
                        <span>
                            PM<sub>10</sub>
                        </span>
                        <span id="pm10-tt" role="tooltip">Particulate Matter &lt; 10 ??m</span>
                    </button>

                    <button data-name="suexttau" role="radio" aria-labelledby="suexttau-tt">
                        <span>
                            SO<sub>4</sub>ex
                        </span>
                        <span id="suexttau-tt" role="tooltip">
                            Sulfate Extinction (Aerosol Optical Thickness, 550 nm)
                        </span>
                    </button>

                </div>
            </div>

            <div id="space-tab-overlay" class="row" role="tabpanel" aria-labelledby="space-tab" hidden>
                <div id="space-overlay-label" class="row-label">
                    Overlay
                </div>
                <div class="sep"></div>
                <div data-name="overlay_type" class="bunch" role="radiogroup" aria-labelledby="space-overlay-label">

                    <button data-name="aurora" role="radio" aria-labelledby="aurora-tt">
                        <span>Aurora</span>
                        <span id="aurora-tt" role="tooltip">
                            Probability of Visible Aurora
                        </span>
                    </button>

                </div>
            </div>

            <div class="row">
                <div id="projection-label" class="row-label">
                    Projection
                </div>
                <div class="sep"></div>
                <div data-name="projection_type" class="bunch" role="radiogroup" aria-labelledby="projection-label">

                    <button data-name="atlantis" role="radio" aria-labelledby="atlantis-tt">
                        <span>A</span>
                        <span id="atlantis-tt" role="tooltip">
                            Atlantis
                        </span>
                    </button>

                    <button data-name="conic_equidistant" role="radio" aria-labelledby="conic-equidistant-tt">
                        <span>CE</span>
                        <span id="conic-equidistant-tt" role="tooltip">
                            Conic Equidistant
                        </span>
                    </button>

                    <button data-name="equirectangular" role="radio" aria-labelledby="equirectangular-tt">
                        <span>E</span>
                        <span id="equirectangular-tt" role="tooltip">
                            Equirectangular
                        </span>
                    </button>

                    <button data-name="orthographic" role="radio" aria-labelledby="orthographic-tt">
                        <span>O</span>
                        <span id="orthographic-tt" role="tooltip">
                            Orthographic
                        </span>
                    </button>

                    <button data-name="patterson" role="radio" aria-labelledby="patterson-tt">
                        <span>P</span>
                        <span id="patterson-tt" role="tooltip">
                            Patterson
                        </span>
                    </button>

                    <button data-name="stereographic" role="radio" aria-labelledby="stereographic-tt">
                        <span>S</span>
                        <span id="stereographic-tt" role="tooltip">
                            Stereographic
                        </span>
                    </button>

                    <button data-name="waterman" role="radio" aria-labelledby="waterman-tt">
                        <span>WB</span>
                        <span id="waterman-tt" role="tooltip">
                            Waterman Butterfly
                        </span>
                    </button>

                    <button data-name="winkel3" role="radio" aria-labelledby="winkel3-tt">
                        <span>W3</span>
                        <span id="winkel3-tt" role="tooltip">
                            Winkel Tripel
                        </span>
                    </button>

                </div>
            </div>

            <div class="last row kiosk">
                <div id="links-label" class="row-label" hidden>Links</div>
                <div class="horiz-hidden sep"></div>
                <div class="bunch" role="toolbar" aria-labelledby="links-label">

                    <a href="about.html" aria-labelledby="about-tt">
                        <span>about</span>
                        <span id="about-tt" role="tooltip">About this site</span>
                    </a>

                    <a href="//www.facebook.com/EarthWindMap" aria-labelledby="facebook-tt">
                        <svg class="fa">
                            <use xlink:href="#fa-facebook"></use>
                        </svg>
                        <span id="facebook-tt" role="tooltip">Facebook</span>
                    </a>

                    <a href="//twitter.com/cambecc" aria-labelledby="twitter-tt">
                        <svg class="fa">
                            <use xlink:href="#fa-twitter"></use>
                        </svg>
                        <span id="twitter-tt" role="tooltip">Twitter</span>
                    </a>

                    <a href="//www.youtube.com/channel/UCZyd1nnJuvS-EZvAV-IDtPg" aria-labelledby="youtube-tt">
                        <svg class="fa fa-youtube">
                            <use xlink:href="#fa-youtube"></use>
                        </svg>
                        <span id="youtube-tt" role="tooltip">YouTube</span>
                    </a>

                    <a href="//www.instagram.com/nullschool/" aria-labelledby="instagram-tt">
                        <svg class="fa">
                            <use xlink:href="#fa-instagram"></use>
                        </svg>
                        <span id="instagram-tt" role="tooltip">Instagram</span>
                    </a>

                </div>

                <div class="bunch">
                    <a class="kiosk dyna-link" data-link="//classic.nullschool.net"
                        href="//classic.nullschool.net" aria-labelledby="classic-tt">
                        <span>switch to classic</span>
                        <span id="classic-tt" role="tooltip">Switch to classic style</span>
                    </a>
                </div>

                <div class="row">
                    <div class="lang-shortcuts bunch">
                        <a lang="en"                        data-link="/"       href="/"       hidden>English</a>
                        <a lang="cs"                        data-link="/cs/"    href="/cs/"    hidden>??e??tina</a>
                        <a lang="fr"                        data-link="/fr/"    href="/fr/"    hidden>Fran??ais</a>
                        <a lang="ko"    class="system-font" data-link="/ko/"    href="/ko/"    hidden>?????????</a>
                        <a lang="ja"    class="system-font" data-link="/jp/"    href="/jp/"    hidden>?????????</a>
                        <a lang="pt"                        data-link="/pt/"    href="/pt/"    hidden>Portugu??s</a>
                        <a lang="ru"                        data-link="/ru/"    href="/ru/"    hidden>??????????????</a>
                        <a lang="zh-CN" class="system-font" data-link="/zh-cn/" href="/zh-cn/" hidden>??????</a>
                    </div>

                    <button data-name="show-settings" aria-labelledby="settings-tt">
                        <svg class="fa">
                            <use xlink:href="#fa-cog"></use>
                        </svg>
                        <span id="settings-tt" role="tooltip">
                            settings
                        </span>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="cta-bar kiosk" style="z-index: 10" hidden>
    <div class="cta vert-unchanged row card">
        <div class="cta-content">
            <div>community</div>
            <a href="https://www.facebook.com/EarthWindMap">EarthWindMap</a>
        </div>
        <span class="gap0p25"></span>
        <button data-name="hide-cta" aria-labelledby="hide-cta-tt">
            <span>???</span>
            <span id="hide-cta-tt" role="tooltip">Dismiss</span>
        </button>
    </div>
</div>

<div id="lang-menu-modal" role="dialog" aria-modal="true" aria-labelledby="settings-title" hidden>
    <div class="panel card">
        <div class="modal-title">
            <div id="settings-title">Settings</div>
            <button class="dialog-closer" aria-labelledby="close-settings-menu-tt">
                <span>???</span>
                <span id="close-settings-menu-tt" role="tooltip">Close</span>
            </button>
        </div>

        <div class="modal-section">
            <div id="lang-menu-title">Languages</div>

            <ul class="column-list-2" aria-labelledby="lang-menu-title">
                <li><a lang="en"                        data-link="/"       href="/"      >English</a></li>
                <li><a lang="cs"                        data-link="/cs/"    href="/cs/"   >??e??tina</a></li>
                <li><a lang="fr"                        data-link="/fr/"    href="/fr/"   >Fran??ais</a></li>
                <li><a lang="ko"    class="system-font" data-link="/ko/"    href="/ko/"   >?????????</a></li>
                <li><a lang="ja"    class="system-font" data-link="/jp/"    href="/jp/"   >?????????</a></li>
                <li><a lang="pt"                        data-link="/pt/"    href="/pt/"   >Portugu??s</a></li>
                <li><a lang="ru"                        data-link="/ru/"    href="/ru/"   >??????????????</a></li>
                <li><a lang="zh-CN" class="system-font" data-link="/zh-cn/" href="/zh-cn/">??????</a></li>
            </ul>
        </div>

        <div class="modal-section">
            <div id="interpolation-title">Interpolation</div>

            <div data-name="interpolation-type" role="radiogroup" class="action bunch"
                aria-labelledby="interpolation-title">
                <button data-name="bilinear" role="radio">bilinear</button>
                <button data-name="nearest" role="radio">none</button>
            </div>
        </div>

        <div class="modal-section">
            <div id="font-size-title">Font Size</div>

            <div data-name="font-size" role="radiogroup" class="action bunch" aria-labelledby="font-size-title">
                <button data-name="x-small" role="radio">tiny</button>
                <button data-name="small" role="radio">small</button>
                <button data-name="medium" role="radio">medium</button>
                <button data-name="large" role="radio">large</button>
                <button data-name="x-large" role="radio">huge</button>
            </div>
        </div>

        <div class="vert-unchanged action row">
            <button class="dialog-closer">
                Close
            </button>
        </div>
    </div>
</div>

<div id="choose-date-modal" role="dialog" aria-modal="true" aria-labelledby="choose-date-title" hidden>
    <div class="panel card">
        <div class="modal-title">
            <div id="choose-date-title">Date</div>
            <button class="dialog-closer" aria-labelledby="close-choose-date-tt">
                <span>???</span>
                <span id="close-choose-date-tt" role="tooltip">Close</span>
            </button>
        </div>

        <div class="row">
            <div id="year-label" class="row-label">year</div>
            <div class="vert-hidden sep"></div>
            <div data-name="year" class="bunch" aria-labelledby="year-label">
                <button data-name="2013" class="modal-focus">2013</button>
                <button data-name="2014">2014</button>
                <button data-name="2015">2015</button>
                <button data-name="2016">2016</button>
                <button data-name="2017">2017</button>
                <button data-name="2018">2018</button>
                <button data-name="2019">2019</button>
                <button data-name="2020">2020</button>
            </div>
        </div>

        <div class="row">
            <div id="month-label" class="row-label">month</div>
            <div class="sep"></div>
            <div data-name="month" class="bunch" aria-labelledby="month-label">
                <button data-name= "1">01</button>
                <button data-name= "2">02</button>
                <button data-name= "3">03</button>
                <button data-name= "4">04</button>
                <button data-name= "5">05</button>
                <button data-name= "6">06</button>
                <button data-name= "7">07</button>
                <button data-name= "8">08</button>
                <button data-name= "9">09</button>
                <button data-name="10">10</button>
                <button data-name="11">11</button>
                <button data-name="12">12</button>
            </div>
        </div>

        <div class="row">
            <div id="day-label" class="row-label">day</div>
            <div class="sep"></div>
            <table data-name="day" class="weeks" role="grid" aria-labelledby="day-label">
                <thead>
                <tr class="week header">
                    <th scope="col" aria-labelledby="sun-tt">
                        Su
                    </th>
                    <th scope="col" aria-labelledby="mon-tt">
                        Mo
                    </th>
                    <th scope="col" aria-labelledby="tue-tt">
                        Tu
                    </th>
                    <th scope="col" aria-labelledby="wed-tt">
                        We
                    </th>
                    <th scope="col" aria-labelledby="thu-tt">
                        Th
                    </th>
                    <th scope="col" aria-labelledby="fri-tt">
                        Fr
                    </th>
                    <th scope="col" aria-labelledby="sat-tt">
                        Sa
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="week">
                    <td><button data-name="1">01</button></td>
                    <td><button data-name="2">02</button></td>
                    <td><button data-name="3">03</button></td>
                    <td><button data-name="4">04</button></td>
                    <td><button data-name="5">05</button></td>
                    <td><button data-name="6">06</button></td>
                    <td><button data-name="7">07</button></td>
                </tr>
                <tr class="week">
                    <td><button data-name= "8">08</button></td>
                    <td><button data-name= "9">09</button></td>
                    <td><button data-name="10">10</button></td>
                    <td><button data-name="11">11</button></td>
                    <td><button data-name="12">12</button></td>
                    <td><button data-name="13">13</button></td>
                    <td><button data-name="14">14</button></td>
                </tr>
                <tr class="week">
                    <td><button data-name="15">15</button></td>
                    <td><button data-name="16">16</button></td>
                    <td><button data-name="17">17</button></td>
                    <td><button data-name="18">18</button></td>
                    <td><button data-name="19">19</button></td>
                    <td><button data-name="20">20</button></td>
                    <td><button data-name="21">21</button></td>
                </tr>
                <tr class="week">
                    <td><button data-name="22">22</button></td>
                    <td><button data-name="23">23</button></td>
                    <td><button data-name="24">24</button></td>
                    <td><button data-name="25">25</button></td>
                    <td><button data-name="26">26</button></td>
                    <td><button data-name="27">27</button></td>
                    <td><button data-name="28">28</button></td>
                </tr>
                <tr class="week">
                    <td><button data-name="29">29</button></td>
                    <td><button data-name="30">30</button></td>
                    <td><button data-name="31">31</button></td>
                    <td><button data-name="32">32</button></td>
                    <td><button data-name="33">33</button></td>
                    <td><button data-name="34">34</button></td>
                    <td><button data-name="35">35</button></td>
                </tr>
                <tr class="week">
                    <td><button data-name="36">36</button></td>
                    <td><button data-name="37">37</button></td>
                    <td><button data-name="38">38</button></td>
                    <td><button data-name="39">39</button></td>
                    <td><button data-name="40">40</button></td>
                    <td><button data-name="41">41</button></td>
                    <td><button data-name="42">42</button></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="vert-unchanged action row">
            <button class="dialog-closer">
                Cancel
            </button>
            <button data-name="apply" class="dialog-closer">
                OK
            </button>
        </div>
    </div>
</div>

</main>

<div hidden>
    <span id="sun-tt" role="tooltip">Sunday</span>
    <span id="mon-tt" role="tooltip">Monday</span>
    <span id="tue-tt" role="tooltip">Tuesday</span>
    <span id="wed-tt" role="tooltip">Wednesday</span>
    <span id="thu-tt" role="tooltip">Thursday</span>
    <span id="fri-tt" role="tooltip">Friday</span>
    <span id="sat-tt" role="tooltip">Saturday</span>

    <svg>
        <!-- Font Awesome Free by @fontawesome - fontawesome.com - License - fontawesome.com/license/free (Icons: CC BY 4.0) -->
        <!-- Optimized with jakearchibald.github.io/svgomg -->
        <symbol id="fa-angle-double-left" viewBox="0 0 448 512">
            <path fill="currentColor" d="M224 239l136-136c9-9 24-9 34 0l22 23c10 9 10 24 0 33l-96 97 96 96c10 10 10 25 0 34l-22 23c-10 9-25 9-34 0L224 273c-10-9-10-25 0-34zM32 273l136 136c9 9 24 9 34 0l22-23c10-9 10-24 0-34l-96-96 96-96c10-10 10-25 0-34l-22-23c-10-9-25-9-34 0L32 239c-10 9-10 25 0 34z"></path>
        </symbol>
        <symbol id="fa-angle-left" viewBox="0 0 256 512">
            <path fill="currentColor" d="M32 239l136-136c9-9 24-9 34 0l22 23c10 9 10 24 0 33l-96 97 96 96c10 10 10 25 0 34l-22 23c-10 9-25 9-34 0L32 273c-10-9-10-25 0-34z"></path>
        </symbol>
        <symbol id="fa-calendar" viewBox="0 0 448 512">
            <path fill="currentColor" d="M400 64h-48V12c0-7-5-12-12-12h-40c-7 0-12 5-12 12v52H160V12c0-7-5-12-12-12h-40c-7 0-12 5-12 12v52H48C22 64 0 86 0 112v352c0 27 22 48 48 48h352c27 0 48-21 48-48V112c0-26-21-48-48-48zm-6 400H54c-3 0-6-3-6-6V160h352v298c0 3-3 6-6 6z"></path>
        </symbol>
        <symbol id="fa-cog" viewBox="0 0 512 512">
            <path fill="currentColor" d="M487 316l-42-25c4-23 4-47 0-70l42-25c5-3 7-8 6-14-11-35-30-68-55-94-4-4-10-5-15-3l-42 25c-18-15-39-27-61-35V26c0-6-4-11-9-12-37-8-75-8-110 0-5 1-9 6-9 12v49c-22 8-43 20-61 35L89 86c-5-3-11-2-15 2-25 26-44 59-55 94-1 6 1 12 6 14l42 25c-4 23-4 47 0 70l-42 25c-5 3-7 8-6 14 11 35 30 68 55 94 4 4 10 5 15 3l42-25c18 15 39 27 61 35v49c0 6 4 11 10 12 36 8 74 8 109 0 5-1 9-6 9-12v-49c22-8 43-20 61-35l43 25c4 2 11 2 14-3 25-26 44-59 55-94 2-6-1-12-6-14zm-231 20a80 80 0 110-160 80 80 0 010 160z"></path>
        </symbol>
        <symbol id="fa-facebook" viewBox="0 0 448 512">
            <path fill="currentColor" d="M400 32H48A48 48 0 000 80v352a48 48 0 0048 48h137V328h-63v-72h63v-55c0-62 37-96 94-96 27 0 55 5 55 5v61h-31c-31 0-40 19-40 38v47h69l-11 72h-58v152h137a48 48 0 0048-48V80a48 48 0 00-48-48z"></path>
        </symbol>
        <symbol id="fa-instagram" viewBox="0 0 448 512">
            <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8a26.8 26.8 0 1126.8-26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388a75.63 75.63 0 01-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9A75.63 75.63 0 0149.4 388c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1A75.63 75.63 0 0192 81.2c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9a75.63 75.63 0 0142.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
        </symbol>
        <symbol id="fa-location-arrow" viewBox="0 0 512 512">
            <path fill="currentColor" d="M445 4L29 195c-48 23-32 93 19 93h176v176c0 51 70 67 93 19L508 67c16-38-25-79-63-63z"></path>
        </symbol>
        <symbol id="fa-play" viewBox="0 0 448 512">
            <path fill="currentColor" d="M424 215L72 7C44-10 0 6 0 48v416c0 38 41 60 72 41l352-208c32-18 32-64 0-82z"></path>
        </symbol>
        <symbol id="fa-twitter" viewBox="0 0 512 512">
            <path fill="currentColor" d="M459 152l1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 00156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0136 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 01181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z"></path>
        </symbol>
        <symbol id="fa-youtube" viewBox="0 0 576 512">
            <path fill="currentColor" d="M550 124c-7-24-25-42-49-49-42-11-213-11-213-11S117 64 75 75c-24 7-42 25-49 49-11 43-11 132-11 132s0 90 11 133c7 23 25 41 49 48 42 11 213 11 213 11s171 0 213-11c24-7 42-25 49-48 11-43 11-133 11-133s0-89-11-132zM232 338V175l143 81-143 82z"></path>
        </symbol>
    </svg>
</div>

<!-- UNDONE: UX: add additional translations from the nav labels -->
<script id="translations" type="application/json">{
  "% Visibility Chance": null,
  "(feels like)": null,
  "3-hour Precipitation Accumulation": null,
  "Carbon Dioxide Surface Concentration": null,
  "Carbon Monoxide Surface Concentration": null,
  "Convective Available Potential Energy from Surface": null,
  "Data download failed": null,
  "Data is empty": null,
  "Data not available for this date": null,
  "Dust Extinction (Aerosol Optical Thickness, 550 nm)": null,
  "Finding current position is not supported": null,
  "Finding current position...": null,
  "IE support ends Dec 31, 2020": null,
  "Instantaneous Wind Power Density": null,
  "Mean Sea Level Pressure": null,
  "Misery Index": null,
  "Network not available": null,
  "Ocean Currents": null,
  "Particulate Matter < 1 ??m": null,
  "Particulate Matter < 10 ??m": null,
  "Particulate Matter < 2.5 ??m": null,
  "Peak Wave Period": null,
  "Probability of Visible Aurora": null,
  "Relative Humidity": null,
  "Sea Surface Temperature Anomaly": null,
  "Sea Surface Temperature": null,
  "Significant Wave Height": null,
  "Sulfate Extinction (Aerosol Optical Thickness, 550 nm)": null,
  "Sulfur Dioxide Surface Mass": null,
  "Surface": null,
  "Temperature": null,
  "Total Cloud Water": null,
  "Total Precipitable Water": null,
  "Wind": null,
  "year": null,
  "month": null,
  "week": null,
  "day": null,
  "hour": null,
  "years": null,
  "months": null,
  "weeks": null,
  "days": null,
  "hours": null,
  "minutes": null,
  "N/A": null
}</script>

<!--<script defer src="/bundle.js"></script>-->
<script defer src="/bundle.min.js?v20201128"></script>

</body>
</html>
