<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">            
                {{ config('app.name', 'Laravel') }}
                <!-- <img alt="Brand" src="/images/logo.png" width="30" height="30"> -->
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
            @unless (Auth::guest())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">生产管理(ManufatureManage)<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @can('menu_processinfo')
                            <li><a href="/ManufactureManage/Processinfos">工艺单资料(Process Info)</a></li>
                        @endcan
                        {{--<li><a href="/ManufactureManage/Outputheads">坯布生产数据(Production Data of GreyFabric )</a></li>--}}
                        {{--<li><a href="/ManufactureManage/Quantityreporthead">坯布质量数据(Quantity Data of GreyFabric)</a></li>--}}
                        @can('menu_outputquantity')
                            <li><a href="/ManufactureManage/Outputquantity">坯布生产质量数据(Production and Quantity Data of GreyFabric)</a></li>
                        @endcan
                        @can('menu_outputgreyfabric')
                            <li><a href="/ManufactureManage/Outputgreyfabric">坯布出货数据(Finishment Data of GreyFabric)</a></li>
                        @endcan
                        @can('menu_outputfinishfabric')
                            <li><a href="/ManufactureManage/Outputfinishfabric">成布生产质量数据(Production and Quantity Data of GreyFabric)</a></li>
                        @endcan
                        {{--@can('menu_firstffabric')--}}
                            {{--<li><a href="/ManufactureManage/Firstffabric">成布首落布数据(First Finishment Data of FinishFabric)</a></li>--}}
                        {{--@endcan--}}
                        {{--@can('menu_gradecffabric')--}}
                            {{--<li><a href="/ManufactureManage/Gradecffabric">成布C级布数据(Grade C Data of FinishFabric)</a></li>--}}
                        {{--@endcan--}}
                        @can('menu_report')
                            <li><a href="/ManufactureManage/Report">报表(Report)</a></li>
                        @endcan
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">系统(System)<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @can('module_system')
                        {{--<li><a href="/system/employees">员工</a></li>--}}
                        <li><a href="/system/users">用户管理(User Management)</a></li>
                        <li><a href="/ManufactureManage/DataSync">数据同步(Data Synchronization)</a></li>
                        @endcan
                        @if (Auth::user()->email === "admin@admin.com")
                            <li><a href="/system/reports">报表(Report)</a></li>
                        @endif
                         {{--<li><a href="/system/users/editpass">修改密码</a></li>--}}
                    </ul>
                </li>
            @endunless
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录(Login)</a></li>
                    <li><a href="{{ url('/register') }}">注册(Register)</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出登录(Quit)</a></li>
                            {{--<li>--}}
                                {{--{!! Form::open(['url' => '/logout']) !!}--}}
                                {{--{!! Form::submit('退出登录') !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</li>--}}
                            <li><a href="{{ url('/system/users/editpass') }}"><i class="fa fa-btn fa-sign-out"></i>修改密码(Change Password)</a></li>
                            @if (Auth::user()->email === "admin@admin.com")
                                <li><a href="{{ url('/changeuser') }}"><i class="fa fa-btn fa-sign-out"></i>切换用户(Change User)</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>