<x-layout>
    <x-slot name="title">Anonymous ads</x-slot>

    <div class="container">
        <div class="row">
            <div class="text-center my-5">
                <h2>{{ __('Anuncios por categoría') }}: {{ __($category->name) }}</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="card mb-5">
                        @if ($ad->images()->count() > 0)
                            <img src="{{ $ad->images->first()->getUrl(400, 300) }}" class="card-img-top img-fluid"
                                alt="...">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}</h6>
                            <p class="card-text">{{ $ad->body }}</p>
                            <div class="card-subtitle mb-2">
                                <strong>
                                    <a href="{{ route('category.ads', $ad->category) }}">#{{ __($category->name) }}</a>
                                </strong>
                                <div>{{ __('Publicado') }}: {{ $ad->created_at->format('d/m/Y') }}</div>
                            </div>
                            <div class="card-subtitle mb-2">
                                <small>{{ $ad->user->name }}</small>
                            </div>
                            <a href="{{ route('ads.show', $ad) }}" class="btn btn-warning">{{ __('Mostrar Más') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h2>{{ __('Uyy.. parece que no hay nada') }}</h2>
                    <img src="{{ asset('./image/logo.png') }}" alt="Logo Anonymous" width="650px" height="150px">
                    <div class="my-5">
                        <a href="{{ route('ads.create') }}"
                            class="btn btn-warning">{{ __('Vende tu primer objeto') }}</a>
                        <a href="{{ route('home') }}" class="btn btn-warning">{{ __('Vuelve a la home') }}</a>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $ads->links() }}
            </div>
        </div>
    </div>


</x-layout>
