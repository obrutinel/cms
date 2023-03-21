<div class="row">
    <div class="col">
        <div class="mb-7">
            <label class="fs-6 fw-semibold form-label mt-3">
                <span>{{ !empty($options['label']) ? $options['label'] : 'Intro' }}</span> :
            </label>
            <textarea
                    class="form-control form-control-solid {{ !empty($options['tiny']) && $options['tiny'] == 1 ? 'tiny' :''}}"
                    data-kt-autosize="true"
                    name="excerpt"
                    rows="{{ !empty($options['rows']) ? $options['rows'] : 4 }}"
            >{{ old('excerpt', empty($page) ? '' : $page->excerpt) }}</textarea>
            @if(!empty($options['help']))
                <div class="form-text">{{ $options['help'] }}</div>
            @endif
            @error('excerpt')
                <div class="fv-plugins-message-container invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>