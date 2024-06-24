@extends('layouts.app')
@section('title', $title)
@section('content')
  <div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
      <h1 class="app-page-title mb-0">Detail data user</h1>
    </div>
  </div>

  <!-- Table -->
  <div class="tab-content">
    <div class="app-card app-card-orders-table mb-5 border">
      <div class="app-card-body">
        <div class="p-4">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="m-0">
                <li>{{ $errors->first() }}</li>
              </ul>
            </div>
          @endif
          <form action="{{ route('users.update', ['userId' => $user->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
              <div class="col-sm-6">
                <label for="fullNameInput" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="name" id="fullNameInput" class="form-control"
                  value="{{ $user->name }}">
              </div>
            </div>

            <button class="btn app-btn-primary mt-2">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
  <script>
    $(function() {
      $('#selectVillageInput').on('change', function() {
        let villageId = $(this).find(":selected").data("id");
        $('#villageId').val(villageId);
      })
      let d = new Date()
      $('#currentDate').val(
        `${d.getFullYear()}-${("0" + String((d.getMonth() + 1))).slice(-2)}-${("0" + String((d.getDate()))).slice(-2)}`
        )
    })
  </script>
@endpush
