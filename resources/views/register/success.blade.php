<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>年会注册页面</title>       
    <script type="text/javascript">
        var deviceWidth = document.documentElement.clientWidth;
        if(deviceWidth > 640) deviceWidth = 640;
        document.documentElement.style.fontSize = deviceWidth / 6.4 + 'px';
    </script>
    <link rel="stylesheet" href="{{ mix('css/register.css') }}">
</head>
<body>
    <div class="register-bg">
        <div class="logo">
            <img src="/images/logo.png" alt="BenQ">
        </div>
        <div class="content">
            <img src="{{ $user['headimgurl'] }}" class="avatar">
            <h1>{{ $user['fullname'] }}</h1>
            <p>欢迎参加2018年部门年会。</p>
            <p>您已进入抽奖池，祝您好运。</p>
            <img src="/images/it.png" alt="map" class="map">
            <p class="text-left">地址：新区玉山路69号(近馨泰花园北门)</p>
            <p class="text-left">时间：1月19日 18:00</p>
        </div>
        <div class="copyright">
            <p>Published By Kapeter</p>
        </div>
    </div>
</body>
</html>
