<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
  <div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
      <h1 class="app-page-title mb-0">Data pendonor</h1>
    </div>

    <div class="col-auto">
      <a class="btn app-btn-primary" href="<?php echo e(route('home')); ?>">
        <span class="me-1">
          <i class="fas fa-user-plus"></i>
        </span>
        Tambah</a>
    </div>
  </div>

  <!-- Table -->
  <div class="tab-content" id="donors-table-tab-content">
    <div class="app-card app-card-orders-table mb-5 border">
      <div class="app-card-body p-3">
        <?php if(session('flash')): ?>
          <div class="alert <?php echo e(session('flash.status') == 'success' ? 'alert-success' : 'alert-danger'); ?>">
            <ul class="m-0">
              <li><?php echo e(session('flash.message')); ?></li>
            </ul>
          </div>
        <?php endif; ?>
        <div class="row mb-4">
          
          
          
          
          
          
          
          
          
          
          
          
          
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-o text-left" id="users-data-table" style="width: 100%">
            <thead>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
  <script>
    const csrf_token = "<?php echo e(csrf_token()); ?>";
  </script>
  <script>
    $(document).ready(function() {
      let status = $('#status').val();
      let bloodType = $('#blood-type').val();

      let usersDataTable = $('#users-data-table').DataTable({
        serverSide: true,
        processing: true,
        paging: true,
        dom: 'Bfrtip',
        stateSave: true,
        buttons: [{
          extend: 'colvis',
          text: "Tampilkan kolom",
          collectionLayout: 'fixed columns',
          collectionTitle: 'Pilih Kolom',
          columns: ':not(.noVis)'
        }],
        ajax: {
          url: "<?php echo e(route('api.users.index')); ?>",
          data: (d) => {
            d.status = status;
            d.blood_type = bloodType;
          },
          complete: () => {
            $("button[data-button_type='delete']").on('click', function() {
              let url = `${BASEURL}/api/users/${$(this).data('id')}`
              confirmDeleteAction(url, csrf_token, '#donors-data-table');
            })
          }
        },
        columns: [{
            title: 'No.',
            className: 'noVis text-center',
            render: function(data, type, row, meta) {
              return meta.settings._iDisplayStart + meta.row + 1;
            },
            searchable: false,
            orderable: false
          },
          {
            title: 'Nama Lengkap',
            name: 'users.name',
            data: 'name',
            searchable: true,
            orderable: false
          },
          {
            title: 'Gambar',
            name: 'users.picture',
            data: 'picture',
            searchable: true,
            orderable: false
          },
          {
            title: 'Action',
            className: 'noVis',
            render: (data, type, row) => {
              let action = `
                <div class="d-flex justify-content-center">
                  <a class="btn btn-info action me-3" href="${BASEURL}/users/${row.id}/edit" title="Edit">
                    <span class="pointer-events-none">
                      <i class="fas fa-edit pointer-events-none"></i>
                    </span>
                  </a>
                  <button class="btn btn-danger action" data-button_type="delete" data-id="${row.id}" title="Delete">
                    <span class="pointer-events-none">
                      <i class="fas fa-trash pointer-events-none"></i>
                    </span>
                  </button>
                </div>
              `
              return action;
            },
            searchable: false,
            orderable: false
          }
        ]
      });

      
      
      
      
      
      
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yuu/Programming/ony-assignment/resources/views/user/index.blade.php ENDPATH**/ ?>