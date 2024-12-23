<div wire:ignore.self class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Arrete</h5>
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
                    </div>
                    <div class="form-group">
                        <label>Date Signature<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_signature">
                        @error('date_signature')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nature<span class="text-danger">*</span></label>
                        <select wire:model="nature_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($natures as $nature)
                                <option value="{{ $nature->id }}">{{ $nature->nom }}</option>
                            @endforeach
                        </select>
                        @error('nature_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mention<span class="text-danger">*</span></label>
                        <select wire:model="mention_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($mentions as $mention)
                                <option value="{{ $mention->id }}">{{ $mention->nom }}</option>
                            @endforeach
                        </select>
                        @error('mention_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section mt-3">
                    </div>
                    <button class="btn btn-primary" type="submit">{{ $this->arrete_id ? 'Soumettre' : 'Modifier' }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
