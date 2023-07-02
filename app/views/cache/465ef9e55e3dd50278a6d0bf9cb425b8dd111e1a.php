<?php $__env->startSection('title', 'JSON'); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('sidebar'); ?>

    <p>This is appended to the master sidebar.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <?php $__currentLoopData = $earthquakes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earthquake): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-3">
        <div class="card m-auto" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Magnitude: <?php echo e($earthquake['magnitude']); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Datetime: <?php echo e($earthquake['datetime']); ?></h6>
            <p class="card-text">Place: <?php echo e($earthquake['place']); ?></p>
            <a target="_blank" href="https://www.google.com/maps/?q=<?php echo e($earthquake['coordinates'][1]); ?>,<?php echo e($earthquake['coordinates'][0]); ?>" class="btn btn-primary">View location</a>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/girishgopaul/Documents/ved-proj/app/views/json.blade.php ENDPATH**/ ?>