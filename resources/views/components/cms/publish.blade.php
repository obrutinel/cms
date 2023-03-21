<div class="row">
    <div class="col mt-3 mb-7">
        <div class="form-check form-switch form-check-custom form-check-solid">
            <input class="form-check-input" name="is_publish" type="checkbox" value="1" @checked(old('is_publish', $page->is_publish)) />
            <label class="form-check-label" for="flexSwitchDefault">
                {{ !empty($options['label']) ? $options['label'] : 'Publier' }}
            </label>
        </div>
    </div>
</div>