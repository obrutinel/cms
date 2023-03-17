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