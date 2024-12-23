<div wire:ignore.self class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="SaveAgent">
                    <div class="form-group">
                        <label>Matricule<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="matricule">
                        @error('matricule')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="nom">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Prenom<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="prenom">
                        @error('prenom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Telephone<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="telephone">
                        @error('telephone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Photo<span class="text-danger">*</span></label>
                        <input class="form-control" type="file" wire:model="photo">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Naissace<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_naissance">
                        @error('date_naissance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Lieu de Naissance<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="lieu_naissance">
                        @error('lieu_naissance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Sexe<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="sexe">
                        @error('sexe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date de recrutement<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_recrutement">
                        @error('date_recrutement')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date de recrutement<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_recrutement">
                        @error('date_recrutement')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Corps<span class="text-danger">*</span></label>
                        <select wire:model="corps_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($corps as $corps)
                                <option value="{{ $corps->id }}">{{ $corps->nom }}</option>
                            @endforeach
                        </select>
                        @error('corps_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Corps<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_corps">
                        @error('date_corps')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Position<span class="text-danger">*</span></label>
                        <select wire:model="position_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->nom }}</option>
                            @endforeach
                        </select>
                        @error('position_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Position<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_position">
                        @error('date_position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Corps<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_corps">
                        @error('date_corps')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ministre<span class="text-danger">*</span></label>
                        <select wire:model="ministre_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($ministeres as $ministere)
                                <option value="{{ $ministere->id }}">{{ $ministere->nom }}</option>
                            @endforeach
                        </select>
                        @error('ministere_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Ministere<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_position">
                        @error('date_ministere')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date Avancement<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" wire:model="date_avancement">
                        @error('date_avancement')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Regime<span class="text-danger">*</span></label>
                        <select wire:model="regime_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($regimes as $regime)
                                <option value="{{ $regime->id }}">{{ $regime->nom }}</option>
                            @endforeach
                        </select>
                        @error('ministere_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section mt-3">
                    </div>
                    <button class="btn btn-primary" type="submit">{{ $this->agent_id ? 'Soumettre' : 'Modifier' }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
