@extends("layouts.master")
@section ("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">


@if(session()->has('success'))
<div class ="alert alert-success">
    <h3>{{ session()->get('success') }}</h3>
</div>
@endif

@if ($errors ->any())
<ul class ="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif



<form method ="post" action = "{{route('add')}}">

@csrf

  <div class="form-group">
    <label>Titre de la news</label>
    <input type="text" class="form-control" name ="title" placeholder="Enter title" required >
  </div>

  <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name ="description" placeholder="Enter description" required>
  </div>

  <div class="form-group">
    <label>Texte</label>
    <textarea  class="form-control" name ="text" placeholder="Enter text" id="editor"  required>

    </textarea>
  </div>

  <button type ="submit" class="btn btn-primary"> Enregistrer</button>
  <a href ="{{route('dashboard')}}" class="btn btn-primary"> Annuler</a>
</form>

</div>

@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection