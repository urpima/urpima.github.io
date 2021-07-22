<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"><img src="{{ asset('images/LOBE.png')}}" align="center" width="80%" height="60%"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::to('/') }}/upload/{{Auth::user()->url}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              {{Auth::user()->name}}
              <p>{{Auth::user()->Grade }}</p>
          </a>
        </div>
      </div>
                </li>
                
                
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        @can('Permissions_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                                @can('Role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                                @can('User_access')

                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('Speaker_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.speakers.index") }}" class="nav-link {{ request()->is('admin/speakers') || request()->is('admin/speakers/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-clock">
                            </i>
                            <p>
                                <span>Seminaire</span>
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('Axe_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.axes.index") }}" class="nav-link {{ request()->is('admin/axes') || request()->is('admin/axes/*') ? 'active' : '' }}">
                        <i class="fas fa-window-maximize"></i>
                            <p>
                                <span>Axes</span>
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('Memberprojet_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.memberprojets.index") }}" class="nav-link {{ request()->is('admin/memberprojets') || request()->is('admin/memberprojets/*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                            <p>
                                <span>Memberprojets</span>
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('Projet_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.projets.index") }}" class="nav-link {{ request()->is('admin/projets') || request()->is('admin/projets/*') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram"></i>
                            <p>
                                <span>Projets</span>
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('Sousaxe_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.schedule2s.index") }}" class="nav-link {{ request()->is('admin/schedule2s') || request()->is('admin/schedule2s/*') ? 'active' : '' }}">
                        <i class="fas fa-window-maximize"></i>
                            <p>
                                <span>SousAxes</span>
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('Publication_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.publications.index") }}" class="nav-link {{ request()->is('admin/publications') || request()->is('admin/publications/*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                            <p>
                                <span>Publications</span>
                            </p>
                        </a>
                    </li>
                  @endcan
                  @can('Auteurpublication_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.auteurpublications.index") }}" class="nav-link {{ request()->is('admin/auteurpublications') || request()->is('admin/auteurpublications/*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                            <p>
                                <span>Auteurpublications</span>
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('Galleries_access')
               <li class="nav-item">
                        <a href="{{ route("admin.hotels.index") }}" class="nav-link {{ request()->is('admin/hotels') || request()->is('admin/hotels/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-images">

                            </i>
                            <p>
                                <span>{{ trans('cruds.gallery.title') }}</span>
                            </p>
                        </a>
                    </li>
@endcan
           
@can('Spoonsor_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.sponsors.index") }}" class="nav-link {{ request()->is('admin/sponsors') || request()->is('admin/sponsors/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-hand-holding-usd">

                            </i>
                            <p>
                                <span>Partenaires</span>
                            </p>
                        </a>
                    </li>
@endcan
                <li class="nav-item">
                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>Déconnexion</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>