<script src="{{ asset('metronic/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script>
    tinymce.init({
        selector: '.tiny',
        skin: "oxide-dark",
        content_css: "dark",
        menubar: false,
        plugins: 'code table lists link',
        toolbar: 'undo redo | formatselect| bold italic | link | alignleft aligncenter alignright | indent outdent | bullist numlist | code'
    });
</script>