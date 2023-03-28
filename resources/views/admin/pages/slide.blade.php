@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            {{ \App\Services\ConfigService::getTitle($type) }}
        </h1>
        <div class="fw-semibold fs-7 my-0 pt-1 text-muted">
            {{ \App\Services\ConfigService::getSubtitle($type) }}
        </div>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        @if($parent_id)
            <a href="{{ route('pages.list') }}" class="btn btn-light fw-bold">
                <i class="fa-solid fa-rotate-left"></i> Retour
            </a>
        @endif
        <a href="{{ route('pages.create', [$type, $id]) }}" class="btn fw-bold btn-primary">
            Ajouter une page {{ $type }}
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
                            @if(!empty($page->type) && array_key_exists($page->type, $options))
                                <th class="min-w-125px">A définir</th>
                            @endif
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
                                @if($page->is_publish)
                                    <span class="badge badge-light-success">Publié</span>
                                @else
                                    <span class="badge badge-light-danger">Hors ligne</span>
                                @endif
                            </td>
                            <td class="text-end">

                                <a href="{{ route('pages.edit', $page) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                @if(!empty($page->type) && array_key_exists($page->type, $options))
                                    <a href="{{ route('pages.list', $page) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="fa-solid fa-list-alt"></i>
                                    </a>
                                @endif

                                <a href="{{ route('pages.destroy', $page) }}"
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

    @include('admin.pages.modals.delete')

@endsection