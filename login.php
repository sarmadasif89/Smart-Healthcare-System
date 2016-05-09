<?php
session_start();
include 'header.php';
if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $user->check_login($email, $password, $hospital) ;
        if ($login) {
            //Login Success
             header("location:index.php");
        } 
        else {
            // Login Failed
            echo '<script>';
            echo 'alert("Invalid username or password. Please try again!");';
            echo 'window.location.href = "login.php"';
            echo '</script>';   
        }
}
else if (isset($_REQUEST['register'])) {
    extract($_REQUEST);
    $register = $user->signup();
    if($register){
        //Login Success
        header("location:login.php");        
    }
    else {
        // Login Failed
        echo '<script>';
        echo 'alert("Invalid username or password. Please try again!");';
        echo 'window.location.href = "login.php"';
        echo '</script>';   
    }
}
else {
include 'head.php';
?>
<body>
<div class="container">
    <h1 align="center">Smart Healthcare</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-group" action="" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" id="username" name="email" maxlength="30" tabindex="1" autofocus>                                        
                            </div>
                            <div class="form-group">                                    
                                <input class="form-control" placeholder="Password" name="password"  type="password" tabindex="2">
                            </div>
                            <div class="form-group">                                    
                                    <select class="form-control" name="hospital">
                                        <option value="0">Select Hospital</option>
                                        <option value="1">Kaiser Permanente</option>
                                        <option value="2">California Hospital Medical Center</option>
                                        <option value="3">Valley Care Medical Center</option>
                                        <option value="4">Century City Hospital</option>
                                        <option value="5">Kentfield Rehabilitation Hospital</option>
                                        <option value="6">Memorial Hermann</option>
                                        <option value="7">AO Fox Memorial Hospital</option>
                                        <option value="8">UHS Binghamton General Hospital</option>
                                        <option value="9">New York Methodist Hospital</option>
                                        <option value="10">St Peters Hospital</option>
                                        <option value="11">St Marys Hospital</option>
                                        <option value="12">St Joseph Hospital</option>
                                    </select>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <p></p>
                            <!-- Change this to a button or input when using this as a form -->                                
                            <input type="submit" class="btn btn-lg btn-success btn-block" name="submit" value="Login" />
                            </fieldset>   
                    </form>
                            <p></p>                           
                            <div class="social_login">								
                                    <div class="action_btns">					
                                    <a href="#modal" id="modal_trigger" class="btn btn-lg btn-success btn-block">Sign up</a>
                                    </div>
                            </div>
                            <!-- Register Form -->
                            <div id="modal" class="popupContainer" style="display:none;">
                            <section class="popupBody">
                            <div class="user_register">
                                    <form role="form" class="form-group" action="" method="POST">
                                            <label>Full Name</label>
                                            <input type="text" name="fullname" placeholder="Full Name" />
                                            <br />
                                            <label>Email Address</label>
                                            <input type="email" name="email" placeholder="Email"/>
                                            <br />
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password" />
                                            <br />
                                            <label>Hospital</label>
                                            <select class="form-control" name="signuphospital" style="width:90%;">
                                                <option value="0">Select Hospital</option>
                                                <option value="1">Kaiser Permanente</option>
                                                <option value="2">California Hospital Medical Center</option>
                                                <option value="3">Valley Care Medical Center</option>
                                                <option value="4">Century City Hospital</option>
                                                <option value="5">Kentfield Rehabilitation Hospital</option>
                                                <option value="6">Memorial Hermann</option>
                                                <option value="7">AO Fox Memorial Hospital</option>
                                                <option value="8">UHS Binghamton General Hospital</option>
                                                <option value="9">New York Methodist Hospital</option>
                                                <option value="10">St Peters Hospital</option>
                                                <option value="11">St Marys Hospital</option>
                                                <option value="12">St Joseph Hospital</option>
                                            </select>
                                            <br /><br />
                                            <div class="action_btns">						
                                              <div class="one_half last">
                                                   <input type="submit" class="btn btn-lg btn-success btn-block" name="register" value="Register" />
                                               </div>
                                            </div>
                                    </form>
                            </div>
                            </section>
                                         
                </div>
            </div>
        </div>
    </div>
</div>
    
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 150, overlay : 0.6, closeButton: ".modal_close" });
	$(function(){
		// Calling Register Form
		$("#modal_trigger").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});
	})

</script>

</body>
</html>
<?php } ?>