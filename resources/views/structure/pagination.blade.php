<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item @if($current == 1) disabled @endif">
            <a class="page-link" href="{{route('index', ['page' => $current - 1])}}" tabindex="-1">Previous</a>
        </li>
        @foreach($pages as $page)
            <li class="page-item"><a class="page-link" href="{{route('index', ['page' => $page])}}">{{$page}}</a></li>
        @endforeach
        <li class="page-item">
            <a class="page-link" href="{{route('index', ['page' => $current + 1])}}">Next</a>
        </li>
    </ul>
</nav>