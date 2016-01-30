<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Documentation &middot; Dashboard theme &middot; Official Bootstrap Themes
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="<?=$dir;?>/dashboard/css/toolkit-inverse.css" rel="stylesheet">
    
    
      <link href="<?=$dir;?>/dashboard/css/docs.css" rel="stylesheet">
    
    <link href="<?=$dir;?>/dashboard/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>


<body class="tr">

  <nav class="ci ov g">
    <div class="fu">
      <div class="ok">
        <button type="button" class="on collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="ct">Toggle navigation</span>
          <span class="oo"></span>
          <span class="oo"></span>
          <span class="oo"></span>
        </button>
        <a class="om tt" href="">
          <span class="bv acs ts"></span>
          Dashboard
        </a>
      </div>
      <div id="navbar" class="ol collapse">
        <ul class="nav navbar-nav">
          <li >
            <a href="">Overview</a>
          </li>
          <li >
            <a href="order-history">Order History</a>
          </li>
          <li >
            <a href="fluid">Fluid layout</a>
          </li>
          <li >
            <a href="icon-nav">Icon nav</a>
          </li>
          <li class="active">
            <a href="docs">
              Docs
            </a>
          </li>
          <li >
            <a href="light">Light UI</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
    <div class="bt" id="content">
      <div class="bw">
        <h1>Documentation</h1>
        <p>Find out what's included in your Bootstrap theme and how to compile source files. Includes live examples and code snippets for every new component.</p>
      </div>
    </div>
    <div class="bw docs-content">
      <h1 id="contents">Contents</h1>

<ul id="markdown-toc">
  <li><a href="#contents" id="markdown-toc-contents">Contents</a></li>
  <li><a href="#intro" id="markdown-toc-intro">Intro</a></li>
  <li><a href="#whats-included" id="markdown-toc-whats-included">What�s included</a>    <ul>
      <li><a href="#getting-started" id="markdown-toc-getting-started">Getting started</a></li>
      <li><a href="#gulpfilejs" id="markdown-toc-gulpfilejs">Gulpfile.js</a></li>
      <li><a href="#theme-source-code" id="markdown-toc-theme-source-code">Theme source code</a></li>
    </ul>
  </li>
  <li><a href="#custom-builds" id="markdown-toc-custom-builds">Custom builds</a></li>
  <li><a href="#basic-template" id="markdown-toc-basic-template">Basic template</a></li>
  <li><a href="#utilities" id="markdown-toc-utilities">Utilities</a>    <ul>
      <li><a href="#positioning" id="markdown-toc-positioning">Positioning</a></li>
      <li><a href="#width" id="markdown-toc-width">Width</a></li>
      <li><a href="#margin-and-padding" id="markdown-toc-margin-and-padding">Margin and padding</a></li>
      <li><a href="#responsive-text-alignment" id="markdown-toc-responsive-text-alignment">Responsive text alignment</a></li>
    </ul>
  </li>
  <li><a href="#components" id="markdown-toc-components">Components</a>    <ul>
      <li><a href="#entypo" id="markdown-toc-entypo">Entypo</a>        <ul>
          <li><a href="#available-icons" id="markdown-toc-available-icons">Available icons</a></li>
          <li><a href="#examples" id="markdown-toc-examples">Examples</a></li>
        </ul>
      </li>
      <li><a href="#outline-buttons" id="markdown-toc-outline-buttons">Outline buttons</a></li>
      <li><a href="#pill-buttons" id="markdown-toc-pill-buttons">Pill buttons</a></li>
      <li><a href="#flex-table" id="markdown-toc-flex-table">Flex table</a></li>
      <li><a href="#stat-cards" id="markdown-toc-stat-cards">Stat cards</a></li>
      <li><a href="#divided-heading" id="markdown-toc-divided-heading">Divided heading</a></li>
      <li><a href="#custom-form-controls" id="markdown-toc-custom-form-controls">Custom form controls</a></li>
      <li><a href="#icon-input" id="markdown-toc-icon-input">Icon input</a></li>
      <li><a href="#nav-bordered" id="markdown-toc-nav-bordered">Nav bordered</a></li>
      <li><a href="#icon-nav" id="markdown-toc-icon-nav">Icon nav</a></li>
      <li><a href="#dashhead" id="markdown-toc-dashhead">Dashhead</a></li>
      <li><a href="#list-group" id="markdown-toc-list-group">List group</a>        <ul>
          <li><a href="#list-group-header" id="markdown-toc-list-group-header">List group header</a></li>
          <li><a href="#list-group-progress" id="markdown-toc-list-group-progress">List group progress</a></li>
        </ul>
      </li>
      <li><a href="#custom-modals" id="markdown-toc-custom-modals">Custom Modals</a></li>
    </ul>
  </li>
  <li><a href="#plugins" id="markdown-toc-plugins">Plugins</a>    <ul>
      <li><a href="#tablesorter" id="markdown-toc-tablesorter">Tablesorter</a></li>
      <li><a href="#datepicker" id="markdown-toc-datepicker">Datepicker</a></li>
      <li><a href="#chartjs" id="markdown-toc-chartjs">Chart.js</a>        <ul>
          <li><a href="#data-api" id="markdown-toc-data-api">Data API</a></li>
          <li><a href="#doughnut" id="markdown-toc-doughnut">Doughnut</a></li>
          <li><a href="#bar" id="markdown-toc-bar">Bar</a></li>
          <li><a href="#line" id="markdown-toc-line">Line</a></li>
          <li><a href="#sparkline" id="markdown-toc-sparkline">Sparkline</a></li>
        </ul>
      </li>
    </ul>
  </li>
</ul>

<h1 id="intro">Intro</h1>

<p>Hey there! You�re looking at the docs for an Official Bootstrap Theme�thanks for your purchase! This theme has been lovingly crafted by Bootstrap�s founders and friends to help you build awesome projects on the web. Let�s dive in.</p>

<p>Each theme is designed as it�s own toolkit�a series of well designed, intuitive, and cohesive components�built on top of Bootstrap. If you�ve used Bootstrap itself, you�ll find this all super familiar, but with new aesthetics, new components, beautiful and extensive examples, and easy-to-use build tools and documentation.</p>

<p>Since this theme is based on Bootstrap, and includes nearly everything Bootstrap itself does, you�ll want to give the <a href="http://getbootstrap.com">official project documentation</a> a once over before continuing. There�s also <a href="bootstrap/">the kitchen sink</a>�a one-page view of all Bootstrap�s components restyled by this theme.</p>

<p>For everything else, including compiling and using this Bootstrap theme, read through the docs below.</p>

<p>Thanks, and enjoy!</p>

<h1 id="whats-included">What�s included</h1>

<p>Within your Bootstrap theme you�ll find the following directories and files, grouping common resources and providing both compiled and minified distribution files, as well as raw source files.</p>

<div class="br"><pre><code class="aqc" data-lang="bash">theme/
  +-- gulpfile.js
  +-- package.json
  +-- README.md
  +-- docs/
  +-- less/
  �   +-- bootstrap/
  �   +-- custom/
  �   +-- variables.less
  �   +-- toolkit.less
  +-- js/
  �   +-- bootstrap/
  �   +-- custom/
  +-- fonts/
  �   +-- bootstrap-entypo.eot
  �   +-- bootstrap-entypo.svg
  �   +-- bootstrap-entypo.ttf
  �   +-- bootstrap-entypo.woff
  �   +-- bootstrap-entypo.woff2
  +-- dist/
      +-- toolkit.css
      +-- toolkit.css.map
      +-- toolkit.min.css
      +-- toolkit.min.css.map
      +-- toolkit.js
      +-- toolkit.min.js</code></pre></div>

<h2 id="getting-started">Getting started</h2>

<p>Viewing your Bootstrap Theme documentation requires a static server to be running. For your convenience, if you have node installed, simply install dependencies with npm:</p>

<div class="br"><pre><code class="aqc" data-lang="bash"><span class="x">$ </span>npm install</code></pre></div>

<p>and then start the documentation and example server with:</p>

<div class="br"><pre><code class="aqc" data-lang="bash"><span class="x">$ </span>npm start</code></pre></div>

<h2 id="gulpfilejs">Gulpfile.js</h2>

<p>We�ve also included a custom <a href="http://gulpjs.com">Gulp</a> file, which can be used to quickly re-compile a theme�s CSS and JS. You�ll need to install Gulp before using our included <code>gulpfile.js</code>:</p>

<div class="br"><pre><code class="aqc" data-lang="bash"><span class="x">$ </span>npm install gulp -g</code></pre></div>

<p>When you�re done, make sure you�ve installed the rest of the theme�s dependencies:</p>

<div class="br"><pre><code class="aqc" data-lang="bash"><span class="x">$ </span>npm install</code></pre></div>

<p>Now, modify your source files and run <code>gulp</code> to generate new local <code>dist/</code> files automatically. <strong>Be aware that this replaces existing <code>dist/</code> files</strong>, so proceed with caution.</p>

<h2 id="theme-source-code">Theme source code</h2>

<p>The <code>less/</code>, <code>js/</code>, and <code>fonts/</code> directories contain the source code for our CSS, JS, and icon fonts (respectively). Within the <code>less/</code> and <code>js/</code> directories you�ll find two subdirectories:</p>

<ul>
  <li><code>bootstrap/</code>, which contains the most recently released version of Bootstrap (v3.3.5).</li>
  <li><code>custom/</code>, which contains all of the custom components and overrides authored specifically for this theme.</li>
</ul>

<p>The <code>dist/</code> folder includes everything above, built into single CSS and JS files that can easily be integrated into your project.</p>

<p>The <code>docs/</code> folder includes the source code for our documentation, as well as a handful of live examples.</p>

<p>The remaining files not specifically mentioned above provide support for packages, license information, and development.</p>

<h1 id="custom-builds">Custom builds</h1>

<p>Leverage the included source files and <code>gulpfile.js</code> to customize your Bootstrap Theme for your exact needs. Change variables, exclude components, and more.</p>

<ul>
  <li><code>toolkit.less</code> is the entry point for Less files - to build your own custom build, simply modify your local custom files or edit the includes listed here. Note: some themes also rely on a shared <code>components.less</code> file, which you can find imported in your <code>toolkit.less</code>.</li>
  <li><code>variables.less</code> is home to your theme�s variables. Note that your theme�s <code>variables</code> file depends on and overrides an existing Bootstrap variable file (found in /less/bootstrap/variables.less).</li>
