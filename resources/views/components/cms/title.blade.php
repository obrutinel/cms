<div class="row">
    <div class="col">
        <div class="fv-row mb-7 fv-plugins-icon-container">
            <label class="fs-6 fw-semibold form-label mt-3">
                <span class="required">{{ !empty($options['label']) ? $options['label'] : 'Titre' }}</span> :
            </label>
            <input type="text" class="form-control form-control-solid" name="title" value="{{ old('title', empty($page) ? '' : $page->title) }}">
            @if(!empty($options['help']))
                <div class="form-text">{{ $options['help'] }}</div>
            @endif
            @error('title')
                <div class="fv-plugins-message-container invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>