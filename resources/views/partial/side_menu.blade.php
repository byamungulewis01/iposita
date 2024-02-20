<ul class="menu-nav">
    <li class="menu-item nav-dashboard" aria-haspopup="true">
        <a href="/" class="menu-link">
            <i class="menu-icon flaticon-dashboard"></i>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>
    @can('Create Transaction')
        <li class="menu-item nav-transactions" aria-haspopup="true">
            <a href="{{ route('admin.all.transactions') }}" class="menu-link">
                <i class="menu-icon flaticon-cart"></i>
                <span class="menu-text">Transactions</span>
            </a>
        </li>
    @endcan
    @can('EUCL Interaction')
        <li class="menu-item naveucl-service" aria-haspopup="true">
            <a href="{{ route('admin.eucl-service.index') }}" class="menu-link">
                <i class="menu-icon flaticon-coins"></i>
                <span class="menu-text">EUCL Services</span>
            </a>
        </li>
        {{-- <li class="menu-item nav" aria-haspopup="true">
            <a href="{{ route('admin.eucl-service.history') }}" class="menu-link">
                <i class="menu-icon flaticon-coins"></i>
                <span class="menu-text">EUCL Account History</span>
            </a>
        </li> --}}
    @endcan
    @if(auth()->user()->branch && auth()->user()->branch->is_external)

        <li class="menu-item menu-item-submenu nav-balances" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-coins"></i>
                    <span class="menu-text">Balance</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Top-Ups</span>
                            </span>
                        </li>
                        <li class="menu-item nav-balance-transfer" aria-haspopup="true">
                            <a href="{{ route('admin.branch-top-ups.balance') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Make Transfer</span>
                            </a>
                        </li>
                        <li class="menu-item nav-transfer-histories" aria-haspopup="true">
                            <a href="{{ route('admin.branch-transfer-top-ups.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Transfer Histories</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        <li class="menu-item menu-item-submenu nav-top-ups-group" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon2-heart-rate-monitor"></i>
                    <span class="menu-text">Top-Ups</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Top-Ups</span>
                            </span>
                        </li>
                        <li class="menu-item nav-top-ups-make-request" aria-haspopup="true">
                            <a href="{{ route('admin.branch-payment-top-ups.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Make Requests</span>
                            </a>
                        </li>
                        <li class="menu-item nav-top-ups-history" aria-haspopup="true">
                            <a href="{{ route('admin.branches.top-ups.index',encryptId(auth()->user()->branch_id)) }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Top-up Histories</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

    @endif
    @can('Manage Branches')
        <li class="menu-item nav-branches" aria-haspopup="true">
            <a href="{{route('admin.branches.index')}}" class="menu-link">
                <i class="menu-icon flaticon2-menu-4"></i>
                    <span></span>
                </i>
                <span class="menu-text">Branches</span>
            </a>
        </li>
    @endcan
    @can('Manage Top-ups')
        @if(!auth()->user()->branch || auth()->user()->branch->branch_type == 'Internal')
            <li class="menu-item nav-all-iposita-topups" aria-haspopup="true">
                <a href="{{route('admin.iposita-topups.index')}}" class="menu-link">
                    <i class="menu-icon la la-wallet fa-2x"></i>
                    <span></span>
                    </i>
                    <span class="menu-text">Wallet</span>
                </a>
            </li>
        @endif
    @endcan
    @can('Manage Service Provider')
        <li class="menu-item nav-all-service-providers" aria-haspopup="true">
            <a href="{{route('admin.providers.index')}}" class="menu-link">
                <i class="menu-icon flaticon-layer"></i>
                    <span></span>
                </i>
                <span class="menu-text">Service Providers</span>
            </a>
        </li>
    @endcan

    @can('Manage Services')
        <li class="menu-item nav-all-services" aria-haspopup="true">
            <a href="{{route('admin.services.index')}}" class="menu-link">
                <i class="menu-icon flaticon2-cube-1"></i>
                    <span></span>
                </i>
                <span class="menu-text">Services</span>
            </a>
        </li>
    @endcan
    @can('Manage Charges')
        <li class="menu-item nav-all-service-charges" aria-haspopup="true">
            <a href="{{route('admin.charges.index')}}" class="menu-link">
                <i class="menu-icon flaticon-cart"></i>
                    <span></span>
                </i>
                <span class="menu-text"> Service Charges</span>
            </a>
        </li>
    @endcan
    @can("Approve Top-up Payment")
    <li class="menu-item nav-top-up-payments" aria-haspopup="true">
        <a href="{{ route('admin.branch-payment-top-ups.index') }}" class="menu-link">
            <i class="menu-icon la la-envelope-open-text"></i>
            <span class="menu-text">Top-up Requests</span>
        </a>
    </li>
    @endcan
    @can('View Reports')
        <li class="menu-item menu-item-submenu nav-all-reports" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <i class="menu-icon flaticon-statistics"></i>
                <span class="menu-text">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">reports</span>
                            </span>
                    </li>
                    <li class="menu-item nav-system-report" aria-haspopup="true">
                        <a href="{{ route('admin.system-top-ups.report') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">Wallet</span>
                        </a>
                    </li>
                    <li class="menu-item nav-branch-report" aria-haspopup="true">
                        <a href="{{ route('admin.branch-top-ups.report') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">Branch Top-ups</span>
                        </a>
                    </li>
                    <li class="menu-item nav-transactions-report" aria-haspopup="true">
                        <a href="{{ route('admin.transactions.report') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">Transactions</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    @endcan

    @can('Manage System Users')
        <li class="menu-section">
            <h4 class="menu-text">System Users Section</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item menu-item-submenu nav-user-managements" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
                <i class="menu-icon flaticon-users"></i>
                <span class="menu-text">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">User Management</span>
                            </span>
                    </li>
                    <li class="menu-item nav-all-users" aria-haspopup="true">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">Users</span>
                        </a>
                    </li>
                    <li class="menu-item nav-roles" aria-haspopup="true">
                        <a href="{{ route('admin.roles.index') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">Roles</span>
                        </a>
                    </li>
                    <li class="menu-item nav-all-permissions" aria-haspopup="true">
                        <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text">Permissions</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    @endcan

    @canany(["Manage Branches","Manage Service Provider","Manage Services","Manage Charges"])
    <li class="menu-item menu-item-submenu nav-settings" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <i class="menu-icon flaticon-settings"></i>
            <span class="menu-text">Settings</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                @can('Manage Audit Log')
                    <li class="menu-item nav-audits" aria-haspopup="true">
                        <a href="{{route('admin.system-audits.index')}}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                                <span></span>
                            </i>
                            <span class="menu-text"> Audits</span>
                        </a>
                    </li>
                @endcan
                @if(auth()->user()->is_super_admin)
                        <li class="menu-item nav-sys-parameter" aria-haspopup="true">
                            <a href="{{route('admin.sys-parameters.index')}}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"> Sys Parameters </span>
                            </a>
                        </li>
                    @endif
            </ul>
        </div>
    </li>
    @endcanany

</ul>

