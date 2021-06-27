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
    <style>
        .el-form-item {
            text-align: left;
        }
    </style>
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
                            <el-menu default-active="1-1" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
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
                                <el-breadcrumb-item>商品列表</el-breadcrumb-item>
                            </el-breadcrumb>

                        </div>
                        <div style="height: 50px; text-align:right;">
                            <el-button type="primary" @click="getinsteadgoods()">添加商品<i class="el-icon-plus"></i></el-button>
                        </div>

                        <el-dialog title="添加商品" :visible.sync="insteadgoodsVisible">
                            <el-form label-position="right">
                                <el-form-item label="商品名字" :label-width="formLabelWidth">
                                    <el-input v-model="goods_name" autocomplete="off" style="width: 220px;"></el-input>
                                </el-form-item>
                                <el-form-item label="现价" :label-width="formLabelWidth">
                                    <el-input v-model="price" autocomplete="off" style="width: 220px;"></el-input>
                                </el-form-item>
                                <el-form-item label="原价" :label-width="formLabelWidth">
                                    <el-input v-model="old_price" autocomplete="off" style="width: 220px;"></el-input>
                                </el-form-item>
                                <el-form-item label="商品分类" :label-width="formLabelWidth">
                                    <el-select v-model="type" placeholder="请选择商品分类">
                                        <el-option label="毛绒玩具" value="毛绒玩具"></el-option>
                                        <el-option label="金属玩具" value="金属玩具"></el-option>
                                        <el-option label="塑料玩具" value="塑料玩具"></el-option>
                                        <el-option label="其他" value="其他"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="商品详情" :label-width="formLabelWidth">
                                    <el-input type="textarea" v-model="description" style="width: 250px;"></el-input>
                                </el-form-item>
                                <el-form-item label="商品图片" :label-width="formLabelWidth">
                                    <el-upload accept="jpg jpeg、png、gif" name="name" action="./getimg.php" list-type="picture-card">
                                        <i slot="default" class="el-icon-plus"></i>
                                        <div slot="file" slot-scope="{file}">
                                            <img class="el-upload-list__item-thumbnail" :src="file.url" alt="">
                                        </div>
                                    </el-upload>
                                </el-form-item>


                            </el-form>
                            <div slot="footer" class="dialog-footer">
                                <el-button @click="insteadgoodsVisible = false">取 消</el-button>
                                <el-button type="primary" @click="insteadgoods()">确 定</el-button>
                            </div>
                        </el-dialog>


                        <!-- 商品表格 -->
                        <el-table :data="goods" border style="width: 100%">
                            <el-table-column fixed prop="id" label="ID" width="150">
                            </el-table-column>
                            <el-table-column fixed prop="price" label="现价" width="150">
                            </el-table-column>
                            <el-table-column fixed prop="old_price" label="原价" width="150">
                            </el-table-column>
                            <el-table-column prop="picture" label="商品图片" width="120">
                                <template slot-scope="scope">
                                    <el-popover placement="top-start" title="" trigger="hover">
                                        <img :src="'.'+scope.row.picture" alt="" style="width: 150px;height: 150px">
                                        <img slot="reference" :src="'.'+scope.row.picture" style="width: 30px;height: 30px">
                                    </el-popover>
                                </template>
                            </el-table-column>
                            <el-table-column prop="goods_name" label="商品名称">
                            </el-table-column>
                            <el-table-column prop="type" label="分类" width="120">
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


                        <el-pagination background layout="prev, pager, next" :total=goodslength>
                        </el-pagination>

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
                isCollapse: false,
                goods: [], //商品数据
                goodslength:0,//商品数量
                formLabelWidth: '120px',
                insteadgoodsVisible: false, //添加商品弹出框


                disabled: false,
                // 添加商品
                goods_name: "",
                type: "",
                price: "",
                description: "",
                old_price: "",
                picture: "",
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
                this.getGoods()

            },
            created() {
                this.clearAllCookie() //清楚所有cookie

            },


            methods: {
                // 获取商品
                getGoods: function() {
                    this.$http.post('../getgoods.php').then(response => {
                        var goodsObj = eval("(" + response.bodyText + ")");
                        this.goods = goodsObj
                        this.goodslength = goodsObj.length
                        console.log(this.goods)
                    }, function() {
                        console.log('获取商品请求失败处理');
                    });
                },
                getCookie: function(imagname) {
                    var strcookie = document.cookie; //获取cookie字符串
                    console.log('[ strcookiestrcookiestrcookie ] >', strcookie)
                    var arrcookie = strcookie.split("; "); //分割
                    //遍历匹配
                    for (var i = 0; i < 1; i++) {
                        var arr = arrcookie[i].split("=");
                        this.picture = arr[1]
                        console.log(this.picture, '111111111111111')
                    }
                    return "";


                    // let cookieValue = null;
                    //     if (document.cookie && document.cookie !== '') {
                    //         let cookies = document.cookie.split(';');
                    //         for (let i = 0; i < cookies.length; i++) {
                    //             let cookie = cookies[i].trim();
                    //             console.log(cookie,'cookiecookiecookie');
                    //             // 判断这个cookie的参数名是不是我们想要的
                    //             if (cookie.substring(0, name.length + 1) === (name + '=')) {
                    //                 cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    //                 console.log(cookieValue,'cookieValue');

                    //                 break;
                    //         }
                    //             }
                                
                    //     }
                    //     // return cookieValue;

                },
                //清除所有cookie函数
                clearAllCookie: function() {
                    var keys = document.cookie.match(/[^ =;]+(?=\=)/g);
                    if (keys) {
                        for (var i = keys.length; i--;)
                            document.cookie = keys[i] + '=0;expires=' + new Date(0).toUTCString()
                    }
                },





                // 删除商品
                goodsdel(item) {
                    this.$confirm('此操作将永久删除该商品, 是否继续?', '提示', {
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

                xiala: function() {
                    console.log(this.type)
                },


                // 添加商品按钮
                getinsteadgoods: function() {
                    this.insteadgoodsVisible = true

                },
                // 请求添加商品
                insteadgoods: function() {
                    this.getCookie()
                    console.log(this.goods_name, this.type, this.price, this.description, this.old_price, this.picture)
                    if (this.goods_name!= '' & this.type!= '' & this.price!= '' & this.description!= '' & this.old_price!= '' & this.picture!= '') {
                        this.$http.post('./insteadgoods.php', {
                            goods_name: this.goods_name,
                            type: this.type,
                            price: this.price,
                            description: this.description,
                            old_price: this.old_price,
                            picture: './images/goods/' + this.picture
                        }, {
                            emulateJSON: true
                        }).then(response => {
                            console.log(response.body);
                            if (response.body == 1) {
                                this.$message({
                                    message: '添加成功！',
                                    type: 'success'
                                });
                                location. reload()

                            } else {
                                this.$message({
                                    message: '请重新添加！',
                                    type: 'warning'
                                });
                            }
                        }, function() {
                            this.$message({
                                message: '注册请求失败！',
                                type: 'warning'
                            });
                        });
                    } else {
                        this.$message({
                            message: '请填写完整商品信息！',
                            type: 'warning'
                        });
                    }
                },








                // 跳转区
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

            }
        })
    </script>
</body>

</html>