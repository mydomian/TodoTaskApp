<a href="#" class="brand-link text-center">
    <b><span>{{ Auth::user()->name ?? 'Admin' }}</span></b>
</a>

<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Roles & Permissions
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('roles.create') }}" class="nav-link {{ request()->routeIs('roles.create') ? 'active' : '' }}">
                            <i class="fa fa-plus nav-icon"></i>
                            <p>Role Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Role Lists</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Todos
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('todos.create') }}" class="nav-link {{ request()->routeIs('todos.create') ? 'active' : '' }}">
                            <i class="fa fa-plus nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('todos.index') }}" class="nav-link {{ request()->routeIs('todos.index') ? 'active' : '' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Employees
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('employees.create') }}" class="nav-link {{ request()->routeIs('employees.create') ? 'active' : '' }}">
                            <i class="fa fa-plus nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.index') ? 'active' : '' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
