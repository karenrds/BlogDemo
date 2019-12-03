@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->profile->title }}</div>

                <div class="card-body">
                {{ Auth::user()->profile->description }}<br/><br/>
                <div class="d-flex">
                    <div class="pr-5"><a href="{{ url('/p/create') }}">Add New Post</a><br/><br/><div>
<table>
                    <tbody>
    @foreach($posts as $key => $value)
        <tr>
            <td><b>{{ $value->caption }}</b></td></tr>
            <tr>
            <td><a href="{{ url('/p') }}/{{ $value->id }} "><img src="<?php echo asset("storage/$value->image")?>" /></a></td>
</tr>@endforeach
</tbody></table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection