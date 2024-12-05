<div wire:ignore.self class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Arretes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SaveArrete">
                    <div class="form-group">
                        <label>Numero<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="numero">
                        @error('numero')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div>
                    <div class="form-group">
                        <label>Date Signature<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="date_signature">
                        @error('date_signature')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div>
                    <div class="form-group">
                        <label>Nature </label>
                        <select wire:model="nature_id" class="form-control">
                            <option>---</option>
                            @forelse ($natures as $nature)
                                <option value="{{ $nature->id }}">{{ $nature->nom }}</option>
                            @empty
                                <option selected>Pas de Nature</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mention </label>
                        <select wire:model="mention_id" class="form-control">
                            <option>---</option>
                            @forelse ($mentions as $mention)
                                <option value="{{ $mention->id }}">{{ $mention->nom }}</option>
                            @empty
                                <option selected>Pas de Mention</option>
                            @endforelse
                        </select>
                    </div>
                    <br>
                    </div class="submit-section mt-3">
                        <button class="btn btn-primary" type="submit">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  


