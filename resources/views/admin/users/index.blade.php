@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            Liste des utilisateurs
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('users.create') }}" class="btn btn-sm fw-bold btn-primary">
            Ajouter un nouvel utilisateur
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
                        <th class="ps-4 min-w-325px rounded-start">Nom</th>
                        <th>Crée le</th>
                        <th class="text-end rounded-end pe-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                                <span class="text-muted fw-semibold d-block fs-7">
                                    {{ $user->email }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d/m/y à H\hi') }}</td>

                            <td class="text-end">

                                <a href="{{ route('users.edit', $user) }}"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <a href="{{ route('users.send-email', $user) }}"
                                   class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                   data-bs-toggle="modal" data-bs-target="#mail_modal">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>

                                <a href="{{ route('users.destroy', $user) }}"
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

    @include('admin.users.modals.delete')
    @include('admin.users.modals.mail')

@endsection