@if (isset($categories) && count($categories)>0)
<div class="w3-col l3">
      <div class="w3-margin">
        <hr>
        <div class="w3-container w3-padding">
         <b>Kategoriler</b>
         <hr>
        </div>
        <ul class="w3-ul w3-hoverable">
          @foreach($popularCategories as $category)
          <a href="{{ url('category', ['id' => $category->slug]) }}" class="sidebar-slug">
            <li class="w3-padding-12 w3-hover-text-white">
              <span>{{ $category->category }}</span>
            </li>
          </a>
          @endforeach
        </ul>
      </div>
      <hr>
      <div class=" w3-margin">
        <div class="w3-container w3-padding">
          <b>Yazılar</b>
          <hr>
        </div>
        <ul class="w3-ul w3-hoverable">
          @foreach($popularPosts as $post)
          <a href="{{ url('', ['id' => $post->slug]) }}" class="sidebar-slug">
            <li class="w3-padding-12 w3-hover-text-white">
              <span>{{ $post->content_title }}</span>
            </li>
          </a>
          @endforeach
        </ul>
      </div>
      <hr>
      <br><br>
      <div class=" w3-margin">
      </div>
    </div>
@endif


