<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ url('backend/dist/img/avatar.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ get_logged_user_name() }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        {{--<li class="header">MAIN NAVIGATION</li>--}}
        <li class="{{ setActive('admin') }}">
            <a href="{{ url('/admin') }}">
                <i class="fa fa-dashboard"></i> <span> Dashboard </span>
            </a>
        </li>
        <li class="treeview {{ setActive('admin/users*') }} {{ setActive('admin/permission-group*') }} {{ setActive('admin/permission*') }} {{ setActive('admin/role*') }}">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>User Management</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{!! route('admin.users') !!}"><i class="fa fa-users"></i> <span> User </span></a></li>
                <li><a href="{{ url('/admin/permission-group') }}"><i class="fa fa-circle-o"></i> Permission Group </a></li>
                <li><a href="{{ url('/admin/permission') }}"><i class="fa fa-circle-o"></i> Permission </a></li>
                <li><a href="{{ url('/admin/role') }}"><i class="fa fa-circle-o"></i> Role </a></li>
            </ul>
        </li>
        <li class="{{ setActive('admin/menu*') }}">
            <a href="{!! route('admin.menus') !!}">
                <i class="fa fa-dashboard"></i> <span> Menus </span>
            </a>
        </li>
        <li class="treeview {{ setActive('admin/article_categories*') }} {{ setActive('admin/articles*') }}">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Article Management</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{!! route('admin.article_categories') !!}"><i class="fa fa-users"></i> <span> Article Category </span></a></li>
                <li><a href="{!! route('admin.articles') !!}"><i class="fa fa-circle-o"></i> Article </a></li>
            </ul>
        </li>
        <li class="treeview {{ setActive('admin/course*') }} {{ setActive('admin/lecture*') }}">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Course Management</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{!! route('admin.course') !!}"><i class="fa fa-users"></i> <span> Course </span></a></li>
                <li><a href="{!! route('admin.lecture') !!}"><i class="fa fa-users"></i> <span> Lecture </span></a></li>
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->