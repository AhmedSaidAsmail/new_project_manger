<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>report</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- osama edit -->
    <style>
        body {
            text-align: right;
        }

        * {
            box-sizing: border-box;
        }

        div {
            -webkit-print-color-adjust: exact;

        }

        .contains {
            width: 595px;
            background-color: #FFFFFF;
            margin: 0px auto;
            border: 1px solid #FFFFFF;
            padding: 5px;
        }

        .page {
            width: 100%;
            min-height: 942px;
            overflow: hidden;
            position: relative;
            margin: auto;

        }

        .bglogo {
            background: url('{{asset('images/icon-back.png')}}') no-repeat;
            background-size: 700px 960px;
            margin: auto;
        }

        .pageintron {
            width: 100%;
            min-height: 840px;
            overflow: hidden;
            position: relative;
        }

        .intro {
            background: url('{{asset('documents/projects/'.$project->image)}}') no-repeat left top;
            margin: auto;
            background-size: cover;
        }

        .intro-footer {
            position: absolute;
            bottom: 0px;
            background-color: #333333;
            width: 100%;
            text-align: left;
        }

        .intro-title {
            position: absolute;
            text-align: center;
            color: #FFFFFF;
            right: 10px;
            bottom: 230px;
        }

        .intro-decouration {
            position: absolute;
            bottom: 101px;
            width: 100%;
            text-align: left;
        }

        .intro-title span {
            display: block;
            font-size: 18px;
        }

        .intro-title h2 {
            margin: 10px 0px;
        }

        h1 {
            color: #dd858c;
            font-size: 18px;
            text-decoration: underline;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table.info {
            width: 100%;
            border-collapse: collapse;
            direction: rtl;

        }

        table.info td {
            border: 3px solid black;
            font-size: 16px;
            padding: 10px;
            width: 25%;
            height: 20px;

        }

        table.info td.special {
            background-color: #ECF2EF;
        }

        @media print {
            footer {
                position: fixed;
                bottom: 0;
            }

            .contains {
                width: 100%;
            }

            .pageintron {
                size: letter;
                width: 100%;
                min-height: 940px;
                overflow: hidden;
                position: relative;
            }

            .page {
                size: letter;
                width: 100%;
                min-height: 980px;
                overflow: hidden;
                position: relative;

            }

            .intro-title {
                position: absolute;
                text-align: center;
                color: #FFFFFF;
                right: 20px;
                bottom: 285px;
                font-size: 20px;
            }

            .bglogo {
                background: url('{{asset('images/icon-back.png')}}') no-repeat;
                background-size: 700px 975px;
                margin: auto;
            }

            .pagespiceal {
                size: letter;
                width: 100%;
                min-height: 2900px;
                overflow: hidden;
                position: relative;
            }

            .intro-title {
                background-color: #333333;
                -webkit-print-color-adjust: exact;
            }

            .print {
                display: none;
            }

        }

        table {
            max-width: 700px;

            border: 1px solid #000000;
            font-size: 16px;
            text-align: right;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #000000;

            text-align: right;
            padding: 2px;
            vertical-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-insider {
            text-align: right;
            width: 100%;
            direction: rtl;
            border-collapse: collapse;
            border: 1px solid #000000;
            font-size: 20px;
            margin-top: 20px;

        }

        .table-insider td.special {
            background-color: #ECF2EF;
        }

        .table-insider td {
            border: 1px solid #000000;
            padding: 5px 10px;
            height: 40px;
        }

        .img-container {
            width: 100%;
        }

        .img-container:after {
            display: block;
            clear: both;
            content: '';
        }

        .img-container img {
            width: 695px;
            height: 435px;

            display: inline;
        }

        .file-container {
            width: 100%;
        }

        .file-container:after {
            display: block;
            clear: both;
            content: '';
        }

        .file-container img {
            width: 100%;
            height: 100%;
            max-height: 900px;
            float: none;
            /*margin: auto;*/
            display: inline;
        }

        .additional-insider {
            direction: rtl;
        }

        .additional-insider-1 {

        }
    </style>
</head>
<body>
<button class="print" type="button" onclick="window.print();">
    Print PDF
</button>

<div class="contains" id="printPdf">
    <div class="pageintron intro">
        <div class="intro-decouration">
            <div class="intro-decouration-img">
                <div class="intro-title">
                    <h2>مشروع: {{$project->name}}</h2>
                    <span>التقرير الاسبوعي</span>
                    <span>من {{$report->starting_date}} الي {{$report->ending_date}}</span>
                </div>
                <img src="{{asset('images/intro_decouration.png')}}" style="width: 100%;">
            </div>

        </div>
        <div class="intro-footer">
            <div class="logo-footer">
                <img src="{{asset('images/logo-complete.png')}}" style="width: 100%;">
            </div>
        </div>

    </div>

    <div class="page bglogo">
        <h1>:. اولا التعريف بالمشروع</h1>
        <table class="info" border="1">
            <tr>
                <td class="special">اسم المشروع</td>
                <td>{{$project->name}}</td>
                <td class="special">رقم المنافسة</td>
                <td></td>
            </tr>
            <tr>
                <td class="special">اسم المالك</td>
                <td>{{$project->owner->name}}</td>
                <td class="special">اسم المقاول</td>
                <td>{{$project->contractor->name}}</td>
            </tr>
            <tr>
                <td class="special">قيمة عقد المشروع بعد اوامر الغيير</td>
                <td>{{number_format($project->contract_value, 2)}} ريال</td>
                <td class="special">موقع المشروع</td>
                <td>{{$project->city}}</td>
            </tr>
            <tr>
                <td class="special">تاريخ تسليم الموقع</td>
                <td>{{$project->contract_ending}}</td>
                <td class="special">تاريخ بداية العقد</td>
                <td>{{$project->contract_starting}}</td>
            </tr>
            <tr>
                <td class="special">مدة العقد</td>
                <td>{{dateDiff($project->contract_starting,$project->contract_ending)->days}} يوم</td>
                <td class="special">المدة المنقضية</td>
                <td>{{dateDiff($project->contract_starting,date('Y-m-d'))->days}} يوم</td>
            </tr>
            <tr>
                <td class="special">نسبة الانجاز المالية</td>
                <td>{{$report->financial_achievement_ratio}}%</td>
                <td class="special">نسبة الانجاز الفعلية</td>
                <td>{{$report->actual_completion_rate}}%</td>
            </tr>
            <tr>
                <td class="special">عدد المباني</td>
                <td>{{$report->project->quantity->buildings_num}}</td>
                <td class="special">نسبة الانجازالمطلوبه</td>
                <td>{{$report->percentage_achievement_required}}%</td>
            </tr>
            <tr>
                <td class="special">نطاق الاعمال</td>
                <td colspan="3" class="special">{{$project->description}}</td>
            </tr>
        </table>


        {{--<table class="table-insider">--}}
        {{--<tr>--}}
        {{--<td class="special">البند</td>--}}
        {{--<td class="special">الوصف</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>الموقع</td>--}}
        {{--<td>{{$report->project->city}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>عدد المبانى</td>--}}
        {{--<td></td>--}}
        {{--</tr>--}}


        {{--</table>--}}
        @if(count($report->project->consultantEngineers)>0)

            <h1>الهيكل التنظيمي لجهاز الاشراف</h1>
            <table class="table-insider">
                <tr>
                    <td class="special">الاسم</td>
                    <td class="special">المهنة</td>
                </tr>
                @foreach($report->project->consultantEngineers as $consultantEngineer)
                    <tr>
                        <td>{{$consultantEngineer->engineer->name}}</td>
                        <td>{{Lang::get('terms.'.$consultantEngineer->consultant_engineer_position)}}</td>
                    </tr>

                @endforeach

            </table>
        @endif
    </div>
    @if(count($report->contractorTeam)>0)
        <div class="page bglogo">
            <h1>الهيكل التنظيمي لجهاز المقاول</h1>
            <table class="table-insider">
                <tr>
                    <td class="special">المهنة</td>
                    <td class="special">العدد</td>
                    <td class="special">الاسم</td>
                </tr>
                @foreach($report->contractorTeam as $contractorTeam)
                    <tr>
                        <td>{{$contractorTeam->position}}</td>
                        <td>{{$contractorTeam->number}}</td>
                        <td>{{$contractorTeam->name}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    @endif
    @if(count($report->tools)>0)
        <div class="page bglogo">
            <h1>معدات المقاول وأدوات بالموقع </h1>
            <table class="table-insider">
                <tr>
                    <td class="special">المعدة</td>
                    <td class="special">العدد</td>
                    <td class="special">ملاحظات</td>
                </tr>
                @foreach($report->tools as $tool)
                    <tr>
                        <td>{{$tool->tool}}</td>
                        <td>{{$tool->number}}</td>
                        <td>{{$tool->note}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
    @if(isset($report->schedule))
        <div class="page">
            <h1>البرنامج الزمنى</h1>

            <div class="additional-insider">
                <img src="{{asset('documents/projects/w_report/'.$report->schedule)}}"
                     style="width: 100%; height: 100%">
            </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->report_status ) )
        <div class="page bglogo">
            <h1>بيان الحالة</h1>

            <div class="additional-insider">
                {!! $report->additionalInfo->report_status !!}
            </div>
        </div>
        <div class="page bglogo">
            @endif
            @if(isset($report->additionalInfo->working_rate))
                <h1>معدل سير العمل</h1>

                <div class="additional-insider">
                    {!! $report->additionalInfo->working_rate !!}
                </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->completion_Schedule))
        <div class="page bglogo">
            <h1>جدول نسب الانجاز</h1>

            <div class="additional-insider" style="direction: rtl;">
                {!! $report->additionalInfo->completion_Schedule !!}
            </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->done_working))
        <div class="pagespiceal">
            <h1>بيان الاعمال المنفذه بالمشروع </h1>

            <div class="additional-insider-1">
                {!! $report->additionalInfo->done_working !!}
            </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->working_next_month))
        <div class="page bglogo">
            <h1>وصف الاعمال المتوقع انجازها خلال الشهر القادم </h1>

            <div class="additional-insider">
                {!! $report->additionalInfo->working_next_month !!}
            </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->consultant_note))
        <div class="page">
            <h1>ملاحظات الاستشارى على الاعمال بالموقع </h1>

            <div class="additional-insider">
                {!! $report->additionalInfo->consultant_note !!}
            </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->contractor_required))
        <div class="page bglogo">
            <h1>المطلوب من المقاول </h1>

            <div class="additional-insider">
                {!! $report->additionalInfo->contractor_required !!}
            </div>
        </div>
    @endif
    @if(isset($report->additionalInfo->owner_required))
        <div class="page bglogo">
            <h1>الالمطلوب من المالك </h1>

            <div class="additional-insider">
                {!! $report->additionalInfo->owner_required !!}
            </div>
        </div>
    @endif
    @if(count($report->tests)>0)
        <div class="page">
            <h1>نتائج الاختبارات </h1>

            <div class="additional-insider">
                @foreach($report->tests->chunk(2) as $chunk)
                    <div class="file-container">
                        @foreach($chunk as $test)
                            <img src="{{asset('documents/projects/tests/'.$test->test->document)}}">
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    @if(count($report->requests)>0 || count($report->submittals)>0)
        <div class="page">
            <h1>المخاطبات ومحاضر الاجتماعات </h1>
            <div class="additional-insider">


                @foreach($report->requests->chunk(2) as $chunk)

                    <div class="file-container">

                        @foreach($chunk as $requests)
                            <img src="{{asset('documents/projects/requests/'.$requests->request->document)}}">
                            <h1></h1>
                        @endforeach
                    </div>
                @endforeach

                @foreach($report->submittals->chunk(2) as $chunk)
                    <div class="file-container">

                        @foreach($chunk as $submittals)
                            <h1></h1>
                            <img src="{{asset('documents/projects/submittals/'.$submittals->submittal->document)}}">

                        @endforeach
                    </div>
                @endforeach

            </div>

        </div>
        </br>
    @endif
    @if(count($report->files)>0)
        <div class="page">
            <h1>الصور الفوتوغرافيه</h1>
            <div class="additional-insider">
                @foreach($report->files->chunk(2) as $chunk)
                    <div class="img-container">
                        @foreach($chunk as $file)
                            <div>
                                <img src="{{asset('documents/projects/files/'.$file->file->document)}}"> <span
                                        style="display: block; text-align: center; font-weight: bold;">{{$file->file->description}}</span>
                            </div>
                            </br>
                        @endforeach
                    </div>
                    @endforeach
                    </br>
                    <div style="height: 5px"></div>
            </div>
        </div>
        </br>
    @endif
    @if(!is_null($report->additionalInfo))
        <div class="page bglogo">
            <h1>توصيات الاستشاري </h1>
            <div class="additional-insider">
                <span style="display: block; text-align: right; font-size:16px;"> {!! $report->additionalInfo->consultant_recommendations !!} </span>
            </div>


            <div class="additional-insider">
                <span style="font-weight: bold; text-align: right;">{!! $report->text !!}</span>
                <span style="font-weight: bold; text-align:left ; margin-left: 0px;">مدير المشروع </span>

            </div>
        </div>
    @endif
</div>
</div>

</body>
</html>