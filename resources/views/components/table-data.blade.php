<div class="table-data__row">
    <div class="table-data__info">
        <a class="table-data__content center" href="{{route('revisor.aprobate',$number)}}">{{ $number }}</a>
        <p class="table-data__content center">{{ $category }}</p>
        <p class="table-data__content center">{{ $title }}</p>
        <p class="table-data__content center">{{ $user }}</p>
        <div class="table-data__cell">
            @if ($estatus === null)
              <p class="table-data__content center status-badge pending">Pendiente</p>
            @elseif ($estatus)
            <p class="table-data__content center status-badge approved">Aprobado</p>

            @else
            <p class="table-data__content center status-badge rejected">Rechazado</p>

            @endif
          </div>
        <a class="table-data__content center"><i class="{{ $editIcon }}"></i></a>
        <a class="table-data__content center"><i class="{{ $configIcon }}"></i></a>
    </div>
</div>