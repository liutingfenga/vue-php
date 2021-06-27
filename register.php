<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./lib/element-ui.css">
    <link rel="stylesheet" href="./lib/element-icons.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./lib/tailwind.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/register.css">
</head>

<body>


    <div id="app">
        <!-- 顶部 -->
        <div class="w">
            <div class="top">
                <div class="top_left">
                    <img src="./images/logo.png" alt="" srcset="">
                </div>
                <h1>欢迎注册</h1>

            </div>

        </div>



        <!-- 登录 -->
        <div class="login_main">
            <div class="max-w-screen-xl m-0  bg-white shadow sm:rounded-lg flex justify-center flex-1 ">
                <!-- <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                    <div class="  w-full bg-contain bg-center " style="background-image: url(./images/login.png);width:100%"></div>
                </div> -->
                <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                    <div class="mt-12 flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl font-extrabold">用户注册</h1>
                        <div class="w-full flex-1 mt-8">



                            <div class="mx-auto max-w-xs">
                                <div class="relative">
                                    <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" v-model="zhanghao" @change="getzhanghao" type="text" placeholder="账号    必须为字母开头，6-16位" />
                                    <span v-if="zhanghaoshow1" v-cloak class="absolute" style="top:15px;width:288px;color:red;font-size:14px">*账号格式错误:必须为字母开头，6-16位</span>
                                    <span v-if="zhanghaoshow2" v-cloak class="absolute" style="top:15px;width:288px;color:#67c23a;font-size:14px">*账号格式正确</span>
                                </div>
                                <div class="relative">
                                    <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" v-model="mima" @change="getmima" type="password" placeholder="密码    必须为6-16位字母或数字" />
                                    <span v-if="mimashow1" v-cloak class="absolute" style="top:38px;width:288px;color:red;font-size:14px">*密码格式错误:必须为6-16位字母或数字</span>
                                    <span v-if="mimashow2" v-cloak class="absolute" style="top:38px;width:288px;color:#67c23a;font-size:14px">*密码格式正确</span>

                                </div>
                                <div class="relative">
                                    <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" v-model="shouji" @change="getshouji" type="tel" placeholder="手机号" />
                                    <span v-if="shoujishow1" v-cloak class="absolute" style="top:38px;width:288px;color:red;font-size:14px">*手机格式错误:11位手机号</span>
                                    <span v-if="shoujishow2" v-cloak class="absolute" style="top:38px;width:288px;color:#67c23a;font-size:14px">*手机格式正确</span>
                                </div>

                                <div class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5">
                                    <span style="margin-right: 20px; color:#a0aec0">性别:</span>
                                    <el-radio v-model="xingbie" label="男" @change="getxingbie">男</el-radio>
                                    <el-radio v-model="xingbie" label="女" @change="getxingbie">女</el-radio>
                                </div>
                                <div class="relative">
                                    <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" v-model="youxiang" @change="getyouxiang" type="email" placeholder="邮箱" />
                                    <span v-if="youxiangshow1" v-cloak class="absolute" style="top:38px;width:288px;color:red;font-size:14px">*邮箱格式错误:例如xx@qq.com</span>
                                    <span v-if="youxiangshow2" v-cloak class="absolute" style="top:38px;width:288px;color:#67c23a;font-size:14px">*邮箱格式正确</span>

                                </div>
                                <div class="relative">
                                    <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" v-model="dizhi" @change="getdizhi" type="text" placeholder="地址" />

                                </div>
                                <div class="flex w-full relative">
                                    <input class="w-40 px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" v-model="yanzhengma" @change="getyanzhengma" type="text" placeholder="验证码" />
                                    <img class="" :src="yzmurl" title="看不清，点击换一张" @click="hyzm" style="width: 50%;height:50%; margin:0 auto;margin-top:21px;margin-left:5px">
                                    <span v-if="yzmshow1" v-cloak class="absolute" style="left: 320px;top:38px;width:288px;color:red;font-size:14px">*验证码错误</span>
                                    <span v-if="yzmshow2" v-cloak class="absolute" style="left: 320px;top:38px;width:288px;color:#67c23a;font-size:14px">*验证码正确</span>

                                </div>

                                <button @click="tijiao" class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span class="ml-3">注 册</span>
                                </button>
                                <div class="mt-6 text-xs text-gray-600 text-center">
                                    <el-checkbox v-model="xieyi" @change="getxieyi"></el-checkbox>
                                    <span>我同意并遵守服务协议</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>












       <!-- 底部版权 -->
    <div class="foot-box">
        <div class="foot-top">
            <div class="foot-ul">
                <ul>
                    <li class="ft-1">严格准入标准</li>
                    <li class="ft-2">七天无理由退货</li>
                    <li class="ft-3">15天免费换货</li>
                    <li class="ft-4">全场包邮</li>
                </ul>
            </div>
        </div>
        <div class="foot-bottom">
            <div class="foot-left">
                <div class="lt">
                    售后服务电话 ：
                    <a href="javascript:;">400-3320050225</a>
                    <span>（周一至周五9:00-18:00）</span>
                </div>
                <div class="lb">
                    <span>©2021信管二班</span>
                    <a href="javascript:;">使用前必读</a>
                    <a href="javascript:;">关于我们</a>
                    <a href="javascript:;">服务条款</a>
                    <a href="javascript:;">意见反馈</a>
                    <a href="javascript:;">售后政策</a>
                    <a href="javascript:;">合作咨询</a>
                </div>
            </div>
            <div class="foot-right">

                <div class="content-info">

                    <div class="info-right">
                        <img src="./images/wx.jpg" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

        <el-button :plain="true">成功</el-button>
        <el-button :plain="true">警告</el-button>
        <el-button :plain="true">消息</el-button>
        <el-button :plain="true">错误</el-button>
    </div>
