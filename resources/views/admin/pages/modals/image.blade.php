<div class="modal fade" tabindex="-1" id="imageModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Recadrage de l'image</h3>

                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
            </div>

            <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="page_id" value="{{ $page->id }}">
                <input type="hidden" name="width" value="{{ $options['width'] }}">
                <input type="hidden" name="height" value="{{ $options['height'] }}">

                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-10">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" alt="">
                            </div>
                            <div class="col-md-2">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="crop">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>