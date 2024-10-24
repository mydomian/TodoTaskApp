<script src="{{ asset('storage/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('storage/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('storage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('storage/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('storage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('storage/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('storage/dist/js/toastr.min.js') }}"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

@stack('scripts')
