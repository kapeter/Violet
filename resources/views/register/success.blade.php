<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>年会注册页面</title>       
    <script type="text/javascript">
        var deviceWidth = document.documentElement.clientWidth;
        if(deviceWidth > 640) deviceWidth = 640;
        document.documentElement.style.fontSize = deviceWidth / 6.4 + 'px';
    </script>
    <link rel="stylesheet" href="{{ mix('css/register.css') }}">
</head>
<body>
    <div class="full-bg">
        <header class="header">
            <img src="/images/logo.png" alt="BenQ" class="logo">
        </header>
        <main class="main success">
            <div class="content">
                <img src="/images/ok.png">
                <h1>感谢参与问卷调查！</h1>
                <p>现在您已在抽奖池中，神秘大奖等你来拿~</p>
            </div>           
        </main>
    </div>
</body>
</html>
