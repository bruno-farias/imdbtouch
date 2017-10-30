@if(count($pages) > 1)
<nav aria-label="Page navigation" style="margin-top: 2em">
    <ul class="pagination justify-content-center">
        <li class="page-item @if($current == 1) disabled @endif">
            <a class="page-link" href="{{route($route, ['page' => $current - 1])}}" tabindex="-1">Previous</a>
        </li>
        @foreach($pages as $page)
            @if($page > ($current + 10))
                @continue
            @else
                <li class="page-item"><a class="page-link" href="{{route($route, ['page' => $page])}}">{{$page}}</a></li>
            @endif
        @endforeach
        <li class="page-item">
            <a class="page-link" href="{{route($route, ['page' => $current + 1])}}">Next</a>
        </li>
    </ul>
</nav>
@endif