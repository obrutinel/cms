<div class="row">
    <div class="col">
        <div class="fv-row mb-7 fv-plugins-icon-container">
            <label class="fs-6 fw-semibold form-label mt-3">
                <span>{{ !empty($options['label']) ? $options['label'] : 'Date' }}</span> :
            </label>
            <div class="input-group input-group-solid">
                <input type="text" class="form-control form-control-solid flatpickr-input" name="published_at" id="datepicker" value="{{ old('published_at', empty($page) ? '' : $page->published_at) }}"/>
                <span class="input-group-text" id="basic-addon2">
                    <i class="fas fa-calendar-alt fs-4"></i>
                </span>
            </div>
            @if(!empty($options['help']))
                <div class="form-text">{{ $options['help'] }}</div>
            @endif
            @error('published_at')
                <div class="fv-plugins-message-container invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>

@push('custom-js')
    <script src="//npmcdn.com/flatpickr@4.6.13/dist/l10n/fr.js"></script>
    <script>
        $("#datepicker").flatpickr({
            "locale": 'fr',
            dateFormat: "d/m/Y"
        });
    </script>
@endpush