@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            Liste des groupes de paramètres
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('group_settings.create') }}" class="btn btn-sm fw-bold btn-primary">
            Ajouter un groupe
        </a>
    </div>
@endsection

@section('content')

    <div class="card mb-5 mb-xl-8">
        <div class="card-body pb-2  pt-7">

            <div class="table-responsive">
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <thead>
                        <tr class="fw-bold text-muted bg-light">
                            <th class="ps-4 rounded-start">Nom</th>
                            <th class="ps-4 ">Paramètre(s)</th>
                            <th class="text-end rounded-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->settings_count }}</td>
                                <td class="text-end">

                                    <a href="{{ route('group_settings.edit', $group) }}"
                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <a href="{{ route('group_settings.destroy', $group) }}"
                                       class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                       data-bs-toggle="modal" data-bs-target="#delete_modal">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {!! $groups->links() !!}

    @include('admin.group_settings.modals.delete')

@endsection