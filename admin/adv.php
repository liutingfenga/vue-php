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
                            <el-avatar src="https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png"></el-avatar>
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
                            <el-menu default-active="3-1" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
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
                    <div style="height: 30px;">
                            <el-breadcrumb separator="/">
                                <el-breadcrumb-item><a href="./admin.php">首页</a></el-breadcrumb-item>
                                <el-breadcrumb-item>广告管理</el-breadcrumb-item>
                            </el-breadcrumb>
                        </div>
                        <!-- 商品表格 -->
                        <el-table :data="lunbotu" border style="width: 100%">
                            <el-table-column fixed prop="id" label="ID" width="150">
                            </el-table-column>
                            <el-table-column prop="name" label="广告名字" width="120">
                            </el-table-column>
                            <el-table-column prop="keywords" label="关键字" width="120">
                            </el-table-column>
                            <el-table-column prop="picture" label="轮播图片">
                                <template slot-scope="scope">
                                    <el-popover placement="top-start" title="" trigger="hover">
                                        <img :src="'.'+scope.row.picture" alt="" style="width: 300px;height: 200px">
                                        <img slot="reference" :src="'.'+scope.row.picture" style="width: 30px;height: 30px">
                                    </el-popover>
                                </template>
                            </el-table-column>

                            <el-table-column fixed="right" label="操作" width="120">
                                <template slot-scope="scope">
                                    <!-- <el-tag style="cursor:pointer" @click="handleClick(scope.row)">编辑</el-tag> -->
                                    <el-tag style="cursor:pointer" @click="goodsdel(scope.row)" type="danger">删除</el-tag>

                                </template>
                            </el-table-column>

                        </el-table>
                        <div style="height: 50px;">
                        </div>


                     
                    </el-main>
                    <!-- 底部 -->
                    <!--  -->
                </el-container>
            </el-container>
        </el-container>
    </div>




    <script>
        var app = new Vue({
            el: '#app',
            data: {
                isCollapse: false,
                lunbotu: [], //轮播图
                adminid:""
            },
            
            created() {
                this.adminid = localStorage.getItem("adminid");
                console.log(this.adminid, 'ssssssss');
                if (this.adminid != null) {
                   
                } else {
                    window.location.href = './login.php';
                }
            },

            mounted() {
                this.getLunbotu()
            },
            methods: {
                // 获取轮播图
            getLunbotu: function() {
                this.$http.post('../getlunbotu.php').then(response => {
                    var lunbotuObj = eval("(" + response.bodyText + ")");
                    this.lunbotu = lunbotuObj
                }, function() {
                    console.log('获取轮播图请求失败处理');
                });
            },

                goodsdel(item) {
                    this.$confirm('此操作将永久删除该用户, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {

                        console.log(item.id + "ca");
                        var num = item.id
                        if (el = Number) {
                            this.$http.post('./getgoodsdel.php', {
                                id: num
                            }, {
                                emulateJSON: true
                            }).then(response => {

                                location.reload()
                                this.$message({
                                    type: 'success',
                                    message: '删除成功!'
                                })

                            }, function() {
                                console.log('获取商品请求失败处理');
                            });

                        } else {
                            this.shibai("获取商品id失败，请稍后！")
                        }

                    }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: '已取消删除'
                        });
                    });


                },
                handleOpen(key, keyPath) {
                    console.log(key, keyPath);
                },
                handleClose(key, keyPath) {
                    console.log(key, keyPath);
                },
                gogoodslist:function(){
                    window.location.href = './goodslist.php';
                },
                goadv:function(){
                    window.location.href = './adv.php';
                },
                gogonggao:function(){
                    window.location.href = './gonggao.php';
                },
                gouser:function(){
                    window.location.href = './user.php';
                },
                goadministrator:function(){
                    window.location.href = './administrator.php';
                },
                goorders:function(){
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

            }
        })
    </script>
</body>

</html>