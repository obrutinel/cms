@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Edition des paramètres
        </h1>
    </div>
@endsection

@section('buttons')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ route('pages.index') }}" class="btn fw-bold btn-light">
            <i class="fa-solid fa-rotate-left"></i> Retour
        </a>
        <button type="submit" name="save" value="exit" class="btn btn-light-primary">
            <i class="fa-solid fa-check"></i> Enregistrer et sortir
        </button>
        <button type="submit" name="save" value="stay" class="btn btn-success">
            <i class="fa-solid fa-check"></i> Enregistrer
        </button>
    </div>
@endsection


@section('content')
    <div class="col-xl-12">

            <form method="POST" action="{{ route('globals.update') }}">
                @csrf

                <div class="row">

                        @foreach($groups as $group)

                            <div class="col-4">
                                <div class="card mb-6">
                                    <div class="card-body pt-5">

                                        <h2 class="mb-4">{{ $group->name }}</h2>
                                        <div class="row">

                                            @foreach($group->settings as $setting)
                                                <div class="col-12">
                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                        <label class="fs-6 fw-semibold form-label mt-3">
                                                            <span>{{ $setting->name }}</span> :
                                                        </label>
                                                        <input type="{{ $setting->type }}" class="form-control form-control-solid" name="settings[{{ $setting->id }}]" value="{{ $setting->value }}">
                                                        @error('title')
                                                            <div class="fv-plugins-message-container invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-check"></i> Enregistrer
                            </button>

                </div>
            </form>
    </div>
@endsection