</body>

<script src="./lib/vue.js"></script>
<script src="./lib/vue-resource.min.js"></script>
<script src="./lib/element-ui.js"></script>
<script src="./lib/jquery-3.5.1.min.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            zhanghao: "", //账号
            mima: "", //密码
            shouji: "", //手机号
            xingbie: '男', //性别
            youxiang: "", //邮箱
            dizhi: "", //地址
            yanzhengma: '', //验证码
            xieyi: false, //协议
            zhanghaoshow1: false, //错误账号提示
            zhanghaoshow2: false, //成功账号提示

            mimashow1: false, //错误密码提示
            mimashow2: false, //成功密码提示

            shoujishow1: false, //错误手机提示
            shoujishow2: false, //成功手机提示

            youxiangshow1: false, //错误邮箱提示
            youxiangshow2: false, //成功邮箱提示

            yzmshow1: false, //错误验证码提示
            yzmshow2: false, //正确验证码提示

            yzmyz: false, //验证码验证
            yzmurl: './code_num.php',
            xieyi:true

        },

        mounted() {

        },
        methods: {
            // 验证码
            hyzm: function() {
                this.yzmurl = 'code_num.php?' + Math.random()
            },
            //账号事件
            getzhanghao() {
                this.zhanghaoshow1 = false
                this.zhanghaoshow2 = false
                var zhzz = /^[a-zA-Z][a-zA-Z0-9]{5,16}$/
                if (zhzz.test(this.zhanghao)) {
                    this.zhanghaoshow2 = true
                } else {
                    this.zhanghaoshow1 = true
                }
            },
            // 密码事件
            getmima() {
                this.mimashow1 = false
                this.mimashow2 = false
                var mmzz = /^[a-zA-Z0-9]{5,16}$/
                if (mmzz.test(this.mima)) {
                    this.mimashow2 = true
                } else {
                    this.mimashow1 = true
                }
            },
            // 手机号事件
            getshouji() {
                this.shoujishow1 = false
                this.shoujishow2 = false
                var sjzz = /^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/
                console.log(this.shouji);
                if (sjzz.test(this.shouji)) {
                    this.shoujishow2 = true
                } else {
                    this.shoujishow1 = true
                }
            },
            // 邮箱事件
            getyouxiang() {
                this.youxiangshow1 = false
                this.youxiangshow2 = false
                var yxzz = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/

                if (yxzz.test(this.youxiang)) {
                    this.youxiangshow2 = true
                } else {
                    this.youxiangshow1 = true
                }
            },
            // 地址事件
            getdizhi() {
                console.log(this.dizhi);
            },
            // 验证码事件
            getyanzhengma() {
                this.yzmyz = false
                this.yzmshow1 = false
                this.yzmshow2 = false
                console.log(11111111111);
                if (typeof(parseInt(this.yanzhengma)) == "number") {
                    var yzm = parseInt(this.yanzhengma)
                    this.$http.post('./chk_code.php?', {
                        code: yzm
                    }, {
                        emulateJSON: true
                    }).then(response => {
                        if (response.body == '1') {
                            this.yzmshow2 = true
                            this.yzmyz = true
                        } else {
                            this.yzmshow1 = true
                        }

                    }, function() {
                        console.log('获取轮播图请求失败处理');
                    });
                } else {
                    this.yzmshow1 = true
                }
            },

            // 性别
            getxingbie() {
                console.log(this.xingbie, 'xxx');
            },
            // 选择协议
            getxieyi(e) {
                this.xieyi = e
                console.log(this.xieyi);
            },
            // 提交
            tijiao: function() {
                // show2 是正确提示
                if (this.zhanghaoshow2 & this.mimashow2 & this.shoujishow2 & this.youxiangshow2 & this.yzmyz &this.xieyi) {
                    this.$http.post('./getregister.php', {
                        zhanghao: this.zhanghao,
                        mima: this.mima,
                        shouji: this.shouji,
                        xingbie: this.xingbie,
                        youxiang: this.youxiang,
                        dizhi: this.dizhi
                    }, {
                        emulateJSON: true
                    }).then(response => {
                        console.log(response.body);
                        if (response.body == 1) {
                            this.$message({
                                message: '账号已存在，请重新注册！',
                                type: 'warning'
                            });
                        } else {
                            this.$message({
                                message: '恭喜你，注册成功！',
                                type: 'success'
                            });
                            setTimeout(function() {
                            window.location.href = './login.php'
                        }, 1500);
                        }
                    }, function() {
                        this.$message({
                            message: '注册请求失败！',
                            type: 'warning'
                        });
                    });
                } else {
                    this.$message({
                        message: '注册信息填写完整！',
                        type: 'warning'
                    });
                }


            },


            // 成功提示
            chenggong() {
                this.$message({
                    message: '恭喜你，成功注册',
                    type: 'success'
                });
            },
            // 失败提示
            shibai() {
                this.$message({
                    message: '很遗憾，注册失败',
                    type: 'warning'
                });
            },





        }

    })
</script>

</html>