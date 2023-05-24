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
                        <div class="carousel-inner border border-3 border-warning rounded-top">
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
                    <div class="text-center mb-4 cards14">
                        <img src="{{ $ad->images()->first()->getUrl(400, 300) }}" class="card-img-top" alt="...">
                    </div>
                </div>
            @endif
            <div class="col-12 col-md-6">
                <div class=" mb-4 my-2" style="font-weight: 700">
                    <h1>{{ strtoupper($ad->title) }}</h1>
                </div>
                <h2 class="mb-3 ">{{ $ad->price }}€</h2>
                <p class="mb-3" style="font-size:18px"><b>{{ __('Descripción') }}:</b> {{ $ad->body }}</p>
                <div class="mb-3"><b>{{ __('Publicado el') }}:</b> {{ $ad->created_at->format('d/m/Y') }}</div>
                <div class="mb-3 p-2" style="width: 350px; border: 3px #f9fdfd solid;">
                    <b>{{ __('Fecha maxima de entrega') }}:</b>
                    <b>{{ \Carbon\Carbon::now()->addDays(2)->format('d/m/Y') }}</b>
                </div>
                <div class="mb-3"><b>{{ __('Por') }}:</b> {{ strtoupper($ad->user?->name) }}</div>
                <div class="mb-3">
                    <a href="{{ route('category.ads', $ad->category) }}">#{{ $ad->category->name }}</a>
                </div>
                <div class="d-flex align-items-center">
                    <a href="#" class="btn cmp btn-dark"><i class="bi bi-cart4"></i> {{ __('Comprar') }}</a>
                    <div class="what">

                        <a href="https://wa.me/5211234567890?text=Me%20gustaría%20saber%20el%20precio%20del%20coche"
                            class="whatsapp" target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <h6 class="mx-2">{{ __('Contacta por Whatsapp') }}</h6>
                    </div>
                </div>
                <div class="my-3">
                    <i class="bi bi-bag-fill"></i><b>{{ __('¡ENVÍO GRATIS!') }} </b><br>
                    {{ __('Disfruta de tu') }} <b> {{ __('envío gratuito ') }} </b>
                    {{ __('en compras superiores a 60€.') }}
                </div>
            </div>

        </div>
    </div>

</x-layout>
