<?php $__env->startSection('title', 'JSON / XML Earthquakes'); ?>

<?php $__env->startSection('navbar'); ?>
  <form class="d-flex" action="">
    <input class="form-control me-2" type="search" placeholder="Search" name="search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="btn-group mt-2 mb-2" role="group" aria-label="Basic example">
    <a href="?sort" class="btn btn-primary"><i class="bi bi-sort-down"></i> Sort by magnitude</a>
  </div>
  <div class="row">
    <?php $__currentLoopData = $earthquakes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earthquake): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-3">
        <div class="card m-auto" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Magnitude: <?php echo e($earthquake['magnitude']); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Datetime: <?php echo e($earthquake['datetime']); ?></h6>
            <p class="card-text">Place: <?php echo e($earthquake['place']); ?></p>
            <a target="_blank" href="https://www.google.com/maps/?q=<?php echo e($earthquake['coordinates'][1]); ?>,<?php echo e($earthquake['coordinates'][0]); ?>" class="btn btn-primary"><i class="bi bi-geo-alt-fill"></i> View location</a>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/girishgopaul/Documents/ved-proj/app/views/earthquakes.blade.php ENDPATH**/ ?>