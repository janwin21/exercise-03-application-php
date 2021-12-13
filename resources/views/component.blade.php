@extends('layouts.main')

@section('main-content')
<!-- Begin page content -->
<div class="d-flex justify-content-center">
    <div class="container">
        <h2 class="mt-5">{{ $body['title'] }}</h2>
        <p class="lead">Outputing the data from HTTP request by <strong>{{ $body['uri'] }}</strong></p>
        <p class="text-success">&lt;-- {{ $body['comment'] }} --&gt;</p>
    </div>
</div>
@endsection