<x-layout>
    <x-slot name="title">Anonymous ads</x-slot>

    <div class="col-12 text-center">
        <h1>{{ __('messages.welcome') }}!</h1>
        <h1>{{ __('messages.latest') }}:</h1>
    </div>



    <div class="row d-flex justify-content-betwen">

        @forelse($ads ?? [] as $ad)
            <div class="col col-4">
                <div class="card mb-4 w-100">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">

                    <div class="card-body text-center">



                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('Imágenes')}}</b>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    @forelse ($ad->images as $image)
                                    <img src="{{ Storage::url($image->path) }}" class="card-img-top" alt="...">
                                    @empty
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                @endforelse
                                
                                
                              
                                
                                </div>
                            </div>
                        </div>
                        <hr>


                        <h4 class="card-title"> {{ $ad->title }}</h4>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $ad->price }}€</h5>
                        <p class="card-text"> {{ $ad->body }}</p>
                        <div class="card-subtitle mb-2">
                            <strong>
                                <a href="{{ route('category.ads', $ad->category_id) }}">#{{ $ad->category->name }}</a>
                            </strong>
                            <div>{{ __('Publicado') }}: {{ $ad->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="card-subtitle mb-2">
                            <small>{{ $ad->user?->name }}</small>
                        </div>
                        <a href="{{ route('ads.show', $ad) }}" class="btn btn-warning">{{ __('Mostrar Más') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 justify-content-center">
                <h2>Uyy.. parece que no hay nada de esta categoría</h2>
                <a href="{{ route('ads.create') }}" class="btn  btn-warning my-5">Vende tu primer objeto</a>
                <a href="{{ route('home') }}" class="btn btn-warning">Vuelve a la home</a>
            </div>
        @endforelse


    </div>



</x-layout>
