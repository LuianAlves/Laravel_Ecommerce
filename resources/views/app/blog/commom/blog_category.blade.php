<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">Category</h3>
    <div class="sidebar-widget-body m-t-10">
        <div class="accordion">
            @foreach($blog_cat as $cat)
                <ul class="list-group">
                    <a href="{{ url('/blog/category/post', $cat->id) }}">
                        <li class="list-group-item">
                            {{ session()->get('language') == 'portuguese' ? $cat->blog_category_name_pt : $cat->blog_category_name_en }}
                        </li>
                    </a>
                </ul>
            @endforeach
        </div>
    </div>
</div>