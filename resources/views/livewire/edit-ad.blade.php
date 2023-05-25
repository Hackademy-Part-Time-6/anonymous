<div class="mt-3">
    <form wire:submit.prevent="update">
        <input type="hidden" name="ad_id" value="{{ $ad->id }}">


        @if (session()->has('message'))
            <x-message :message="session('message')['text']" :color="session('message')['type']"></x-message>
        @endif

        @csrf
        @method('PUT') {{-- Agrega el método PUT para la solicitud de actualización --}}

        <div class="mb-3">
            <label for="title" class="form-label"> {{ __('Titulo') }}:</label>
            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label"> {{ __('Categoría') }}:</label>
            <select wire:model.defer="category" class="form-control">
                <option value="">{{ __('Selecciona Una Categoria') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('Precio') }}:</label>
            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
            @error('price')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">{{ __('Descripción') }}:</label>
            <textarea wire:model="body" cols="10" rows="5" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
        </div>

        @if (!empty($ad->images))

        
            <div class="row">
                <div class="col-12">
                    <p>{{ __('Vista previa') }}:</p>
                    <div class="row">
                        @foreach ($ad->images as $key => $image)


                            <div class="col-12 col-md-4">
                                <img src="{{$image->getUrl(400,300)}}" alt="{{$image['id'] }}" class="img-fluid">
                                <button type="button" class="btn btn-danger"
                                    wire:click="removeImage({{ $key }})">{{ __('Eliminar') }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


        <button type="submit" class="btn bg-warning">{{ __('Actualizar') }}</button>
    </form>
</div>
