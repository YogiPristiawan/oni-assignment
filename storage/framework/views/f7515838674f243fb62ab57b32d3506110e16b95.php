<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    <?php echo e(env('APP_NAME') . ' | '); ?>

    <?php echo $__env->yieldContent('title'); ?>
  </title>

  <!-- Meta -->
  <?php echo $__env->make('layouts.fragments.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Script -->
  <?php echo $__env->make('layouts.fragments.head-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Link -->
  <?php echo $__env->make('layouts.fragments.link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="app">
  <header class="app-header fixed-top">
    <!-- Navbar -->
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Sidebar -->
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </header>
  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">
        <!-- Content -->
        <?php echo $__env->yieldContent('content'); ?>

      </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

  <!-- Script -->
  <?php if(env('APP_ENV') == 'production'): ?>
    <script>
      document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
      });
      document.onkeydown = function(e) {
        if (event.keyCode == 123) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "C".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
          return false;
        }
      };
    </script>
  <?php endif; ?>
  <?php echo $__env->make('layouts.fragments.body-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldPushContent('script'); ?>

</body>

</html>
<?php /**PATH /home/yuu/Programming/ony-assignment/resources/views/layouts/app.blade.php ENDPATH**/ ?>