@php
    $id = random_int(0,1000);
@endphp

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{$id}}">
  {{ $modal['title'] ?? "Titre"}}
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ $modal['title']  ?? "Titre" }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @isset($modal['content'])
           @include($modal['content'])
        @endisset
        @isset($modal['markdown'])
           @php
                dump($modal['markdown']);
                // $parse = str_replace('http://localhost:8000/', '', $fichier);
                $file = file_get_contents($modal['markdown']);
           @endphp

            @parsedown($file)
        @endisset
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
      </div>
    </div>
  </div>
</div>
