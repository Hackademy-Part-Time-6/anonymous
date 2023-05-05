<x-layout>
    <x-slot name="title">Anonymous ads</x-slot>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Anuncios por Categoria: </h1>
            </div>
        </div>
    </div>
    
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="card mb-5">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title"> {{ $ad->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}</h6>
                            <p class="card-text"> {{ $ad->body }}</p>
                            <div class="card-subtitle mb-2">
                                <strong>
                                    <a href="{{route('category.ads',$ad->category)}}">#{{$category->name}}</a></strong>
                                        
                                    <i>{{ $ad->created_at->format('d/m/Y')}}</i>
                            </div>
                            <div class="card-subtitle mb-2">
                                <small>{{ $ad->user->name }}</small>
                            </div>
                            <a href="{{ route("ads.show", $ad) }}" class="btn btn-primary">Mostrar Más</a>
                            {{$ads->links()}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <h2>Uyy.. parece que no hay nada de esta categoría</h2>
                    <a href="{{ route('ads.create')}}" class="btn btn-success">Vende tu primer objeto</a>
                    o <a href="{{ route('home')}}" class="btn btn-primary">Vuelve a la home</a>
                </div>
                @endforelse
            </div>
        
</x-layout>