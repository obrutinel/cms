<div class="card">
    <div class="card-body pt-5">

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

    </div>
</div>