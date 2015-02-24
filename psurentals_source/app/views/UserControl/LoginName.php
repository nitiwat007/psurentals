<!DOCTYPE html>
<script>
    $(function(){
        var userInfo = JSON.parse(localStorage.getItem("userInfo"));
        if(userInfo==null){
            $("#loginName").text("Sign In");
        }else{
            $("#loginName").text(userInfo.name);
        }
        
    });
</script>
<a href="#"><span id="loginName"></span></a>