</ul>

<h1 id="basic-template">Basic template</h1>

<p>The basic template is a guideline for how to structure your pages when building with a Bootstrap Theme. Included below are all the necessary bits for using the theme�s CSS and JS, as well as some friendly reminders.</p>

<p>Copy the example below into a new HTML file to get started with it.</p>

<div class="br"><pre><code class="aqd" data-lang="html"><span class="o">&lt;!DOCTYPE html&gt;</span>
<span class="as">&lt;html</span> <span class="ai">lang=</span><span class="ah">"en"</span><span class="as">&gt;</span>
  <span class="as">&lt;head&gt;</span>
    <span class="j">&lt;!-- These meta tags come first. --&gt;</span>
    <span class="as">&lt;meta</span> <span class="ai">charset=</span><span class="ah">"utf-8"</span><span class="as">&gt;</span>
    <span class="as">&lt;meta</span> <span class="ai">http-equiv=</span><span class="ah">"X-UA-Compatible"</span> <span class="ai">content=</span><span class="ah">"IE=edge"</span><span class="as">&gt;</span>
    <span class="as">&lt;meta</span> <span class="ai">name=</span><span class="ah">"viewport"</span> <span class="ai">content=</span><span class="ah">"width=device-width, initial-scale=1"</span><span class="as">&gt;</span>

    <span class="as">&lt;title&gt;</span>Bootstrap Theme Example<span class="as">&lt;/title&gt;</span>

    <span class="j">&lt;!-- Include the CSS --&gt;</span>
    <span class="as">&lt;link</span> <span class="ai">href=</span><span class="ah">"dist/toolkit.min.css"</span> <span class="ai">rel=</span><span class="ah">"stylesheet"</span><span class="as">&gt;</span>

  <span class="as">&lt;/head&gt;</span>
  <span class="as">&lt;body&gt;</span>
    <span class="as">&lt;h1&gt;</span>Hello, world!<span class="as">&lt;/h1&gt;</span>

    <span class="j">&lt;!-- Include jQuery (required) and the JS --&gt;</span>
    <span class="as">&lt;script </span><span class="ai">src=</span><span class="ah">"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"</span><span class="as">&gt;&lt;/script&gt;</span>
    <span class="as">&lt;script </span><span class="ai">src=</span><span class="ah">"dist/toolkit.min.js"</span><span class="as">&gt;&lt;/script&gt;</span>
  <span class="as">&lt;/body&gt;</span>
<span class="as">&lt;/html&gt;</span></code></pre></div>

<h1 id="utilities">Utilities</h1>

<p>Utilities, or utility classes, are a series of single-purpose, immutable classes designed to reduce duplication in your compiled CSS. Each utility takes a common CSS property-value pair and turns it into a reusable class.</p>

<p>These utilities are in addition to those <a href="">provided in Bootstrap</a>.</p>

<h2 id="positioning">Positioning</h2>

