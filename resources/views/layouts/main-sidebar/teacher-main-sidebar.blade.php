<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>

        <!-- الطلاب-->
        <li>
            <a href="{{route('attendance.index')}}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">الطلاب</span></a>
        </li>


        <!-- الامتحانات-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">الامتحانات</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
                    <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{route('quizzes.index')}}">قائمة الامتحانات</a></li>
                    </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu1">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">التقارير</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu1" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('attendance_report')}}">تقرير الحضور والغياب</a></li>
                <li><a href="#">تقرير الامتحانات</a></li>
            </ul>

        </li>

            <!-- Onlinec lasses-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                    <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{route('OnlineZoom.index')}}">الاتصال مباشر مع زوم</a> </li>
                    {{-- <li> <a href="{{ route('OnlineZoom.index') }}">الاتصال الغير مباشر مع زوم</a> </li> --}}

                </ul>
            </li>

        <!-- الملف الشخصي-->
        <li>
            <a href="{{route('settings.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">الملف الشخصي</span></a>
        </li>

    </ul>
</div>
