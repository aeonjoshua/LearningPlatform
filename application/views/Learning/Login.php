

<?php


if (isset($_SESSION['username'])){
		redirect('user/profile');
	}
  ?>


<form method ="POST" action = "">



    <?php if(isset($_SESSION['Success'])){ ?>
      <div class ="alert alert-success"> <?php echo $_SESSION ['Success']; ?> </div>

      <?php

    } ?>

    <div class="login-container">

        <div class="lrp_login">
  		    <div class="row lrp_socialButtons">
            <div class="col-sm-3"></div>
      	    <div class="col-xs-12 col-sm-6">
  		        <a href="#" class="btn btn-lg btn-block lrp_btn-facebook">
  			        <i class="fa fa-facebook visible-xs"></i>
  			        <span class="hidden-xs">Log in with Facebook</span>
  		        </a>
  	        </div>
            <div class="col-sm-3"></div>
          </div>
          <div class="row lrp_socialButtons">
            <div class="col-sm-3"></div>
          	<div class="col-xs-12 col-sm-6">
  		        <a href="#" class="btn btn-lg btn-block lrp_btn-google">
  			        <i class="fa fa-google-plus visible-xs"></i>
  			        <span class="hidden-xs">Log in with Google</span>
  		        </a>
  	        </div>
            <div class="col-sm-3"></div>
  		    </div>

  		    <div class="row lrp_loginOr">
            <div class="col-sm-3"></div>
  			    <div class="col-xs-12 col-sm-6">
  			         <hr class="lrp_hrOr">
  				       <span class="lrp_spanOr">or</span>
  			   </div>
           <div class="col-sm-3"></div>
  		     </div>
         </div>



         <div class="lrp_textfield">
           <div class="row lrp_socialButtons">
           <div class="col-sm-4"></div>
     			   <div class="col-sm-4">
     			        <form class="lrp_loginForm" action="" autocomplete="off" method="POST">
     					           <div class="input-group">
     						                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
     						                       <input type="text" class="form-control" name="username" placeholder="Username">
     					           </div>
                         <?php echo form_error('username','<div class ="alert alert-danger">', '</div>'); ?>

     					           <div class="input-group">
     						                 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
     						                       <input  type="password" class="form-control" name="password" placeholder="Password">
     					           </div>
                         <?php echo form_error('password','<div class ="alert alert-danger">', '</div>'); ?>
     				      </form>
     			   </div>
           <div class="col-sm-4"></div>
         	</div>
        </div>

        <div class="lrp_container">
     		<div class="row lrp_row">
           <div class="col-sm-4"></div>
     			<div class="col-sm-4 text-center">
     				<label class="checkbox">
     					<input type="checkbox" value="remember-me">Remember Me
     				</label>
     			</div>
          <div class="col-sm-4"></div>
        </div>
        <div class="row lrp_row1">
          <div class="col-sm-3"></div>
           <div class="col-sm-5 text-center">
           <button class="btn btn-lg btn-primary btn-block lrp_button" type="submit" name="login">Login</button>
           </div>
           <div class="col-sm-4"></div>
         </div>
       </div>

         <div class="row wor">
           <div class="col-sm-3"></div>
     			<div class="col-sm-6 text-center">
     					<a class="lrp_forgotPwd" href="#">Forgot your password?</a>
     			</div>
           <div class="col-sm-3"></div>
     		</div>
         <div class="row wor">
           <div class="col-sm-3"></div>
     			<div class="col-sm-6 text-center">
     					<span class="dhaa">Don't have an account? <a class="lrp_signup" href="<?= base_url('learning/register')?>"> Sign Up </a></span>
     			</div>
           <div class="col-sm-3"></div>
     		</div>
     	</div>

</form>
