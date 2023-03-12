

@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Nouveau groupe de paramètre
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('group_settings.index') }}" class="btn fw-bold btn-light">
            <i class="fa-solid fa-rotate-left"></i> Retour
        </a>
    </div>
@endsection

@section('content')
    <div class="col-xl-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <div class="card-body pt-5">

                <form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('group_settings.store') }}">
                    @csrf

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

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('group_settings.index') }}" class="btn btn-light me-3">
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