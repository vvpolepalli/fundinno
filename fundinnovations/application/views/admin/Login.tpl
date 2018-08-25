<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin : Login</title>
<link href="{$baseurl}styles/admin/login.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="outer_container">
  <div class="container_div">
    <div class="content_container">
      <h1><!--<img src="{$baseurl}images/logo.png"/>-->Logo</h1>
      <div class="content_container_inner">
        <div class="content_container_content">
          <div class="filling">
          <div class="error">{if $loginError} {$loginError} {/if}</div>
          <div class="logout">{if $msgg} {$msgg} {/if}</div>
          <form id="login" name="login" action="{$baseurl}admin/login/" method="post">
            <div class="form_listing">
              <ul>
                <li>
                  <div class="leftside01">User  ID</div>
                  <div class="rightside01">
                    <input name="userName" id="userName" type="text" class="textbox" />
                  </div>
                  <div class="clear"></div>
                </li>
                <li>
                  <div class="leftside01">Password</div>
                  <div class="rightside01">
                    <input name="userPassword" id="userPassword" type="password" class="textbox" />
                  </div>
                  <div class="clear"></div>
                </li>
                <li>
                  <div class="leftside01"></div>
                  <div class="rightside01"> <span class="btnlayout01">
                    <input name="submitLogin" type="submit"  value="Login"  />
                    </span> <a href="{$baseurl}admin/login/forgot_password">Forgot password?</a></div>
                  <div class="clear"></div>
                </li>
              </ul>
            </div>
            <!--End:Form Listing--> 
           </form> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End:Outer Container--> 

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
      DD_belatedPNG.fix('img,div,ul,li,li a,a,input,p,blockquote,span,h1,h2,h3,.last-child');
</script>
<![endif]-->
<!--[if IE]>
<link href="styles/iefix.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]--></body>
</html>
