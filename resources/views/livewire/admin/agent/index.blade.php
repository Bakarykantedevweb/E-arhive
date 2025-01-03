<div>
    @if ($afficherListes || $createAgent)
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
    @endif
    @if ($afficherListes)
        <button wire:click="create" type="button" class="btn btn-primary waves-effect waves-light mb-3">Ajouter un
            Agent</button>
        {{-- <div class="row">
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
        </div> --}}
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <input type="text" class="form-control" wire:model="searchMatricule"
                        placeholder="Rechercher par matricule">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <input type="text" class="form-control" wire:model="searchNom" placeholder="Rechercher par nom">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <input type="text" class="form-control" wire:model="searchPrenom"
                        placeholder="Rechercher par prenom">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @foreach ($agents as $items)
                <div class="col-xl-3 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-body dropdown-toggle font-size-16" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true"> <i class="uil uil-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item"
                                        href="#">Edit</a> <a class="dropdown-item" href="#">Action</a> <a
                                        class="dropdown-item" href="#">Remove</a> </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="mb-4"> <img src="{{ asset('uploads/admin/agent/' . $items->photo) }}"
                                    alt="" class="avatar-lg rounded-circle img-thumbnail"> </div>
                            <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{ $items->prenom }}
                                    {{ $items->nom }}</a></h5>
                            <p class="text-muted mb-2">{{ $items->matricule }}</p>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" wire:click="profile({{ $items->id }})"
                                class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i>
                                Profile</button>
                        </div>
                    </div>
                </div>
            @endforeach
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
                            <button class="btn btn-primary" type="submit">Soumettre</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    @endif
    @if ($profileAgent)
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-xl-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="dropdown float-end">
                                <a class="text-body dropdown-toggle font-size-18" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true"> <i
                                        class="uil uil-ellipsis-v"></i> </a>
                                <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item"
                                        href="#">Edit</a> <a class="dropdown-item" href="#">Action</a> <a
                                        class="dropdown-item" href="#">Remove</a> </div>
                            </div>
                            <div class="clearfix"></div>
                            <div> <img src="{{ asset('uploads/admin/agent/' . $agentDetail->photo) }}" alt=""
                                    class="avatar-lg rounded-circle img-thumbnail"> </div>
                            <h5 class="mt-3 mb-1">{{ $agentDetail->prenom . ' ' . $agentDetail->nom }}</h5>
                            <p class="text-muted">{{ $agentDetail->matricule }}</p>
                            <div class="mt-4">
                                <button type="button" class="btn btn-light btn-sm"><i
                                        class="uil uil-envelope-alt me-2"></i> Message</button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="text-muted">
                            <div class="table-responsive mt-4">
                                <div>
                                    <p class="mb-1">E-mail :</p>
                                    <h5 class="font-size-16">{{ $agentDetail->email }}</h5>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-1">Mobile :</p>
                                    <h5 class="font-size-16">{{ $agentDetail->telephone }}</h5>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-1">Date de Naissance :</p>
                                    <h5 class="font-size-16">{{ $agentDetail->date_naissance }}</h5>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-1">Lieu de naissance :</p>
                                    <h5 class="font-size-16">{{ $agentDetail->lieu }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-0">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                <i class="uil uil-user-circle font-size-20"></i> <span
                                    class="d-none d-sm-block">Informations</span> </a>
                        </li>
                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content p-4">
                        <div class="tab-pane active" id="about" role="tabpanel">
                            <div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Cadre</th>
                                                    <th scope="col">Corps</th>
                                                    <th scope="col">Ministere</th>
                                                    <th scope="col">Regime</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $agentDetail->position->nom }}</th>
                                                    <th scope="row">{{ $agentDetail->cadre->nom }}</th>
                                                    <th scope="row">
                                                        {{ $agentDetail->corps->nom }}({{ $agentDetail->corps->categorie->nom }})
                                                    </th>
                                                    <th scope="row">{{ $agentDetail->ministere->nom }}</th>
                                                    <th scope="row">{{ $agentDetail->regimes->nom }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- <hr>
                                <hr>
                                <div>
                                    <form wire:submit.prevent="saveDocument">
                                        <div class="form-group">
                                            <label for="">Acte de Naissance</label>
                                            <input type="file" class="form-control" wire:model="acte_naissance">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nationnalite</label>
                                            <input type="file" class="form-control" wire:model="nationnalite">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Diplome</label>
                                            <input type="file" class="form-control" wire:model="diplome">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </form>
                                    <hr>
                                    <hr>
                                    <h5 class="font-size-16 my-3">Listes des Documents</h5>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Acte de Naissance</th>
                                                    <th scope="col">Nationnalite</th>
                                                    <th scope="col">Diplome</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#</th>
                                                    <th scope="row">{{ $agentDetail->acte_naissance }}</th>
                                                    <th scope="row">{{ $agentDetail->nationnalite }}</th>
                                                    <th scope="row">{{ $agentDetail->diplome }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endif
</div>
