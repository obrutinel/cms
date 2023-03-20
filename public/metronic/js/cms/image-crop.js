

$(document).ready(function() {

    /*$('#kt_image_input').on('click', function() {
        alert('ok');
    });*/

    let $modal = $('#imageModal');
    let width = $modal.find('input[name="width"]').val();
    let height = $modal.find('input[name="height"]').val();
    let ratio = height/ width;
    let image = document.getElementById('image');
    let cropper;

    $("body").on("change", ".image", function (e) {

        let reader;
        let file;
        let url;
        let files = e.target.files;

        let done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }

    });

    $modal.on('shown.bs.modal', function () {

        cropper = new Cropper(image, {
            aspectRatio: ratio,
            viewMode: 3,
            //minContainerWidth: width,
            //minContainerHeight: height,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });


    $("#crop").click(function(){

        canvas = cropper.getCroppedCanvas({
            width: width,
            height: height,
        });
        canvas.toBlob(function(blob) {

            let url = URL.createObjectURL(blob);
            let reader = new FileReader();

            reader.readAsDataURL(blob);
            reader.onloadend = function() {

                let base64data = reader.result;

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/admin/upload",
                    data: {
                        'id': $modal.find('input[name="page_id"]').val(),
                        '_token': $('input[name="_token"]').val(),
                        'image': base64data,
                        'width': width,
                        'height': height,
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        location.reload()
                }
            });
            }
        });

    });

});