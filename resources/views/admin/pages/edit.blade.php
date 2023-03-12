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
        <a href="{{ route('pages.index') }}" class="btn fw-bold btn-light">
            <i class="fa-solid fa-rotate-left"></i> Retour
        </a>
        <button type="submit" class="btn btn-light-primary">
            <i class="fa-solid fa-check"></i> Enregistrer et sortir
        </button>
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-check"></i> Enregistrer
        </button>
    </div>
@endsection

@section('content')
    <div class="col-xl-12">

            <form method="POST" action="{{ route('pages.update', $page) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">

                        <div class="card mb-6">
                            <div class="card-body pt-5">

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Titre</span> :
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="title" value="{{ $page->title }}">
                                            @error('title')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Contenu</span> :
                                            </label>
                                            <textarea class="form-control form-control-solid tiny" name="content" rows="10">{{ $page->content }}</textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body pt-5">

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('pages.index') }}" class="btn btn-light me-3">
                                        <i class="fa-solid fa-rotate-left"></i> Retour
                                    </a>
                                    <button type="submit" name="save" value="exit" class="btn btn-light-primary me-3">
                                        <i class="fa-solid fa-check"></i> Enregistrer et sortir
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-check"></i> Enregistrer
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-body pt-5">

                                <div class="row">
                                    <div class="col mt-3 mb-7">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" name="is_publish" type="checkbox" value="1" @checked($page->is_publish) />
                                            <label class="form-check-label" for="flexSwitchDefault">
                                                Publier
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Slug</span> :
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

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Méta Titre</span> :
                                            </label>
                                            <input type="text" class="form-control form-control-solid" name="meta_title" value="{{ $page->meta_title }}">
                                            <div class="form-text">Recommandé entre 60 et 160 caractères</div>
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                @error('meta_title')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Méta Description</span> :
                                            </label>
                                            <textarea class="form-control form-control-solid" data-kt-autosize="true" name="meta_desc" rows="3">{{ $page->meta_desc }}</textarea>
                                            <div class="form-text">Recommandé entre 60 et 160 caractères</div>
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                @error('meta_title')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
    </div>
@endsection