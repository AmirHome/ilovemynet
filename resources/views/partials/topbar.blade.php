<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-header-inner">
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand">
                <i class="fa fa-home" aria-hidden="true"></i> Home Page
                </a>
            </div>
            <a href="javascript:;"
               class="menu-toggler responsive-toggler"
               data-toggle="collapse"
               data-target=".navbar-collapse">
            </a>

            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>