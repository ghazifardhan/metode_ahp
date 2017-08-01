<ol class="breadcrumb">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    @for($i = 1; $i <= count(Request::segments()); $i++)
    <li>
      <a href="">{{ Request::segment($i) }}</a>
    </li>
    @endfor
</ol>