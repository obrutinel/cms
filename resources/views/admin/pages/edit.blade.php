@extends('admin.layout')

@section('breadcrumb')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" >
            Edition d'une page
        </h1>
    </div>
@endsection

@section('content')

    <div class="col-xl-12">
        <div class="mb-5 mb-xl-8">

            <form method="POST" action="{{ route('pages.update', $page) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="type" value="{{ !empty($type)?$type:$page->type }}">
                <input type="hidden" name="parent_id" value="{{ !empty($id)?$id:$page->id }}">

                <div class="row">
                    <div class="col-md-8">

                        <div class="card mb-6">
                            <div class="card-body pt-5">

                                <x-cms.title :$page/>
                                <x-cms.image :$page/>
                                <x-cms.excerpt :$page/>
                                <x-cms.content :$page />
                                <x-cms.link :$page />

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body py-5">
                                <div class="d-flex justify-content-end">
                                    <x-cms.buttons.back :$page />
                                    <x-cms.buttons.save-and-back :$page />
                                    <x-cms.buttons.save />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card mb-6">
                            <div class="card-body pt-5">

                                <x-cms.publish :$page />
                                <x-cms.date :$page />
                                <x-cms.slug :$page />

                            </div>
                        </div>

                        <x-cms.meta :$page />

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection