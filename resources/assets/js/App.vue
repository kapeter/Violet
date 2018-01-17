<template>
	<div class="full-bg">
		<div class="video-box">
			<video src="/media/bg.mp4" autoplay="autoplay" loop="loop">
				您的浏览器不支持 video 标签。
			</video>
		</div>
		<header class="header">
			<div>
				<img src="/images/logo.png" class="logo">
			</div>
			<div>
				<h1 class="title">Violet System</h1>
			</div>
			<div>
				<h1 class="num">当前抽奖池：{{ baseList.length }}人</h1>
			</div>
		</header>
		<div class="content" id="content">
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
		<footer class="footer">
			<div class="copyright">
				<img src="/images/mylogo.png" alt="kapeter">
				<p>技术支持</p>
			</div>
			<div class="operation">
				<ul class="operation-list clearfix">
					<li class="adder">
						<a href="javascript:;" @click="reduceNum()" :class="{disabled: isOne || goalStatus != 0}">
							<i class="iconfont">&#xe9af;</i>
						</a>
					</li>
					<li>
						<button class="btn" @click="doGoal()">{{ btnText }}</button>
					</li>
					<li class="adder">
						<a href="javascript:;" @click="addNum()" :class="{disabled: isFive || goalStatus != 0}">
							<i class="iconfont">&#xe985;</i>
						</a>
					</li>
				</ul>
			</div>
			<nav class="nav">
				<ul class="nav-list">
					<li>
						<a href="javascript:;">
							<div class="circle">
								<i class="iconfont">&#xe9ad;</i>
							</div>
							锁定页面
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<div class="circle">
								<i class="iconfont">&#xe9cd;</i>
							</div>
							重置奖池
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<div class="circle">
								<i class="iconfont">&#xe9b4;</i>
							</div>
							查看列表
						</a>
					</li>
				</ul>
			</nav>
		</footer>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				baseList: [],     // 抽奖池
				goalList: [],     // 已中奖名单
				activeList:[],    // 抽奖中的名单
				userHeight: 0,    // 用户列表高度
				goalNum: 1,       // 单次抽奖人数
				isOne: true,      // 最低单次抽一人
				isFive: false,    // 最高单次抽5人
				goalStatus: 0,       // 是否正在抽奖, 0为未抽奖，1为抽奖中，2为停止抽奖
				btnText: '1连抽',      
				avatarContent: 0,
				goalMargin: 0,
				timer: null, 
			}
		},
		mounted() {
			this.loadListData();
		},
		watch: {
			baseList (val) {
				this.userHeight = Math.ceil(val.length / 9) * 195;
			},
			goalStatus (val) {
				switch (val) {
					case 0:
						this.btnText = this.goalNum + '连抽';
						break;
					case 1:
						this.btnText = '停止抽奖';
						break;
					case 2:
						this.btnText = '确认名单';
						break;
				}
			},
			goalNum (val){
				this.btnText = val + '连抽';
			}
		},
		methods: {
			loadListData() {
				let _self = this;
				axios.get('/api/garden')
					.then(function (res) {
						_self.baseList = res.data.baseList;
						_self.goalList = res.data.goalList;
						_self.baseCount = _self.baseList.length;
					})
			},
			reduceNum() {
				if (this.goalNum > 1){
					this.goalNum--;
					this.isFive = false;
				}else{
					this.isOne = true;
				}
			},
			addNum() {
				if (this.goalNum < 5){
					this.goalNum++;
					this.isOne = false;
				}else{
					this.isFive = true;
				}
			},
			// 开启抽奖
			doGoal() {
				switch (this.goalStatus) {
					case 0:
						this.start();
						break;
					case 1:
						this.stop();
						break;
					case 2:
						this.finish();
						break;
				}
			
			},
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
			stop() {
				let _self = this;
				_self.goalStatus = 2; 
			},
			finish() {
				let _self = this;
				_self.goalStatus = 0; 
			}

		}
	}
</script>
