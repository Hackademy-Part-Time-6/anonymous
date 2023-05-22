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
                        <img src="{{ $ad->images()->first()->getUrl(400, 300) }}" class="card-img-top" alt="...">
                    </div>
                </div>
            @endif
            <div class="col-12 col-md-6">
                <div class="text-center mb-4">
                    <h2>{{ strtoupper($ad->title) }}</h2>
                </div>
                <h1 class="mb-3 text-center">{{ $ad->price }}€</h1>
                <h4 class="mb-3"><b>{{ __('Descripción') }}:</b> {{ $ad->body }}</h4>
                <div class="mb-3"><b>{{ __('Publicado el') }}:</b> {{ $ad->created_at->format('d/m/Y') }}</div>
                <div class="mb-3"><b>{{ __('Plazo de Envío') }}:</b>
                    Listo para enviar el <b>{{ \Carbon\Carbon::now()->addDays(2)->format('d/m/Y') }}</b>
                </div>
                <div class="mb-3"><b>{{ __('Por') }}:</b> {{ strtoupper($ad->user?->name) }}</div>
                <div class="mb-3"><a
                        href="{{ route('category.ads', $ad->category) }}">#{{ $ad->category->name }}</a></div>
                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-danger mr-2">{{ __('Comprar') }}</a>
                    <a href="https://wa.me/5211234567890?text=Me%20gustaría%20saber%20el%20precio%20del%20coche"
                        class="whatsapp" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>

                <div class="my-3">
                    <i class="bi bi-bag-fill"></i><b> ¡ENVÍO GRATIS!</b><br>
                    Disfruta de tu <b> envío gratuito </b> en compras superiores a 60€.
                </div>
            </div>

        </div>
    </div>

</x-layout>
