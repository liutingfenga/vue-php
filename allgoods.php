<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>哆啦购物-正品低价、品质保障、配送及时、轻松购物！</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./lib/element-ui.css">
    <link rel="stylesheet" href="./lib/element-icons.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/allgoods.css">
    <style>
        .list-item {
            display: flex;
            flex-wrap: wrap;
        }

        .list-box {
            margin-right: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>


    <div id="app">
        <div class="duola-top">
            <div class="w">
                <div class="top_main">
                    <el-link class="top_main_a" @click="denglu" type="info" v-if="huanying">hi~请登录</el-link>
                    <el-link class="top_main_a" type="info" v-else>你好，会员{{uname}}！</el-link>
                    <el-link class="top_main_a" @click="zhuce" type="info">注册</el-link>
                </div>
            </div>


        </div>
        <!-- 顶部 -->
        <div class="w">
            <div class="top">
                <div class="top_left">
                    <img src="./images/logo.png" alt="" srcset="">
                </div>

                <div class="top_right">
                    <el-input v-model="sousuovalue" placeholder="请输入搜索商品"></el-input>
                    <el-dropdown @command="sousuoCommand" style="width:100px;height:38px;border-radius: 0 0 0 0;border: 1px solid #DCDFE6;padding-left: 25px;" trigger="click">
                        <span class="el-dropdown-link" style="text-align: center;color: #ccc;line-height: 40px;">
                            {{leibie}}<i class="el-icon-arrow-down el-icon--right "></i>
                        </span>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item command="毛绒玩具">毛绒玩具</el-dropdown-item>
                            <el-dropdown-item command="金属玩具">金属玩具</el-dropdown-item>
                            <el-dropdown-item command="塑料玩具">塑料玩具</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <el-button style="border-radius: 0 4px 4px 0;" type="primary" icon="el-icon-search" @click="getsousuo()"></el-button>
                </div>

                <div class="user" v-if="xxshow">
                    <div class="top_car">
                        <el-badge :value=cartlength class="item">
                            <el-button size="small" icon="el-icon-shopping-cart-full" @click="gotocar()">购物车</el-button>
                        </el-badge>
                    </div>

                    <div>
                        <el-dropdown trigger="hover" placement="bottom" @command="handleCommand">
                            <span class="el-dropdown-link">
                                <!-- 下拉菜单<i class="el-icon-arrow-down el-icon--right"></i> -->
                                <el-avatar :src="nodengluurl"></el-avatar>

                            </span>
                            <el-dropdown-menu slot="dropdown">
                                <el-dropdown-item icon="el-icon-user" command="geren">个人中心</el-dropdown-item>
                                <!-- <el-dropdown-item icon="el-icon-edit-outline" command="xiugai">修改密码</el-dropdown-item> -->
                                <el-dropdown-item icon="el-icon-switch-button" command="tuichu">退出账号</el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                    </div>
                </div>



                <!-- 修改密码
                <el-dialog title="修改密码" :visible.sync="xiugaimimashow" width="30%" center>
                    <el-input v-model="mima" placeholder="密码"></el-input>
                    <span slot="footer" class="dialog-footer">
                        <el-button @click="xiugaimimashow = false">取 消</el-button>
                        <el-button type="primary" @click="getmima()">确 定</el-button>
                    </span>
                </el-dialog> -->

            </div>
        </div>

        <!-- 导航栏 -->
        <div class="nav">
            <div class="w">
                <div style="display: flex; justify-content: space-between;   min-width: 1000px;">
                    <div class="nav-left" @click="mouseOver" @mouseleave="mouseLeave">
                        <span class="before">
                            <span class="before1"></span>
                            <span class="before2"></span>
                            <span class="before3"></span>
                        </span>
                        <span style="height: 60px;line-height: 60px;display: inline-block;vertical-align: middle;">SHOP BY CATEGORIES</span>
                        <div class="nav-down" v-if="xiala">
                                                       <p> <a href="./allgoods.php">毛绒玩具</a> </p>
                            <p> <a href="./allgoods.php">金属玩具</a> </p>
                            <p> <a href="./allgoods.php">塑料玩具</a> </p>
                        </div>
                    </div>

                    <div class="top_nav">
                        <el-link class="top_nav_size" href="./index.php">主页</el-link>
                        <el-link class="top_nav_size" href="./allgoods.php">玩具</el-link>
                        <el-link class="top_nav_size" href="./about.php">关于</el-link>
                    </div>
                    <div style="margin-left:70px;font-size:20px; color:#606266; font-weight: 400;">
                        <i class="el-icon-box"></i>
                        <span>注册会员免运费</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- 商品区 -->
        <el-divider></el-divider>

        <div class="goods" v-if="sousoshow">
            <div class="w">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>搜索到{{sousuolength}}相关商品</span>
                    </div>
                    <div class="text item">
                        <p>品牌：<el-tag effect="dark">全部</el-tag>
                            <el-tag effect="plain" type="info">哆啦</el-tag>
                            <el-tag effect="plain" type="info">奥迪</el-tag>
                            <el-tag effect="plain" type="info">乐高</el-tag>
                            <el-tag effect="plain" type="info">万代</el-tag>
                        </p>
                        <el-divider></el-divider>
                        <p>种类：<el-tag effect="dark">全部</el-tag>
                            <el-tag effect="plain" type="info">毛绒玩具</el-tag>
                            <el-tag effect="plain" type="info">金属玩具</el-tag>
                            <el-tag effect="plain" type="info">电动玩具</el-tag>
                        </p>
                        <el-divider></el-divider>
                        <p>选购热点：<el-tag effect="dark">全部</el-tag>
                            <el-tag effect="plain" type="info">玩具电话</el-tag>
                            <el-tag effect="plain" type="info">音乐盒</el-tag>
                            <el-tag effect="plain" type="info">遥控器</el-tag>
                        </p>

                    </div>
                </el-card>
                <el-tabs type="border-card">
                    <el-tab-pane label="全部">
                        <div class="list-item">
                            <div class="list-box" v-for="item in sousuo" :key="item.id" @click="goodsid(item.id)">
                                <img :src="item.picture" style="width: 200px;">
                                <p>{{item.goods_name}}</p>
                                <span>{{item.price}}￥</span>
                            </div>
                        </div>

                    </el-tab-pane>
                    <el-tab-pane label="综合排序">综合排序</el-tab-pane>
                    <el-tab-pane label="销量排序">销量排序</el-tab-pane>
                    <el-tab-pane label="价格优先">价格优先</el-tab-pane>
                    <el-tab-pane label="评价为主">评价为主</el-tab-pane>
                </el-tabs>
            </div>

        </div>

        <div class="goods" v-else="sousoshow">
            <div class="w">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>相关商品</span>
                    </div>
                    <div class="text item">
                        <p>品牌：<el-tag effect="dark">全部</el-tag>
                            <el-tag effect="plain" type="info">哆啦</el-tag>
                            <el-tag effect="plain" type="info">奥迪</el-tag>
                            <el-tag effect="plain" type="info">乐高</el-tag>
                            <el-tag effect="plain" type="info">万代</el-tag>
                        </p>
                        <el-divider></el-divider>
                        <p>种类：<el-tag effect="dark">全部</el-tag>
                            <el-tag effect="plain" type="info">毛绒玩具</el-tag>
                            <el-tag effect="plain" type="info">金属玩具</el-tag>
                            <el-tag effect="plain" type="info">电动玩具</el-tag>
                        </p>
                        <el-divider></el-divider>
                        <p>选购热点：<el-tag effect="dark">全部</el-tag>
                            <el-tag effect="plain" type="info">玩具电话</el-tag>
                            <el-tag effect="plain" type="info">音乐盒</el-tag>
                            <el-tag effect="plain" type="info">遥控器</el-tag>
                        </p>

                    </div>
                </el-card>
                <el-tabs type="border-card">
                    <el-tab-pane label="全部">
                        <div class="list-item">
                            <div class="list-box" v-for="item in goods" :key="item.id" @click="goodsid(item.id)">
                                <img :src="item.picture" style="width: 200px;">
                                <p>{{item.goods_name}}</p>
                                <span>{{item.price}}￥</span>
                            </div>
                        </div>

                    </el-tab-pane>
                    <el-tab-pane label="综合排序">综合排序</el-tab-pane>
                    <el-tab-pane label="销量排序">销量排序</el-tab-pane>
                    <el-tab-pane label="价格优先">价格优先</el-tab-pane>
                    <el-tab-pane label="评价为主">评价为主</el-tab-pane>
                </el-tabs>
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

</body>

<script src="./lib/vue.js"></script>
<script src="./lib/vue-resource.min.js"></script>
<script src="./lib/element-ui.js"></script>
<script src="./lib/jquery-3.5.1.min.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            leibie: "选择类别",
            xxshow: false,
            nodengluurl: "./images/nodenglu.jpg", //登录图片
            xiugaimimashow: false, //修改密码弹出框
            lunbotu: [], //轮播图数据
            goods: [], //首页商品数据
            gonggaos: [], //公告数据
            item: [],
            cartlength: 0,
            huanying: true,
            sousuovalue: "",
            sousuo: [], //搜索
            xiala: false,
            urlkey: "",
            sousuolength: "",
            sousoshow: true,
            uname:""

        },

        mounted() {


            this.geturl()
            this.getshow()
            this.getuser()
            this.getsousuos()
            this.getcar()
            this.getLunbotu() //调用获取轮播图
            this.getgonggao() //调用获取公告
        },
        methods: {
            geturl: function() {
                var test = window.location.href;
                var key = test.split("?key=")[1];
                this.urlkey = decodeURI(decodeURI(key))
                console.log(this.urlkey, 'this.urlkey');
                if (this.urlkey == 'undefined') {
                    this.sousoshow = false
                    console.log(1111111);
                    this.getGoods() //调用获取商品详情
                } else {
                    this.sousoshow = true
                    console.log(22222);
                    this.getsousuos()
                }

            },

            // 搜索
            getsousuos: function() {
                this.$http.post('./getsousuo.php', {
                    sousuo: this.urlkey
                }, {
                    emulateJSON: true
                }).then(response => {
                    var sousuoObj = eval("(" + response.bodyText + ")");
                 
                    this.sousuolength = sousuoObj.length
                    if (sousuoObj.length == 0) {
                        this.sousuo = []
                    } else {
                        this.sousuo = sousuoObj


                    }
                }, function() {
                    console.log('获取user请求失败处理');
                });
            },
            sousuoCommand(command) {
                switch (command) {
                    case "毛绒玩具":
                        this.leibie = "毛绒玩具"
                        break;
                    case "金属玩具":
                        this.leibie = "金属玩具"
                        break;
                    case "塑料玩具":
                        this.leibie = "塑料玩具"
                        break;
                    default:
                        break;
                }
            },
            mouseOver: function() {
                this.xiala = true
            },
            mouseLeave: function() {
                this.xiala = false

            },
            //改变显示头像
            getshow() {
                var lastname = localStorage.getItem("xxshow");
                this.userid = localStorage.getItem("userid");
                console.log(this.userid, 'ssssssss');
                if (this.userid != null) {
                    this.xxshow = true
                    console.log(this.xxshow);
                    this.huanying = false
                } else {
                    this.xxshow = false
                    console.log(this.xxshow);

                }
            },
             //获取user
             getuser: function() {
                this.userid = localStorage.getItem("userid");
                this.$http.post('./getuser.php', {
                    id: this.userid
                }, {
                    emulateJSON: true
                }).then(response => {
                    var userObj = eval("(" + response.bodyText + ")");
                   
                    for (let i = 0; i < userObj.length; i++) {
                        this.uname = userObj[i].uname;
                        
                    }
                    console.log(this.uname, '[ this.user] >')

                }, function() {
                    console.log('获取user请求失败处理');
                });
            },
            // 获取购物车
            getcar: function() {
                this.$http.post('./getcar.php', {
                    userid: this.userid
                }, {
                    emulateJSON: true
                }).then(response => {
                    var cartObj = eval("(" + response.bodyText + ")");
                    // this.cart = cartObj
                    this.cartlength = cartObj.length
                    console.log(this.cartlength, '[ this.cartlength ] >')
                }, function() {
                    console.log('获取商品请求失败处理');
                });
            },

            // 搜索
            getsousuo: function() {
                if (this.sousuo == "") {
                    this.$message({
                        message: '请输入搜索的商品名！',
                        type: 'warning'
                    });
                } else {
                    var param = encodeURI(encodeURI(this.sousuovalue));
                    window.location.href = './allgoods.php?key=' + param
                }
            },

            // 下拉菜单操作
            handleCommand(command) {
                console.log(command, 'command');
                switch (command) {
                    case 'geren':
                        window.location.href = "./my.php";
                        break;
                    case 'xiugai':
                        this.xiugaimimashow = true
                        break;
                    case 'tuichu':
                        localStorage.removeItem("userid");
                        console.log("清除缓存");
                        this.$message({
                            message: '退出账号成功！',
                            type: 'success'
                        });
                        setTimeout(function() {
                            location.reload()
                        }, 1200);

                        break;
                    default:
                        break;
                }
            },
            // 获取轮播图
            getLunbotu: function() {
                this.$http.post('./getlunbotu.php').then(response => {
                    var lunbotuObj = eval("(" + response.bodyText + ")");
                    this.lunbotu = lunbotuObj
                }, function() {
                    console.log('获取轮播图请求失败处理');
                });
            },

            // 获取商品
            getGoods: function() {
                this.$http.post('./getgoods.php').then(response => {
                    var goodsObj = eval("(" + response.bodyText + ")");
                    this.goods = goodsObj
                }, function() {
                    console.log('获取商品请求失败处理');
                });
            },

            // 商品id获取商品信息
            goodsid: function(el) {
                console.log(el + "ca");
                var num = el
                if (el = Number) {
                    window.location.href = './goodsInfo.php?id=' + num;
                } else {
                    this.shibai("获取商品id失败，请稍后！")
                }
            },

            //获取公告数据
            getgonggao: function() {
                this.$http.post('./getgonggao.php').then(response => {
                    var gonggaoObj = eval("(" + response.bodyText + ")");
                    this.gonggaos = gonggaoObj
                    console.log(response.bodyText, 'gonggao');
                }, function() {
                    console.log('获取商品请求失败处理');
                });
            },


            //登录跳转
            denglu: function() {
                window.location.href = "./login.php";
            },
            // 注册跳转
            zhuce: function() {
                window.location.href = "./register.php";
            },

            // 失败提示
            shibai: function(sb) {
                this.$message({
                    message: sb,
                    type: 'warning'
                });
            },



        }

    })
</script>



</html>