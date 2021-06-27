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
    <link rel="stylesheet" href="./lib/layui.css">
    <link rel="stylesheet" href="./lib/main.css">
    <style>
       
        .lift-nav {
            position: fixed;
            top: 220px;
            left: 30px;
            display: none;
        }

        .lift-nav li {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            color: #fff;
            padding: 10px 10px;
            margin-bottom: 10px;
            background: #409EFF;
            cursor: pointer;
        }

        .lift-nav li.current {
            background: tomato;
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


        <!-- 轮播图 -->
        <div class="lunbo">
            <div class="w">
                <el-carousel>
                    <el-carousel-item v-for="item in lunbotu " :key="item.id">
                        <img :src="item.picture" width="100%" height="100%">
                    </el-carousel-item>
                </el-carousel>
            </div>


        </div>

        <!-- 公告 -->
        <div class="hui">
            <div class="w">
                <el-card class="box-card" shadow="always" v-for="item in gonggaos.slice(0,1)" :key="item.id">
                    <div class="text item">
                        <div>公告：{{item.title}}</div>
                        <div><a href="./gonggao.php">
                                <el-tag type="info" class="huimone">更多<i class="el-icon-arrow-right"></i></el-tag>
                            </a> </div>
                    </div>
                </el-card>
                <br>

                <!-- <div class="demo-image">
                    <img src="./images/2.jpg" alt="" srcset="">
                    <div>
                        玩转哆啦
                    </div>
                </div>
                <br> -->
            </div>
        </div>
        <br>

        <div class="lift-nav">
            <ul class="lift">
                <li>热销</li>
                <li>F1楼</li>
                <li>F2楼</li>
                <li>F3楼</li>
                <li>更多</li>
                <li onclick="topFunction()">TOP</li>
            </ul>
        </div>


        <!-- 商品区 -->
        <div class="content">
            <div class="floors">
                <div class="sk">
                    <div class="sk_inner w1200">
                        <div class="sk_hd">
                            <a href="javascript:;">
                                <img src="./images/goods/s_img1.jpg">
                            </a>
                        </div>
                        <div class="sk_bd">
                            <el-carousel :interval="4000" type="card" height="270px">
                                <el-carousel-item v-for="item in lunbotu" :key="item.id">
                                <a href="./allgoods.php">
                                    <img :src="item.picture" width="100%" height="100%" >
                                </a>
                                </el-carousel-item>
                            </el-carousel>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hot-recommend-con t0">
                <div class="hot-con1 w1200 layui-clear">
                    <div class="item">
                        <h4>热销推荐</h4>
                        <div class="big-img" v-for="item in goods.slice(0, 1)" :key="item.id" @click="goodsid(item.id)">
                            <a href="javascript:;"><img :src="item.picture"></a>
                        </div>
                        <!-- <div class="small-img" v-for="item in goods.slice(1, 2)" :key="item.id" @click="goodsid(item.id)">
                            <a href="javascript:;"><img :src="item.picture" alt=""></a>
                        </div> -->
                    </div>
                    <div class="item" >
                        <div class="top-img" v-for="item in goods.slice(2, 3)" :key="item.id" @click="goodsid(item.id)">
                            <a href="javascript:;"><img :src="item.picture"></a>
                        </div>
                        <div class="bottom-img" v-for="item in goods.slice(4, 6)" :key="item.id" @click="goodsid(item.id)">
                            <a class="baby-cream"  href="javascript:;"><img :src="item.picture"></a>
                        </div>
                        
                    </div>
                    <div class="item item1 margin0 padding0"  v-for="item in goods.slice(6, 7)" :key="item.id" @click="goodsid(item.id)">
                        <a href="javascript:;"><img class="btm-img" :src="item.picture"></a>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="product-cont w1200 t1" id="product-cont">
                    <div class="product-item product-item1 layui-clear">
                        <div class="left-title">
                            <h4><i>1F</i></h4>
                            <img src="./images/goods/maorong.png">
                            <h5>毛绒玩具</h5>
                        </div>
                        <div class="right-cont">
                            <img src="./images/goods/img12.jpg" alt="" class="right-cont-title-img">
                            <div class="img-box" v-for="item in maorong.slice(0, 5)" :key="item.id" @click="goodsid(item.id)">
                                <a href="javascript:;"><img :src="item.picture"></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-item product-item2 layui-clear t2">
                        <div class="left-title">
                            <h4><i>2F</i></h4>
                            <img src="./images/goods/jimu.png">
                            <h5>金属玩具</h5>
                        </div>
                        <div class="right-cont">
                            <img src="./images/goods/img12.jpg" alt="" class="right-cont-title-img">
                            <div class="img-box"  v-for="item in jinshu.slice(0, 5)" :key="item.id" @click="goodsid(item.id)">
                                <a href="javascript:;"><img :src="item.picture"></a>
                               
                            </div>
                        </div>
                    </div>
                    <div class="product-item product-item3 layui-clear t3">
                        <div class="left-title">
                            <h4><i>3F</i></h4>
                            <img src="./images/goods/manghe.png">
                            <h5>塑料玩具</h5>
                        </div>
                        <div class="right-cont">
                            <img src="./images/goods/img12.jpg" alt="" class="right-cont-title-img">
                            <div class="img-box"  v-for="item in suliao.slice(0, 5)" :key="item.id" @click="goodsid(item.id)">
                                <a href="javascript:;"><img :src="item.picture"></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="product-list-box t4" id="product-list-box">
                <div class="product-list-cont w1200">
                    <h4>更多推荐</h4>
                    <div class="product-item-box layui-clear">
                        <div class="list-item" v-for="item in goods" :key="item.id" @click="goodsid(item.id)">
                            <img :src="item.picture">
                            <p>{{item.goods_name}}</p>
                            <span>{{item.price}}￥</span>
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
                    <a href="javascript:;">使用必读</a>
                    <a href="javascript:;">关于我们</a>
                    <a href="javascript:;">服务条款</a>
                    <a href="javascript:;">意见反馈</a>
                    <a href="javascript:;">售后政策</a>
                    <a href="javascript:;">合作咨询</a>
                    <a href="./admin/login.php">后台管理</a>

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
<script src="./lib/LiftEffect.js"></script>
<script>
    $(function() {
        LiftEffect({
            "control1": ".lift-nav", //侧栏电梯的容器
            "control2": ".lift", //需要遍历的电梯的父元素
            "target": [".t0",".t1", ".t2", ".t3", ".t4"], //监听的内容，注意一定要从小到大输入
            "current": "current" //选中的样式
        });


    })
   

    // 点击按钮，返回顶部
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
       
        
    }
