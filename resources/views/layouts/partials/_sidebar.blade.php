<div class="sidebar">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="sidebar-item categories">
          <div class="sidebar-heading">
            <h2>Categories</h2>
          </div>
          <div class="content">
            <ul>
              @foreach ($categories as $category)
              <li><a href="{{ Route('categories.show',$category) }}">{{$category->name}}</a></li>
              @endforeach   
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item tags">
          <div class="sidebar-heading">
            <h2>Tag Clouds</h2>
          </div>
          <div class="content">
            <ul>
              @foreach ($tags as $tag)
              <li><a href="{{ Route('tags.show',$tag) }}">{{$tag->name}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>