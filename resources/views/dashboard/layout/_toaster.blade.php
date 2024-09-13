<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if (session('success'))
    toastr.success("{!! session('success') !!}", "Success");
    @elseif(session('warning'))
    toastr.warning("{!! session('warning') !!}", "Warning");
    @elseif(session('error'))
    toastr.error("{!! session('error') !!}", "Error");
    @elseif(session('info'))
    toastr.info("{!! session('info') !!}", "Info");
    @endif

</script>
