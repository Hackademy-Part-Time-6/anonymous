<div class="table-data__row">
    <div class="table-data__info">
      <a class="table-data__content center" href="{{ route('revisor.aprobate', trim($number)) }}" data-id="{{$number}}">{{ $number }}</a>
        <p class="table-data__content center">{{ $category }}</p>
        <p class="table-data__content center" data-title="{{ $title }}">{{ $title }}</p>
        <p class="table-data__content center">{{ $user }}</p>

        <div class="table-data__cell">
          @if (boolval($estatus) === true)
              <p class="table-data__content center status-badge approved">Aprobado</p>
          @elseif (boolval($estatus) === false)
              <p class="table-data__content center status-badge pending">Pendiente</p>
          @else
              <p class="table-data__content center status-badge">-</p>
          @endif
      </div>
          <a class="table-data__content center" href="{{ route('revisor.edit', trim($number)) }}"><i class="{{ $editIcon }}"></i></a>
          <a class="table-data__content center"><i class="{{ $configIcon }}"></i></a>
    </div>
</div>