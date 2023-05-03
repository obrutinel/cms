@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Edition des paramètres
        </h1>
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

                                        <h2 class="mb-6">{{ $group->name }}</h2>
                                        <div class="row">

                                            @foreach($group->settings as $setting)
                                                <div class="col-12">
                                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                                        <label for="{{ $setting->slug }}" class="form-label">{{ $setting->name }} - {{ $setting->type }}</label>

                                                        @if($setting->type->value == "text")
                                                            <input type="text" class="form-control form-control-solid" name="settings[{{ $setting->id }}]" value="{{ $setting->value }}">
                                                        @else
                                                                <textarea
                                                                        id="{{ $setting->slug }}"
                                                                        class="form-control form-control form-control-solid"
                                                                        name="settings[{{ $setting->id }}]"
                                                                        data-kt-autosize="true">{{ $setting->value }}</textarea>
                                                        @endif

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

                        <div class="card">
                            <div class="card-body py-5">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-check"></i> Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>

                </div>
            </form>
    </div>
@endsection