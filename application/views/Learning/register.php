
<?php


if (isset($_SESSION['username'])){
    echo ('punyeta');
		redirect('user/profile');
	}
  ?>

<form method="post" action="<?php echo base_url('Learning/register'); ?>">



    <?php if(isset($_SESSION['Success'])){ ?>
      <div class ="alert alert-success"> <?php echo $_SESSION ['Success']; ?> </div>
      <?php
    } ?>


    <div class="register-container">
      <div class="row register">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
      <div class="form-group">
          <label class="register-text" for="username" > Username </label>
          <input class="form-control" type="text" id = "username" name = "username" placeholder="Username">
          <?php echo form_error('username','<div class ="alert alert-danger">', '</div>'); ?>
      </div>

      <div class="form-group">
          <label class="register-text" for="email" > Email </label>
          <input class="form-control" type="text" id = "email" name = "email" placeholder="Email">
          <?php echo form_error('email','<div class ="alert alert-danger">', '</div>'); ?>
      </div>

      <div class="form-group">
          <label class="register-text" for="password" > Password </label>
          <input class="form-control" type="password" id = "password" name = "password" placeholder="Password">
          <?php echo form_error('password','<div class ="alert alert-danger">', '</div>'); ?>
      </div>

      <div class="form-group">
          <label class="register-text" for="password"> Confirm Password </label>
          <input class="form-control" type="password" id = "password" name = "password2" placeholder="Confirm Password">
          <?php echo form_error('password','<div class ="alert alert-danger">', '</div>'); ?>
      </div>

      <div class = "text-center">
          <button class ="btn btn-primary register-button" name = "register"> Register </button>
      </div>
    </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="row wor">
      <div class="col-sm-3"></div>
     <div class="col-sm-6 text-center">
         <span class="dhaa">Already have an account? <a class="lrp_signup" href="<?= base_url('learning')?>"> Sign In </a></span>
     </div>
      <div class="col-sm-3"></div>
   </div>

    </div>
  </div>

</form>
