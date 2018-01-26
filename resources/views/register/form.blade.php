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
		<main class="main">
			<div class="content">
				<h1>问卷调查</h1>
				<p>感谢您对本次活动的大力支持！未来我们希望为您提供定制化的服务内容，因此需要您配合进行如下问卷调查，再次感谢您的填写！</p>
				<form class="form" id="form" action="/wechat/register" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label>1. 您的姓名 [填空]</label>
						<input type="text" name="fullname" placeholder="姓名">
					</div>
					<div class="form-group">
						<label>2. 您的联系方式 [填空]</label>
						<input type="text" name="phone" placeholder="联系方式">
					</div>
					<div class="form-group">
						<label>3. 贵司主攻细分市场是？ [单选] *</label>
						<ul class="option-list">
							<li><input type="radio" name="topic3" value="1"> 餐饮</li>
							<li><input type="radio" name="topic3" value="2"> 连锁专卖</li>
							<li><input type="radio" name="topic3" value="3"> 商场百购</li>
							<li><input type="radio" name="topic3" value="4"> 超市/便利店</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>4. 贵司在此细分行业的性质是？ [单选] *</label>
						<ul class="option-list">
							<li><input type="radio" name="topic4" value="1"> 产品分销</li>
							<li><input type="radio" name="topic4" value="2"> 软件开发</li>
							<li><input type="radio" name="topic4" value="3"> 整体解决方案供应商</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>5. 您在贵司担任的是？[单选] *</label>
						<ul class="option-list">
							<li><input type="radio" name="topic5" value="1"> 销售专员/经理</li>
							<li><input type="radio" name="topic5" value="2"> 推广专员/经理</li>
							<li><input type="radio" name="topic5" value="3"> 采购决策者</li>
							<li><input type="radio" name="topic5" value="4"> 高层管理者</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>6. 贵司在之前是否接触过大屏相关业务？[单选] *</label>
						<ul class="option-list">
							<li><input type="radio" name="topic6" value="1"> 了解过，且有相关业务</li>
							<li><input type="radio" name="topic6" value="2"> 了解过，但未涉及</li>
							<li><input type="radio" name="topic6" value="3"> 完全不了解</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>7. 在未来业务开拓过程中，您会关注商用屏的应用吗？[单选] *</label>
						<ul class="option-list">
							<li><input type="radio" name="topic7" value="1"> 会关注，且有项目在跟进</li>
							<li><input type="radio" name="topic7" value="2"> 会关注，暂无相关项目</li>
							<li><input type="radio" name="topic7" value="3"> 不会关注</li>
						</ul>
					</div>
					<div class="form-group">
						<label>8. 以下哪些内容您比较感兴趣？[多选] *</label>
						<ul class="option-list" id="topic8">
							<li><input type="checkbox" name="topic8_1" value="1"> 零售相关产品及技术</li>
							<li><input type="checkbox" name="topic8_2" value="1"> 零售行业趋势讲解</li>
							<li><input type="checkbox" name="topic8_3" value="1"> 零售新兴方案应用</li>
							<li><input type="checkbox" name="topic8_4" value="1"> 线下活动资讯</li>
						</ul>
					</div>
					<div class="form-group">
						<label>9. 以下哪些活动您比较感兴趣？[多选] *</label>
						<ul class="option-list" id="topic9">
							<li><input type="checkbox" name="topic9_1" value="1"> 论坛交流会/分享会</li>
							<li><input type="checkbox" name="topic9_2" value="1"> 新品发布会</li>
							<li><input type="checkbox" name="topic9_3" value="1"> 行业展会观展</li>
							<li><input type="checkbox" name="topic9_4" value="1"> 定期经销商会议</li>
						</ul>
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

				var errCount = 0;
				for (var i = 3; i <= 7; i++){
					var oRadio = document.querySelectorAll('input[name=topic' + i + ']');
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

				for (var i = 8; i <= 9; i++){
					var oUl = document.getElementById('topic' + i);
					var oCheckbox = oUl.querySelectorAll('input');
					var flag = false;
					for (var j = 0; j < oCheckbox.length; j++){
						if (oCheckbox[j].checked){
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
