<x-layout>
    <div class="container">
        <div class="row my-5">
            <div class="col-12 col-md-6">
                <div id="adImages" classÇ="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#adimages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="slide 1"></button>
                        <button type="button" data-bs-target="#adimages" data-bs-slide-t0="1" aria-label="slide 2"></button>
                        <button type="button" data-bs-target="#adimages" data-bs-slide-t0="2" aria-label="slide 3"></button>
                    </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https:/picsum.photos/700/6007a" class="d-block w-100" alt="..">
                </div>      
                <div class="carousel-item">
                    <img src="https://picsum. photos/700/600?b" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum. photos/700/600?b" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#adimages" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#adimages" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">next</span>
            </button>
        </div>
        </div>
       
        <div class="col-12 col-md-6">
        <div><b> título:</b>{{ $ad->title }}</div>
        <div><b> precio:</b>{{ $ad->price }}</div>
        <div><b> descripción:</b>{{ $ad->body }}</div>
        <div><b> publicado el:</b>{{ $ad->created_at->format('d/m/y') }}</div>
        <div><b> por:</b>{{ $ad->user->name }}</div>
        <div><a href="{{ route('category. ads', $ad->category) }}">#{{ $ad->category->name }}</a></div>
        <div><a href="" class="btn btn-success">comprar</a></div>
        </div>
    </div>
    </div>

    


</x-layout>