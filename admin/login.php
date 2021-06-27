<?php

include '../conn.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../lib/element-ui.css">
    <link rel="stylesheet" href="../lib/element-icons.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../lib/tailwind.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>


    <div id="app">
        <!-- 登录 -->
        <div class="login_main" style="padding-top:170px;height:750px;background-image: url(../images/bg.png);">
            <div class="bg-white shadow  flex justify-center " style="width: 500px;margin: 0 auto; ">
                <!-- <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                    <div class="  w-full bg-contain bg-center " style="background-image: url(../images/bg.png);width:100%"></div>
                </div> -->
                <div class="lg:w-1/2 xl:w-10/12 p-6 sm:p-12">
                    <div class="mt-12 flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl font-extrabold">哆啦后台管理登录</h1>
                        <div class="w-full flex-1 mt-8">
                            <div class="mx-auto max-w-xs">
                                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" v-model="zhanghao" type="email" placeholder="账号" @change="getzhanghao" />
                                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" v-model="mima" type="password" placeholder="密码" @change="getmima" />
                                <button class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none" @click="getdenglu">
                                    <span class="ml-3">登 录</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>








    </div>
</body>

<script src="../lib/vue.js"></script>
<script src="..//lib/vue-resource.min.js"></script>
<script src="../lib/element-ui.js"></script>
<script src="../lib/jquery-3.5.1.min.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {

            zhanghao: "", //账号
            mima: "", //密码
     
        },
        created() {

        },

        mounted() {

        },
        methods: {

            // 获取账号
            getzhanghao: function() {
                console.log(this.zhanghao, '账号');
            },

            //获取密码
            getmima: function() {
                console.log(this.mima, '账号');
            },

            // 登录
            getdenglu: function() {
                this.$http.post('./getadminlogin.php?', {
                    uname: this.zhanghao,
                    pwd: this.mima
                }, {
                    emulateJSON: true
                }).then(response => {
                    if (response.body == 1) {
                        this.$message({
                            message: '登录成功！',
                            type: 'success'
                        });
                        this.chaxunid(this.zhanghao)
                        setTimeout(function() {
                            window.location.href = './admin.php'
                        }, 1500);
                    } else {
                        this.$message({
                            message: '登录失败，请检查账号密码！',
                            type: 'warning'
                        });
                    }
                    console.log(response, "登录");

                }, function() {
                    console.log('登录失败处理');
                });
            },

            // 查询用户id
            chaxunid: function(user) {
                this.$http.post('./chaxunadmin.php', {
                    userid: user
                }, {
                    emulateJSON: true
                }).then(response => {
                    var userObj = eval("(" + response.bodyText + ")");
                    localStorage.setItem("adminid", userObj);
                    console.log(localStorage.getItem("adminid"), '1111111111111111')
                }, function() {
                    console.log('获取商品请求失败处理');
                });
            },


        }

    })
</script>



</html>