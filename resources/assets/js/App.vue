<template>
	<div class="full-bg">
		<div class="video-box">
			<video :src="config.bgUrl" autoplay="autoplay" loop="loop">
				您的浏览器不支持 video 标签。
			</video>
		</div>
		<div v-if="is_locked">
			<div class="lock-box">
				<h1 class="title">Welcome To {{ config.name }}</h1>
				<form class="form" @submit.prevent="checkPwd()">
					<input type="password" name="password" class="form-control" placeholder="请输入解锁密码" v-model="lockPwd" @keyup.enter="submit">
					<button class="btn" @click="checkPwd()"><i class="iconfont">&#xe9d0;</i></button>
					<p class="error-text" v-if="errorText != ''">{{ errorText }}</p>
				</form>
				<img :src="config.codeUrl" alt="二维码">
				<p>微信扫描二维码，进入抽奖池</p>
			</div>
		</div>
		<div v-else class="main">
			<!-- 页面头部 -->
			<header class="header">
				<div>
					<img :src="config.logo" class="logo">
				</div>
				<div>
					<h1 class="title">{{ config.name }}</h1>
				</div>
				<div>
					<h1 class="num">当前抽奖池：{{ baseList.length }}人</h1>
				</div>
			</header>
			<!-- 内容区 -->
			<div class="content" id="content">
				<div v-if="!listVisiable">
					<div class="user-box" :style="{ height: userHeight + 'px' }" v-if="goalStatus == 0">
						<ul class="user-list">
							<li v-for="user in baseList">
								<div class="avatar">
									<img :src="user.headimgurl" :alt="user.nickname">
								</div>
								<p>{{ user.fullname }}</p>
							</li>
						</ul>
					</div>
					<div class="goal-box" v-else>
						<ul class="goal-list">
							<li v-for="user in activeList" :style="{ 'margin-top': goalMargin + 'px' }">
								<div class="avatar" :style="{ height: avatarContent + 'px', width: avatarContent + 'px' }">
									<img :src="user.headimgurl" :alt="user.nickname">
								</div>
								<p>{{ user.fullname }}</p>
							</li>
						</ul>
					</div>				
				</div>
				<div class="clearfix" v-else style="height: 100%">
					<div class="list-box">
						<table class="table">
							<caption>抽奖池名单</caption>
							<thead>
								<tr>
									<th>头像</th>
									<th>姓名</th>
									<th>员工工号</th>
								</tr>							
							</thead>
							<tbody>
								<tr v-for="user in baseList">
									<td><img :src="user.headimgurl" :alt="user.nickname"></td>
									<td>{{ user.fullname }}</td>
									<td>{{ user.number }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="list-box">
						<table class="table">
							<caption>已中奖名单</caption>
							<thead>
								<tr>
									<th>头像</th>
									<th>姓名</th>
									<th>员工工号</th>
								</tr>							
							</thead>
							<tbody>
								<tr v-for="user in goalList">
									<td><img :src="user.headimgurl" :alt="user.nickname"></td>
									<td>{{ user.fullname }}</td>
									<td>{{ user.number }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- 页面底部 -->
			<footer class="footer">
				<div class="copyright">
					<img src="/images/mylogo.png" alt="kapeter">
					<p>技术支持</p>
				</div>
				<div class="operation">
					<ul class="operation-list clearfix">
						<li class="adder">
							<button @click="reduceNum()" :class="{disabled: isOne || goalStatus != 0}">
								<i class="iconfont">&#xe9af;</i>
							</button>
						</li>
						<li>
							<button class="btn" @click="doGoal()" :class="{ 'btn-disabled': goalStatus == -1 }">{{ btnText }}</button>
						</li>
						<li class="adder">
							<button @click="addNum()" :class="{disabled: isFive || goalStatus != 0}">
								<i class="iconfont">&#xe985;</i>
							</button>
						</li>
					</ul>
				</div>
				<nav class="nav">
					<ul class="nav-list">
						<li>
							<button @click="returnLocked()">
								<div class="circle">
									<i class="iconfont">&#xe9ad;</i>
								</div>
								锁定页面
							</button>
						</li>
						<li>
							<button @click="modalVisiable = true">
								<div class="circle">
									<i class="iconfont">&#xe9cd;</i>
								</div>
								重置奖池
							</button>
						</li>
						<li>
							<button @click="toggleList()">
								<div class="circle">
									<i class="iconfont">&#xe9b4;</i>
								</div>
								查看列表
							</button>
						</li>
					</ul>
				</nav>
			</footer>			
		</div>
		<div class="modal-warper" v-if="modalVisiable">
			<div class="modal">
				<button class="close" @click="modalVisiable = false">
					<i class="iconfont">&#xe990;</i>
				</button>
				<div class="modal-content">
					重置奖池，意味着所有中过奖的用户将重新回到抽奖池。是否确认重置奖池？
				</div>
				<div class="modal-footer">
					<button class="modal-btn" @click="reset()">
						确 认
					</button>
					<button class="modal-btn" @click="modalVisiable = false">
						取 消
					</button>				
				</div>
			</div>			
		</div>
	</div>
</template>

<script>
	import config from './config.js'

	export default {
		data() {
			return {
				config: {},           // 页面配置  
				baseList: [],         // 抽奖池
				goalList: [],         // 已中奖名单
				activeList:[],        // 抽奖中的名单
				userHeight: 0,        // 用户列表高度
				goalNum: 1,           // 单次抽奖人数
				isOne: true,          // 最低单次抽一人
				isFive: false,        // 最高单次抽5人
				goalStatus: 0,        // 是否正在抽奖, 0为未抽奖，1为抽奖中，2为停止抽奖, 3呈现界面, -1为不可使用
				btnText: '1连抽',     //  按钮文本
				avatarContent: 0,     // 抽奖头像尺寸
				goalMargin: 0,        // 抽奖头像margin-top
				timer: null,          // 全局定时器
				modalVisiable: false, // 模态框是否可见
				listVisiable: false,  // 列表是否可见
				is_locked: true,      // 是否锁定页面
				lockPwd: '',          // 解锁密码
				errorText: '',        // 输入密码时的错误文本
				speed: 30,            // 定时器初始速度
			}
		},
		mounted() {
			this.loadListData();
			this.config = config;
		},
		watch: {
			baseList (val) {
				this.userHeight = Math.ceil(val.length / 8) * 195;
			},
			// 改变按钮文本
			goalStatus (val) {
				switch (val) {
					case 0:
						this.goalNum = 1;
						this.btnText = this.goalNum + '连抽';
						break;
					case 1:
						this.btnText = '停止抽奖';
						break;
					case 2:
						this.btnText = '返回界面';
						break;
					case 3:
						this.btnText = '关闭列表';
						
				}
			},
			// 改变按钮文本
			goalNum (val){
				this.btnText = val + '连抽';
				this.isFive = false;
				this.isOne = false;
				if (val == 5) {
					this.isFive = true;
				}
				if (val == 1) {
					this.isOne = true;
				}
			}
		},
		methods: {
			// 载入基础数据
			loadListData() {
				let _self = this;
				axios.get('/api/garden')
					.then(function (res) {
						_self.baseList = res.data.baseList;
						_self.goalList = res.data.goalList;
					})
			},
			// 减少单次抽奖人数
			reduceNum() {
				if (this.goalNum > 1){
					this.goalNum--;
				}
			},
			// 增加单次抽奖人数
			addNum() {
				if (this.goalNum < 5){
					this.goalNum++;
				}
			},
			// 开启抽奖
			doGoal() {
				switch (this.goalStatus) {
					case -1:
						return false
						break;
					case 0:
						this.start();
						break;
					case 1:
						this.stop();
						break;
					case 2:
						this.finish();
						break;
					case 3:
						this.listVisiable = false;
						this.goalStatus = 0;
						break;
				}
			},
			// 开始抽奖，抽奖动画
			start() {
				let _self = this;
				let len = _self.goalNum;
				let sum = _self.baseList.length;

				// 初始化
				_self.goalStatus = 1;
				_self.activeList = new Array();
				clearInterval(_self.timer);
				for (let i = 0; i < len; i++){
					let r = Math.floor(Math.random() * sum)  // 随机数
					_self.activeList.push(_self.baseList[r]);
				}

				// 计算头像尺寸
				let dom = document.getElementById('content');
				let h = dom.offsetHeight - 200;
				let w = (dom.offsetWidth - 60) / len - 30;
				_self.avatarContent = h > w ? w : h;
				_self.goalMargin = (dom.offsetHeight - _self.avatarContent - 164) / 2;

				// 变换动画
				_self.timer = setInterval(() => {
					for (let i = 0; i < len; i++){
						let r = Math.floor(Math.random() * sum);  // 随机数
						_self.activeList.splice(i, 1, _self.baseList[r]);
					}			
				},60);
			},
			// 提交数据，获得真正的获奖用户，动画停止
			stop() {
				let _self = this;
				_self.goalStatus = -1; 
				clearInterval(_self.timer);
				_self.setTimer();
				axios.post('/api/garden', { count: _self.goalNum })
					.then(function(res){
						setTimeout(() => {
							clearTimeout(_self.timer);
							_self.speed = 30;
							for (let i = 0; i < _self.goalNum; i++){
								_self.activeList.splice(i, 1, res.data[i]);
							}
							_self.loadListData();
							_self.goalStatus = 2; 
						}, 1500);							
					});
			},
			// 确定名单后的减速动画
			setTimer() {
				let _self = this
				let len = _self.goalNum;
				let sum = _self.baseList.length;
				_self.speed += 15;
				_self.timer = setTimeout(() => {
					for (let i = 0; i < len; i++){
						let r = Math.floor(Math.random() * sum);  // 随机数
						_self.activeList.splice(i, 1, _self.baseList[r]);
					}			
					_self.setTimer();		
				},_self.speed);
			},
			// 抽奖结束，回到列表
			finish() {
				let _self = this;
				_self.goalStatus = 0; 
				_self.goalNum = 1;
			},
			// 重置抽奖池
			reset() {
				let _self = this;
				axios.post('/api/garden/reset')
					.then(function (res) {
						_self.baseList = res.data.baseList;
						_self.goalList = res.data.goalList;
						_self.modalVisiable = false;
					})
			},
			// 控制列表显示
			toggleList() {
				if (this.listVisiable){
					this.listVisiable = false;
					this.goalStatus = 0;
				}else{
					this.listVisiable = true;
					this.goalStatus = 3;
				}
			},
			// 返回锁屏界面
			returnLocked() {
				this.lockPwd = '';
				this.errorText = '';
				this.is_locked = true;
			},
			// 检查解锁密码，如果密码正确，进入主页面
			checkPwd() {
				if (this.lockPwd == ''){
					this.errorText = "解锁密码不能为空!";
					return false;
				}
				if (this.lockPwd == this.config.password){
					this.is_locked = false;
				}else{
					this.errorText = "解锁密码错误!";
				}
			}
		}
	}
</script>
