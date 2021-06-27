<?php
session_start();
include 'conn.php';

$goods_id = $_REQUEST['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./lib/element-ui.css">
    <link rel="stylesheet" href="./lib/element-icons.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/goodsInfo.css">

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

        <!-- 商品内容 -->
        <div class="goodsinfo">
            <div class="w" v-for="item in goodsInfo">
                <div class="goodsinfo_left">
                    <div class="demo-image__preview">
                        <!-- <el-image class="goodsinfo_left_img" :src="item.picture" :fit="fit">
                        </el-image> -->
                        <img :src="item.picture" alt="" srcset="" class="goodsinfo_left_img">

                    </div>
                </div>
                <div class="goodsinfo_right">
                    <h1>{{item.goods_name}}</h1>
                    <p>Dora shopping mall</p>
                    <p><span>RMB</span> <span>{{item.price}}</span></p>
                    <el-divider></el-divider>
                    <p>原价: <span style="text-decoration:line-through">{{item.old_price}}</span></p>
                    <p>类型：<el-tag>{{item.type}}</el-tag>
                    </p>

                    <p>数量：<el-input-number v-model="num" @change="handleChange" :min="1" :max="100" label="描述文字"></el-input-number>&nbsp;
                    </p>
                    <br>

                    <p>
                        <!-- <el-button type="primary">立即购买</el-button> -->
                        &nbsp;&nbsp;
                        <el-button type="danger" @click="pluscar()">加入购物车</el-button>
                    </p>
                    <p>

                </div>
            </div>
        </div>

        <!-- 清楚浮动 -->
        <div style="clear:both;"></div>
        <!-- 商品详情 -->
        <div class="goods">
            <div class="w">
                <el-tabs type="border-card">
                    <el-tab-pane label="商品详情" v-for="item in goodsInfo">
                        详细介绍:
                        {{item.description}}
                    </el-tab-pane>
                    <el-tab-pane label="用户评价">
                        <el-rate v-model="pfzhi" show-text @change="pingfen"></el-rate>

                    </el-tab-pane>
                    <el-tab-pane label="常见问题">
                        <p>
                            1．“7日”规定：产品自售出之日起7日内，发生性能故障，消费者可以选择退货、换货或修理。<br>
                            2．“15日”规定：产品自售出之日起15日内，发生性能故障，消费者可以选择换货或修理。<br>
                            3．“三包有效期”规定：“三包”有效期自开具发票之日起计算。在国家发布的第一批实施“三包”的18种商品中，如彩电、等离子电视机、液晶电视机的“三包”有效期，整机分别为一年，主要部件（液晶屏、背光模组）为三年。在“三包”有效期内修理两次，仍不能正常使用的产品，消费者可凭修理记录和证明，调换同型号同规格的产品或按有关规定退货，“三包”有效期应扣除因修理占用和无零配件待修的时间。换货后的“三包”有效期自换货之日起重新计算。<br>
                            4．“90日”规定和“30日”规定：在“三包”有效期内，因生产者未供应零配件，自送修之日起超过90日未修好的，修理者应当在修理状况中注明，销售者凭此据免费为消费者调换同型号同规格产品。因修理者自身原因使修理超过30日的，由其免费为消费者调换同型号同规格产品，费用由修理者承担。<br>
                            5. 30日”和“5年”的规定：修理者应保证修理后的产品能够正常使用30日以上，生产者应保证在产品停产后5年内继续供符合技术要求的零配件。<br>
                            6．新三包规定从1995年8月25日起实施，凡在该日以后购买列入三包目录的产品，消费者有权要求销售者、修理者、生产者承担三包责任。对1995年8月25日以前购买的产品，只能继续按照1986年发布的《部分国产家用电器三包规定》执行。
                        </p>
                    </el-tab-pane>
                </el-tabs>
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
            uname:"",
            nodengluurl: "./images/nodenglu.jpg", //登录图片
            num: 1,
            cartlength: 0,
            xxshow: false,
            pfzhi: 0,
            user: '', //用户id
            goodsInfo: [],
            idnum: 0,
            uid: '',
            huanying: true,
            sousuovalue: "", //搜索
            xiala: false,


        },

        created() {

            this.urlcanshu(),
                this.getGoodsInfo()

        },
        mounted() {
            this.getshow()
            this.getuser()
            this.getcar()
        },
        methods: {
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
            mouseOver: function() {
                this.xiala = true
            },
            mouseLeave: function() {
                this.xiala = false

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

            // 下拉菜单操作
            handleCommand(command) {
                console.log(command, 'command');
                switch (command) {
                    case 'geren':
                        window.location.href = "./my.php";
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
            urlcanshu: function() {
                var url = window.location.href; //获取当前url
                var cs = url.split('id=')[1]; //获取?之后的参数字符串
                this.idnum = cs
            },

            handleChange(value) {
                console.log(value);
            },
            // 搜索
           getsousuo: function() {
                if (this.sousuovalue == "") {
                    this.$message({
                        message: '请输入搜索的商品名！',
                        type: 'warning'
                    });
                } else {
                  var param = encodeURI(encodeURI(this.sousuovalue));
                    window.location.href = './allgoods.php?key='+ param
                }
            },
            // 获取商品信息
            getGoodsInfo: function() {
                this.$http.post('./getgoodsInfo.php', {
                    id: this.idnum
                }, {
                    emulateJSON: true
                }).then(response => {
                    var goodsObj = eval("(" + response.bodyText + ")");
                    this.goodsInfo = goodsObj
                    for (var i = 0; i < goodsObj.length; i++) {
                        this.uid = goodsObj[i]; //数组的索引是从0开始的
                        console.log(this.uid); //把取出的值打印在控制台上
                        console.log(this.uid.id, 'goodsObj')
                    }
                }, function() {
                    console.log('获取商品请求失败处理');
                });
            },

            // 加入购物车
            pluscar: function() {
                console.log(this.uid.goods_name, 'goods_name')
                console.log(this.uid.id, 'this.uid.id')
                console.log('[ this.user ] >', this.user)
                if (this.userid == null) {
                    this.$message({
                        message: '添加购物车失败,请登录！',
                        type: 'warning'
                    });
                } else {
                    this.$http.post('./intocar.php', {
                        user_id: this.userid,
                        goods_id: this.uid.id,
                        price: this.uid.price,
                        picture: this.uid.picture,
                        goods_name: this.uid.goods_name,
                        nums: this.num
                    }, {
                        emulateJSON: true
                    }).then(response => {
                        if (response.body == 1) {
                            this.$message({
                                message: '增加到购物车成功！',
                                type: 'success'
                            });
                        } else {
                            this.$message({
                                message: '添加到购物车成功！',
                                type: 'success'
                            });
                        }
                    }, function() {
                        console.log('加入购物车请求失败处理');
                    });
                }

            },


            pingfen(el) {
                this.pfzhi = el
            },
            //登录跳转
            denglu: function() {
                window.location.href = "./login.php";
            },
            // 注册跳转
            zhuce: function() {
                window.location.href = "./register.php";
            },
            // 购物车
            gotocar: function() {
                window.location.href = "./car.php";
            },

        }

    })
</script>



</html>