<div>
    @include('livewire.admin.test.modal')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Arretes</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Listes</a></li>
                        <li class="breadcrumb-item active">Arretes</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal"
        data-bs-target=".add">Ajouter un Arrete</button>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Date Signature</th>
                                <th>Nauture</th>
                                <th>Mention</th>
                                <th>Voir Fichier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arretes as $items)
                                <tr>
                                    <td>{{ $items->numero }}</td>
                                    <td>{{ $items->date_signature }}</td>
                                    <td>{{ $items->nature->nom }}</td>
                                    <td>{{ $items->mention->nom }}</td>

                                    <td>
                                        <a href="{{ url('uploads/admin/document/' . $items->fichier) }}"
                                                        target="_blank"  class="btn btn-primary">Fichier</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
