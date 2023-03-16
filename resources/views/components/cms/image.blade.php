<div class="row">
    <div class="col">
        <div class="fv-row mb-7">
            <div class="rounded border p-5">

                <label class="fs-6 fw-semibold form-label mt-3 me-5">
                    <span>Image</span> :
                </label>

                @if($page->image)

                    <div class="image-input image-input-outline" id="kt_image_input" data-kt-image-input="false">
                        <div class="image-input-wrapper" style="background-image: url({{ url('/upload/min_'.$page->image) }})"></div>
                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="remove"
                              data-bs-toggle="tooltip"
                              data-bs-dismiss="click"
                              title="Supprimer">
                                <i class="bi bi-x fs-2"></i>
                        </span>
                    </div>

                @else
                    <input type="file" name="image" class="form-control form-control-solid image">
                @endif

                @error('image')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
@include('admin.pages.modals.image')
@push('custom-js')
    <script type="text/javascript" src="{{ URL::asset ('metronic/js/cms/image-crop.js') }}"></script>
@endpush