<div class="br"><pre><code class="aqe" data-lang="scss"><span class="ak">.pos-r</span> <span class="aqf">{</span> <span class="aq">position</span><span class="aqf">:</span> <span class="aj">relative</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.pos-a</span> <span class="aqf">{</span> <span class="aq">position</span><span class="aqf">:</span> <span class="aj">absolute</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.pos-f</span> <span class="aqf">{</span> <span class="aq">position</span><span class="aqf">:</span> <span class="aj">fixed</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span></code></pre></div>

<h2 id="width">Width</h2>

<div class="br"><pre><code class="aqe" data-lang="scss"><span class="ak">.w-sm</span>   <span class="aqf">{</span> <span class="aq">width</span><span class="aqf">:</span> <span class="ag">25%</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.w-md</span>   <span class="aqf">{</span> <span class="aq">width</span><span class="aqf">:</span> <span class="ag">50%</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.w-lg</span>   <span class="aqf">{</span> <span class="aq">width</span><span class="aqf">:</span> <span class="ag">75%</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.w-full</span> <span class="aqf">{</span> <span class="aq">width</span><span class="aqf">:</span> <span class="ag">100%</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span></code></pre></div>

<h2 id="margin-and-padding">Margin and padding</h2>

<p>Assign <code>margin</code> or <code>padding</code> to an element or a subset of it�s sides with shorthand classes. Includes support for individual properties, all properties, and vertical and horizontal properties. All classes are multiples on the global default value, <code>20px</code>.</p>

<div class="br"><pre><code class="aqe" data-lang="scss"><span class="ak">.m-a-0</span> <span class="aqf">{</span> <span class="aq">margin</span><span class="aqf">:</span>        <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-t-0</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-r-0</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-b-0</span> <span class="aqf">{</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-l-0</span> <span class="aqf">{</span> <span class="aq">margin-left</span><span class="aqf">:</span>   <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="ak">.m-a</span> <span class="aqf">{</span> <span class="aq">margin</span><span class="aqf">:</span>        <span class="m">@</span><span class="aqg">spacer</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-t</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-r</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-b</span> <span class="aqf">{</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-l</span> <span class="aqf">{</span> <span class="aq">margin-left</span><span class="aqf">:</span>   <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-x</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-left</span><span class="aqf">:</span> <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-y</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-x-auto</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span> <span class="aj">auto</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-left</span><span class="aqf">:</span> <span class="aj">auto</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="ak">.m-a-md</span> <span class="aqf">{</span> <span class="aq">margin</span><span class="aqf">:</span>        <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-t-md</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-r-md</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-b-md</span> <span class="aqf">{</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-l-md</span> <span class="aqf">{</span> <span class="aq">margin-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-x-md</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-y-md</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="ak">.m-a-lg</span> <span class="aqf">{</span> <span class="aq">margin</span><span class="aqf">:</span>        <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-t-lg</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-r-lg</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-b-lg</span> <span class="aqf">{</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-l-lg</span> <span class="aqf">{</span> <span class="aq">margin-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-x-lg</span> <span class="aqf">{</span> <span class="aq">margin-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.m-y-lg</span> <span class="aqf">{</span> <span class="aq">margin-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">margin-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span></code></pre></div>

<div class="br"><pre><code class="aqe" data-lang="scss"><span class="ak">.p-a-0</span> <span class="aqf">{</span> <span class="aq">padding</span><span class="aqf">:</span>        <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-t-0</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-r-0</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-b-0</span> <span class="aqf">{</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-l-0</span> <span class="aqf">{</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="ag">0</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="ak">.p-a</span> <span class="aqf">{</span> <span class="aq">padding</span><span class="aqf">:</span>        <span class="m">@</span><span class="aqg">spacer</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-t</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-r</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-b</span> <span class="aqf">{</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-l</span> <span class="aqf">{</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-x</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-y</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="ak">.p-a-md</span> <span class="aqf">{</span> <span class="aq">padding</span><span class="aqf">:</span>        <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-t-md</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-r-md</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-b-md</span> <span class="aqf">{</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-l-md</span> <span class="aqf">{</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-x-md</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-y-md</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">1</span><span class="ay">.5</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="ak">.p-a-lg</span> <span class="aqf">{</span> <span class="aq">padding</span><span class="aqf">:</span>        <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-t-lg</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-r-lg</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-b-lg</span> <span class="aqf">{</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-l-lg</span> <span class="aqf">{</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-x-lg</span> <span class="aqf">{</span> <span class="aq">padding-right</span><span class="aqf">:</span>  <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">padding-left</span><span class="aqf">:</span>   <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-x</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.p-y-lg</span> <span class="aqf">{</span> <span class="aq">padding-top</span><span class="aqf">:</span>    <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aq">padding-bottom</span><span class="aqf">:</span> <span class="aqf">(</span><span class="m">@</span><span class="aqg">spacer-y</span> <span class="m">*</span> <span class="ag">3</span><span class="aqf">)</span> <span class="m">!</span><span class="aqg">important</span><span class="aqf">;</span> <span class="aqf">}</span></code></pre></div>

<h2 id="responsive-text-alignment">Responsive text alignment</h2>

<p>Use these classes to easily switch <code>text-align</code> across viewports when designing responsive pages.</p>

<div class="br"><pre><code class="aqe" data-lang="scss"><span class="ak">.text-xs-left</span>   <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">left</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.text-xs-right</span>  <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">right</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="ak">.text-xs-center</span> <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">center</span><span class="aqf">;</span> <span class="aqf">}</span>

<span class="l">@media</span> <span class="aqf">(</span><span class="aqg">min-width</span><span class="m">:</span> <span class="m">@</span><span class="aqg">screen-sm-min</span><span class="aqf">)</span> <span class="aqf">{</span>
  <span class="ak">.text-sm-left</span>   <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">left</span><span class="aqf">;</span> <span class="aqf">}</span>
  <span class="ak">.text-sm-right</span>  <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">right</span><span class="aqf">;</span> <span class="aqf">}</span>
  <span class="ak">.text-sm-center</span> <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">center</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="aqf">}</span>

<span class="l">@media</span> <span class="aqf">(</span><span class="aqg">min-width</span><span class="m">:</span> <span class="m">@</span><span class="aqg">screen-md-min</span><span class="aqf">)</span> <span class="aqf">{</span>
  <span class="ak">.text-md-left</span>   <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">left</span><span class="aqf">;</span> <span class="aqf">}</span>
  <span class="ak">.text-md-right</span>  <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">right</span><span class="aqf">;</span> <span class="aqf">}</span>
  <span class="ak">.text-md-center</span> <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">center</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="aqf">}</span>

<span class="l">@media</span> <span class="aqf">(</span><span class="aqg">min-width</span><span class="m">:</span> <span class="m">@</span><span class="aqg">screen-lg-min</span><span class="aqf">)</span> <span class="aqf">{</span>
  <span class="ak">.text-lg-left</span>   <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">left</span><span class="aqf">;</span> <span class="aqf">}</span>
  <span class="ak">.text-lg-right</span>  <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">right</span><span class="aqf">;</span> <span class="aqf">}</span>
  <span class="ak">.text-lg-center</span> <span class="aqf">{</span> <span class="aq">text-align</span><span class="aqf">:</span> <span class="aj">center</span><span class="aqf">;</span> <span class="aqf">}</span>
<span class="aqf">}</span></code></pre></div>

<h1 id="components">Components</h1>

<h2 id="entypo">Entypo</h2>

<p><a href="http://entypo.com">Entypo</a> is an awesome, high quality set of icon glyphs made by <a href="http://www.danielbruce.se">Daniel Bruce</a>. We�ve replaced Bootstrap�s default icon font, <a href="http://glyphicons.com">Glyhpicons</a>, with the complete Entypo set and Entypo social extension.</p>

<p>Simply use the new <code>icon</code> class and an <code>icon-{modifier}</code> on an inline element. See the examples below for more details.</p>

<h3 id="available-icons">Available icons</h3>

<p>Below are all the original and social icons from Entypo that you can choose from:</p>

<div class="bu">
  <span class="bv um"></span>
  <span class="bv un"></span>
  <span class="bv uo"></span>
  <span class="bv up"></span>
  <span class="bv uq"></span>
  <span class="bv ut"></span>
  <span class="bv ur"></span>
  <span class="bv us"></span>
  <span class="bv uu"></span>
  <span class="bv uv"></span>
  <span class="bv uw"></span>
  <span class="bv ux"></span>
  <span class="bv uy"></span>
  <span class="bv uz"></span>
  <span class="bv vb"></span>
  <span class="bv vc"></span>
  <span class="bv vd"></span>
  <span class="bv ve"></span>
  <span class="bv vf"></span>
  <span class="bv vg"></span>
  <span class="bv vh"></span>
  <span class="bv vi"></span>
  <span class="bv vn"></span>
  <span class="bv vo"></span>
  <span class="bv vj"></span>
  <span class="bv vk"></span>
  <span class="bv vl"></span>
  <span class="bv vm"></span>
  <span class="bv vp"></span>
  <span class="bv vq"></span>
  <span class="bv vr"></span>
  <span class="bv vs"></span>
  <span class="bv vt"></span>
  <span class="bv vu"></span>
  <span class="bv vv"></span>
  <span class="bv vw"></span>
  <span class="bv vy"></span>
  <span class="bv wa"></span>
  <span class="bv wb"></span>
  <span class="bv wd"></span>
  <span class="bv we"></span>
  <span class="bv wf"></span>
  <span class="bv wg"></span>
  <span class="bv wh"></span>
  <span class="bv wi"></span>
  <span class="bv wj"></span>
  <span class="bv wk"></span>
  <span class="bv wl"></span>
  <span class="bv wm"></span>
  <span class="bv wn"></span>
  <span class="bv wo"></span>
  <span class="bv wp"></span>
  <span class="bv wq"></span>
  <span class="bv wr"></span>
  <span class="bv ws"></span>
  <span class="bv wt"></span>
  <span class="bv wu"></span>
  <span class="bv yy"></span>
  <span class="bv wv"></span>
  <span class="bv ww"></span>
  <span class="bv wx"></span>
  <span class="bv wy"></span>
  <span class="bv wz"></span>
  <span class="bv xg"></span>
  <span class="bv xa"></span>
  <span class="bv xb"></span>
  <span class="bv xc"></span>
  <span class="bv xd"></span>
  <span class="bv xe"></span>
  <span class="bv ui"></span>
  <span class="bv uj"></span>
  <span class="bv xf"></span>
  <span class="bv xh"></span>
  <span class="bv xi"></span>
  <span class="bv xj"></span>
  <span class="bv xk"></span>
  <span class="bv xl"></span>
  <span class="bv xm"></span>
  <span class="bv xn"></span>
  <span class="bv xo"></span>
  <span class="bv xp"></span>
  <span class="bv xq"></span>
  <span class="bv xr"></span>
  <span class="bv xs"></span>
  <span class="bv xt"></span>
  <span class="bv xu"></span>
  <span class="bv xv"></span>
  <span class="bv xw"></span>
  <span class="bv xx"></span>
  <span class="bv xy"></span>
  <span class="bv xz"></span>
  <span class="bv ya"></span>
  <span class="bv yb"></span>
  <span class="bv yc"></span>
  <span class="bv yd"></span>
  <span class="bv ye"></span>
  <span class="bv yf"></span>
  <span class="bv yg"></span>
  <span class="bv yh"></span>
  <span class="bv yi"></span>
  <span class="bv ys"></span>
  <span class="bv yk"></span>
  <span class="bv yl"></span>
  <span class="bv ym"></span>
  <span class="bv yn"></span>
  <span class="bv yo"></span>
  <span class="bv yp"></span>
  <span class="bv yq"></span>
  <span class="bv yr"></span>
  <span class="bv yt"></span>
  <span class="bv yu"></span>
  <span class="bv yv"></span>
  <span class="bv yw"></span>
  <span class="bv yx"></span>
  <span class="bv yz"></span>
  <span class="bv za"></span>
  <span class="bv zb"></span>
  <span class="bv zc"></span>
  <span class="bv ze"></span>
  <span class="bv zd"></span>
  <span class="bv zf"></span>
  <span class="bv zg"></span>
  <span class="bv zj"></span>
  <span class="bv zh"></span>
  <span class="bv zk"></span>
  <span class="bv zi"></span>
  <span class="bv zl"></span>
  <span class="bv zo"></span>
  <span class="bv zp"></span>
  <span class="bv zq"></span>
  <span class="bv zs"></span>
  <span class="bv zt"></span>
  <span class="bv zu"></span>
  <span class="bv zv"></span>
  <span class="bv zw"></span>
  <span class="bv zx"></span>
  <span class="bv zy"></span>
  <span class="bv zz"></span>
  <span class="bv aab"></span>
  <span class="bv aad"></span>
  <span class="bv aac"></span>
  <span class="bv aag"></span>
  <span class="bv aah"></span>
  <span class="bv aai"></span>
  <span class="bv aaj"></span>
  <span class="bv aak"></span>
  <span class="bv aal"></span>
  <span class="bv aap"></span>
  <span class="bv aaq"></span>
  <span class="bv aar"></span>
  <span class="bv aas"></span>
  <span class="bv aat"></span>
  <span class="bv aau"></span>
  <span class="bv aay"></span>
  <span class="bv aav"></span>
  <span class="bv aaw"></span>
  <span class="bv aax"></span>
  <span class="bv aaz"></span>
  <span class="bv abb"></span>
  <span class="bv abc"></span>
  <span class="bv abd"></span>
  <span class="bv abg"></span>
  <span class="bv abm"></span>
  <span class="bv abn"></span>
  <span class="bv abp"></span>
  <span class="bv abq"></span>
  <span class="bv abs"></span>
  <span class="bv abr"></span>
  <span class="bv abu"></span>
  <span class="bv abt"></span>
  <span class="bv abv"></span>
  <span class="bv abw"></span>
  <span class="bv aca"></span>
  <span class="bv abz"></span>
  <span class="bv acb"></span>
  <span class="bv acc"></span>
  <span class="bv acd"></span>
  <span class="bv acf"></span>
  <span class="bv ace"></span>
  <span class="bv aci"></span>
  <span class="bv acj"></span>
  <span class="bv ack"></span>
  <span class="bv acl"></span>
  <span class="bv acm"></span>
  <span class="bv acn"></span>
  <span class="bv aco"></span>
  <span class="bv acr"></span>
  <span class="bv acs"></span>
  <span class="bv act"></span>
  <span class="bv acu"></span>
  <span class="bv acv"></span>
  <span class="bv acw"></span>
  <span class="bv acx"></span>
  <span class="bv acy"></span>
  <span class="bv acz"></span>
  <span class="bv ada"></span>
  <span class="bv add"></span>
  <span class="bv ade"></span>
  <span class="bv adf"></span>
  <span class="bv adh"></span>
  <span class="bv adg"></span>
  <span class="bv adj"></span>
  <span class="bv adi"></span>
  <span class="bv adk"></span>
  <span class="bv adl"></span>
  <span class="bv adm"></span>
  <span class="bv ado"></span>
  <span class="bv adp"></span>
  <span class="bv adq"></span>
  <span class="bv adr"></span>
  <span class="bv ads"></span>
  <span class="bv adv"></span>
  <span class="bv adx"></span>
  <span class="bv ady"></span>
  <span class="bv adz"></span>
  <span class="bv aea"></span>
  <span class="bv aeb"></span>
  <span class="bv aed"></span>
  <span class="bv aee"></span>
  <span class="bv aef"></span>
  <span class="bv aeg"></span>
  <span class="bv aeh"></span>
  <span class="bv aei"></span>
  <span class="bv aej"></span>
  <span class="bv aek"></span>
  <span class="bv ael"></span>
  <span class="bv aem"></span>
  <span class="bv aen"></span>
  <span class="bv aeo"></span>
  <span class="bv aep"></span>
  <span class="bv aeq"></span>
  <span class="bv aer"></span>
  <span class="bv aes"></span>
  <span class="bv aeu"></span>
  <span class="bv aev"></span>
  <span class="bv aew"></span>
  <span class="bv aey"></span>
  <span class="bv aez"></span>
  <span class="bv afb"></span>
  <span class="bv afc"></span>
  <span class="bv aff"></span>
  <span class="bv afg"></span>
  <span class="bv afh"></span>
  <span class="bv afi"></span>
  <span class="bv afj"></span>
  <span class="bv afk"></span>
  <span class="bv afl"></span>
  <span class="bv afn"></span>
  <span class="bv afo"></span>
  <span class="bv afm"></span>
  <span class="bv afp"></span>
  <span class="bv afs"></span>
  <span class="bv aft"></span>
  <span class="bv afw"></span>
  <span class="bv afz"></span>
  <span class="bv agb"></span>
  <span class="bv agc"></span>
  <span class="bv agd"></span>
  <span class="bv age"></span>
  <span class="bv agf"></span>
  <span class="bv agg"></span>
  <span class="bv agh"></span>
  <span class="bv agi"></span>
  <span class="bv agj"></span>
  <span class="bv agk"></span>
  <span class="bv agl"></span>
  <span class="bv agn"></span>
  <span class="bv ago"></span>
  <span class="bv agq"></span>
  <span class="bv agr"></span>
  <span class="bv ags"></span>
  <span class="bv agt"></span>
  <span class="bv agu"></span>
  <span class="bv agv"></span>
  <span class="bv agw"></span>
  <span class="bv agx"></span>
  <span class="bv agy"></span>
  <span class="bv ahe"></span>
  <span class="bv ahg"></span>
  <span class="bv ahf"></span>
  <span class="bv ahi"></span>
  <span class="bv ahl"></span>
  <span class="bv ahm"></span>
  <span class="bv ahn"></span>
  <span class="bv aho"></span>
  <span class="bv ahq"></span>
  <span class="bv ahp"></span>
  <span class="bv ahr"></span>
  <span class="bv ahu"></span>
  <span class="bv ahv"></span>
  <span class="bv ahx"></span>
  <span class="bv ahy"></span>
  <span class="bv aia"></span>
  <span class="bv ahz"></span>
  <span class="bv aib"></span>
  <span class="bv ajd"></span>
  <span class="bv aid"></span>
  <span class="bv aic"></span>
  <span class="bv aie"></span>
  <span class="bv aif"></span>
  <span class="bv aih"></span>
  <span class="bv aig"></span>
  <span class="bv aii"></span>
  <span class="bv aij"></span>
  <span class="bv aik"></span>
  <span class="bv ail"></span>
  <span class="bv aim"></span>
  <span class="bv ain"></span>
  <span class="bv aio"></span>
  <span class="bv aip"></span>
  <span class="bv aiq"></span>
  <span class="bv air"></span>
  <span class="bv ais"></span>
  <span class="bv aiu"></span>
  <span class="bv aix"></span>
  <span class="bv aja"></span>
  <span class="bv ajb"></span>
  <span class="bv ajc"></span>
  <span class="bv aje"></span>
  <span class="bv ajf"></span>
  <span class="bv ajg"></span>
  <span class="bv ajh"></span>
  <span class="bv aji"></span>
  <span class="bv ajj"></span>
  <span class="bv ajk"></span>
  <span class="bv ajp"></span>
  <span class="bv ajt"></span>
  <span class="bv aju"></span>
  <span class="bv ajv"></span>
  <span class="bv ajw"></span>
</div>

<div class="bu">
  <span class="bv ul"></span>
  <span class="bv uk"></span>
  <span class="bv va"></span>
  <span class="bv vx"></span>
  <span class="bv vz"></span>
  <span class="bv wc"></span>
  <span class="bv yj"></span>
  <span class="bv zn"></span>
  <span class="bv zm"></span>
  <span class="bv zr"></span>
  <span class="bv aaa"></span>
  <span class="bv aaf"></span>
  <span class="bv aae"></span>
  <span class="bv aam"></span>
  <span class="bv aao"></span>
  <span class="bv aan"></span>
  <span class="bv aba"></span>
  <span class="bv abf"></span>
  <span class="bv abe"></span>
  <span class="bv abj"></span>
  <span class="bv abk"></span>
  <span class="bv abl"></span>
  <span class="bv abi"></span>
  <span class="bv abh"></span>
  <span class="bv abo"></span>
  <span class="bv abx"></span>
  <span class="bv aby"></span>
  <span class="bv ach"></span>
  <span class="bv acg"></span>
  <span class="bv acq"></span>
  <span class="bv acp"></span>
  <span class="bv adc"></span>
  <span class="bv adb"></span>
  <span class="bv adn"></span>
  <span class="bv adu"></span>
  <span class="bv adt"></span>
  <span class="bv aec"></span>
  <span class="bv aet"></span>
  <span class="bv aex"></span>
  <span class="bv afa"></span>
  <span class="bv afe"></span>
  <span class="bv afd"></span>
  <span class="bv afr"></span>
  <span class="bv afq"></span>
  <span class="bv afv"></span>
  <span class="bv afu"></span>
  <span class="bv afy"></span>
  <span class="bv afx"></span>
  <span class="bv aga"></span>
  <span class="bv agm"></span>
  <span class="bv agz"></span>
  <span class="bv ahb"></span>
  <span class="bv aha"></span>
  <span class="bv ahc"></span>
  <span class="bv ahd"></span>
  <span class="bv ahh"></span>
  <span class="bv ahk"></span>
  <span class="bv ahj"></span>
  <span class="bv aht"></span>
  <span class="bv ahs"></span>
  <span class="bv ahw"></span>
  <span class="bv ait"></span>
  <span class="bv aiw"></span>
  <span class="bv aiv"></span>
  <span class="bv aiz"></span>
  <span class="bv aiy"></span>
  <span class="bv ajm"></span>
  <span class="bv ajl"></span>
  <span class="bv ajo"></span>
  <span class="bv ajn"></span>
  <span class="bv ajs"></span>
  <span class="bv ajr"></span>
  <span class="bv ajq"></span>
  <span class="bv ajx"></span>
  <span class="bv ajz"></span>
  <span class="bv ajy"></span>
  <span class="bv aka"></span>
  <span class="bv akc"></span>
  <span class="bv akb"></span>
  <span class="bv ake"></span>
  <span class="bv akd"></span>
</div>

<h3 id="examples">Examples</h3>

<p>Entypo icons can be placed in just about any other element, so long as they are a separate HTML element (e.g., a <code>&lt;span&gt;</code>). See the examples below for how to put them to use.</p>

<div class="bs" data-example-id="">
<button class="ce apl" type="button">
  <span class="bv aih"></span>
  Like
</button>
<button class="ce fh" type="button">
  <span class="bv aih"></span>
  Liked!
</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">class=</span><span class="ah">"btn btn-default-outline"</span> <span class="ai">type=</span><span class="ah">"button"</span><span class="as">&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-thumbs-up"</span><span class="as">&gt;&lt;/span&gt;</span>
  Like
<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">class=</span><span class="ah">"btn btn-primary"</span> <span class="ai">type=</span><span class="ah">"button"</span><span class="as">&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-thumbs-up"</span><span class="as">&gt;&lt;/span&gt;</span>
  Liked!
<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<ul class="nav og">
  <li class="active">
    <a href="#">
      <span class="bv wv"></span>
      Discussions
    </a>
  </li>
  <li>
    <a href="#">
      <span class="bv wd"></span>
      Notifications
    </a>
  </li>
  <li>
    <a href="#">
      <span class="bv ajh"></span>
      Members
    </a>
  </li>
</ul>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"nav nav-pills"</span><span class="as">&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"active"</span><span class="as">&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-chat"</span><span class="as">&gt;&lt;/span&gt;</span>
      Discussions
    <span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-bell"</span><span class="as">&gt;&lt;/span&gt;</span>
      Notifications
    <span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-users"</span><span class="as">&gt;&lt;/span&gt;</span>
      Members
    <span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
<span class="as">&lt;/ul&gt;</span></code></pre></div>

<h2 id="outline-buttons">Outline buttons</h2>

<p>Replace the provided button variant classes like <code>.btn-primary</code> with <code>.btn-primary-outline</code> to switch from the solid gradient backgrounds buttons to outline ones.</p>

<div class="bs" data-example-id="">
<button type="button" class="ce fn apl">Default</button>
<button type="button" class="ce fn apm">Primary</button>
<button type="button" class="ce fn apn">Success</button>
<button type="button" class="ce fn apo">Info</button>
<button type="button" class="ce fn app">Warning</button>
<button type="button" class="ce fn apq">Danger</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-default-outline"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-primary-outline"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-success-outline"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-info-outline"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-warning-outline"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-danger-outline"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<button type="button" class="ce apl">Default</button>
<button type="button" class="ce apm">Primary</button>
<button type="button" class="ce apn">Success</button>
<button type="button" class="ce apo">Info</button>
<button type="button" class="ce app">Warning</button>
<button type="button" class="ce apq">Danger</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-default-outline"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-primary-outline"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-success-outline"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-info-outline"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-warning-outline"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-danger-outline"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<button type="button" class="ce fp apl">Default</button>
<button type="button" class="ce fp apm">Primary</button>
<button type="button" class="ce fp apn">Success</button>
<button type="button" class="ce fp apo">Info</button>
<button type="button" class="ce fp app">Warning</button>
<button type="button" class="ce fp apq">Danger</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-default-outline"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-primary-outline"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-success-outline"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-info-outline"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-warning-outline"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-danger-outline"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<button type="button" class="ce fr apl">Default</button>
<button type="button" class="ce fr apm">Primary</button>
<button type="button" class="ce fr apn">Success</button>
<button type="button" class="ce fr apo">Info</button>
<button type="button" class="ce fr app">Warning</button>
<button type="button" class="ce fr apq">Danger</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-default-outline"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-primary-outline"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-success-outline"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-info-outline"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-warning-outline"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-danger-outline"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span></code></pre></div>

<h2 id="pill-buttons">Pill buttons</h2>

<p>Add <code>.btn-pill</code> to any button to make them more rounded.</p>

<div class="bs" data-example-id="">
<button type="button" class="ce fn apj fe">Default</button>
<button type="button" class="ce fn apj fh">Primary</button>
<button type="button" class="ce fn apj fi">Success</button>
<button type="button" class="ce fn apj fj">Info</button>
<button type="button" class="ce fn apj fk">Warning</button>
<button type="button" class="ce fn apj fl">Danger</button>
<button type="button" class="ce fn apj fm">Link</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-default"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-primary"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-success"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-info"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-warning"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-danger"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-lg btn-pill btn-link"</span><span class="as">&gt;</span>Link<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<button type="button" class="ce apj fe">Default</button>
<button type="button" class="ce apj fh">Primary</button>
<button type="button" class="ce apj fi">Success</button>
<button type="button" class="ce apj fj">Info</button>
<button type="button" class="ce apj fk">Warning</button>
<button type="button" class="ce apj fl">Danger</button>
<button type="button" class="ce apj fm">Link</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-default"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-primary"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-success"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-info"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-warning"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-danger"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-pill btn-link"</span><span class="as">&gt;</span>Link<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<button type="button" class="ce fp apj fe">Default</button>
<button type="button" class="ce fp apj fh">Primary</button>
<button type="button" class="ce fp apj fi">Success</button>
<button type="button" class="ce fp apj fj">Info</button>
<button type="button" class="ce fp apj fk">Warning</button>
<button type="button" class="ce fp apj fl">Danger</button>
<button type="button" class="ce fp apj fm">Link</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-default"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-primary"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-success"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-info"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-warning"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-danger"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-sm btn-pill btn-link"</span><span class="as">&gt;</span>Link<span class="as">&lt;/button&gt;</span></code></pre></div>

<div class="bs" data-example-id="">
<button type="button" class="ce fr apj fe">Default</button>
<button type="button" class="ce fr apj fh">Primary</button>
<button type="button" class="ce fr apj fi">Success</button>
<button type="button" class="ce fr apj fj">Info</button>
<button type="button" class="ce fr apj fk">Warning</button>
<button type="button" class="ce fr apj fl">Danger</button>
<button type="button" class="ce fr apj fm">Link</button>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-default"</span><span class="as">&gt;</span>Default<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-primary"</span><span class="as">&gt;</span>Primary<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-success"</span><span class="as">&gt;</span>Success<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-info"</span><span class="as">&gt;</span>Info<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-warning"</span><span class="as">&gt;</span>Warning<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-danger"</span><span class="as">&gt;</span>Danger<span class="as">&lt;/button&gt;</span>
<span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-xs btn-pill btn-link"</span><span class="as">&gt;</span>Link<span class="as">&lt;/button&gt;</span></code></pre></div>

<h2 id="flex-table">Flex table</h2>

<p>Use the flex table classes when you need to keep related elements on the same row, but with flexible individual widths.</p>

<div class="bs" data-example-id="">
<div class="akf">
  <div class="akg akh">
    <input type="text" class="form-control" placeholder="Search orders" />
  </div>
  <div class="akg">
    <div class="oa">
      <button type="button" class="ce apm">
        <span class="bv aey"></span>
      </button>
      <button type="button" class="ce apm">
        <span class="bv zy"></span>
      </button>
    </div>
  </div>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"flextable"</span><span class="as">&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"flextable-item flextable-primary"</span><span class="as">&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"text"</span> <span class="ai">class=</span><span class="ah">"form-control"</span> <span class="ai">placeholder=</span><span class="ah">"Search orders"</span><span class="as">&gt;</span>
  <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"flextable-item"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"btn-group"</span><span class="as">&gt;</span>
      <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-primary-outline"</span><span class="as">&gt;</span>
        <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-pencil"</span><span class="as">&gt;&lt;/span&gt;</span>
      <span class="as">&lt;/button&gt;</span>
      <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-primary-outline"</span><span class="as">&gt;</span>
        <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-erase"</span><span class="as">&gt;&lt;/span&gt;</span>
      <span class="as">&lt;/button&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="stat-cards">Stat cards</h2>

<p>Use stat cards to easily display large numbers, great for any kind of simple metrics and dashboard content.</p>

<div class="bs" data-example-id="">
<div class="apt amf">
  <h3 class="anh">12,938</h3>
  <span class="ani">Page views</span>
</div>
<div class="apt amf db">
  <h3 class="anh">758</h3>
  <span class="ani">Downloads</span>
</div>
<div class="apt amf da">
  <h3 class="anh">1,293</h3>
  <span class="ani">Sign-ups</span>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard p-a-md"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>12,938<span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Page views<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard p-a-md text-center"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>758<span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Downloads<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard p-a-md text-right"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>1,293<span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Sign-ups<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>With optional carets:</p>

<div class="bs" data-example-id="">
<div class="apt amf">
  <h3 class="anh">
    12,938
    <small class="anj ank">5%</small>
  </h3>
  <span class="ani">Page views</span>
</div>
<div class="apt amf">
  <h3 class="anh">
    758
    <small class="anj anl">1.3%</small>
  </h3>
  <span class="ani">Downloads</span>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard p-a-md"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    12,938
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-positive"</span><span class="as">&gt;</span>5%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Page views<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard p-a-md"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    758
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-negative"</span><span class="as">&gt;</span>1.3%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Downloads<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>With background variations:</p>

<div class="bs" data-example-id="">
<div class="apt anm amf akz">
  <h3 class="anh">
    12,938
    <small class="anj ank">5%</small>
  </h3>
  <span class="ani">Page views</span>
</div>
<div class="apt ann amf akz">
  <h3 class="anh">
    758
    <small class="anj anl">1.3%</small>
  </h3>
  <span class="ani">Downloads</span>
</div>
<div class="apt ano amf akz">
  <h3 class="anh">
    758
    <small class="anj anl">1.3%</small>
  </h3>
  <span class="ani">Downloads</span>
</div>
<div class="apt anq amf akz">
  <h3 class="anh">
    1,293
    <small class="anj ank">6.75%</small>
  </h3>
  <span class="ani">Sign-ups</span>
</div>
<div class="apt anp amf akz">
  <h3 class="anh">
    1,293
    <small class="anj ank">6.75%</small>
  </h3>
  <span class="ani">Sign-ups</span>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-primary p-a-md m-b"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    12,938
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-positive"</span><span class="as">&gt;</span>5%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Page views<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-success p-a-md m-b"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    758
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-negative"</span><span class="as">&gt;</span>1.3%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Downloads<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-info p-a-md m-b"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    758
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-negative"</span><span class="as">&gt;</span>1.3%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Downloads<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-danger p-a-md m-b"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    1,293
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-positive"</span><span class="as">&gt;</span>6.75%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Sign-ups<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-warning p-a-md m-b"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
    1,293
    <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-positive"</span><span class="as">&gt;</span>6.75%<span class="as">&lt;/small&gt;</span>
  <span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Sign-ups<span class="as">&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>And use the grid system to size and align them:</p>

<div class="bs" data-example-id="">
<div class="fv">
  <div class="gr">
    <div class="apt anm amf">
      <h3 class="anh">
        12,938
        <small class="anj ank">5%</small>
      </h3>
      <span class="ani">Page views</span>
    </div>
  </div>
  <div class="gr">
    <div class="apt ann amf">
      <h3 class="anh">
        758
        <small class="anj anl">1.3%</small>
      </h3>
      <span class="ani">Downloads</span>
    </div>
  </div>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"row"</span><span class="as">&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"col-sm-6"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-primary p-a-md"</span><span class="as">&gt;</span>
      <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
        12,938
        <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-positive"</span><span class="as">&gt;</span>5%<span class="as">&lt;/small&gt;</span>
      <span class="as">&lt;/h3&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Page views<span class="as">&lt;/span&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"col-sm-6"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-success p-a-md"</span><span class="as">&gt;</span>
      <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
        758
        <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-negative"</span><span class="as">&gt;</span>1.3%<span class="as">&lt;/small&gt;</span>
      <span class="as">&lt;/h3&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Downloads<span class="as">&lt;/span&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="divided-heading">Divided heading</h2>

<p>Use a divided heading to call special attention to a separation of content in your pages.</p>

<div class="bs" data-example-id="">
<div class="anu">
  <h3 class="anv anw">
    Divider heading
  </h3>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"hr-divider"</span><span class="as">&gt;</span>
  <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"hr-divider-content hr-divider-heading"</span><span class="as">&gt;</span>
    Divider heading
  <span class="as">&lt;/h3&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>You can also use it with pill navigation:</p>

<div class="bs" data-example-id="">
<div class="anu">
  <ul class="nav og anv anx">
    <li class="active">
      <a href="#">Active tab</a>
    </li>
    <li>
      <a href="#">Tab</a>
    </li>
    <li>
      <a href="#">Tab</a>
    </li>
  </ul>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"hr-divider"</span><span class="as">&gt;</span>
  <span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"nav nav-pills hr-divider-content hr-divider-nav"</span><span class="as">&gt;</span>
    <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"active"</span><span class="as">&gt;</span>
      <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Active tab<span class="as">&lt;/a&gt;</span>
    <span class="as">&lt;/li&gt;</span>
    <span class="as">&lt;li&gt;</span>
      <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Tab<span class="as">&lt;/a&gt;</span>
    <span class="as">&lt;/li&gt;</span>
    <span class="as">&lt;li&gt;</span>
      <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Tab<span class="as">&lt;/a&gt;</span>
    <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;/ul&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="custom-form-controls">Custom form controls</h2>

<p>Custom select menus can be easily created for browsers that support the styles.</p>

<div class="bs" data-example-id="">
<select class="any">
  <option>Default</option>
  <option>First option</option>
  <option>Another option</option>
  <option>Alternative</option>
  <option>Last one</option>
</select>

<select class="any anz">
  <option>Default</option>
  <option>First option</option>
  <option>Another option</option>
  <option>Alternative</option>
  <option>Last one</option>
</select>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;select</span> <span class="ai">class=</span><span class="ah">"custom-select"</span><span class="as">&gt;</span>
  <span class="as">&lt;option&gt;</span>Default<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>First option<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>Another option<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>Alternative<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>Last one<span class="as">&lt;/option&gt;</span>
<span class="as">&lt;/select&gt;</span>

<span class="as">&lt;select</span> <span class="ai">class=</span><span class="ah">"custom-select custom-select-sm"</span><span class="as">&gt;</span>
  <span class="as">&lt;option&gt;</span>Default<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>First option<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>Another option<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>Alternative<span class="as">&lt;/option&gt;</span>
  <span class="as">&lt;option&gt;</span>Last one<span class="as">&lt;/option&gt;</span>
<span class="as">&lt;/select&gt;</span></code></pre></div>

<p>Custom checkboxes and radios are built on the default Bootstrap checkboxes and radios. Add a couple extra classes and the indicator and you should be all set.</p>

<div class="bs" data-example-id="">
<div class="en aoa aoe">
  <label>
    <input type="checkbox" />
    <span class="aob"></span>
    Check this custom checkbox
  </label>
</div>
<div class="en aoa aoe">
  <label>
    <input type="checkbox" checked="" />
    <span class="aob"></span>
    This custom checkbox is checked
  </label>
</div>
<div class="en aoa aoe">
  <label>
    <input type="checkbox" disabled="" />
    <span class="aob"></span>
    This custom checkbox is disabled
  </label>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"checkbox custom-control custom-checkbox"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"checkbox"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    Check this custom checkbox
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"checkbox custom-control custom-checkbox"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"checkbox"</span> <span class="ai">checked</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    This custom checkbox is checked
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"checkbox custom-control custom-checkbox"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"checkbox"</span> <span class="ai">disabled</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    This custom checkbox is disabled
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>They can be done inline, too.</p>

<div class="bs" data-example-id="">
<div class="ep aoa aoe">
  <label>
    <input type="checkbox" />
    <span class="aob"></span>
    Check this custom checkbox
  </label>
</div>
<div class="ep aoa aoe">
  <label>
    <input type="checkbox" checked="" />
    <span class="aob"></span>
    This custom checkbox is checked
  </label>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"checkbox-inline custom-control custom-checkbox"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"checkbox"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    Check this custom checkbox
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"checkbox-inline custom-control custom-checkbox"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"checkbox"</span> <span class="ai">checked</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    This custom checkbox is checked
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>Same goes with radio inputs.</p>

<div class="bs" data-example-id="">
<div class="em aoa aof">
  <label>
    <input type="radio" id="radio1" name="radio" />
    <span class="aob"></span>
    Toggle this custom radio
  </label>
</div>
<div class="em aoa aof">
  <label>
    <input type="radio" id="radio2" name="radio" />
    <span class="aob"></span>
    Or toggle this other custom radio
  </label>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"radio custom-control custom-radio"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"radio"</span> <span class="ai">id=</span><span class="ah">"radio1"</span> <span class="ai">name=</span><span class="ah">"radio"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    Toggle this custom radio
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"radio custom-control custom-radio"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"radio"</span> <span class="ai">id=</span><span class="ah">"radio2"</span> <span class="ai">name=</span><span class="ah">"radio"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    Or toggle this other custom radio
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>And they can also be inline.</p>

<div class="bs" data-example-id="">
<div class="eo aoa aof">
  <label>
    <input type="radio" id="radio1" name="radio" />
    <span class="aob"></span>
    Toggle this custom radio
  </label>
</div>
<div class="eo aoa aof">
  <label>
    <input type="radio" id="radio2" name="radio" />
    <span class="aob"></span>
    Or toggle this other custom radio
  </label>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"radio-inline custom-control custom-radio"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"radio"</span> <span class="ai">id=</span><span class="ah">"radio1"</span> <span class="ai">name=</span><span class="ah">"radio"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    Toggle this custom radio
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span>
<span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"radio-inline custom-control custom-radio"</span><span class="as">&gt;</span>
  <span class="as">&lt;label&gt;</span>
    <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"radio"</span> <span class="ai">id=</span><span class="ah">"radio2"</span> <span class="ai">name=</span><span class="ah">"radio"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"custom-control-indicator"</span><span class="as">&gt;&lt;/span&gt;</span>
    Or toggle this other custom radio
  <span class="as">&lt;/label&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="icon-input">Icon input</h2>

<p>Easily overlay an icon on an input.</p>

<div class="bs" data-example-id="">
<div class="aok">
  <input type="text" value="Example input" class="form-control" />
  <span class="bv ws"></span>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"input-with-icon"</span><span class="as">&gt;</span>
  <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"text"</span> <span class="ai">value=</span><span class="ah">"Example input"</span> <span class="ai">class=</span><span class="ah">"form-control"</span><span class="as">&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-calendar"</span><span class="as">&gt;&lt;/span&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="nav-bordered">Nav bordered</h2>

<p>The bordered nav builds on Bootstrap�s <code>.nav</code> base styles with a new, bolder variation to nav links.</p>

<div class="bs" data-example-id="">
<ul class="nav tq">
  <li class="active">
    <a href="#">Bold</a>
  </li>
  <li>
    <a href="#">Minimal</a>
  </li>
  <li>
    <a href="#">Components</a>
  </li>
  <li>
    <a href="#">Docs</a>
  </li>
</ul>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"nav nav-bordered"</span><span class="as">&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"active"</span><span class="as">&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Bold<span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Minimal<span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Components<span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Docs<span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
<span class="as">&lt;/ul&gt;</span></code></pre></div>

<p>Bordered nav links can also be stacked:</p>

<div class="bs" data-example-id="">
<ul class="nav tq nav-stacked">
  <li class="tp">Examples</li>
  <li class="active">
    <a href="#">Bold</a>
  </li>
  <li><a href="#">Minimal</a></li>

  <li class="nav-divider"></li>
  <li class="tp">Sections</li>

  <li><a href="#">Grid</a></li>
  <li><a href="#">Pricing</a></li>
  <li><a href="#">About</a></li>
</ul>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"nav nav-bordered nav-stacked"</span><span class="as">&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"nav-header"</span><span class="as">&gt;</span>Examples<span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"active"</span><span class="as">&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Bold<span class="as">&lt;/a&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Minimal<span class="as">&lt;/a&gt;&lt;/li&gt;</span>

  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"nav-divider"</span><span class="as">&gt;&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"nav-header"</span><span class="as">&gt;</span>Sections<span class="as">&lt;/li&gt;</span>

  <span class="as">&lt;li&gt;&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Grid<span class="as">&lt;/a&gt;&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>Pricing<span class="as">&lt;/a&gt;&lt;/li&gt;</span>
  <span class="as">&lt;li&gt;&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>About<span class="as">&lt;/a&gt;&lt;/li&gt;</span>
<span class="as">&lt;/ul&gt;</span></code></pre></div>

<h2 id="icon-nav">Icon nav</h2>

<p>The icon nav is a special sidebar navigation for this toolkit. In mobile viewports, the icon nav is horizontal with icons and textual labels. On larger devices the icon nav changes and becomes affixed to the side of the viewport with tooltips instead of textual labels.</p>

<div class="bs" data-example-id="">
<nav class="ch">
    <a class="aou" href="#">
      <span class="bv acs aov"></span>
    </a>
    <div class="aoy">
      <ul class="nav og aow">
        <li>
          <a href="#" title="Overview" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <span class="bv abv"></span>
            <small class="aox sb">Overview</small>
          </a>
        </li>
        <li>
          <a href="#" title="Order history" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <span class="bv aid"></span>
            <small class="aox sb">History</small>
          </a>
        </li>
        <li>
          <a href="#" title="Fluid layout" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <span class="bv abg"></span>
            <small class="aox sb">Fluid layout</small>
          </a>
        </li>
        <li class="active">
          <a href="#" title="Icon-nav layout" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <span class="bv vc"></span>
            <small class="aox sb">Icon nav</small>
          </a>
        </li>
        <li>
          <a href="#" title="Docs" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <span class="bv add"></span>
            <small class="aox sb">Docs</small>
          </a>
        </li>
        <li>
          <a href="#" title="Light UI" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <span class="bv aaj"></span>
            <small class="aox sb">Light UI</small>
          </a>
        </li>
        <li>
          <a href="#" title="Signed in as mdo" data-toggle="tooltip" data-placement="right" data-container=".iconav">
            <img src="<?=$dir;?>/dashboard/img/avatar-mdo.png" alt="" class="cs cn" />
            <small class="aox sb">@mdo</small>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;nav</span> <span class="ai">class=</span><span class="ah">"iconav"</span><span class="as">&gt;</span>
    <span class="as">&lt;a</span> <span class="ai">class=</span><span class="ah">"iconav-brand"</span> <span class="ai">href=</span><span class="ah">"#"</span><span class="as">&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-leaf iconav-brand-icon"</span><span class="as">&gt;&lt;/span&gt;</span>
    <span class="as">&lt;/a&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"iconav-slider"</span><span class="as">&gt;</span>
      <span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"nav nav-pills iconav-nav"</span><span class="as">&gt;</span>
        <span class="as">&lt;li</span> <span class="as">&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Overview"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-home"</span><span class="as">&gt;&lt;/span&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>Overview<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
        <span class="as">&lt;li</span> <span class="as">&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Order history"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-text-document"</span><span class="as">&gt;&lt;/span&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>History<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
        <span class="as">&lt;li</span> <span class="as">&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Fluid layout"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-globe"</span><span class="as">&gt;&lt;/span&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>Fluid layout<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
        <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"active"</span><span class="as">&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Icon-nav layout"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-area-graph"</span><span class="as">&gt;&lt;/span&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>Icon nav<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
        <span class="as">&lt;li</span> <span class="as">&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Docs"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-list"</span><span class="as">&gt;&lt;/span&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>Docs<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
        <span class="as">&lt;li</span> <span class="as">&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Light UI"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-flash"</span><span class="as">&gt;&lt;/span&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>Light UI<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
        <span class="as">&lt;li&gt;</span>
          <span class="as">&lt;a</span> <span class="ai">href=</span><span class="ah">"#"</span> <span class="ai">title=</span><span class="ah">"Signed in as mdo"</span> <span class="ai">data-toggle=</span><span class="ah">"tooltip"</span> <span class="ai">data-placement=</span><span class="ah">"right"</span> <span class="ai">data-container=</span><span class="ah">".iconav"</span><span class="as">&gt;</span>
            <span class="as">&lt;img</span> <span class="ai">src=</span><span class="ah">"<?=$dir;?>/dashboard/img/avatar-mdo.png"</span> <span class="ai">alt=</span><span class="ah">""</span> <span class="ai">class=</span><span class="ah">"img-circle img-responsive"</span><span class="as">&gt;</span>
            <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"iconav-nav-label visible-xs-block"</span><span class="as">&gt;</span>@mdo<span class="as">&lt;/small&gt;</span>
          <span class="as">&lt;/a&gt;</span>
        <span class="as">&lt;/li&gt;</span>
      <span class="as">&lt;/ul&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/nav&gt;</span></code></pre></div>

<h2 id="dashhead">Dashhead</h2>

<p>The dashhead is a custom component built to house all the textual headings, form controls, buttons, and more that are common for the top of dashboard page.</p>

<div class="bs" data-example-id="">
<div class="aoz">
  <div class="apa">
    <h6 class="apc">Dashboards</h6>
    <h3 class="apb">Overview</h3>
  </div>

  <div class="apd">
    <div class="aok apf">
      <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker" />
      <span class="bv ws"></span>
    </div>
    <span class="ape sn"></span>
    <div class="oa apf aph">
      <button type="button" class="ce apm">Day</button>
      <button type="button" class="ce apm active">Week</button>
      <button type="button" class="ce apm">Month</button>
    </div>
  </div>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"dashhead"</span><span class="as">&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"dashhead-titles"</span><span class="as">&gt;</span>
    <span class="as">&lt;h6</span> <span class="ai">class=</span><span class="ah">"dashhead-subtitle"</span><span class="as">&gt;</span>Dashboards<span class="as">&lt;/h6&gt;</span>
    <span class="as">&lt;h3</span> <span class="ai">class=</span><span class="ah">"dashhead-title"</span><span class="as">&gt;</span>Overview<span class="as">&lt;/h3&gt;</span>
  <span class="as">&lt;/div&gt;</span>

  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"dashhead-toolbar"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"input-with-icon dashhead-toolbar-item"</span><span class="as">&gt;</span>
      <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"text"</span> <span class="ai">value=</span><span class="ah">"01/01/15 - 01/08/15"</span> <span class="ai">class=</span><span class="ah">"form-control"</span> <span class="ai">data-provide=</span><span class="ah">"datepicker"</span><span class="as">&gt;</span>
      <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-calendar"</span><span class="as">&gt;&lt;/span&gt;</span>
    <span class="as">&lt;/div&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"dashhead-toolbar-divider hidden-xs"</span><span class="as">&gt;&lt;/span&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"btn-group dashhead-toolbar-item btn-group-thirds"</span><span class="as">&gt;</span>
      <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-primary-outline"</span><span class="as">&gt;</span>Day<span class="as">&lt;/button&gt;</span>
      <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-primary-outline active"</span><span class="as">&gt;</span>Week<span class="as">&lt;/button&gt;</span>
      <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn btn-primary-outline"</span><span class="as">&gt;</span>Month<span class="as">&lt;/button&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="list-group">List group</h2>

<p>Bootstrap�s default list group component is extended with a few additional features.</p>

<h3 id="list-group-header">List group header</h3>

<p>New to the theme is a header for list groups, similar to panels. use it for standalone lists as needed. This should not be used with panels.</p>

<div class="bs" data-example-id="">
<ul class="by">
  <li class="tx">List group header</li>
  <li class="pi">Cras justo odio</li>
  <li class="pi">Dapibus ac facilisis in</li>
  <li class="pi">Morbi leo risus</li>
  <li class="pi">Porta ac consectetur ac</li>
  <li class="pi">Vestibulum at eros</li>
</ul>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"list-group"</span><span class="as">&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-header"</span><span class="as">&gt;</span>List group header<span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>Cras justo odio<span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>Dapibus ac facilisis in<span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>Morbi leo risus<span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>Porta ac consectetur ac<span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>Vestibulum at eros<span class="as">&lt;/li&gt;</span>
<span class="as">&lt;/ul&gt;</span></code></pre></div>

<h3 id="list-group-progress">List group progress</h3>

<p>Similar to stat lists, add a background progress indicator to any list group item.</p>

<div class="bs" data-example-id="">
<ul class="by">
  <li class="pi">
    Cras justo odio
    <span class="ty" style="width: 75%;"></span>
  </li>
  <li class="pi">
    Porta ac consectetur ac
    <span class="ty" style="width: 50%;"></span>
  </li>
  <li class="pi">
    Vestibulum at eros
    <span class="ty" style="width: 25%;"></span>
  </li>
</ul>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;ul</span> <span class="ai">class=</span><span class="ah">"list-group"</span><span class="as">&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>
    Cras justo odio
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"list-group-progress"</span> <span class="ai">style=</span><span class="ah">"width: 75%;"</span><span class="as">&gt;&lt;/span&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>
    Porta ac consectetur ac
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"list-group-progress"</span> <span class="ai">style=</span><span class="ah">"width: 50%;"</span><span class="as">&gt;&lt;/span&gt;</span>
  <span class="as">&lt;/li&gt;</span>
  <span class="as">&lt;li</span> <span class="ai">class=</span><span class="ah">"list-group-item"</span><span class="as">&gt;</span>
    Vestibulum at eros
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"list-group-progress"</span> <span class="ai">style=</span><span class="ah">"width: 25%;"</span><span class="as">&gt;&lt;/span&gt;</span>
  <span class="as">&lt;/li&gt;</span>
<span class="as">&lt;/ul&gt;</span></code></pre></div>

<h2 id="custom-modals">Custom Modals</h2>

<p>Support for multiple, stackable modal bodies and scrolling bodies using the new <code>.modal-body-scroller</code> modifier.</p>

<div class="bs" data-example-id="">
<div class="cb">
  <div class="modal-dialog aqh">
    <div class="modal-content">
      <div class="rj">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Medium Modal</h4>
      </div>
      <div class="modal-body tz">
        <p>Maecenas faucibus mollis interdum. Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas faucibus mollis interdum. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Sed posuere consectetur est at lobortis. Etiam porta sem malesuada magna mollis euismod. Nullam quis risus eget urna mollis ornare vel eu leo.</p>

        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. Nullam quis risus eget urna mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui.</p>

        <p>Sed posuere consectetur est at lobortis. Maecenas faucibus mollis interdum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu leo.</p>

        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam quis risus eget urna mollis ornare vel eu leo. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nullam quis risus eget urna mollis ornare vel eu leo.</p>

        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cras mattis consectetur purus sit amet fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
      </div>

      <div class="modal-body">
        <input type="text" class="form-control" placeholder="Message" />
      </div>
    </div>
  </div>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal"</span><span class="as">&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-dialog modal-md"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-content"</span><span class="as">&gt;</span>
      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-header"</span><span class="as">&gt;</span>
        <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"close"</span> <span class="ai">data-dismiss=</span><span class="ah">"modal"</span> <span class="ai">aria-label=</span><span class="ah">"Close"</span><span class="as">&gt;&lt;span</span> <span class="ai">aria-hidden=</span><span class="ah">"true"</span><span class="as">&gt;</span><span class="an">&amp;times;</span><span class="as">&lt;/span&gt;&lt;/button&gt;</span>
        <span class="as">&lt;h4</span> <span class="ai">class=</span><span class="ah">"modal-title"</span><span class="as">&gt;</span>Medium Modal<span class="as">&lt;/h4&gt;</span>
      <span class="as">&lt;/div&gt;</span>
      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-body modal-body-scroller"</span><span class="as">&gt;</span>
        <span class="as">&lt;p&gt;</span>Maecenas faucibus mollis interdum. Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas faucibus mollis interdum. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Nullam id dolor id nibh ultricies vehicula ut id elit. Sed posuere consectetur est at lobortis. Etiam porta sem malesuada magna mollis euismod. Nullam quis risus eget urna mollis ornare vel eu leo.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. Nullam quis risus eget urna mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Sed posuere consectetur est at lobortis. Maecenas faucibus mollis interdum. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu leo.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam quis risus eget urna mollis ornare vel eu leo. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nullam quis risus eget urna mollis ornare vel eu leo.<span class="as">&lt;/p&gt;</span>

        <span class="as">&lt;p&gt;</span>Nullam quis risus eget urna mollis ornare vel eu leo. Cras mattis consectetur purus sit amet fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.<span class="as">&lt;/p&gt;</span>
      <span class="as">&lt;/div&gt;</span>

      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-body"</span><span class="as">&gt;</span>
        <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"text"</span> <span class="ai">class=</span><span class="ah">"form-control"</span> <span class="ai">placeholder=</span><span class="ah">"Message"</span><span class="as">&gt;</span>
      <span class="as">&lt;/div&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<p>Also, drop the regular footer for a new two-up set of actions using the <code>.modal-actions</code> component.</p>

<div class="bs" data-example-id="">
<div class="cb">
  <div class="modal-dialog rl">
    <div class="modal-content">
      <div class="rj">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Small modal</h4>
      </div>
      <div class="modal-body">
        <p>Modal body text...</p>
      </div>
      <div class="ua">
        <button type="button" class="fm ub" data-dismiss="modal">Cancel</button>
        <button type="button" class="fm ub" data-dismiss="modal">
          <strong>Continue</strong>
        </button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal"</span><span class="as">&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-dialog modal-sm"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-content"</span><span class="as">&gt;</span>
      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-header"</span><span class="as">&gt;</span>
        <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"close"</span> <span class="ai">data-dismiss=</span><span class="ah">"modal"</span> <span class="ai">aria-label=</span><span class="ah">"Close"</span><span class="as">&gt;&lt;span</span> <span class="ai">aria-hidden=</span><span class="ah">"true"</span><span class="as">&gt;</span><span class="an">&amp;times;</span><span class="as">&lt;/span&gt;&lt;/button&gt;</span>
        <span class="as">&lt;h4</span> <span class="ai">class=</span><span class="ah">"modal-title"</span><span class="as">&gt;</span>Small modal<span class="as">&lt;/h4&gt;</span>
      <span class="as">&lt;/div&gt;</span>
      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-body"</span><span class="as">&gt;</span>
        <span class="as">&lt;p&gt;</span>Modal body text...<span class="as">&lt;/p&gt;</span>
      <span class="as">&lt;/div&gt;</span>
      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"modal-actions"</span><span class="as">&gt;</span>
        <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn-link modal-action"</span> <span class="ai">data-dismiss=</span><span class="ah">"modal"</span><span class="as">&gt;</span>Cancel<span class="as">&lt;/button&gt;</span>
        <span class="as">&lt;button</span> <span class="ai">type=</span><span class="ah">"button"</span> <span class="ai">class=</span><span class="ah">"btn-link modal-action"</span> <span class="ai">data-dismiss=</span><span class="ah">"modal"</span><span class="as">&gt;</span>
          <span class="as">&lt;strong&gt;</span>Continue<span class="as">&lt;/strong&gt;</span>
        <span class="as">&lt;/button&gt;</span>
      <span class="as">&lt;/div&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h1 id="plugins">Plugins</h1>

<h2 id="tablesorter">Tablesorter</h2>

<p>Including in this theme is <a href="http://tablesorter.com/">Tablesorter</a>, a jQuery plugin for easy column sorting on tables. Basic styles for the directional arrows when sorting are included here for ease. Consult the Tablesorter docs for usage and additional customizations.</p>

<div class="bs">
  <div class="eg">
    <table class="cl" data-sort="table">
      <thead>
        <tr>
          <th><input type="checkbox" class="aqi" id="selectAll" /></th>
          <th>Order</th>
          <th>Customer name</th>
          <th>Description</th>
          <th>Date</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" class="aqj" /></td>
          <td><a href="#">#10001</a></td>
          <td>First Last</td>
          <td>Admin theme, marketing theme</td>
          <td>01/01/2015</td>
          <td>$200.00</td>
        </tr>
        <tr>
          <td><input type="checkbox" class="aqj" /></td>
          <td><a href="#">#10002</a></td>
          <td>Firstname Lastname</td>
          <td>Admin theme</td>
          <td>01/01/2015</td>
          <td>$100.00</td>
        </tr>
        <tr>
          <td><input type="checkbox" class="aqj" /></td>
          <td><a href="#">#10003</a></td>
          <td>Name Another</td>
          <td>Personal blog theme</td>
          <td>01/01/2015</td>
          <td>$100.00</td>
        </tr>
        <tr>
          <td><input type="checkbox" class="aqj" /></td>
          <td><a href="#">#10004</a></td>
          <td>One More</td>
          <td>Marketing theme, personal blog theme, admin theme</td>
          <td>01/01/2015</td>
          <td>$300.00</td>
        </tr>
        <tr>
          <td><input type="checkbox" class="aqj" /></td>
          <td><a href="#">#10005</a></td>
          <td>Name Right Here</td>
          <td>Personal blog theme, admin theme</td>
          <td>01/02/2015</td>
          <td>$200.00</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<p>Enabling Tablesorter is easy with jQuery:</p>

<div class="br"><pre><code class="aqk" data-lang="js"><span class="aql">$</span><span class="aqf">(</span><span class="aj">document</span><span class="aqf">).</span><span class="aql">ready</span><span class="aqf">(</span><span class="ab">function</span><span class="aqf">()</span> <span class="aqf">{</span>
  <span class="p">// call the tablesorter plugin</span>
  <span class="aql">$</span><span class="aqf">(</span><span class="bd">"[data-sort=table]"</span><span class="aqf">).</span><span class="aql">tablesorter</span><span class="aqf">({</span>
    <span class="p">// Sort on the second column, in ascending order</span>
    <span class="ai">sortList</span><span class="aqf">:</span> <span class="aqf">[[</span><span class="ay">1</span><span class="aqf">,</span><span class="ay">0</span><span class="aqf">]]</span>
  <span class="aqf">});</span>
<span class="aqf">});</span></code></pre></div>

<h2 id="datepicker">Datepicker</h2>

<p>We�ve integrated the excellent <a href="https://bootstrap-datepicker.readthedocs.org/en/latest/">Bootstrap Datepicker</a> plugin for your convenience. You can initiate this simply with data-attributes or for more advanced applications use the javascript API. Refer to <a href="https://bootstrap-datepicker.readthedocs.org/en/latest/">their docs for more information</a>.</p>

<div class="bs" data-example-id="">
<div class="input-group">
  <span class="input-group-addon">
    <span class="bv ws"></span>
  </span>
  <input type="text" value="01/01/2015" class="form-control" data-provide="datepicker" style="width: 200px;" />
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"input-group"</span><span class="as">&gt;</span>
  <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"input-group-addon"</span><span class="as">&gt;</span>
    <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"icon icon-calendar"</span><span class="as">&gt;&lt;/span&gt;</span>
  <span class="as">&lt;/span&gt;</span>
  <span class="as">&lt;input</span> <span class="ai">type=</span><span class="ah">"text"</span> <span class="ai">value=</span><span class="ah">"01/01/2015"</span> <span class="ai">class=</span><span class="ah">"form-control"</span> <span class="ai">data-provide=</span><span class="ah">"datepicker"</span> <span class="ai">style=</span><span class="ah">"width: 200px;"</span><span class="as">&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h2 id="chartjs">Chart.js</h2>

<p>Charts and graphs are available through <a href="http://www.chartjs.org">Chart.js</a>, a clean and responsive canvas-based chart rendering JavaScript library. For even easier integration, we�ve created a small plugin for use with this toolkit for rendering four types of graphs: doughnut, line, bar, and the custom sparkline.</p>

<p>We recommend reviewing the full <a href="http://www.chartjs.org/docs/">Chart.js documentation</a> as you implement or modify any charts here.</p>

<h3 id="data-api">Data API</h3>

<p>The data API allows you to use Chart.js arguments and options by writing HTML. Take any option provided by Chart.js and simply hypenate it as an HTML attribute. For example, the doughnut�s <code>segmentStrokeColor</code> option, becomes <code>data-segment-stroke-color</code>.</p>

<p>Below are examples of the graph types we support out of the box in this toolkit, implemented with the data API approach.</p>

<h3 id="doughnut">Doughnut</h3>

<div class="bs" data-example-id="">
<div class="akl ald">
  <canvas class="ans" width="200" height="200" data-chart="doughnut" data-value="[{ value: 230, color: '#1ca8dd', label: 'Returning' }, { value: 130, color: '#1bc98e', label: 'New' }]" data-segment-stroke-color="#252830">
  </canvas>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"w-sm m-x-auto"</span><span class="as">&gt;</span>
  <span class="as">&lt;canvas</span>
    <span class="ai">class=</span><span class="ah">"ex-graph"</span>
    <span class="ai">width=</span><span class="ah">"200"</span> <span class="ai">height=</span><span class="ah">"200"</span>
    <span class="ai">data-chart=</span><span class="ah">"doughnut"</span>
    <span class="ai">data-value=</span><span class="ah">"[{ value: 230, color: '#1ca8dd', label: 'Returning' }, { value: 130, color: '#1bc98e', label: 'New' }]"</span>
    <span class="ai">data-segment-stroke-color=</span><span class="ah">"#252830"</span><span class="as">&gt;</span>
  <span class="as">&lt;/canvas&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h3 id="bar">Bar</h3>

<div class="bs" data-example-id="">
<div>
  <canvas class="ant" width="600" height="400" data-chart="bar" data-scale-line-color="transparent" data-scale-grid-line-color="rgba(255,255,255,.05)" data-scale-font-color="#a2a2a2" data-labels="['August','September','October','November','December','January','February']" data-value="[{ label: 'First dataset', data: [65, 59, 80, 81, 56, 55, 40] }, { label: 'Second dataset', data: [28, 48, 40, 19, 86, 27, 90] }]">
  </canvas>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div&gt;</span>
  <span class="as">&lt;canvas</span>
    <span class="ai">class=</span><span class="ah">"ex-line-graph"</span>
    <span class="ai">width=</span><span class="ah">"600"</span> <span class="ai">height=</span><span class="ah">"400"</span>
    <span class="ai">data-chart=</span><span class="ah">"bar"</span>
    <span class="ai">data-scale-line-color=</span><span class="ah">"transparent"</span>
    <span class="ai">data-scale-grid-line-color=</span><span class="ah">"rgba(255,255,255,.05)"</span>
    <span class="ai">data-scale-font-color=</span><span class="ah">"#a2a2a2"</span>
    <span class="ai">data-labels=</span><span class="ah">"['August','September','October','November','December','January','February']"</span>
    <span class="ai">data-value=</span><span class="ah">"[{ label: 'First dataset', data: [65, 59, 80, 81, 56, 55, 40] }, { label: 'Second dataset', data: [28, 48, 40, 19, 86, 27, 90] }]"</span><span class="as">&gt;</span>
  <span class="as">&lt;/canvas&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h3 id="line">Line</h3>

<div class="bs" data-example-id="">
<div>
  <canvas class="ant" data-chart="line" data-scale-line-color="transparent" data-scale-grid-line-color="rgba(255,255,255,.05)" data-scale-font-color="#a2a2a2" data-labels="['','Aug 29','','','Sept 5','','','Sept 12','','','Sept 19','']" data-value="[{fillColor: 'rgba(28,168,221,.03)', data: [2500, 3300, 2512, 2775, 2498, 3512, 2925, 4275, 3507, 3825, 3445, 3985]}]">
  </canvas>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div&gt;</span>
  <span class="as">&lt;canvas</span>
    <span class="ai">class=</span><span class="ah">"ex-line-graph"</span>
    <span class="ai">data-chart=</span><span class="ah">"line"</span>
    <span class="ai">data-scale-line-color=</span><span class="ah">"transparent"</span>
    <span class="ai">data-scale-grid-line-color=</span><span class="ah">"rgba(255,255,255,.05)"</span>
    <span class="ai">data-scale-font-color=</span><span class="ah">"#a2a2a2"</span>
    <span class="ai">data-labels=</span><span class="ah">"['','Aug 29','','','Sept 5','','','Sept 12','','','Sept 19','']"</span>
    <span class="ai">data-value=</span><span class="ah">"[{fillColor: 'rgba(28,168,221,.03)', data: [2500, 3300, 2512, 2775, 2498, 3512, 2925, 4275, 3507, 3825, 3445, 3985]}]"</span><span class="as">&gt;</span>
  <span class="as">&lt;/canvas&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>

<h3 id="sparkline">Sparkline</h3>

<div class="bs" data-example-id="">
<div class="fv">
  <div class="gr gk">
    <div class="apt ann">
      <div class="aly">
        <span class="ani">Page views</span>
        <h2 class="anh">
          12,938
          <small class="anj ank">5%</small>
        </h2>
        <hr class="anr aks" />
      </div>
      <canvas class="apu" data-chart="spark-line" data-value="[{data:[28,68,41,43,96,45,100]}]" data-labels="['a','b','c','d','e','f','g']" width="378" height="94">
      </canvas>
    </div>
  </div>
</div>
</div>
<div class="br"><pre><code class="aqd" data-lang="html"><span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"row"</span><span class="as">&gt;</span>
  <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"col-sm-6 col-md-4"</span><span class="as">&gt;</span>
    <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"statcard statcard-success"</span><span class="as">&gt;</span>
      <span class="as">&lt;div</span> <span class="ai">class=</span><span class="ah">"p-a"</span><span class="as">&gt;</span>
        <span class="as">&lt;span</span> <span class="ai">class=</span><span class="ah">"statcard-desc"</span><span class="as">&gt;</span>Page views<span class="as">&lt;/span&gt;</span>
        <span class="as">&lt;h2</span> <span class="ai">class=</span><span class="ah">"statcard-number"</span><span class="as">&gt;</span>
          12,938
          <span class="as">&lt;small</span> <span class="ai">class=</span><span class="ah">"delta-indicator delta-positive"</span><span class="as">&gt;</span>5%<span class="as">&lt;/small&gt;</span>
        <span class="as">&lt;/h2&gt;</span>
        <span class="as">&lt;hr</span> <span class="ai">class=</span><span class="ah">"statcard-hr m-b-0"</span><span class="as">&gt;</span>
      <span class="as">&lt;/div&gt;</span>
      <span class="as">&lt;canvas</span>
        <span class="ai">class=</span><span class="ah">"sparkline"</span>
        <span class="ai">data-chart=</span><span class="ah">"spark-line"</span>
        <span class="ai">data-value=</span><span class="ah">"[{data:[28,68,41,43,96,45,100]}]"</span>
        <span class="ai">data-labels=</span><span class="ah">"['a','b','c','d','e','f','g']"</span>
        <span class="ai">width=</span><span class="ah">"378"</span> <span class="ai">height=</span><span class="ah">"94"</span><span class="as">&gt;</span>
      <span class="as">&lt;/canvas&gt;</span>
    <span class="as">&lt;/div&gt;</span>
  <span class="as">&lt;/div&gt;</span>
<span class="as">&lt;/div&gt;</span></code></pre></div>



      <a class="docs-top" style="display: none" href="#">Back to top</a>
    </div>
  

    <script src="<?=$dir;?>/dashboard/js/jquery.min.js"></script>
    <script src="<?=$dir;?>/dashboard/js/chart.js"></script>
    <script src="<?=$dir;?>/dashboard/js/tablesorter.min.js"></script>
    <script src="<?=$dir;?>/dashboard/js/toolkit.js"></script>
    <script src="<?=$dir;?>/dashboard/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

