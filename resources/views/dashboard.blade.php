@extends("layouts.master")
@section ("contenu")

@if(session()->has('successDelete'))
<div class ="alert alert-success">
    <h3>{{ session()->get('successDelete') }}</h3>
</div>
@endif





<div class="my-3 p-3 bg-body rounded shadow-sm">
  <div class="border-bottom pb-2 mb-0 btn">
  <a href = "{{route('create')}}" class = "btn btn-primary"> Créer une news </a>
  </div>

  @foreach ($liste_news as $news)
  

    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-start">
          <strong class="text-gray-dark">{{ $news->title }}</strong>
          <p></br> {{ $news->description }}</p>
        </div>
          <div class = "d-flex justify-content-end">
            <a href = "{{route('edit', ['news'=>$news->id])}}" class = "btn btn-info"> Editer </a>
            <a href = "#" class = "btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cette news?')){document.getElementById('form-{{$news->id}}').submit() }"> Supprimer </a>
           
           
            <form id="form-{{$news->id}}" action ="{{route ('erase',['new'=>$news->id])}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
            </form>
          </div>
      </div>
    </div>
  
    @endforeach


  </div>
  {{$liste_news -> links()}}

@endsection


