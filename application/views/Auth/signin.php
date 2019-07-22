<?php $CI = &get_instance();
$CI->load->helper('url');
$CI->load->view('./layouts/header');?>

<div class="container" style="margin-top: 55px;">
  <div class="row">
    <div class="col-xs-4 col-xl-4 offset-xl-4 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
         <?php if(validation_errors()){ ?>
	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	          <small><?php echo validation_errors();?></small>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
        <?php } ?>
            <form action="<?php echo base_url('Auth/create'); ?>" method="post">
                
<!--                 <div class="form-group">
                    <select name="id_level" class="form-control">
                        <option>Selecciona un nivel</option>
                        <?php foreach ($Levels as $level):?>
                            <option value="<?php echo $level['id_level']; ?>"><?php echo $level['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div> -->
                <div class="form-group">
                    <input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Nombres" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Apellidos" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Correo" value="<?php echo set_value('email'); ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="account" value="<?php echo set_value('account'); ?>" placeholder="Cuenta" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="pass" value="<?php echo set_value('pass'); ?>" placeholder="Contraseña" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="confirm_pass" value="<?php //echo set_value('confirm_pass'); ?>" placeholder="Confirmar contraseña" autocomplete="off">
                </div>
                <input class="btn btn-outline-primary" type="submit" value="Crear cuenta">
                <a class="btn btn-outline-secondary" href="<?php echo base_url('Auth'); ?>">Cancelar</a>
            </form>
    </div>
  </div>
</div>

<?php $CI->load->view('./layouts/footer'); ?>