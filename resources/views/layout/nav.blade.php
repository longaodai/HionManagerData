<div id="sidebar-menu">
    
    <ul class="metismenu" id="side-menu">
        <hr>
        <li>
            <a href="{{route('admin.list')}}">
                <span class="text-center">Xin chào: {{auth()->user()->name ?? "Admin"}}</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="javascript: void(0);">
                <i class="fas fa-list"></i>
                <span> Danh sách data   </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{route('admin.list')}}">
                        <span> Data chung </span>
                    </a>
                </li>
                @if (isset($categories) && count($categories) > 0)
                    @foreach ($categories as $category)
                    <li class="{{ request()->get('category') == $category->id ? 'mm-active' : '' }}">
                        <a href="{{route('admin.list')}}?category={{$category->id}}" class="{{ request()->get('category') == $category->id ? 'active' : '' }}">
                            {{$category->name}}
                        </a>
                    </li>
                    @endforeach
                @endif
            </ul>
        </li>
        
        <li>
            <a href="{{route('admin.import')}}">
                <i class="fas fa-file-import"></i>
                Import data
            </a>
        </li>

        <li>
            <a href="{{route('admin.log_import.list')}}">
                <i class="fas fa-file-import"></i>
                Các file import
            </a>
        </li>

        <li>
            <a href="{{route('admin.view')}}">
                <i class="fas fa-file-import"></i>
                Xử lý data
            </a>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i class="ti-share"></i>
                <span> Danh mục  </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{route('admin.category.list')}}">Danh sách danh mục</a>
                </li>
                <li>
                    <a href="{{route('admin.category.add')}}">Thêm danh mục</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i class="ti-share"></i>
                <span> Từ khóa   </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{route('admin.keyword.list')}}">Danh sách từ khóa</a>
                </li>
                <li>
                    <a href="{{route('admin.keyword.add')}}">Thêm từ khóa</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.logout')}}">
                <i class="fas fa-file-import"></i>
                Đăng xuất
            </a>
        </li>
    </ul>

</div>