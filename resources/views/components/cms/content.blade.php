
<div class="row">
    <div class="col">
        <div class="fv-row mb-7 fv-plugins-icon-container">
            <label class="fs-6 fw-semibold form-label mt-3">
                <span>{{ !empty($options['label']) ? $options['label'] : 'Contenu' }}</span> :
            </label>
            <textarea class="form-control form-control-solid tiny" name="content" rows="10">{{ old('content', empty($page) ? '' : $page->content) }}</textarea>
            @if(!empty($options['help']))
                <div class="form-text">{{ $options['help'] }}</div>
            @endif
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
</div>
<x-head.tinymce-config/>