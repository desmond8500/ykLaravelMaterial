@extends('material.index.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @isset($folder)
                @foreach ($folder as $item)
                    <a class="btn btn-info" href="{!! route('materialList',['folder'=> basename(dirname($item)), 'subfolder'=> basename($item)]) !!}">
                        {{ basename($item) }}
                    </a>
                @endforeach
            @endisset
        </div>
        <div class="col-md-12">
            @isset($subfolder)
                @foreach ($subfolder as $files)
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ basename($files) }}</h4>
                            {{-- <p class="card-category">New employees on 15th September, 2016</p> --}}
                        </div>
                        <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>ID</th>
                                <th>Nom du fichier</th>
                                <th>Télécharger</th>
                                <th>Consulter</th>
                            </thead>
                            <tbody>
                                @php
                                    $dossier = basename(dirname(Request::url()));
                                    $sousdossier = basename(Request::url());
                                    $list = glob("$files/*");
                                @endphp
                                @foreach ($list as $key => $file)
                                    @php  $fichier = pathinfo($file); @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ basename($file) }}</td>
                                        <td>
                                            <a href="{!! asset($file) !!}" download class="btn btn-primary">Télécharger</a>
                                        </td>
                                        <td>
                                            @if ($fichier['extension']=="md")
                                                <form action="/markdown" method="POST">
                                                    @csrf
                                                    <input type="text" name="file" value="{{ $file }}" hidden>
                                                    <button type="submit" class="btn btn-primary">Consulter</button>
                                                </form>
                                                {{-- @php
                                                    $modal = [
                                                        "title" => "hello g",
                                                        "markdown" => $file
                                                    ];
                                                @endphp
                                                @include('material.component.modal',['modal'=>$modal]) --}}
                                            @else
                                                <a href="{!! asset($file) !!}" target="_blank"  class="btn btn-primary">Consulter</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>





@endsection
