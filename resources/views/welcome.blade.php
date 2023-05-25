<x-layout>
    <x-slot name="title">Anonymous</x-slot>

    <div class="container">
        <div class="col-12 text-center">
            <h1 class="my-3">{{ __('messages.welcome') }}!</h1>
            <h3 class="my-5">
                {{ __('Descubre y adquiere productos de grandes marcas, tanto nuevos como de segunda mano.') }}
            </h3>
        </div>

        <div class="row justify-content-center">
            @forelse($ads->chunk(10) as $chunk)
                <div class="row">
                    @foreach ($chunk as $ad)
                        <x-card-ads :ad="$ad" />
                    @endforeach
                </div>
            @empty
                <div class="col-12 justify-content-center">
                    <h2>Uyy.. parece que no hay nada de esta categoría</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-warning my-5">Vende tu primer objeto</a>
                    <a href="{{ route('home') }}" class="btn btn-warning">Vuelve a la home</a>
                </div>
            @endforelse
        </div>

        {{-- <div class="row justify-content-center">
            <div class="col-12">
                {{ $ads->links() }}
            </div>
        </div> --}}
    </div>

</x-layout>
