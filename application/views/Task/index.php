<?php $CI = &get_instance();
$CI->load->helper('url');
$CI->load->view('./layouts/header');?>

<div class="card-deck mb-3 text-center">
	<?php foreach ($Tasks as $task):?>
	    <div class="card mb-4 shadow-sm">
	      <div class="card-header">
	        <h4 class="my-0 font-weight-normal"><?php echo $task['priority']; ?></h4>
	      </div>
	      <div class="card-body">
	        <ul class="list-unstyled mt-3 mb-4">
	          <li><?php echo $task['name']; ?></li>
	          <li><?php echo $task['description']; ?></li>
	        </ul>
	        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Edit</button>
	        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Delete</button>
	      </div>
	    </div>
	<?php endforeach ?>

<?php $CI->load->view('./layouts/footer'); ?>