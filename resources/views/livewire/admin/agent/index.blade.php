<div>
    @include('livewire.admin.agent.modal')
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
    <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal"
        data-bs-target=".add">Ajouter un Agent</button>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Premon</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Photo</th>
                                <th>Date Naissance</th>
                                <th>Lieu de Naissace</th>
                                <th>Sexe</th>
                                <th>Date de Recrutement</th>
                                <th>Date Corps</th>
                                <th>Date Position</th>
                                <th>Date Ministère</th>
                                <th>Date Avancement</th>
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
                                    <td>{{ $items->photo }}</td>
                                    <td>{{ $items->date_naissance }}</td>
                                    <td>{{ $items->lieu_naissance }}</td>
                                    <td>{{ $items->sexe }}</td>
                                    <td>{{ $items->date_recrutement }}</td>
                                    <td>{{ $items->date_corps }}</td>
                                    <td>{{ $items->date_position }}
                                    <td>{{ $items->date_ministre }}</td>
                                    <td>{{ $items->date_avancement }}</td>
                                    <td>{{ $items->position->nom }}</td>
                                    <td>{{ $items->cadre->nom }}</td>
                                    <td>{{ $items->corps->nom }}</td>
                                    <td>{{ $items->regime->nom }}</td>
                                    <td>{{ $items->ministere->nom }}</td>
              <td><button type="button" wire:click="edit({{ $items->id }})"
                                            data-bs-toggle="modal" data-bs-target=".add"
                                            class="btn btn-primary">Edit</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
