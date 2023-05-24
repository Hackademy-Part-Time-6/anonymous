<x-layout>
    <div class="container">
        <div class="row my-5">
            @if ($ad->images()->count() > 1)
            <div class="col-12 col-md-6">
                <div id="adImages" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < $ad->images()->count(); $i++)
                        <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{ $i }}"
                            class="@if ($i == 0) active @endif" aria-current="true"
                            aria-label="Slide {{ $i + 1 }}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @foreach ($ad->images as $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{ $image->getUrl(400, 300) }}" class="card-img-top" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#adImages"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#adImages"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            @else
            <div class="col-12 col-md-6">
                <div class="text-center mb-4">
                    <img src="{{ $ad->images()->first() ? $ad->images()->first()->getUrl(400, 300) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{$ad->title}}">

                </div>
            </div>
            @endif
            <div class="col-12 col-md-6">
                <div class="text-center mb-4">
                    <h1>{{ $ad->title }}</h1>
                </div>
                <div class="mb-3"><b>{{ __('Precio') }}:</b> {{ $ad->price }}€</div>
                <div class="mb-3"><b>{{ __('Descripción') }}:</b> {{ $ad->body }}</div>
                <div class="mb-3"><b>{{ __('Publicado el') }}:</b> {{ $ad->created_at->format('d/m/Y') }}</div>
                <div class="mb-3"><b>{{ __('Por') }}:</b> {{ $ad->user?->name }}</div>
                <div class="mb-3"><a href="{{ route('category.ads', $ad->category) }}">#{{ $ad->category->name }}</a></div>
                <div><a href="#" class="btn btn-buy">{{ __('Comprar') }}</a></div>
            </div>
        </div>
    </div>
    
</x-layout>
