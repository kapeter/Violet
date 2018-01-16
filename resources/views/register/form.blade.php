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
			<img src="images/logo.png" alt="BenQ">
		</div>
		<div class="content">
			<img src="{{ $user['headimgurl'] }}" class="avatar">
			<h1>{{ $user['nickname'] }}</h1>
			<p>欢迎参加2018年部门年会。</p>
			<p>请填写以下信息，参加年会抽奖。</p>
			<form class="form" id="form" action="/register" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="text" name="name" placeholder="真实姓名">
				</div>
				<div class="form-group">
					<input type="text" name="number" placeholder="员工工号">
				</div>	
				<div class="form-group">
					<button type="submit" id="btn">提交信息</button>
				</div>
				<div class="error-text" id="error-text"></div>			
			</form>
		</div>
		<div class="copyright">
			<p>Published By Kapeter</p>
		</div>
	</div>
</body>
	<script type="text/javascript">
		window.onload = function () {
			var oBtn = document.getElementById('btn');
			var oForm = document.getElementById('form');
			var inputList = oForm.querySelectorAll('input');
			var errBox = document.getElementById('error-text');

			oBtn.addEventListener('click', function (event) {
				var e = event || window.event;
				e.preventDefault();
				for (var i = 0; i < inputList.length; i++){
					if (inputList[i].value == ''){
						errBox.innerText = '请填写完整信息。';
						return false;
					}
				}
				oForm.submit();
			})
		}
	</script>
</html>
