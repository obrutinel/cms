

@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Edition d'une page
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('manager.index') }}" class="btn fw-bold btn-light">
            <i class="fa-solid fa-rotate-left"></i> Retour
        </a>
    </div>
@endsection

@section('content')
    <div class="col-xl-12">

        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <div class="card-body pt-5">

                <form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('manager.update', $page) }}">
                    @csrf
                    @method('PUT')

                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2 align-items-center">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Titre</span> :
                                </label>
                                <input type="text" class="form-control form-control-solid" name="title" value="{{ $page->title }}">
                                <div class="fv-plugins-message-container invalid-feedback">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" name="is_publish" type="checkbox" value="1" @checked($page->is_publish) />
                                <label class="form-check-label" for="flexSwitchDefault">
                                    Publier
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Parent</span> :
                                </label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">--- Choisir ---</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" @selected($type->id == $page->parent_id)>
                                            {{ $type->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Type</span> :
                                </label>
                                <input type="text" class="form-control form-control-solid" name="type" value="{{ $page->type }}">
                                <div class="fv-plugins-message-container invalid-feedback">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Slug</span> :
                                </label>
                                <input type="text" class="form-control form-control-solid" name="slug" value="{{ $page->slug }}">
                                <div class="fv-plugins-message-container invalid-feedback">
                                    @error('slug')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('manager.index') }}" class="btn btn-light me-3">
                            <i class="fa-solid fa-rotate-left"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-check"></i> Enregistrer
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection