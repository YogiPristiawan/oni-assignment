<!-- Javascript -->
<script>
  const BASEURL = "{{ url('/') }}"
</script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>

<!-- Charts JS -->
{{-- <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/index-charts.js') }}"></script> --}}

<!-- Page Specific JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- DataTable JS -->
<!-- Bootstrap 5 without jquery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/fh-3.2.2/sc-2.0.5/sb-1.3.2/datatables.min.js">
</script>