</script>


<script>
    var app = new Vue({
        el: '#app',
        data: {
            leibie: "选择类别",
            xiala: false,
            sousuovalue: "", //搜索
            userid: "", //userid
            huanying: true,
            uname: "",
            xxshow: false,
            xiugaimimashow: false, //修改密码弹出框
            mima: "", //密码
            nodengluurl: "./images/nodenglu.jpg", //登录图片
            lunbotu: [], //轮播图数据
            goods: [], //首页商品数据
            gonggaos: [], //公告数据
            item: [],
            cartlength: 0,
            maorong:[],//毛绒玩具
            jinshu:[],
            suliao:[]

        },



        mounted() {
            this.getshow()
            this.getGoods() //调用获取商品详情
            this.getLunbotu() //调用获取轮播图
            this.getgonggao() //调用获取公告
            this.getcar() //调取购物车数量
            this.getuser()
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
            mouseOver: function() {
                this.xiala = true
            },
            mouseLeave: function() {
                this.xiala = false

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
                    // this.user = userObj
                    // console.log(this.user, '[ this.user] >')
                    // this.uname = userObj.uname
                    for (let i = 0; i < userObj.length; i++) {
                        this.uname = userObj[i].uname;
                        
                    }
                    console.log(this.uname, '[ this.user] >')

                }, function() {
                    console.log('获取user请求失败处理');
                });
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
                    console.log(this.goods, '[ this.goods ] >')
                    for (let i = 0; i < goodsObj.length; i++) {
                        if (goodsObj[i].type == "毛绒玩具") {
                            this.maorong.push(goodsObj[i])
                            console.log('[  this.maorong this.maorong this.maorong ] >',  this.maorong)
                        }
                        if (goodsObj[i].type == "金属玩具") {
                            this.jinshu.push(goodsObj[i])
                            console.log('[  this.maorong this.maorong this.maorong ] >',  this.maorong)
                        }
                        if (goodsObj[i].type == "塑料玩具") {
                            this.suliao.push(goodsObj[i])
                            console.log('[  this.maorong this.maorong this.maorong ] >',  this.maorong)
                        }
                        
                    }
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

            // 购物车
            gotocar: function() {
                window.location.href = "./car.php";
            },

            //登录跳转
            denglu: function() {
                window.location.href = "./login.php";
            },

            // 注册跳转
            zhuce: function() {
                window.location.href = "./register.php";
            },
            houtai: function() {
                window.location.href = "./admin/login.php";

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