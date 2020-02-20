@extends('material.index.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @isset($file)
                        @parsedown($file)
                    @endisset
                </div>
            </div>
        </div>
    </div>





@endsection
