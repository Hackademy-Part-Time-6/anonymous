@extends('revisor.home')

@section('title', 'Revisor' . (Auth::check() ? ' - ' . Auth::user()->name : ''))


@section('content')


<form action="{{ route('ads.update', $ad->id) }}" method="POST" autocomplete="off" class="form__principal" enctype="multipart/form-data">

    {{-- @method('PUT') --}}
    @csrf
    <div class="user_info">
      <input
        type="text"
        id="title"
        placeholder="Titulo"
        class="form__input"
        value="{{ $ad->title }}"
        name="title"
      />
      <input
        type="text"
        id="price"
        placeholder="Precio"
        class="form__input"
        value="{{ $ad->price }}"
        name="price"
      />
  
      <textarea name="body" id="" cols="10" rows="5" placeholder="Descripcion" class="form__input">{{ $ad->body }}</textarea>
  
      <p>Autor: {{ $ad->user?->name }}</p>
  
      <p>Categoria: {{ $ad->category->name }}</p>
      
              <!-- Carga de nuevas imágenes -->
              <div>
                <label for="images">Seleccionar imágenes</label>
                <input type="file" id="images" name="images[]" multiple>
            </div>
    
                @foreach ($ad->images as $image)
        <div class="col-md-4">
            <img src="{{$image->getUrl(400,300)}}" class="img-fluid" alt="...">
            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Eliminar
        </div>
    @endforeach

      <input
        type="submit"
        value="Confirmar"
        id="btnSend"
        class="button--submit disabled"
        data-theme=""
      />
    </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  </form>
  
<!-- Seccion Formulario FIN -->


@endsection