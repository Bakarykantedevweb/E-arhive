<div>
    @include('livewire.admin.position.modal')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Positions</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Listes</a></li>
                        <li class="breadcrumb-item active">Positions</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal"
        data-bs-target=".add">Ajouter une Position</button>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nom Position</th>
                                <th>Modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($positions as $items)
                                <tr>
                                    <td>{{ $items->nom }}</td>
                                    <td><button type="button" wire:click="editPosition({{ $items->id }})"
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