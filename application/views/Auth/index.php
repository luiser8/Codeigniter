<?php $CI = &get_instance();
$CI->load->helper('url');
$CI->load->view('./layouts/header');?>

<div class="container" style="margin-top: 125px;">
  <div class="row">
    <div class="col-sm"></div>
    <div class="col-sm">
     <?php if(isset($Error)){ ?>
                <div class="alert alert-danger" role="alert">
                    <p ><b><?php echo isset($Error) ? $Error : '';?></b></p>
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
                        <input class="btn btn-outline-secondary" type="submit" value="Registrarse">
                </form>
    </div>
    <div class="col-sm"></div>
  </div>
</div>
<?php $CI->load->view('./layouts/footer'); ?>
