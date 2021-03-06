<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>问卷调查</title> 		
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
				<p>填写问卷即可参与晚宴抽奖，有机会赢取价值1999元明基Hatha台灯一部！</p>
				<form class="form" id="form" action="/wechat/register" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label>1. 请您对本次会议的整体组织进行评分。</label>
						<ul class="option-list">
							<li><input type="radio" name="issue1" value="5"> 5分</li>
							<li><input type="radio" name="issue1" value="4"> 4分</li>
							<li><input type="radio" name="issue1" value="3"> 3分</li>
							<li><input type="radio" name="issue1" value="2"> 2分</li>
							<li><input type="radio" name="issue1" value="1"> 1分</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>2. 请您对本次会议陈凯耀的报告<跃上新投，引领新趋势>进行评分。</label>
						<ul class="option-list">
							<li><input type="radio" name="issue2" value="5"> 5分</li>
							<li><input type="radio" name="issue2" value="4"> 4分</li>
							<li><input type="radio" name="issue2" value="3"> 3分</li>
							<li><input type="radio" name="issue2" value="2"> 2分</li>
							<li><input type="radio" name="issue2" value="1"> 1分</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>3. 请您对本次会议黄仁宏的报告<跃上新投，为销售插上一双翅膀>进行评分。</label>
						<ul class="option-list">
							<li><input type="radio" name="issue3" value="5"> 5分</li>
							<li><input type="radio" name="issue3" value="4"> 4分</li>
							<li><input type="radio" name="issue3" value="3"> 3分</li>
							<li><input type="radio" name="issue3" value="2"> 2分</li>
							<li><input type="radio" name="issue3" value="1"> 1分</li>
						</ul>
					</div>
					<div class="form-group">
						<label>4. 请您对本次会议端木晓斌的报告<渠道为王，迁影成金>进行评分。</label>
						<ul class="option-list">
							<li><input type="radio" name="issue4" value="5"> 5分</li>
							<li><input type="radio" name="issue4" value="4"> 4分</li>
							<li><input type="radio" name="issue4" value="3"> 3分</li>
							<li><input type="radio" name="issue4" value="2"> 2分</li>
							<li><input type="radio" name="issue4" value="1"> 1分</li>
						</ul>
					</div>
					<div class="form-group">
						<label>5. 请您对本次会议刘茂瑞的报告<烈火燎原，迁影成金>进行评分	。</label>
						<ul class="option-list">
							<li><input type="radio" name="issue5" value="5"> 5分</li>
							<li><input type="radio" name="issue5" value="4"> 4分</li>
							<li><input type="radio" name="issue5" value="3"> 3分</li>
							<li><input type="radio" name="issue5" value="2"> 2分</li>
							<li><input type="radio" name="issue5" value="1"> 1分</li>
						</ul>
					</div>
					<div class="form-group">
						<label>6. 请您对本次会议许斌的报告<厚积薄发，迁影成金>进行评分。</label>
						<ul class="option-list">
							<li><input type="radio" name="issue6" value="5"> 5分</li>
							<li><input type="radio" name="issue6" value="4"> 4分</li>
							<li><input type="radio" name="issue6" value="3"> 3分</li>
							<li><input type="radio" name="issue6" value="2"> 2分</li>
							<li><input type="radio" name="issue6" value="1"> 1分</li>
						</ul>
					</div>			
					<div class="form-group">
						<label>7. 您对本次会议报告中的哪些内容比较感兴趣【可多选】	</label>
						<ul class="option-list">
							<li><input type="checkbox" class="checkbox" name="issue7[]" value="市场趋势"> 市场趋势</li>
							<li><input type="checkbox" class="checkbox" name="issue7[]" value="技术发展"> 技术发展</li>
							<li><input type="checkbox" class="checkbox" name="issue7[]" value="产品介绍"> 产品介绍</li>
							<li><input type="checkbox" class="checkbox" name="issue7[]" value="方案动态"> 方案动态</li>
							<li><input type="checkbox" class="checkbox" name="issue7[]" value="行销活动"> 行销活动</li>
							<li>
								<p><input type="checkbox" class="checkbox" name="issue7[]" value="其他"> 其他</p>
								<textarea name="issue7_more" placeholder="其他"></textarea>
							</li>
						</ul>
					</div>		
					<div class="form-group">
						<label>8. 您认为本次会议相关议题交流对于您自身业务的帮助大吗？</label>
						<ul class="option-list">
							<li><input type="radio" name="issue8" value="帮助很大"> 帮助很大</li>
							<li><input type="radio" name="issue8" value="有帮助，但无重大作用"> 有帮助，但无重大作用</li>
							<li><input type="radio" name="issue8" value="帮助不大"> 帮助不大</li>
							<li><input type="radio" name="issue8" value="无帮助"> 无帮助</li>
						</ul>
					</div>	
					<div class="form-group">
						<label>9. 您的姓名？【必填】</label>
						<input type="text" name="fullname" placeholder="您的姓名？">
					</div>	
					<div class="form-group">
						<label>10.您对本次会议的心得与感想（心得写得好，中奖机会高）【选填】	</label>
						<textarea rows="5" name="think" placeholder="您对本次会议有什么意见或者建议吗？"></textarea>
					</div>	
					<div class="form-group">
						<label>11.如果您对本次会议有什么意见或者建议，请填写在下方【选填】</label>
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

				// var phone = document.querySelector('input[name=phone]').value;
				// if (phone == ''){
				// 	errBox.innerText = "请填写联系方式";
				// 	return false;
				// }

				// if (!isPhoneAvailable(phone)) {
				// 	errBox.innerText = "手机号格式错误";
				// 	return false;
				// }


				// var mail = document.querySelector('input[name=email]').value
				// if (mail == ''){
				// 	errBox.innerText = "请填写邮箱";
				// 	return false;
				// }
				// if (!isMailAvailable(mail)){
				// 	errBox.innerText = "邮箱格式错误";
				// 	return false;					
				// }

				var errCount = 0;
				for (var i = 1; i <= 8; i++){
					var flag = false;
					if (i == 7){
						var oCheck = document.querySelectorAll('.checkbox');
						for (var j = 0; j < oCheck.length; j++){
							if (oCheck[j].checked){
								flag = true;
								break;
							}
						}
					}else{
						var oRadio = document.querySelectorAll('input[name=issue' + i + ']');
						for (var j = 0; j < oRadio.length; j++){
							if (oRadio[j].checked){
								flag = true;
								break;
							}
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

			function isPhoneAvailable(phone) {  
			   var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;  
			   if (!myreg.test(phone)) {  
			     return false;  
			   } else {  
			     return true;  
			   }  
			}

			function isMailAvailable(mail) {  
			   var myreg = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/;  
			   if (!myreg.test(mail)) {  
			     return false;  
			   } else {  
			     return true;  
			   }  
			}
		}
	</script>
</html>
