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
                    <el-input v-model="sousuovalue" placeholder="请输入搜索商品" ></el-input>
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

        <div class="w" style="height: 100%;margin-top:50px">
            <el-container>
                <el-aside width="204px">
                    <el-row class="tac">
                        <el-col>
                            <el-menu :default-openeds="zhankai" @select="handleSelect" default-active="2" class="el-menu-vertical-demo" background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">
                                <el-submenu index="1">
                                    <template slot="title">
                                        <i class="el-icon-user"></i>
                                        <span>个人中心</span>
                                    </template>
                                    <el-menu-item-group>
                                        <el-menu-item index="1-1">个人信息</el-menu-item>
                                        <el-menu-item index="1-2">安全设置</el-menu-item>
                                        <el-menu-item index="1-3">收货地址</el-menu-item>
                                        <el-menu-item index="1-4">我的订单</el-menu-item>

                                    </el-menu-item-group>
                                </el-submenu>
                            </el-menu>
                        </el-col>·
                    </el-row>


                </el-aside>



                <el-main v-for="item in user">
                    <!-- 个人信息 -->
                    <el-card class="box-card" v-if="geren">
                        <div slot="header" class="clearfix">
                            <span>个人信息</span>

                        </div>
                        <div class="text item">
                            <p>
                                <el-image style="width: 100px; height: 100px" :src="item.avatar" ></el-image>
                            </p>
                            <p>名字：{{item.uname}}</p>
                            <p>电话：{{item.tel}}</p>
                            <p>性别：{{item.sex}}</p>
                            <p>邮箱：{{item.email}}</p>
                            <p>地址：{{item.address}}</p>
                        </div>
                    </el-card>

                    <!-- 安全设置 -->
                    <el-card class="box-card" v-if="anquan">
                        <div slot="header" class="clearfix">
                            <span>修改密码</span>

                        </div>
                        <div class="text item">
                            <el-input v-model="mima" placeholder="请输入新密码" style=" width:200px"></el-input>
                            <el-button type="primary" @click="getmima()">确定</el-button>
                        </div>
                    </el-card>

                    <!-- 收获地址 -->
                    <el-card class="box-card" v-if="shohuo">
                        <div slot="header" class="clearfix">
                            <span>收货地址</span>
                             <el-button style="float: right;" type="primary" @click="dialogFormVisible = true" >修改收货地址</el-button>
                        </div>
                        <div class="text item">
                            <span>{{item.uname}}</span>
                            <span>{{item.address}}</span>
                            <span>{{item.tel}}</span>

                        </div>

                    </el-card>

                    
                        <el-dialog title="添加收货地址" :visible.sync="dialogFormVisible">
                            <el-form >
                                
                                <el-form-item label="地址" label-width="120">
                                    <el-input v-model="newadd" autocomplete="off" style="width:50%;border-right: 1px solid #ccc;"></el-input>
                                </el-form-item>
                                <el-form-item label="手机" label-width="120">
                                    <el-input v-model="newtel" autocomplete="off" style="width:50%;border-right: 1px solid #ccc;"></el-input>
                                </el-form-item>
                            </el-form>
                            <div slot="footer" class="dialog-footer">
                                <el-button @click="dialogFormVisible = false">取 消</el-button>
                                <el-button type="primary" @click="getnewadd()">确 定</el-button>
                            </div>
                        </el-dialog>

                    <!-- 我的订单 -->
                    <el-card class="box-card" v-if="dingdan">
                        <div slot="header" class="clearfix">
                            <span>我的订单</span>
                        </div>
                        <el-table :data="orders" border style="width: 100%">
                            <el-table-column fixed prop="id" label="ID" width="150">
                            </el-table-column>
                            <el-table-column prop="date" label="下单时间" width="120">
                            </el-table-column>
                            <el-table-column prop="user_id" label="用户ID" width="120">
                            </el-table-column>
                            <el-table-column prop="goods_id" label="商品ID" width="120">
                            </el-table-column>
                            <el-table-column prop="pay" label="支付方式" width="120">
                            </el-table-column>
                            <el-table-column prop="address" label="订单地址">
                            </el-table-column>
                           

                        </el-table>
                        <div style="height: 50px;">
                        </div>


                        <el-pagination background layout="prev, pager, next" :total="orderslength">
                        </el-pagination>
                    </el-card>
                   




                </el-main>
            </el-container>
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
            dialogFormVisible: false,
            zhankai: ["1"],
            xxshow: false,
            uname:"",
            nodengluurl: "./images/nodenglu.jpg", //登录图片
            user: [], //用户数据
            geren: false, //个人信息
            anquan: false, //安全设置
            shohuo: false, //收获地址
            dingdan: false, //订单
            mima: "", //密码
            cartlength: 0,
            userid: "",
            sousuovalue: "", //搜索
            xiala: false,
            orders: [], //商品数据
            orderslength:0,
            huanying: true,
            newadd:"",//新增地址-姓名
            newtel:"",//新增地址-姓名

        },

        mounted() {
            this.geren = true
            this.getshow()
            this.getuser()
            this.getcar()
            this.getorders()
        },
        methods: {
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
                    window.location.href = './login.php'
                }
            },  

            // 新增地址
            getnewadd:function(){
                this.$http.post('./getnewadd.php', {
                    userid: this.userid,
                    newadd: this.newadd,
                    newtel: this.newtel,
                }, {
                    emulateJSON: true
                }).then(response => {
                    if (response.body == 1) {
                        this.$message({
                            message: '修改地址成功！',
                            type: 'success'
                        });
                        this.dialogFormVisible = false
                        
                        setTimeout(function() {
                            location.reload()
                        }, 1100);
                        this.handleSelect('1-3')
                    } else {
                        this.$message({
                            message: '修改地址失败！',
                            type: 'warning'
                        });
                    }
                    
                }, function() {
                    console.log('获取商品请求失败处理');
                });
            },

             
            // 获取订单
            getorders: function() {
                this.$http.post('./getorders.php', {
                    userid: this.userid
                }, {
                    emulateJSON: true
                }).then(response => {
                    var ordersObj = eval("(" + response.bodyText + ")");
                    this.orders = ordersObj
                    this.orderslength = ordersObj.length
                    console.log(this.orders,'1111111111')
                }, function() {
                    console.log('获取商品请求失败处理');
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

            // 菜单选择
            handleSelect: function(key) {
                console.log('[key  ] >', key)
                switch (key) {
                    case '1-1':
                        this.geren = true
                        this.anquan = false, //安全设置
                            this.dingdan = false
                        this.shohuo = false //收获地址
                        break;
                    case '1-2':
                        this.geren = false
                        this.anquan = true, //安全设置
                            this.dingdan = false
                        this.shohuo = false //收获地址
                        break;
                    case '1-3':
                        this.geren = false
                        this.anquan = false, //安全设置
                            this.dingdan = false
                        this.shohuo = true //收获地址

                        break;
                    case '1-4':
                        this.geren = false
                        this.anquan = false, //安全设置
                        this.shohuo = false //收获地址
                        this.dingdan = true

                        break;
                    default:
                        break;
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
                    this.user = userObj
                    for (let i = 0; i < userObj.length; i++) {
                        this.uname = userObj[i].uname;
                        
                    }
                    console.log(this.user, '[ this.user] >')
                }, function() {
                    console.log('获取user请求失败处理');
                });
            },
            //修改密码
            getmima: function() {
                this.$http.post('./getmima.php', {
                    id: this.userid,
                    pwd: this.mima
                }, {
                    emulateJSON: true
                }).then(response => {
                    if (response.body == 1) {
                        this.$message({
                            message: '修改密码成功！',
                            type: 'success'
                        });
                        console.log('[ response.body ] >', response.body)
                        localStorage.removeItem("userid");
                        setTimeout(function() {
                            window.location.href = './index.php'
                        }, 1500);
                        this.xxshow = false
                    } else {
                        this.$message({
                            message: '修改失败，请检查密码是否一致！',
                            type: 'warning'
                        });

                    }
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

        }

    })
</script>



</html>