 <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>

            @if (Request::is('admin*'))


            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
          </li>

          <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
            <a href="{{ route('admin.tag.index') }}"><i class="fa fa-table fa-fw"></i> Tag</a>
          </li>

          <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
            <a href="{{ route('admin.category.index') }}"><i class="fa fa-dribbble"></i> Category</a>
          </li>

          <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
            <a href="{{ route('admin.post.index') }}"><i class="fa fa-paste"></i> Post</a>
          </li>

          <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}">
            <a href="{{ route('admin.post.pending') }}"><i class="fa fa-circle"></i> Pending Post</a>
          </li>

          <li class="{{ Request::is('admin/favorite') ? 'active' : '' }}">
            <a href="{{ route('admin.favorite.index') }}"><i class="fa fa-leaf"></i> Favorite Post</a>
          </li>

          <li class="{{ Request::is('admin/comments') ? 'active' : '' }}">
            <a href="{{ route('admin.comment.index') }}"><i class="fa fa-copy"></i> Comments</a>
          </li>

          <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
            <a href="{{ route('admin.subscriber.index') }}"><i class="fa fa-subscript"></i> Subscriber</a>
          </li>
          <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
            <a href="{{ route('admin.settings') }}"><i class="fa fa-gears"></i> Settings</a>
          </li>

        @endif


        @if (Request::is('author*'))

        <li class="{{Request::is('author/dashboard') ? 'active' : ''}}">
            <a href="{{ route('author.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>

        <li class="{{ Request::is('author/post*') ? 'active' : '' }}">
            <a href="{{ route('author.post.index') }}"><i class="fa fa-paste"></i> Post</a>
          </li>

          <li class="{{ Request::is('author/favorite') ? 'active' : '' }}">
            <a href="{{ route('author.favorite.index') }}"><i class="fa fa-leaf"></i> Favorite Post</a>
          </li>

          <li class="{{ Request::is('author/comments') ? 'active' : '' }}">
            <a href="{{ route('author.comment.index') }}"><i class="fa fa-copy"></i> Comments</a>
          </li>


          <li class="{{ Request::is('author/settings') ? 'active' : '' }}">
            <a href="{{ route('author.settings') }}"><i class="fa fa-gears"></i> Settings</a>
          </li>

        @endif

    </ul>
</div>
<!-- /.sidebar-collapse -->
</div