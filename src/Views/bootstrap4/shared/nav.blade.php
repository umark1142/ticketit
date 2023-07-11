<nav>
    <ul class="nav nav-pills">
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(route(Umark\Ticketit\Models\Setting::grab('main_route') . '.index')) ? "active" : "" !!}"
                href="{{ route(Umark\Ticketit\Models\Setting::grab('main_route') . '.index') }}">{{ trans('ticketit::lang.nav-active-tickets') }}
                <span class="badge badge-pill badge-secondary ">
                     <?php 
                        if ($u->isAdmin()) {
                            echo Umark\Ticketit\Models\Ticket::active()->count();
                        } elseif ($u->isAgent()) {
                            echo Umark\Ticketit\Models\Ticket::active()->agentUserTickets($u->id)->count();
                        } else {
                            echo Umark\Ticketit\Models\Ticket::userTickets($u->id)->active()->count();
                        }
                    ?>
                </span>
            </a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(route(Umark\Ticketit\Models\Setting::grab('main_route') . '-complete')) ? "active" : "" !!}"
                 href="{{ route(Umark\Ticketit\Models\Setting::grab('main_route') . '-complete') }}">{{ trans('ticketit::lang.nav-completed-tickets') }}
                <span class="badge badge-pill badge-secondary">
                    <?php 
                        if ($u->isAdmin()) {
                            echo Umark\Ticketit\Models\Ticket::complete()->count();
                        } elseif ($u->isAgent()) {
                            echo Umark\Ticketit\Models\Ticket::complete()->agentUserTickets($u->id)->count();
                        } else {
                            echo Umark\Ticketit\Models\Ticket::userTickets($u->id)->complete()->count();
                        }
                    ?>
                </span>
            </a>
        </li>

        @if($u->isAdmin())
            <li role="presentation" class="nav-item">
                <a class="nav-link {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\DashboardController@index')) || Request::is($setting->grab('admin_route').'/indicator*') ? "active" : "" !!}"
                    href="{{ action('\Umark\Ticketit\Controllers\DashboardController@index') }}">{{ trans('ticketit::admin.nav-dashboard') }}</a>
            </li>

            <li role="presentation" class="nav-item dropdown">

                <a class="nav-link dropdown-toggle {!!
                    $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\StatusesController@index').'*') ||
                    $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\PrioritiesController@index').'*') ||
                    $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\AgentsController@index').'*') ||
                    $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\CategoriesController@index').'*') ||
                    $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\ConfigurationsController@index').'*') ||
                    $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\AdministratorsController@index').'*')
                    ? "active" : "" !!}"
                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ trans('ticketit::admin.nav-settings') }}
                </a>
                <div class="dropdown-menu">
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\StatusesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Umark\Ticketit\Controllers\StatusesController@index') }}">{{ trans('ticketit::admin.nav-statuses') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\PrioritiesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Umark\Ticketit\Controllers\PrioritiesController@index') }}">{{ trans('ticketit::admin.nav-priorities') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\AgentsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Umark\Ticketit\Controllers\AgentsController@index') }}">{{ trans('ticketit::admin.nav-agents') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\CategoriesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Umark\Ticketit\Controllers\CategoriesController@index') }}">{{ trans('ticketit::admin.nav-categories') }}</a>
                   
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\ConfigurationsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Umark\Ticketit\Controllers\ConfigurationsController@index') }}">{{ trans('ticketit::admin.nav-configuration') }}</a>
                    
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Umark\Ticketit\Controllers\AdministratorsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Umark\Ticketit\Controllers\AdministratorsController@index')}}">{{ trans('ticketit::admin.nav-administrator') }}</a>
                    
                </div>
            </li>
        @endif

    </ul>
</nav>