<div class="tab-struct custom-tab-1 mt-40">
    <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
        <li class="active" role="presentation">
            <a aria-expanded="true" data-toggle="tab" role="tab" id="project_data"
               href="#project_data_show">
                <span>معلومات المشروع</span>
            </a>
        </li>
        <li role="presentation" class="">
            <a data-toggle="tab" id="" role="tab" href="#time_table_tab" aria-expanded="false">
                <span>الجدول الزمني</span>
            </a>
        </li>
        <li role="presentation" class="">
            <a data-toggle="tab" id="" role="tab" href="#Submetal_tab" aria-expanded="false">
                <span>الاعتمادات</span>
            </a>
        </li>
        <li role="presentation" class="">
            <a data-toggle="tab" id="" role="tab" href="#Reqest_tab" aria-expanded="false">
                <span>الريكويستات</span>
            </a>
        </li>
        <li role="presentation" class="">
            <a data-toggle="tab" id="" role="tab" href="#letters_tab" aria-expanded="false">
                <span>الخطابات</span>
            </a>
        </li>
        <li role="presentation" class="">
            <a data-toggle="tab" id="" role="tab" href="#quntty_tab" aria-expanded="false">
                <span>الكميات</span>
            </a>
        </li>
        <li class="dropdown" role="presentation">
            <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_7" href="#"
               aria-expanded="false">
                <span>مكتبه المشروع</span>
                <span class="caret"></span>
            </a>
            <ul id="myTabDrop_7_contents" class="dropdown-menu">
                <li class="">
                    <a data-toggle="tab" id="dropdown_13_tab" role="tab"
                       href="#medialaibary_tab" aria-expanded="false">
                        <span>الملفات و الفيديوهات و الصور</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown" role="presentation">
            <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_7" href="#"
               aria-expanded="false">
                <span>المخططات</span>
                <span class="caret"></span>
            </a>
            <ul id="myTabDrop_7_contents" class="dropdown-menu">
                <li class="">
                    <a data-toggle="tab" id="dropdown_13_tab" role="tab" href="#planning_tab"
                       aria-expanded="false">
                        <span>مخطططات التندر</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab" href="#shopdrowing_tab"
                       aria-expanded="false">
                        <span>مخططات رسومات الورشه</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab" href="#as_bulit_tab"
                       aria-expanded="false">
                        <span>مخططات اذ بيلت</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown" role="presentation">
            <a data-toggle="dropdown" class="dropdown-toggle" id="" href="#"
               aria-expanded="false">
                <span>اعمال المشروع</span>
                <span class="caret"></span>
            </a>
            <ul id="myTabDrop_7_contents" class="dropdown-menu">
                <li class="">
                    <a data-toggle="tab" id="dropdown_13_tab" role="tab" href="#Labor_tab"
                       aria-expanded="false">
                        <span>العماله - والمعدات</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab"
                       href="#papers_entry_tab" aria-expanded="false">
                        <span>الاوراق</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab"
                       href="#change_order_entry_tab" aria-expanded="false">
                        <span>اوامر التغيير</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab"
                       href="#medialaibary_tab" aria-expanded="false">
                        <span>مكتبه المشروع</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab"
                       href="#tests_tab" aria-expanded="false">
                        <span>الاختبارات</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown" role="presentation">
            <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_7"
               href="#" aria-expanded="false">
                <span>التقارير</span>
                <span class="caret"></span>
            </a>
            <ul id="myTabDrop_7_contents" class="dropdown-menu">
                <li class="">
                    <a data-toggle="tab" id="dropdown_13_tab" role="tab" href="#dropdown_13"
                       aria-expanded="true">
                        <span>اسبوعى</span>
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" id="dropdown_14_tab" role="tab" href="#dropdown_14"
                       aria-expanded="false">
                        <span>شهرى</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent_7">
        {{-- Prject Information --}}
        @include('Admin.Layouts.projectInformation')
        {{-- Prject Information --}}
        {{-- Timetable --}}
        {{-- Schedule --}}
        @include('Admin.Layouts._schedules')
        {{-- Schedule --}}
        {{-- Timetable --}}
        {{-- Submittals  --}}
        @include('Admin.Layouts.projectSubmittals')
        {{-- Submittals  --}}
        {{-- Requests --}}
        @include('Admin.Layouts.projectRequests')
        {{-- Requests --}}
        {{-- Letters --}}
        @include('Admin.Layouts.projectLetters')
        {{-- Letters --}}
        {{-- Qunatities --}}
        <div id="quntty_tab" class="tab-pane fade" role="tabpanel">
            <p>الكميات لاحقا في اصدار اخر</p>
        </div>
        {{-- Qunatities --}}
        {{-- Tender Drawing --}}
        @include('Admin.Layouts.projectTenderDrawing')
        {{-- Tender Drawing --}}
        {{-- Shop Drawings --}}
        @include('Admin.Layouts.projectShopDrawings')
        {{-- Shop Drawings --}}
        {{-- Cordnation Drawings --}}
        @include('Admin.Layouts.projectCordnationDrawings')
        {{-- Cordnation Drawings --}}
        {{--  العمالة و المعدات --}}
        <div id="Labor_tab" class="tab-pane fade" role="tabpanel">
            <p>لعماله - والمعدات</p>
        </div>
        {{--  العمالة و المعدات --}}
        {{-- الاوراق --}}
        <div id="papers_entry_tab" class="tab-pane fade" role="tabpanel">
            <p>الاوراق</p>
        </div>
        {{-- الاوراق --}}
        {{-- Tests --}}
        @include('Admin.Layouts.projectTests')
        {{-- Tests --}}
        {{-- Change Orders --}}
        @include('Admin.Layouts.changeOrders')
        {{-- Change Orders --}}
        {{-- Files --}}
        @include('Admin.Layouts.projectFiles')
        {{-- Files --}}
        {{-- Not Used --}}
        <div id="empty" class="tab-pane fade" role="tabpanel">
            <p>فاضي</p>
        </div>
        <div id="empty" class="tab-pane fade" role="tabpanel">
            <p>فاضي</p>
        </div>
        <div id="empty" class="tab-pane fade" role="tabpanel">
            <p>فاضي</p>
        </div>
        <div id="empty" class="tab-pane fade" role="tabpanel">
            <p>فاضي</p>
        </div>
        {{-- Not Used --}}
        {{-- Weekly Report --}}
        @include('Admin.Layouts.projectWeeklyReport')
        {{-- Weekly Report --}}
        {{-- Monthly Report --}}
        @include('Admin.Layouts.projectMonthlyReport')
        {{-- Monthly Report --}}
    </div>
</div>