@if (isset($categories) && count($categories)>0)
<ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Kategoriler
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           
                 @foreach($categories as $category)
                <a style="font-family: 'Smooch Sans', sans-serif;font-size:14px;" class="dropdown-item" href="/category/{{$category->id}}">
                 {{$category->category}}<br>
                </a>
                @endforeach
          
        </div>
    </li>
</ul>
@endif


