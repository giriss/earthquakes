<?php $__env->startSection('title', 'Earthquakes - XML or JSON'); ?>

<?php $__env->startSection('content'); ?>
  <div class="row align-items-center text-center mt-2">
    <div class="col">
      <div class="card m-auto" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title">JSON</h5>
          <p class="card-text">Click here to view the earthquake details from the JSON url.</p>
          <a href="/json" class="btn btn-primary">Use JSON</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card m-auto" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title">XML</h5>
          <p class="card-text">Click here to view the earthquake details from the XML url.</p>
          <a href="/xml" class="btn btn-primary">Use XML</a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/girishgopaul/Documents/ved-proj/app/views/home.blade.php ENDPATH**/ ?>