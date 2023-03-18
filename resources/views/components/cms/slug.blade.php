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