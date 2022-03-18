@auth
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">

        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item pt-2" style="background-color:rgb(143, 143, 243);height:63px;">
                <a href="{{ route('/home',app()->getLocale()) }}" class="nav-link text-white"><i class="bi bi-speedometer">
                        {{ __('lang.dashBoard') }}</i></a>
            </li>
            <li class="nav-title" style="padding-left:5px;">
                <i class="bi bi-menu-button-wide-fill text-white"> {{ __('lang.mainMenu') }}</i>
            </li>

            {{-- starts of menu list --}}
            @can('is_admin')
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle text-white" href="#"><i class="bi bi-people-fill">
                            {{ __('lang.manageUser') }}</i></a>
                    <ul class="nav-group-items">
                        <li class="nav-item">

                            <a class="nav-link text-white" href="{{ route('user.create',app()->getLocale()) }}"> <i class="bi bi-pen-fill">
                                    {{ __('lang.createUser') }}</i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.index',app()->getLocale()) }}"> <i class="bi bi-view-stacked">
                                    {{ __('lang.userDetails') }}</i>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @if (Gate::check('is_admin') || Gate::check('is_member'))
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle text-white" href="#"><i class="bi bi-person-lines-fill">
                            {{ __('lang.manageCustomer') }}</i></a>
                    <ul class="nav-group-items">
                        <li class="nav-item">

                            <a class="nav-link text-white" href="{{ route('costumer.create',app()->getLocale()) }}"> <i
                                    class="bi bi-plus"> {{ __('lang.createCustomer') }}</i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('costumer.index',app()->getLocale()) }}"> <i
                                    class="bi bi-view-stacked"> {{ __('lang.customerDetails') }}</i>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- end one menu list --}}

            @if (Gate::check('is_admin') || Gate::check('is_member'))
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle text-white" href=""><i class="bi bi-cash">
                            {{ __('lang.manageLoan') }}</i></a>
                    <ul class="nav-group-items">
                        <li class="nav-item">

                            <a class="nav-link text-white" href="{{ route('loan.create',app()->getLocale()) }}"> <i
                                    class="bi bi-align-middle"> {{ __('lang.applyLoan') }}</i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('loan.index',app()->getLocale()) }}"> <i class="bi bi-list-ul">
                                    {{ __('lang.loanDetails') }}</i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('financial.index',app()->getLocale()) }}"> <i
                                    class="bi bi-globe"> {{ __('lang.Transaction') }}</i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('report',app()->getLocale()) }}"> <i class="bi bi-pie-chart-fill">
                                    {{ __('lang.Report') }} </i>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- end one menu list --}}

            </li>
        </ul>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="btn btn-danger" type="submit" value="{{ __('lang.logout') }}">
        </form>
    </div>

@endauth
