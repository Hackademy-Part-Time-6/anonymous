<x-layout>

        


        <div class="container">
            {{-- <h1>{{__Mis Anuncios}}</h1> --}}
            <div class="row justify-content-center">
                @forelse($ads ?? [] as $ad)
                    <x-card-ads :ad="$ad" />
                @empty
                    <div class="col-12 justify-content-center">
                        <div class="text-center">
                            <h2>{{ __('Uyy.. parece que no hay nada') }}</h2>
                            <img src="{{ asset('./image/logo.png') }}" alt="Logo Anonymous" width="650px" height="150px">
                            <div class="text-center my-5">
                                <a href="{{ route('ads.create') }}"
                                    class="btn btn-warning">{{ __('Vende tu primer objeto') }}</a>
                                <a href="{{ route('home') }}" class="btn btn-warning">{{ __('Vuelve a la home') }}</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

</x-layout>