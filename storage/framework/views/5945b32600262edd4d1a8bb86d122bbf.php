<?php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => backpack_url('dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.edit') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
?>

<?php $__env->startSection('header'); ?>
    <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none" bp-section="page-header">
        <h1 class="text-capitalize mb-0" bp-section="page-heading"><?php echo $crud->getHeading() ?? $crud->entity_name_plural; ?></h1>
        <p class="ms-2 ml-2 mb-0" bp-section="page-subheading"><?php echo $crud->getSubheading() ?? trans('backpack::crud.edit').' '.$crud->entity_name; ?>.</p>
        <?php if($crud->hasAccess('list')): ?>
            <p class="mb-0 ms-2 ml-2" bp-section="page-subheading-back-button">
                <small><a href="<?php echo e(url($crud->route)); ?>" class="d-print-none font-sm"><i class="la la-angle-double-<?php echo e(config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left'); ?>"></i> <?php echo e(trans('backpack::crud.back_to_all')); ?> <span><?php echo e($crud->entity_name_plural); ?></span></a></small>
            </p>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" bp-section="crud-operation-update">
	<div class="<?php echo e($crud->getEditContentClass()); ?>">
		

		<?php echo $__env->make('crud::inc.grouped_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		  <form method="post"
		  		action="<?php echo e(url($crud->route.'/'.$entry->getKey())); ?>"
				<?php if($crud->hasUploadFields('update', $entry->getKey())): ?>
				enctype="multipart/form-data"
				<?php endif; ?>
		  		>
		  <?php echo csrf_field(); ?>

		  <?php echo method_field('PUT'); ?>


		  	<?php if($crud->model->translationEnabled()): ?>
		    <div class="mb-2 text-right">
		    	
				<div class="btn-group">
				  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <?php echo e(trans('backpack::crud.language')); ?>: <?php echo e($crud->model->getAvailableLocales()[request()->input('_locale')?request()->input('_locale'):App::getLocale()]); ?> &nbsp; <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				  	<?php $__currentLoopData = $crud->model->getAvailableLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  	<a class="dropdown-item" href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>?_locale=<?php echo e($key); ?>"><?php echo e($locale); ?></a>
				  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </ul>
				</div>
		    </div>
		    <?php endif; ?>
		      
		      <?php if(view()->exists('vendor.backpack.crud.form_content')): ?>
		      	<?php echo $__env->make('vendor.backpack.crud.form_content', ['fields' => $crud->fields(), 'action' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		      <?php else: ?>
		      	<?php echo $__env->make('crud::form_content', ['fields' => $crud->fields(), 'action' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php endif; ?>
              
            <div class="d-none" id="parentLoadedAssets"><?php echo e(json_encode(Basset::loaded())); ?></div>
            <?php echo $__env->make('crud::inc.form_save_buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		  </form>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/vendor/backpack/crud/src/resources/views/crud/edit.blade.php ENDPATH**/ ?>