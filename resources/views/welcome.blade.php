<x-layout>
    <x-slot name="title">Anonymous</x-slot>
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="my-3">{{ __('messages.welcome') }}!</h1>
            <h3 class="my-5">
                {{ __('Descubre y adquiere productos de grandes marcas, tanto nuevos como de segunda mano.') }}</h3>

        </div>

        <div class="row justify-content-center">
            @forelse($ads ?? [] as $ad)
                <div class="col-12 col-md-4 mb-4 " style="background-color: #bebebe; border: 1px solid #D4AF37;">
                    <div class="card mb-5">
                        @if ($ad->images->count() > 0)
                            <img src="{{ $ad->images->first()->getUrl(400, 300) }}" class="card-img-top" alt="...">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                        @endif
                    </div>
                    <div class="text-center">
                        <h4 class="card-title">{{ $ad->title }}</h4>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $ad->price }}€</h5>
                        <p class="card-text">{{ $ad->body }}</p>
                        <div class="card-subtitle mb-2">
                            <strong>
                                <a href="{{ route('category.ads', $ad->category_id) }}">#{{ $ad->category->name }}</a>
                            </strong>
                            <div>{{ __('Publicado') }}: {{ $ad->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="card-subtitle mb-2">
                            <small>{{ $ad->user?->name }}</small>
                        </div>
                        <a href="{{ route('ads.show', $ad) }}" class="btn btn-warning my-5"
                            style="background-color: #D4AF37;">{{ __('Mostrar Más') }}</a>
                    </div>
                </div>
            @empty
                <div class="col-12 justify-content-center">
                    <h2>Uyy.. parece que no hay nada de esta categoría</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-warning my-5">Vende tu primer objeto</a>
                    <a href="{{ route('home') }}" class="btn btn-warning">Vuelve a la home</a>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
