$(document).ready(function() {
    $("#to_login").click(function(e){
              e.stopPropagation();
              var name = $("#username").val().replace(/(^s*)|(s*$)/g,"");
              var pass = $("#password").val().replace(/(^s*)|(s*$)/g,"");
              $.ajax({
                    type:"post",
                    url:'login.php?action=login',
                    dataType:"json",
                    async:false,
                    data:{'username':name,'password':pass},
                    success:function(res){
                        if(!res.ok){
                            $("#login_tip").html("<font color='red'>用户名或密码错误！</font>");
                        }
                        else{
                          location.reload();
                        }
                    }
                });
    });
    //action to enter
    $(document).keydown(function(e){ 
    if (!e)  
      e = window.event;  
    if (e.keyCode == 13) {  
      $("#to_login").click();  
        }  
    })
    $("#logout_a").click(function() {
      $.ajax({
            type:"post",
            url:'login.php?action=logout',
            async:false,
            dataType:"json",
            success:function(res){
                if(!res.ok){
                    alert('未知错误');
                }
                else{
                  location.reload();
                }
            }
        });
    });
});
$("#username")
    .focus(function(){
        $("#login_tip").html("");
    });
$("#password")
    .focus(function(){
        $("#login_tip").html("");
    });
