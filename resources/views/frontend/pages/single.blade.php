@extends('frontend.layout')



@section('content')

    titre : {{ $page->title }}

    {{ $page->content }}

@endsection