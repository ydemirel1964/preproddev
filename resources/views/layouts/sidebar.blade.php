<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget post-category-widget">
            <div class="text-center">
                <div class="text-center single-sidebar-widget__title"> Kategoriler </div>
                <ul class="cat-list mt-20">
                    @foreach ($sidebarCategories as $category)
                    <li>
                        <a href="{{ url('category', ['id' => $category->slug]) }}"
                            class="d-flex justify-content-between">
                            <h3 class="sidebar-h3-title">{{ $category->category }} </h3>
                            <p>{{ $category->category_count }}</p>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="single-sidebar-widget popular-post-widget">
            <div class="text-center single-sidebar-widget__title">Yazılar</div>
            <div class="popular-post-list">
                @foreach ($sidebarArticles as $sidebarArticle)
                <br>
                <div class="single-post-list">
                    <div class="thumb">
                        <ul class="thumb-info">
                            <li>
                                {{ $sidebarArticle->users->name }}
                            </li>
                            <li>
                                {{ $sidebarArticle->created_at->format('Y-m-d') }}
                            </li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="{{ url('', ['id' => $sidebarArticle->slug]) }}">
                            <p class="sidebar-h3-title">{{ $sidebarArticle->content_title }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>