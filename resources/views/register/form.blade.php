<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>调查问卷</title> 		
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
		<main class="main">
			<div class="content">
				<h1>问卷调查</h1>
				<p>感谢您对本次活动的大力支持！未来我们希望为您提供定制化的服务内容，因此需要您配合进行如下问卷调查，再次感谢您的填写！</p>
				<form class="form" id="form" action="/wechat/register" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label>1. 请您对本次会议的整体组织进行评分？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue1" value="5"> 5分</li>
							<li><input type="radio" name="issue1" value="4"> 4分</li>
							<li><input type="radio" name="issue1" value="3"> 3分</li>
							<li><input type="radio" name="issue1" value="2"> 2分</li>
							<li><input type="radio" name="issue1" value="1"> 1分</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>2. 请您对本次会议端木晓斌的报告<跃上新投，迁影成金>进行评分？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue2" value="5"> 5分</li>
							<li><input type="radio" name="issue2" value="4"> 4分</li>
							<li><input type="radio" name="issue2" value="3"> 3分</li>
							<li><input type="radio" name="issue2" value="2"> 2分</li>
							<li><input type="radio" name="issue2" value="1"> 1分</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>3. 请您对本次会议童思铭的<智能商务/会议平板>报告进行评分？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue3" value="5"> 5分</li>
							<li><input type="radio" name="issue3" value="4"> 4分</li>
							<li><input type="radio" name="issue3" value="3"> 3分</li>
							<li><input type="radio" name="issue3" value="2"> 2分</li>
							<li><input type="radio" name="issue3" value="1"> 1分</li>
						</ul>
					</div>
					<div class="form-group">
						<label>4. 请您对本次会议刘洋的<家用市场>报告进行评分？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue4" value="5"> 5分</li>
							<li><input type="radio" name="issue4" value="4"> 4分</li>
							<li><input type="radio" name="issue4" value="3"> 3分</li>
							<li><input type="radio" name="issue4" value="2"> 2分</li>
							<li><input type="radio" name="issue4" value="1"> 1分</li>
						</ul>
					</div>
					<div class="form-group">
						<label>5. 请您对本次会议蔡志昌的<教育市场>报告进行评分？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue5" value="5"> 5分</li>
							<li><input type="radio" name="issue5" value="4"> 4分</li>
							<li><input type="radio" name="issue5" value="3"> 3分</li>
							<li><input type="radio" name="issue5" value="2"> 2分</li>
							<li><input type="radio" name="issue5" value="1"> 1分</li>
						</ul>
					</div>
					<div class="form-group">
						<label>6. 请您对本次会议张志军的<工程/教育/商显市场>报告进行评分？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue6" value="5"> 5分</li>
							<li><input type="radio" name="issue6" value="4"> 4分</li>
							<li><input type="radio" name="issue6" value="3"> 3分</li>
							<li><input type="radio" name="issue6" value="2"> 2分</li>
							<li><input type="radio" name="issue6" value="1"> 1分</li>
						</ul>
					</div>			
					<div class="form-group">
						<label>7. 您公司所在的行业是？【单选】</label>
						<ul class="option-list">
							<li><input type="radio" name="issue7" value="IT卖场"> IT卖场</li>
							<li><input type="radio" name="issue7" value="渠道分销"> 渠道分销</li>
							<li><input type="radio" name="issue7" value="零散行业"> 零散行业</li>
							<li><input type="radio" name="issue7" value="ProAV"> ProAV</li>
							<li><input type="radio" name="issue7" value="系统集成"> 系统集成</li>
						</ul>
					</div>		
					<div class="form-group">
						<label>8. 您在公司所担任的职务是？【单选】</label>
						<ul class="option-list">
							<li><input type="radio" name="issue8" value="总经理"> 总经理</li>
							<li><input type="radio" name="issue8" value="销售经理"> 销售经理</li>
							<li><input type="radio" name="issue8" value="技术支持"> 技术支持</li>
							<li><input type="radio" name="issue8" value="市场推广"> 市场推广</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>9. 您的姓名 [填空]</label>
						<input type="text" name="fullname" placeholder="姓名">
					</div>
					<div class="form-group">
						<label>10. 您的联系方式 [填空]</label>
						<input type="text" name="phone" placeholder="联系方式">
					</div>
					<div class="form-group">
						<label>11. 您的邮箱 [填空]</label>
						<input type="text" name="email" placeholder="联系方式">
					</div>	
					<div class="form-group">
						<label>12. 您对本次会议有什么意见或者建议吗？【选填】</label>
						<textarea rows="5" name="suggest" placeholder="您对本次会议有什么意见或者建议吗？"></textarea>
					</div>			
					<div class="form-group">
						<button type="submit" id="btn">提交问卷</button>
					</div>
					<div class="error-text" id="error-text"></div>			
				</form>
			</div>			
		</main>

		<footer class="footer">
			<p>© 明基智能科技（上海）有限公司</p>
		</footer>
	</div>
</body>
	<script type="text/javascript">
		window.onload = function () {
			var oBtn = document.getElementById('btn');
			var oForm = document.getElementById('form');
			var errBox = document.getElementById('error-text');

			oBtn.addEventListener('click', function (event) {
				var e = event || window.event;
				e.preventDefault();

				if (document.querySelector('input[name=fullname]').value == ''){
					errBox.innerText = "请填写姓名";
					return false;
				}

				if (document.querySelector('input[name=phone]').value == ''){
					errBox.innerText = "请填写联系方式";
					return false;
				}

				if (document.querySelector('input[name=email]').value == ''){
					errBox.innerText = "请填写邮箱";
					return false;
				}

				var errCount = 0;
				for (var i = 1; i <= 8; i++){
					var oRadio = document.querySelectorAll('input[name=issue' + i + ']');
					var flag = false;
					for (var j = 0; j < oRadio.length; j++){
						if (oRadio[j].checked){
							flag = true;
							break;
						}
					}
					if (!flag) {
						errCount++;
					}
				}

				if (errCount > 0) {
					errBox.innerText = "您还有" + errCount + "题未填写答案，请完成问卷再提交，谢谢";
					return false;					
				}else {
					oForm.submit();
				}
				
			})
		}
	</script>
</html>
