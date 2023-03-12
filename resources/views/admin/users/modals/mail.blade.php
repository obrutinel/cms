<div class="modal fade" tabindex="-1" id="mail_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Envoyer un email</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                            </svg>
                        </span>
                </div>
            </div>

            <form method="POST" action="#">
                @csrf

                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <div class="fv-row mb-4 fv-plugins-icon-container">
                                <label for="object" class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Sujet</span> :
                                </label>
                                <input type="text" name="object" class="form-control form-control-solid">
                                <div class="fv-plugins-message-container invalid-feedback">
                                    @error('object')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label for="content" class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Contenu</span> :
                                </label>
                                <textarea id="content" class="form-control form-control-solid" name="content" rows="10"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback">
                                    @error('content')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Envoyer</button>
                </div>

            </form>
        </div>
    </div>
</div>


@push('custom-js')

    <script>
        $(document).ready(function() {

            $('#mail_modal').on('show.bs.modal', function (e) {
                let href = $(e.relatedTarget).attr('href');
                $(this).find('form').attr('action', href);
            });

        });
    </script>

@endpush