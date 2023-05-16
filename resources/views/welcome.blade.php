<x-layout>
    <x-slot name="title">Anonymous ads</x-slot>
    <div class="container">
        <div class="col-12 text-center">
            <h1>{{ __('messages.welcome') }}!</h1>
            <h1>{{ __('messages.latest') }}:</h1>
        </div>

        <div class="row ">
            @forelse($ads ?? [] as $ad)
                <div class="col-12 col-md-4 mb-5 con1" style="background-color: #bebebe; border: 1px solid #D4AF37;">
                    <div class="card mb-5 ">
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
                        <a href="{{ route('ads.show', $ad) }}" class="btn btn-warning"
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
