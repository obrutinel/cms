@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Edition d'une page
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('pages.index') }}" class="btn fw-bold btn-light">
            <i class="fa-solid fa-rotate-left"></i> Retour
        </a>
        <button type="submit" class="btn btn-light-primary">
            <i class="fa-solid fa-check"></i> Enregistrer et sortir
        </button>
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-check"></i> Enregistrer
        </button>
    </div>
@endsection

@section('content')
    <div class="col-xl-12">

        <div class="mb-5 mb-xl-8">

            @if(empty($page))
                <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
            @else
                <form method="POST" action="{{ route('pages.update', $page) }}" enctype="multipart/form-data">
                @method('PUT')
               @endif

            @csrf

                <input type="hidden" name="type" value="{{ !empty($type)?$type:$page->type }}">

                <div class="row">
                    <div class="col-md-8">

                        <div class="card mb-6">
                            <div class="card-body pt-5">

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Titre</span> :
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="title" value="{{ old('title', empty($page) ? '' : $page->title) }}">
                                            @error('title')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3 me-5">
                                                <span>Image</span> :
                                            </label>
                                            <input type="file" name="image" class="form-control form-control-solid image">
                                            <!--<button type="submit" name="upload_image" value="step_1" class="btn btn-sm btn-primary">
                                                Valider
                                            </button>
                                           <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
                                                Ajouter
                                            </button>-->
                                            @error('image')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($page->type) && !in_array($page->type, $options['options_disabled']['content']))
                                    <div class="row">
                                        <div class="col">
                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Contenu</span> :
                                                </label>
                                                <textarea class="form-control form-control-solid tiny" name="content" rows="10">{{ old('content', empty($page) ? '' : $page->content) }}</textarea>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body pt-5">

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('pages.index') }}" class="btn btn-light me-3">
                                        <i class="fa-solid fa-rotate-left"></i> Retour
                                    </a>
                                    <button type="submit" name="save" value="exit" class="btn btn-light-primary me-3">
                                        <i class="fa-solid fa-check"></i> Enregistrer et sortir
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-check"></i> Enregistrer
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-body pt-5">

                                @if(!empty($page->type) && !in_array($page->type, $options['options_disabled']['is_publish']))
                                    <div class="row">
                                        <div class="col mt-3 mb-7">
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="is_publish" type="checkbox" value="1" @checked(empty($page)??$page->is_publish) />
                                                <label class="form-check-label" for="flexSwitchDefault">
                                                    Publier
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($page->type) && !in_array($page->type, $options['options_disabled']['meta']))
                                    @if(!empty($page->type) && !in_array($page->type, $options['options_disabled']['slug']))
                                        <div class="row">
                                            <div class="col">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Slug</span> :
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid" name="slug" value="{{ old('slug', empty($page) ? '' : $page->slug) }}">
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        @error('slug')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Méta Titre</span> :
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="meta_title" value="{{ old('meta_title', empty($page) ? '' : $page->meta_title) }}">
                                            <div class="form-text">Recommandé entre 60 et 160 caractères</div>
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                @error('meta_title')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Méta Description</span> :
                                            </label>
                                            <textarea class="form-control form-control-solid" data-kt-autosize="true" name="meta_desc" rows="3">{{ old('meta_desc', empty($page) ? '' : $page->meta_desc) }}</textarea>
                                            <div class="form-text">Recommandé entre 60 et 160 caractères</div>
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                @error('meta_title')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </form>

           @include('admin.pages.modals.image')
        </div>
    </div>
@endsection
@push('custom-js')
    <script>
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
                                'id': {{ $page->id }},
                                '_token': $('input[name="_token"]').val(),
                                'image': base64data,
                            },
                            success: function(data){
                                console.log(data);
                                $modal.modal('hide');
                                alert("Crop image successfully uploaded");
                            }
                        });
                    }
                });

            });

        });
    </script>
@endpush