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
    <link rel="stylesheet" href="./css/car.css">
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


        <!-- 购物车 -->
        <div class="car">
            <div class="w">
                <template>
                    <el-table :data="cart" style="width: 100%">
                        <!-- <el-table-column type="selection" width="100">
                        </el-table-column> -->
                        <el-table-column prop="picture" label="商品图片" width="180">
                            <template slot-scope="scope">
                                <img :src="scope.row.picture" alt="" style="height: 100px;">
                            </template>
                        </el-table-column>
                        <el-table-column label="商品名称" prop="goods_name" label="ID">
                        </el-table-column>
                        <el-table-column prop="price" label="单价" width="120">
                        </el-table-column>
                        <el-table-column prop="nums" label="数量" width="170">
                            <!-- <template slot-scope="scope">
                                <el-input-number size="small" v-model="num" @change="Changenum" :min=1 :max="10000"></el-input-number>
                            </template> -->
                        </el-table-column>
                        <el-table-column label="操作" width="120">
                            <template slot-scope="scope">
                                <el-button size="mini" type="danger" @click="handleDelete(scope.row.id)">删除</el-button>
                            </template>
                        </el-table-column>

                    </el-table>
                </template>

                <div style="float: right;margin-top:20px">
                    <el-button type="success" @click="getorders()">结算</el-button>
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
            xiugaimimashow: false, //修改密码弹出框
            nodengluurl: "./images/nodenglu.jpg", //登录图片
            xxshow: false,
            cart: [], //购物车数据
            cartlength: 0,
            huanying: true,
            num: 1, //数量
            carts: "",
            multipleSelection: [], //选择的id
            sousuovalue: "", //搜索
            userid: "", //userid
            xiala: false,
        },
        mounted() {
            this.getshow()
            this.getuser()
            this.getcar()
            // this.getGoods()

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
            // 获取购物车
            //  getcar: function() {
            //     this.$http.post('./getcar.php', {
            //         userid: this.userid
            //     }, {
            //         emulateJSON: true
            //     }).then(response => {
            //         var cartObj = eval("(" + response.bodyText + ")");
            //         // this.cart = cartObj
            //         this.cartlength = cartObj.length
            //         console.log(this.cartlength, '[ this.cartlength ] >')
            //     }, function() {
            //         console.log('获取商品请求失败处理');
            //     });
            // },

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

            Changenum: function(el) {
                console.log('[  ] >', el)
                this.num = el
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
                    this.cart = cartObj
                    console.log(this.cart, '[ this.cart ] >')

                    this.cartlength = cartObj.length

                    for (var i = 0; i < cartObj.length; i++) {
                        this.carts = cartObj[i]; //数组的索引是从0开始的
                        console.log(this.carts); //把取出的值打印在控制台上
                        console.log(this.carts.nums, 'carts')
                    }
                    this.num = this.carts.nums
                }, function() {
                    console.log('获取购物车商品请求失败处理');
                });
            },
            mouseOver: function() {
                this.xiala = true
            },
            mouseLeave: function() {
                this.xiala = false

            },

            // 删除购物车商品
            handleDelete: function(val) {
                console.log('[  ] >', val)
                this.$http.post('./delcargoods.php', {
                    id: val
                }, {
                    emulateJSON: true
                }).then(response => {
                    if (response.body == 1) {
                        this.$message({
                            message: '删除成功！',
                            type: 'success'
                        });
                        setTimeout(function() {
                            location.reload()
                        }, 1200);

                    } else {
                        this.$message({
                            message: '删除失败！',
                            type: 'warning'
                        });
                    }
                }, function() {
                    console.log(' 删除购物车商请求失败处理');
                });
            },

            // 结算
            getorders: function() {
                window.location.href = "./orders.php";
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
        }
    })
</script>

</html>