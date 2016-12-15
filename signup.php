<!DOCTYPE html>
<html lang="en">

    <head>
        <style>
        body {
            margin: 50px 0;
            text-align: center;
        }
        .inp {
            border: 1px solid gray;
            padding: 0 10px;
            width: 200px;
            height: 30px;
            font-size: 18px;
        }
        #embed-captcha {
            width: 300px;
            margin: 0 auto;
        }
        .show {
            display: block;
        }
        .hide {
            display: none;
        }
        #notice {
            color: red;
        }
        /* 以下遮罩层为demo.用户可自行设计实现 */
        #mask {
            display: none;
            position: fixed;
            text-align: center;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }
        /* 可自行设计实现captcha的位置大小 */
        .popup-mobile {
            position: relative;
        }
        #popup-captcha-mobile {
            position: fixed;
            display: none;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Explorer - 探索这世界</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/open-sans.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/elegant-font/code/style.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <style>
        html, body {
           width: 100%;
           height: 100%;
           margin: 0;
           padding: 0;
         }
        </style>
    </head>

    <body>

        <!-- Loader -->
    	<div class="loader">
    		<div class="loader-img"></div>
    	</div>


		<!-- Top menu -->
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
            <span class="sr-only">顶端导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Explorer - 探索这世界</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a  href="index.php">首页</a></li>
            <li><a  href="mygame.html">现在开始</a></li>
          </ul>

        </div>
      </div>
    </nav>
        <?php
        //include_once('safe.php');
        ?>
        <!-- Page title -->
        <div class="page-title top-content" style="height: 100%;">
          <div class="col-sm-4 block-2-box block-2-left contact-form wow fadeInLeft" style="margin-left:35vw;margin-top:-10vw;background-color: rgba(0,0,0,0.3);">
            <h3>注册</h3>
                <form role="form" action="check_signup.php" method="post">
                  <div class="form-group" >
                      <input type="text" name="username" class="contact-subject form-control" placeholder="用户名" id="username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password1" placeholder="密码" class="contact-subject form-control" style="background: rgba(0, 0, 0, 0)" id="password1">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password2" placeholder="确认密码" class="contact-subject form-control" id="password2">
                    </div>
                    <div id="signup_tip" class="text-left"><span></span></div>
                </form>
                <button type="submit" class="btn" id="to_signup">创建</button>
                <div id="popup-captcha"></div>
          </div>
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.countTo.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="http://static.geetest.com/static/tools/gt.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
<script>
    var handlerPopup = function (captchaObj) {
        // 成功的回调
        captchaObj.onSuccess(function () {
            var validate = captchaObj.getValidate();
            $.ajax({
                url: "assets/verify/web/VerifyLoginServlet.php", // 进行二次验证
                type: "post",
                dataType: "json",
                data: {
                    type: "pc",
                    geetest_challenge: validate.geetest_challenge,
                    geetest_validate: validate.geetest_validate,
                    geetest_seccode: validate.geetest_seccode
                },
                success: function (data) {
                    if (data && (data.status === "success")) {
                        var name = $("#username").val().replace(/(^s*)|(s*$)/g,"");
                        var pass = $("#password1").val().replace(/(^s*)|(s*$)/g,"");
                        var pass2 = $("#password2").val().replace(/(^s*)|(s*$)/g,"");
                        $.ajax({
                            type:"post",
                            url:'check_signup.php',
                            dataType:"json",
                            async:false,
                            data:{'username':name,'password':pass,'password2':pass2},
                            success:function(res){
                                if(!res.ok){
                                    $("#signup_tip").html("<font color='red'>用户名已存在！</font>");
                                }
                                else{
                                    location.href='index.php';
                                }
                            }
                        });
                    } else {
                        $(document.body).html('<h1>Error,Check Your Network</h1>');
                    }
                }
            });
        });
        $("#to_signup").click(function (e) {
            e.stopPropagation();
            var name = $("#username").val().replace(/(^s*)|(s*$)/g,"");
            var pass = $("#password1").val().replace(/(^s*)|(s*$)/g,"");
            var pass2 = $("#password2").val().replace(/(^s*)|(s*$)/g,"");
            if(!name.length){
                $("#signup_tip").html("<font color='red'>用户名不能为空！</font>");
            }else if(!pass.length){
                $("#signup_tip").html("<font color='red'>密码不能为空！</font>");
            }else if(pass!=pass2){
                $("#signup_tip").html("<font color='red'>两次输入密码不一致！</font>");
            }else{
            captchaObj.show();
            }
        });
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#popup-captcha");
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
    // 验证开始需要向网站主后台获取id，challenge，success（是否启用failback）
    $.ajax({
        url: "assets/verify/web/StartCaptchaServlet.php?type=pc&t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerPopup);
        }
    });
        $("#username")
            .focus(function(){
                $("#signup_tip").html("");
            })
        $("#password")
            .focus(function(){
                $("#signup_tip").html("");
            })
        $("#password2")
            .focus(function(){
                $("#signup_tip").html("");
            })
</script>
    </body>

</html>
