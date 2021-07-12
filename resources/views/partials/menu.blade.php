<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
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

                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                        
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            

                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.settings.index") }}" class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.setting.title') }}</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.speakers.index") }}" class="nav-link {{ request()->is('admin/speakers') || request()->is('admin/speakers/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.speaker.title') }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.axes.index") }}" class="nav-link {{ request()->is('admin/axes') || request()->is('admin/axes/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>Axes</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.projets.index") }}" class="nav-link {{ request()->is('admin/projets') || request()->is('admin/projets/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>Projets</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.publications.index") }}" class="nav-link {{ request()->is('admin/publications') || request()->is('admin/publications/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>Publications</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.schedules.index") }}" class="nav-link {{ request()->is('admin/schedules') || request()->is('admin/schedules/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clock">

                            </i>
                            <p>
                                <span>{{ trans('cruds.schedule.title') }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.schedule2s.index") }}" class="nav-link {{ request()->is('admin/schedule2s') || request()->is('admin/schedule2s/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clock">

                            </i>
                            <p>
                                <span>SousAxes</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.venues.index") }}" class="nav-link {{ request()->is('admin/venues') || request()->is('admin/venues/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-map-marker-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.venue.title') }}</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.hotels.index") }}" class="nav-link {{ request()->is('admin/hotels') || request()->is('admin/hotels/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-images">

                            </i>
                            <p>
                                <span>{{ trans('cruds.gallery.title') }}</span>
                            </p>
                        </a>
                    </li>

                   <!--
                    <li class="nav-item">
                        <a href="{{ route("admin.galleries.index") }}" class="nav-link {{ request()->is('admin/galleries') || request()->is('admin/galleries/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-images">

                            </i>
                            <p>
                                <span>{{ trans('cruds.gallery.title') }}</span>
                            </p>
                        </a>
                    </li>
                -->


                    <li class="nav-item">
                        <a href="{{ route("admin.sponsors.index") }}" class="nav-link {{ request()->is('admin/sponsors') || request()->is('admin/sponsors/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-hand-holding-usd">

                            </i>
                            <p>
                                <span>{{ trans('cruds.sponsor.title') }}</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.faqs.index") }}" class="nav-link {{ request()->is('admin/faqs') || request()->is('admin/faqs/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-question">

                            </i>
                            <p>
                                <span>{{ trans('cruds.faq.title') }}</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.amenities.index") }}" class="nav-link {{ request()->is('admin/amenities') || request()->is('admin/amenities/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-check">

                            </i>
                            <p>
                                <span>{{ trans('cruds.amenity.title') }}</span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route("admin.prices.index") }}" class="nav-link {{ request()->is('admin/prices') || request()->is('admin/prices/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-money-bill">

                            </i>
                            <p>
                                <span>{{ trans('cruds.price.title') }}</span>
                            </p>
                        </a>
                    </li>
                    
                <li class="nav-item">
                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>