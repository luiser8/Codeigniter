<?php $CI = &get_instance();
$CI->load->helper('url');
$CI->load->view('./layouts/header');?>

<div class="container" style="margin-top: 125px;">
  <div class="row">
    <div class="col-xs-4 col-xl-4 offset-xl-4 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
     <?php if(isset($Error)){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <small><?php echo isset($Error) ? $Error : '';?></small>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>
            <form action="<?php echo base_url('Auth/login'); ?>" method="post">
                <div class="col-auto">
                    <label class="sr-only" for="account">Cuenta de usuario</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input class="form-control input-lg" id="account" type="text" name="user" autofocus placeholder="Usuario" required autocomplete="off">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="account">Contraseña de usuario</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">#</div>
                        </div>
                        <input class="form-control input-lg" id="pass" type="password" name="pass" autofocus placeholder="Contraseña" required autocomplete="off">
                    </div>
                </div>
                <div class="col-auto">
                    <input class="btn btn-block btn-outline-primary" type="submit" value="Iniciar sesión">
                    <a class="btn btn-block btn-outline-secondary" href="<?php echo base_url('Auth/signin'); ?>">Registrarse</a>
                </div>
               
            </form>
    </div>
  </div>
</div>
<?php $CI->load->view('./layouts/footer'); ?>
