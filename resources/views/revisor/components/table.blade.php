@extends('revisor.home')

@section('title', 'Revisor' . (Auth::check() ? ' - ' . Auth::user()->name : ''))


@section('content')
    <!-- Contenido de la página aquí -->

    <div class="container-table" data-theme="">
        <div class="table-headers">
          <div class="table-actions">
            {{-- <input type="checkbox" name="" id="" class="table-checkbox">
            <a href="" class="table-link"><i class="icon-pencil table-icon"></i></a>
            <a href="" class="table-link"><i class="icon-cog table-icon"></i></a>
            <a href="" class="table-link"><i class="icon-archivos table-icon"></i></a>
            <a href="" class="table-link"><i class="icon-adjust table-icon"></i></a> --}}
            <p><b>Pendientes</b> {{ \App\Models\Ad::ToBeRevisionedCount() }} </p>
            <p><b>Aprobadas</b> {{ \App\Models\Ad::ApprovedCount() }}</p>
          </div>
          <form action="#" class="menu__panel-form">
            <input
              type="search"
              placeholder="Buscar"
              class="menu__panel-form-input"
              data-number=""
            />
            <button
              type="submit"
              class="icon-search menu__panel-button"
            ></button>
          </form>
        </div>

        <div class="table-data">
          <div class="table-data__titles">
            <p class="table-data__title center">Anuncio</p>
            <p class="table-data__title center">Categoria</p>
            <p class="table-data__title center">Producto</p>
            <p class="table-data__title center">Usuario</p>
            <p class="table-data__title center">Estatus</p>
            <p class="table-data__title center">Editar</p>
            <p class="table-data__title center">Eliminar</p>
          </div>

          @if ($ads->isNotEmpty())
          @foreach ($ads as $ad)
            <x-table-data 
              number=" {{ $ad->id }}" 
              category="{{$ad->category?->name}}"
              title="{{ $ad->title }}"
              user="{{ $ad->user?->name }}"
              estatus="{{$ad->is_accepted}}"
              editIcon="icon-pencil" 
              configIcon="icon-cog" 
            />
          @endforeach
        @else
          <p>No hay anuncios disponibles.</p>
        @endif
        

        <div class="table-footer">
          <form action="" class="table-footer__form">
            <label for="">Mostrar</label>
            <select name="" id="">
              <option value="3">3</option>
              <option value="5">5</option>
              <option value="10">10</option>
            </select>
          </form>
          <div class="table-pages">
            <a href="" class="table-page">1</a>
            <a href="" class="table-page">2</a>
            <a href="" class="table-page">3</a>
            <a href="" class="table-page">4</a>
            <a href="" class="table-page">5</a>
            <a href="" class="table-page">6</a>
            <a href="" class="table-page">7</a>
          </div>
        </div>
      </div>

@endsection
