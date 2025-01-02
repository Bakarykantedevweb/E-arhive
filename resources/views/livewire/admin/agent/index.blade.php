<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Agents</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Listes</a></li>
                        <li class="breadcrumb-item active">Agents</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    @if ($afficherListes)
        <button wire:click="create" type="button" class="btn btn-primary waves-effect waves-light mb-3">Ajouter un
            Agent</button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom</th>
                                        <th>Premon</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Date Naissance</th>
                                        <th>Lieu de Naissace</th>
                                        <th>Sexe</th>
                                        <th>Date de Recrutement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $items)
                                        <tr>
                                            <td>{{ $items->matricule }}</td>
                                            <td>{{ $items->nom }}</td>
                                            <td>{{ $items->prenom }}</td>
                                            <td>{{ $items->email }}</td>
                                            <td>{{ $items->telephone }}</td>
                                            <td>{{ $items->date_naissance }}</td>
                                            <td>{{ $items->lieu }}</td>
                                            <td>{{ $items->sexe }}</td>
                                            <td>{{ $items->date_recrutement }}</td>
                                            <td><button class="btn btn-primary btn-sm">Details</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    @endif
    @if ($createAgent)
        <button wire:click="retour" type="button" class="btn btn-primary waves-effect waves-light mb-3">Retour</button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Creation de l'agent</h4>
                        <form wire:submit.prevent="SaveAgent">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nom<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="nom">
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Prenom<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="prenom">
                                    @error('prenom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telephone<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="telephone">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Photo<span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" wire:model="photo">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date Naissance<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" wire:model="date_naissance">
                                    @error('date_naissance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Lieu de Naissance<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="lieu_naissance">
                                    @error('lieu_naissance')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sexe<span class="text-danger">*</span></label>
                                    <select wire:model="sexe" class="form-control">
                                        <option value="">---</option>
                                        <option value="Masculin">Masculin</option>
                                        <option value="Feminin">Feminin</option>
                                    </select>
                                    @error('sexe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date de recrutement<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" wire:model="date_recrutement">
                                    @error('date_recrutement')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Cadre<span class="text-danger">*</span></label>
                                    <select wire:model="cadre_id" class="form-control">
                                        <option value="">---</option>
                                        @foreach ($cadres as $cadre)
                                            <option value="{{ $cadre->id }}">{{ $cadre->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('cadre_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
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
                                <div class="form-group col-md-6">
                                    <label>Date Corps<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" wire:model="date_corps">
                                    @error('date_corps')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
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
                                <div class="form-group col-md-6">
                                    <label>Date Position<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" wire:model="date_position">
                                    @error('date_position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ministre<span class="text-danger">*</span></label>
                                    <select wire:model="ministere_id" class="form-control">
                                        <option value="">---</option>
                                        @foreach ($ministeres as $ministere)
                                            <option value="{{ $ministere->id }}">{{ $ministere->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('ministere_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date Ministere<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" wire:model="date_ministere">
                                    @error('date_ministere')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date Avancement<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" wire:model="date_avancement">
                                    @error('date_avancement')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Regime<span class="text-danger">*</span></label>
                                    <select wire:model="regime_id" class="form-control">
                                        <option value="">---</option>
                                        @foreach ($regimes as $regime)
                                            <option value="{{ $regime->id }}">{{ $regime->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('regime_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary"
                                type="submit">Soumettre</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    @endif
</div>
