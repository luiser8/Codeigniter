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
                        <div class="form-group">
                            <input class="form-control input-lg" type="text" name="user" id="user" autofocus placeholder="Usuario" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control input-lg" type="password" name="pass" id="pass" placeholder="Contraseña" required autocomplete="off">
                        </div>
                        <input class="btn btn-outline-primary" type="submit" value="Iniciar sesión">
                        <a class="btn btn-outline-secondary" href="<?php echo base_url('Auth/signin'); ?>">Registrarse</a>
                </form>
    </div>
  </div>
</div>
<?php $CI->load->view('./layouts/footer'); ?>
