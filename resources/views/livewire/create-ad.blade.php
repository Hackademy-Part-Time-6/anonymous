<div class="mt-3">
    {{-- The whole world belongs to you. --}}

        <form wire:submit.prevent="store">
            @if (session()->has('message'))
            <x-message :message="session('message')" color="success"></x-message>
        @endif

            @csrf

            <div class="mb-3">

                <label for="title" class="form-label">Titulo:</label>

                <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">

                @error('title')
                    {{$message}}
                @enderror

            </div>
            <div class="mb-3">

                <label for="category" class="form-label">Categoria:</label>

                <select wire:model.defer="category"  class="form-control">
                    <option value="">Selecciona Una Categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                    

            </div>
            <div class="mb-3">

                <label for="price" class="form-label">Precio:</label>

                <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">

                @error('price')
                {{$message}}
                @enderror

            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Descripción:</label>

                <textarea wire:model="body" cols="10" rows="5" class="form-control @error('body') is-invalid @enderror"></textarea>
                @error('body')
                {{$message}}
                @enderror
        </div>
        <button type="submit" class="btn bg-warning">Crear</button>
        </form>
        
       
        

</div>
