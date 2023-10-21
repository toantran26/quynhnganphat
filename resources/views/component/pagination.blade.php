@if($object->lastPage() > 1)
<div aria-label="Page navigation example" class="navigation_page">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link {{ ($object->currentPage() != 1) ?'': 'disabled'}}" href="{{ $object->previousPageUrl()}}">
        <svg width="27" height="14" viewBox="0 0 27 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M6.53033 0L0.53033 6L0 6.53033L0.53033 7.06066L6.53033 13.0607L7.59099 12L2.87132 7.28033H26.0607V5.78033H2.87132L7.59099 1.06066L6.53033 0Z"
            fill="#" />
        </svg>
      </a>
    </li>
    @for ($i = 1; $i <= $object->lastPage(); $i++)
      @if(($i < $object->currentPage() +3 && $i > $object->currentPage() -3)
        || ($i > $object->currentPage() + 3 && $i < $object->currentPage() + 4))
          <li class="page-item {{$object->currentPage() == $i ? 'active' : ''}}">
            <a class="page-link" href="{{ $object->url($i) }}">{{$i}}
            </a>
          </li>
          @endif
          @endfor
          <li class="page-item">
            <a class="page-link {{ ($object->currentPage() != $object->lastPage()) ?'': 'disabled'}}"
              href="{{ $object->nextPageUrl() }}">
              <svg width="27" height="14" viewBox="0 0 27 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M19.5908 0L25.5908 6L26.1211 6.53033L25.5908 7.06066L19.5908 13.0607L18.5301 12L23.2498 7.28033H0.0604343V5.78033H23.2498L18.5301 1.06066L19.5908 0Z"
                  fill="#" />
              </svg>
            </a>
          </li>
  </ul>
</div>
@endif