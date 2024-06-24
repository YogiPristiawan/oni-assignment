@extends('layouts.app')
@section('title', $title)
@section('content')
  <div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
      <h1 class="app-page-title mb-0">Data pendonor</h1>
    </div>

    <div class="col-auto">
      <a class="btn app-btn-primary" href="{{ route('home') }}">
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
        @if (session('flash'))
          <div class="alert {{ session('flash.status') == 'success' ? 'alert-success' : 'alert-danger' }}">
            <ul class="m-0">
              <li>{{ session('flash.message') }}</li>
            </ul>
          </div>
        @endif
        <div class="row mb-4">
          {{--<div class="col-md-3">--}}
          {{--  <div class="form-floating">--}}
          {{--    <select class="form-select" id="status">--}}
          {{--      <option value="default" selected>Semua</option>--}}
          {{--      <option value="active">Aktif</option>--}}
          {{--      <option value="nonactive">Nonaktif</option>--}}
          {{--    </select>--}}
          {{--    <label for="status">Status</label>--}}
          {{--  </div>--}}
          {{--</div>--}}
          {{--<div class="col-md-3 d-flex align-items-center">--}}
          {{--  <button class="btn btn-primary" id="filter">Filter</button>--}}
          {{--</div>--}}
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
@endsection

@push('script')
  <script>
    const csrf_token = "{{ csrf_token() }}";
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
          url: "{{ route('api.users.index') }}",
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

      {{--$('#filter').on('click', function() {--}}
      {{--  status = $('#status').val();--}}
      {{--  bloodType = $('#blood-type').val();--}}
      {{----}}
      {{--  donorDataTable.ajax.reload();--}}
      {{--})--}}
    });
  </script>
@endpush
