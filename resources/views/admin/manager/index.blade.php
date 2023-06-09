@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            Liste des pages
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('manager.create') }}" class="btn btn-sm fw-bold btn-primary">
            Ajouter une page
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
                                <th class="ps-4 min-w-325px rounded-start">Libellé</th>
                                <th class="ps-4">Type</th>
                                <th class="ps-4">Publier</th>
                                <th class="text-end rounded-end pe-4">Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>
                                {{ $page->title }}
                                <span class="text-muted fw-semibold d-block fs-7 mt-1">
                                   {{ url('').'/'.$page->slug }}
                                </span>
                            </td>
                            <td>
                                {{ $page->type }}
                            </td>
                            <td>
                                @if($page->is_publish)
                                    <span class="badge badge-light-success">Publié</span>
                                @else
                                    <span class="badge badge-light-danger">Hors ligne</span>
                                @endif
                            </td>
                            <td class="text-end">

                                <a href="{{ route('manager.edit', $page) }}"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <a href="{{ route('manager.destroy', $page) }}"
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

    {!! $pages->links() !!}

    @include('admin.manager.modals.delete')

@endsection