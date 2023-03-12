<script src="{{ asset('metronic/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script>
    tinymce.init({
        selector: '.tiny', // Replace this CSS selector to match the placeholder element for TinyMCE
        skin: "oxide-dark",
        content_css: "dark",
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>