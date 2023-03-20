<script src="{{ asset('metronic/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script>
    let editor_config = {
        path_absolute : "/",
        selector: '.tiny',
        relative_urls: false,
        skin: "oxide-dark",
        content_css: "dark",
        menubar: false,
        plugins: 'code table lists link image ',
        toolbar: 'undo redo | formatselect | bold italic | link image media | alignleft aligncenter alignright | indent outdent | bullist numlist | code',
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype === 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>