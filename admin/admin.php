<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../lib/vue.js"></script>
    <script src="../lib/vue-resource.min.js"></script>
    <script src="../lib/element-ui.js"></script>
    <link rel="stylesheet" href="../lib/element-ui.css">
    <link rel="stylesheet" href="../lib/element-icons.css">
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <div id="app">

        <el-container>
            <el-header>
                <div class="logo">
                    <el-avatar src="../images/logo.png"></el-avatar>
                </div>
                <h1>哆啦商城后台管理</h1>
                <!-- <div class="touxiang">
                    <el-dropdown>
                        <span class="el-dropdown-link">
                            <el-avatar src="../images/logo.png"></el-avatar>
                        </span>
                        <el-dropdown-menu slot="dropdown">

                            <el-dropdown-item @click="tuichu()">退出</el-dropdown-item>

                        </el-dropdown-menu>
                    </el-dropdown>
                </div> -->
            </el-header>

            <el-container>
                <!-- 侧边导航栏 -->
                <el-aside width="220px">
                    <el-row class="tac">
                        <el-col :span="12">
                            <el-menu default-active="0" class="el-menu-vertical-demo" :collapse="isCollapse">
                                <el-menu-item index="0" @click="shouye()">
                                    <i class="el-icon-house"></i>
                                    <span slot="title">首页</span>
                                </el-menu-item>
                                <el-submenu index="1">
                                    <template slot="title">
                                        <i class="el-icon-shopping-bag-2"></i>
                                        <span>商品管理</span>
                                    </template>
                                    <el-menu-item-group>
                                        <!-- <template slot="title">分组一</template> -->
                                        <el-menu-item index="1-1" @click="gogoodslist()">商品列表</el-menu-item>
                                    </el-menu-item-group>
                                </el-submenu>
                                <el-menu-item index="2" @click="gouser()">
                                    <i class="el-icon-user"></i>
                                    <span slot="title">用户列表</span>
                                </el-menu-item>
                                <el-submenu index="3">
                                    <template slot="title">
                                        <i class="el-icon-s-shop"></i>
                                        <span>商城设置</span>
                                    </template>
                                    <el-menu-item-group>
                                        <!-- <template slot="title">分组一</template> -->
                                        <el-menu-item index="3-1" @click="goadv()">主页广告</el-menu-item>
                                        <el-menu-item index="3-2" @click="gogonggao()">动态管理</el-menu-item>
                                        <el-menu-item index="3-3" @click="goorders()">订单管理</el-menu-item>
                                        <el-menu-item index="3-4" @click="goadministrator()">管理员</el-menu-item>
                                    </el-menu-item-group>
                                </el-submenu>

                                <el-menu-item index="4" @click="tuichu()">
                                    <i class="el-icon-switch-button"></i>
                                    <span slot="title">退出</span>
                                </el-menu-item>


                            </el-menu>
                        </el-col>
                </el-aside>
                <el-container>
                    <!-- 中心内容 -->
                    <el-main>

                        <p style="height: 30px; margin-left: -183px;">{{dateFormat(newDate)}} </p>

                        <div class="" style=" width: 100%;height: 60px;padding: 30px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px;font-size: 16px;border-radius: 6px;display: flex;align-items: center;background: #f8f8f8;">
                            欢迎你，管理员!
                        </div>

                        </el-alert>
                        <el-row :gutter="12">
                            <el-col :span="8">
                                <el-card shadow="always" style="height:116px;background-color:#e64242;border: none;color: #fff;text-align: left; line-height: 40px;">

                                    <h1>{{orders}}</h1>
                                    <div>代发货订单</div>
                                </el-card>
                            </el-col>
                            <el-col :span="8">
                                <el-card shadow="always" style="height:116px;background-color:#11b95c;border: none;color: #fff;text-align: left; line-height: 40px;">
                                    <h1>{{goods}}</h1>
                                    <div>上架中的商品</div>
                                </el-card>
                            </el-col>
                            <el-col :span="8">
                                <el-card shadow="always" style="height:116px;background-color:#1f2d3d;border: none;color: #fff;text-align: left; line-height: 40px;">

                                    <h1>{{user}}</h1>
                                    <div>总用户数</div>
                                </el-card>
                            </el-col>
                        </el-row>

                    </el-main>
                    <!-- 底部 -->
                    
                </el-container>
            </el-container>
        </el-container>
    </div>




    <script>
        var app = new Vue({
            el: '#app',
            data: {
                // 当前时间
                newDate: new Date(),
                showtime: "",
                isCollapse: false,
                admin: "nihao",
                orders: 0,
                user: 0, //用户数
                goods: 0, //商品数量
                adminid: "", //adminid
            },

            created() {
                this.adminid = localStorage.getItem("adminid");
                console.log(this.adminid, 'ssssssss');
                if (this.adminid != null) {
                    this.$notify({
                        message: '你好，管理员！',
                        type: 'success'
                    });
                } else {
                    
                    window.location.href = './login.php';
                }
            },

            mounted() {
                this.getorders()
                this.getGoods(),
                this.getuser()
                let that = this
                this.timer = setInterval(function() {
                    that.newDate = new Date().toLocaleString()
                })
            },
            methods: {

                // 时间格式化
                dateFormat() {
                    var date = new Date()
                    var year = date.getFullYear()
                    var month = date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1
                    var day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate()
                    var hours = date.getHours() < 10 ? '0' + date.getHours() : date.getHours()
                    var minutes = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()
                    var seconds = date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds()
                    let week = date.getDay() // 星期
                    let weekArr = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六']
                    // 拼接 时间格式处理
                    return year + '年' + month + '月' + day + '日 ' + hours + ':' + minutes + ':' + seconds + ' ' + weekArr[week]
                },

                // 获取订单
                getorders: function() {
                    this.$http.post('./getorders.php').then(response => {
                        var ordersObj = eval("(" + response.bodyText + ")");
                     
                        this.orders = ordersObj.length
                    }, function() {
                        console.log('获取订单请求失败处理');
                    });
                },
                // 获取商品
                getGoods: function() {
                    this.$http.post('../getgoods.php').then(response => {
                        var goodsObj = eval("(" + response.bodyText + ")");
                        // console.log(goodsObj,'商品' )
                        this.goods = goodsObj.length
                    }, function() {
                        console.log('获取商品请求失败处理');
                    });
                },
                // 获取用户
                getuser: function() {
                    this.$http.post('./getusernum.php').then(response => {
                        var userObj = eval("(" + response.bodyText + ")");
                        this.user = userObj.length
                    }, function() {
                        console.log('获取用户请求失败处理');
                    });
                },

                gogoodslist: function() {
                    window.location.href = './goodslist.php';
                },
                goadv: function() {
                    window.location.href = './adv.php';
                },
                gogonggao: function() {
                    window.location.href = './gonggao.php';
                },
                gouser: function() {
                    window.location.href = './user.php';
                },
                goadministrator: function() {
                    window.location.href = './administrator.php';
                },
                goorders: function() {
                    window.location.href = './orders.php';
                },

                shouye:function(){
                    window.location.href = './admin.php';

                },
                tuichu: function() {
                    localStorage.removeItem("adminid");
                    this.adminid = ""
                    window.location.href = './login.php';
                }

            },
            beforeDestroy: function() {
                if (this.timer) {
                    clearInterval(this.timer)
                }
            }
        })
    </script>
</body>

</html>