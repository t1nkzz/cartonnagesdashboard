@extends("layouts.master")
@section ("contenu")

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


<form method ="post" action = "{{route('update', ['news'=>$news->id])}}">

@csrf

<input type ="hidden" name="_method" value ="put">

  <div class="form-group">
    <label>Titre de la news</label>
    <input type="text" class="form-control" name ="title" placeholder="Enter title" value ="{{$news->title}}">
  </div>

  <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name ="description" placeholder="Enter description" value ="{{$news->description}}">
  </div>

  <div class="form-group">
    <label>Texte</label>
    <textarea type="text" class="form-control" name ="text" id="editor" placeholder="Enter text" required value ="{{$news->text}}">
    {{$news->text}}
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