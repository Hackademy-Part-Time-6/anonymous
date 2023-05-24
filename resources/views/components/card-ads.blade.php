<div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card h-100 rentik-card">
        <div class="card-image">
            @if ($ad->images->count() > 0)
                <img src="{{ $ad->images->first()->getUrl(400, 300) }}" class="card-img-top rentik-card-img"
                    alt="{{ $ad->title }}">
            @else
                <img src="https://via.placeholder.com/150" class="card-img-top rentik-card-img" alt="...">
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title rentik-card-title">{{ $ad->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted rentik-card-price">{{ $ad->price }}€</h6>
            <p class="card-text rentik-card-description">{{ $ad->body }}</p>
            <div class="card-category rentik-card-category">
                <strong>
                    <a href="{{ route('category.ads', $ad->category) }}">#{{ $ad->category->name }}</a>
                </strong>
                <div class="rentik-card-date">{{ __('Publicado') }}: {{ $ad->created_at->format('d/m/Y') }}</div>
            </div>
            <div class="card-user rentik-card-user">
                <small><b>{{ $ad->user?->name }}</b></small>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center rentik-card-footer">
            <a href="{{ route('ads.show', $ad) }}" class="btn rentik-card-btn">{{ __('Mostrar Más') }}</a>
        </div>
    </div>
</div>
