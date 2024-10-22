<a href="#" class="brand-link text-center">
    <b><span>{{ Auth::user()->name ?? 'Employee' }}</span></b>
</a>

<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Tasks
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('create todo')
                        <li class="nav-item">
                            <a href="{{ route('tasks.create') }}"
                                class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a href="{{ route('tasks.index') }}"
                            class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Pending Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('task.completed') }}"
                            class="nav-link {{ request()->routeIs('task.completed') ? 'active' : '' }}">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Complete Lists</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
