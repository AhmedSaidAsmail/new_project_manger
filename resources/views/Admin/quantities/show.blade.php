@extends('Admin.Layouts.Master')
@section('container')
    <div class="row heading-bg arabic-fonts">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">
                <a href="{{route('projects.show',['id'=>$project->id])}}" class="btn btn-warning text-right">
                    {{$project->name}} <i class="fas fa-backward"></i>
                </a>
            </h5>
            <h5 class="txt-dark">
                <span>المستخلص رقم <span>{{$quantity->id}}</span></span>
            </h5>
        </div>
    </div>
    <div class="row arabic-fonts">
        <div class="panel">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td class="basic">اسم المالك</td>
                        <td>{{$quantity->owner->name}}</td>
                        <td class="basic">اسم المقاول</td>
                        <td>{{$quantity->contractor->name}}</td>
                        <td class="basic">اسم المشروع</td>
                        <td>{{$project->name}}</td>
                    </tr>
                </table>
                <div class="title">
                    <h2>تفاصيل المستخلص</h2>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <td class="basic">رقم المستخلص الجاري</td>
                        <td>{{$quantity->id}}</td>
                        <td class="basic">الفترة من</td>
                        <td>{{$quantity->date_from->format('Y-m-d')}}</td>
                        <td class="basic">الي</td>
                        <td>{{$quantity->date_to->format('Y-m-d')}}</td>
                    </tr>
                    <tr>
                        <td class="basic">مدة العقد</td>
                        <td>{{dateDiff($project->contract_starting,$project->contract_ending)->days}}</td>
                        <td class="basic">المدد الاضافية</td>
                        <td>{{$quantity->detail->extra_durations}}</td>
                        <td class="basic">تاريخ استلام الموقع</td>
                        <td>{{$quantity->detail->date_of_last_disbursement_to_contractor->format('Y-m-d')}}</td>
                    </tr>
                    <tr>
                        <td class="basic">تاريخ تقديم المستخلص للإستشاري</td>
                        <td>{{$quantity->detail->submission_date_to_consultant->format('Y-m-d')}}</td>
                        <td class="basic">تاريخ لرفع المستخلص للمالك</td>
                        <td>{{$quantity->detail->submission_date_to_owner->format('Y-m-d')}}</td>
                        <td class="basic">تاريخ اعتماد المالك</td>
                        <td>{{$quantity->detail->approval_date_to_owner->format('Y-m-d')}}</td>
                    </tr>
                    <tr>
                        <td class="basic">اجمالي المستخلصات التي لم يتم صرفها من المالك</td>
                        <td>{{$quantity->detail->total_abstracts_not_disbursed_by_the_owner}}</td>
                        <td class="basic">اجمالي المستخلصات المنصرفة</td>
                        <td>{{$quantity->detail->total_abstracts}}</td>
                        <td class="basic">التكلفة التعاقدية</td>
                        <td>{{$quantity->detail->contractual_cost}}</td>
                    </tr>
                    <tr>
                        <td class="basic">التكلفة بعد امر التغيير رقم (4)</td>
                        <td>{{$quantity->detail->cost_after_change_order_number_4}}</td>
                        <td class="basic" colspan="3">اجمالي قيمة امر التغيير رقم (4)</td>
                        <td>{{$quantity->detail->total_value_of_the_change_order_number_4}}</td>
                    </tr>
                    <tr>
                        <td class="basic">تكلفة المنفذ سابقا</td>
                        <td>{{$quantity->detail->previous_cost}}</td>
                        <td class="basic">تكلفة المنفذ حاليا</td>
                        <td>{{$quantity->detail->current_cost}}</td>
                        <td class="basic">اجمالي ماتم تنفيذه حتى تاريخ المستخلص</td>
                        <td>{{$quantity->detail->total_cost}}</td>
                    </tr>
                </table>
                <a href="{{route('quantity_items.create',['project_id'=>$project->id,'quantity_id'=>$quantity->id])}}"
                   class="btn btn-block btn-success">
                    <span>اضافة بند الي السمتخلص</span>
                </a>
                <div class="title">
                    <h2>بنود المستخلص</h2>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>وصـف البند</th>
                        <th>الكمية التعاقدية</th>
                        <th>الوحدة</th>
                        <th>السعر</th>
                        <th>إجمالي</th>
                        <th>الكمية الحالية</th>
                        <th>المنفذ سابقا</th>
                        <th>المنفذ الحالي</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quantity->items as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->contractual_quantity}}</td>
                            <td>{{$item->unit}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->current_quantity}}</td>
                            <td>{{$item->previous_done}}</td>
                            <td>{{$item->current_done}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('additional-css')
    <style>
        td.basic {
            /*font-weight: 700;*/
            /*font-size: 13px;*/
            color: #000000;
        }

        .title {
            text-align: center;
            background-color: #f39c12;
            margin-top: 15px;
        }

        .title > h2 {
            color: #ffffff;
            font-size: 16px;
        }
    </style>
@endsection