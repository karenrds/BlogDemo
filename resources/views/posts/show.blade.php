@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->caption }}</div>

                <div class="card-body">
   <img src="<?php echo asset("storage/$post->image")?>" />
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection