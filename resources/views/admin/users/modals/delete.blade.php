<div class="modal fade" tabindex="-1" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Supprimer cette compétence</h3>
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
                @method('DELETE')
                <div class="modal-body">
                    <p class="mb-0">Êtes-vous sûr de vouloir supprimer cette compétence ?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>

            </form>
        </div>
    </div>
</div>


@push('custom-js')

    <script>
        $(document).ready(function() {

            $('#delete_modal').on('show.bs.modal', function (e) {
                let href = $(e.relatedTarget).attr('href');
                $(this).find('form').attr('action', href);
            });

        });
    </script>

@endpush