
var imageInputElement = document.querySelector("#kt_image_input");
var imageInput = KTImageInput.getInstance(imageInputElement);
imageInput.on("kt.imageinput.removed", function() {
    alert("kt.imageinput.removed event is fired");
});
/*
let imageInputElement = document.querySelector("#kt_image_input");
let imageInput = KTImageInput.getInstance(imageInputElement);
imageInput.on("kt.imageinput.remove", function() {
    alert('Remove');
});*/

$(document).ready(function() {

    let $modal = $('#imageModal');
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
                    console.log(reader);
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }

    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });


    $("#crop").click(function(){

        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
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