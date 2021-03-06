<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{getenv('GOOGLE_ANALYTICS')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{getenv('GOOGLE_ANALYTICS')}}');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{getenv('APP_NAME')}} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{assets('css/default.css')}}">
    @yield('ogp')
    @yield('css')
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="header-tittle">
            <a href="/" class="header-tittle-color">{{getenv('APP_NAME')}}</a>
        </div>
    </div>
    @yield('content')
    <div class="footer">
        <div class="footer-links">
            <a href="/text/site.html" class="footer-link">{{getenv('APP_NAME')}}について</a>
            <a href="/" class="footer-link">よくある質問</a>
            <a href="/text/terms.html" class="footer-link">利用規約</a><br/>
            <a href="/text/privacy.html" class="footer-link">プライバシーポリシー</a>
            <a href="/" class="footer-link">お問い合わせ</a>
            <a href="/" class="footer-link">公式ツイッター</a>
        </div>
        <div class="footer-copy">Copyright &copy; replica.tokyo All Rights Reserved by <a href="https://twitter.com/syo_pr">Syo Yamaguchi</a></div>
    </div>
    @yield('nvi')
</div>
<script type="text/javascript" src="{{assets('js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{assets('js/main.min.js')}}"></script>
</body>
</html>
