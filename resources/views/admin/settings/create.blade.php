

@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Nouveau paramètre
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('settings.index') }}" class="btn fw-bold btn-light">
            <i class="fa-solid fa-rotate-left"></i> Retour
        </a>
    </div>
@endsection

@section('content')
    <div class="col-xl-12">

        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <div class="card-body pt-5">

                <form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('settings.store') }}">
                    @csrf

                    <input type="hidden" name="slug" value="{{ old('slug') }}">

                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Parent</span> :
                                </label>
                                <select class="form-control" name="group_id">
                                    <option value="0">--- Choisir ---</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}" @selected($group->id == $group->parent_id)>
                                            {{ $group->name }}
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
                                    <span>Nom</span> :
                                </label>
                                <input type="text" class="form-control form-control-solid" name="name" value="{{ old('name') }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <div class="col">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Valeur</span> :
                                </label>
                                <textarea class="form-control form-control-solid" name="value" rows="10">{{ old('value') }}</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('settings.index') }}" class="btn btn-light me-3">
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