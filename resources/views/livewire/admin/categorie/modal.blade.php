<div wire:ignore.self class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SaveCategorie">
                    <div class="form-group">
                        <label>Nom Categorie<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="nom">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="submit-section mt-3">
                    </div>
                        <button class="btn btn-primary" type="submit">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

