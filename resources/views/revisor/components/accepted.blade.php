@extends('revisor.home')

@section('title', 'Revisor' . (Auth::check() ? ' - ' . Auth::user()->name : ''))


@section('content')

    {{-- @if (session()->has('message')) <x-alert :type="session('message')['type']" :message="session('message')['text']" /> @endif --}}

    {{-- <a href="{{ route('revisor.home') }}" class="link-back">
        <-</a> --}}

            <div class="container">
                @if ($ad)
                    @if (session()->has('message'))
                        <x-message :message="session('message')['text']" color="success"></x-message>
                    @endif


                <div class="container-images">

                    @forelse ($ad->images as $image)
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <img src="{{ $image->getUrl(400, 300) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <b>Adult</b> : <i class="bi bi-circle-fill {{ $image->adult }}"></i> [{{ $image->adult }}] <br>
                            <b>Spoof</b> : <i class="bi bi-circle-fill {{ $image->spoof }}"></i> [{{ $image->spoof }}] <br>
                            <b>Medical</b> : <i class="bi bi-circle-fill {{ $image->medical }}"></i> [{{ $image->medical }}]
                            <br>
                            <b>Violence</b> : <i class="bi bi-circle-fill {{ $image->violence }}"></i>
                            [{{ $image->violence }}] <br>
                            Racy : <i class="bi bi-circle-fill {{ $image->racy }}"></i> [{{ $image->racy }}] <br>

                            <b>Labels</b><br>
                            @forelse ($image->getLabels() as $label)
                                <a href="#" class="btn btn-info btn-sm m-1">{{ $label }}</a>
                            @empty
                                No labels
                            @endforelse
                            <br><br>
                           <b> id</b>: {{ $image->id }} <br>
                            <b>path</b>: {{ $image->path }} <br>
                            <b>url</b>: {{ Storage::url($image->path) }} <br>
                        </div>
                    </div>
                    <hr /> 
                @empty
                    <div class="col-12">
                        <b>{{ __('No hay imágenes') }}</b>
                    </div>
                @endforelse


                </div>



                    <div class='container my-5 py-5'>
                        <div class='row'>
                            <div class='col-12 col-md-8 offset-md-2'>
                                <div class="card">
                                    <div class="card-header text-center ref3">
                                        {{ __('Anuncio') }} #{{ $ad->id }}
                                    </div>
                                    <div class="card-body ref1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Imágenes') }}</b>
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    @forelse ($ad->images as $image)
                                                        <div class="col-md-4">
                                                            <img src="{{ $image->getUrl(400, 300) }}" class="img-fluid"
                                                                alt="...">
                                                        </div>
                                                    @empty
                                                        <div class="col-12">
                                                            <b>{{ __('No hay imágenes') }}</b>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Usuario') }}</b>
                                            </div>
                                            <div class="col-md-9">
                                                #{{ $ad->user->id }} - {{ $ad->user->name }} - {{ $ad->user->email }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Título') }}</b>
                                            </div>
                                            <div class="col-md-9">
                                                {{ $ad->title }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Precio') }}</b>
                                            </div>
                                            <div class="col-md-9">
                                                {{ $ad->price }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Descripción') }}</b>
                                            </div>
                                            <div class="col-md-9">
                                                {{ $ad->body }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Categoría') }}</b>
                                            </div>
                                            <div class="col-md-9">
                                                {{ $ad->category->name }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>{{ __('Fecha de creación') }}</b>
                                            </div>
                                            <div class="col-md-9">
                                                {{ $ad->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-6">
                                        <form action="{{ route('revisor.ad.reject', $ad) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger">{{ __('Rechazar') }}</button>
                                        </form>



                                    </div>
                                    <div class="col-6 text-end">
                                        <form action="{{ route('revisor.ad.accept', $ad) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning">{{ __('Aceptar') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- <h3 class="text-center my-5"> {{ __('No hay anuncios para revisar') }}</h3>
                    <div class="text-center my-5">
                        <img src="{{ asset('./image/logo.png') }}" alt="Logo Anonymous" width="650px" height="150px">
                    </div> --}}
                @endif
            </div>
        @endsection
