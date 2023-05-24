<x-layout>

    <x-slot name='title'>Anonymous - Vende Algo Interesante</x-slot>
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card ref3 text-white">
                    <div class="card-header ref3 text-white text-center">
                        {{ __('Editar Anuncio') }}
                    </div>
                    <div class="card-body">

                        <livewire:edit-ad :ad="$ad" :images="$images" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
