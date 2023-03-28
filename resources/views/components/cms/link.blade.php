<div class="row">
    <div class="col">
        <div class="fv-row mb-7 fv-plugins-icon-container">

            <label class="fs-6 fw-semibold form-label mt-3">
                <span>{{ !empty($options['label_link']) ? $options['label_link'] : 'Titre du bouton' }}</span> :
            </label>
            <input type="text" class="form-control form-control-solid" name="link_label" value="{{ old('link_label', empty($page) ? '' : $page->link_label) }}">
            @if(!empty($options['link_label_help']))
                <div class="form-text">{{ $options['link_label_help'] }}</div>
            @endif

            <label class="fs-6 fw-semibold form-label mt-3">
                <span>{{ !empty($options['label_url']) ? $options['label_url'] : 'Lien du bouton' }}</span> :
            </label>
            <input type="text" class="form-control form-control-solid" name="link_url" value="{{ old('link_url', empty($page) ? '' : $page->link_url) }}">
            @if(!empty($options['link_url_label_help']))
                <div class="form-text">{{ $options['link_url_label_help'] }}</div>
            @endif

        </div>
    </div>
</div>