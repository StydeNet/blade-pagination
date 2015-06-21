<nav>
    <ul class="pagination">
    @if ($previous)
        <li><a href="{{ $previous }}">{{ trans('blade-pagination::pagination.prev') }}</a></li>
    @else
        <li class="disabled"><span>{{ trans('blade-pagination::pagination.prev') }}</span></li>
    @endif
    @foreach ($links as $page => $url)
        @if ($page == $current)
            <li class="active"><span>{{ $page }}</span></li>
        @elseif($url)
            <li><a href="{{ $url }}">{{ $page }}</a></li>
        @else
            <li class="disabled"><span>{{ trans('blade-pagination::pagination.div') }}</span></li>
        @endif
    @endforeach
    @if ($next)
        <li><a href="{{ $next }}">{{ trans('blade-pagination::pagination.next') }}</a></li>
    @else
        <li class="disabled"><span>{{ trans('blade-pagination::pagination.next') }}</span></li>
    @endif
    </ul>
</nav>