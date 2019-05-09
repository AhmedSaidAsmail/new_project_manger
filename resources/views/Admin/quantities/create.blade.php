@extends('Admin.Layouts.Master')
@section('container')
    <div class="row heading-bg arabic-fonts">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">
                {{$project->name}}
            </h5>
            <h5 class="txt-dark">
                <span>انشاء مستخلص جديد</span>
            </h5>
        </div>
    </div>
    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row arabic-fonts">
        <div class="panel">
            <div class="panel-heading">
                <span>مدخلات المستخلص</span>
            </div>
            <div class="panel-body">
                <form method="post" action="{{route('quantity.store',['project_id'=>$project->id])}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label mb-5">المقاول</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <select name="contractor_id" class="form-control">
                                    <option value="">اختار مقاول</option>
                                    @foreach($contractors as $contractor)
                                        <option value="{{$contractor->id}}">{{$contractor->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label mb-5">مالك المشروع</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <select name="owner_id" class="form-control">
                                    <option value="">اختار مالك</option>
                                    @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-5">تاريخ البداية</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-calendar-times"></i>
                                    </span>
                                    <input type="text" name="date_from" class="form-control" placeholder=""
                                           data-mask="9999-99-99">
                                </div>
                                <span class="text-muted">yyyy-mm-dd</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-5">تاريخ النهاية</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fas fa-calendar-times"></i>
                                </span>
                                    <input type="text" name="date_to" class="form-control" placeholder=""
                                           data-mask="9999-99-99">
                                </div>
                                <span class="text-muted">yyyy-mm-dd</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">المدد الإضافية</label>
                                <input class="form-control" name="details[extra_durations]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5"> المستخلصات التي لم يتم صرفها من المالك</label>
                                <input class="form-control" name="details[total_abstracts_not_disbursed_by_the_owner]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">اجمالي المستخلصات المنصرفة</label>
                                <input class="form-control" name="details[total_abstracts]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">التكلفة التعاقدية</label>
                                <input class="form-control" name="details[contractual_cost]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">تااريخ صرف أخر مستخلص للمقاول</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-calendar-times"></i>
                                    </span>
                                    <input type="text" name="details[date_of_last_disbursement_to_contractor]"
                                           class="form-control" placeholder=""
                                           data-mask="9999-99-99">
                                </div>
                                <span class="text-muted">yyyy-mm-dd</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">تاريخ تقديم المستخلص للإستشاري</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-calendar-times"></i>
                                    </span>
                                    <input type="text" name="details[submission_date_to_consultant]"
                                           class="form-control"
                                           placeholder=""
                                           data-mask="9999-99-99">
                                </div>
                                <span class="text-muted">yyyy-mm-dd</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">تاريخ لرفع المستخلص للمالك</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-calendar-times"></i>
                                    </span>
                                    <input type="text" name="details[submission_date_to_owner]" class="form-control"
                                           placeholder=""
                                           data-mask="9999-99-99">
                                </div>
                                <span class="text-muted">yyyy-mm-dd</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label mb-5">تاريخ اعتماد المالك</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-calendar-times"></i>
                                    </span>
                                    <input type="text" name="details[approval_date_to_owner]" class="form-control"
                                           placeholder=""
                                           data-mask="9999-99-99">
                                </div>
                                <span class="text-muted">yyyy-mm-dd</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-5">التكلفة بعد امر التغيير رقم (4)</label>
                                <input class="form-control" name="details[cost_after_change_order_number_4]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-5">اجمالي قيمة امر التغيير رقم (4)</label>
                                <input class="form-control" name="details[total_value_of_the_change_order_number_4]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-5">تكلفة المنفذ سابقا</label>
                                <input class="form-control" name="details[previous_cost]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-5">تكلفة المنفذ حاليا</label>
                                <input class="form-control" name="details[current_cost]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-5">اجمالي ماتم تنفيذه حتى تاريخ المستخلص</label>
                                <input class="form-control" name="details[total_cost]">
                            </div>
                        </div>
                    </div>
                    <div class="section-sep">
                        <h3>الملحقات</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>حصر الأعمال الإنشائية</label>
                                <input type="file" class="form-control"
                                       name="attachment[inventory_of_construction_works]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>حصر الأعمال المعمارية</label>
                                <input type="file" class="form-control"
                                       name="attachment[inventory_of_architectural_works]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>حصر الأعمال الميكانيكية</label>
                                <input type="file" class="form-control"
                                       name="attachment[inventory_of_mechanical_works]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>حصر الأعمال الكهربائية</label>
                                <input type="file" class="form-control"
                                       name="attachment[inventory_of_electrical_works]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شهادة تصنيف المقاولين</label>
                                <input type="file" class="form-control"
                                       name="attachment[contractors_classification_certificate]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شهادة انتساب العام المالي</label>
                                <input type="file" class="form-control"
                                       name="attachment[certificate_of_enrollment_of_the_financial_year]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شهادة تسجيل الشركة</label>
                                <input type="file" class="form-control"
                                       name="attachment[company_registration_certificate]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شهادة الزكاة والدخل</label>
                                <input type="file" class="form-control"
                                       name="attachment[certificate_of_zakat_and_income]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شهادة التأمينات</label>
                                <input type="file" class="form-control" name="attachment[insurance_certificate]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>عقد الإنشاء</label>
                                <input type="file" class="form-control" name="attachment[construction_contract]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>محضر استلام الموقع</label>
                                <input type="file" class="form-control" name="attachment[receipt_of_the_site]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>بطاقة الإرتباط</label>
                                <input type="file" class="form-control" name="attachment[link_card]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>نموذج تحويل</label>
                                <input type="file" class="form-control" name="attachment[conversion_model]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>حسومات الديوان</label>
                                <input type="file" class="form-control" name="attachment[diwan_discounts]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>خطاب المقاول</label>
                                <input type="file" class="form-control" name="attachment[contractor_letter]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>خلاصة المستخلص</label>
                                <input type="file" class="form-control" name="attachment[summary]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>خطاب الإستشاري</label>
                                <input type="file" class="form-control" name="attachment[consultant_letter]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>مسير الرواتب للمقاول</label>
                                <input type="file" class="form-control" name="attachment[payroll_for_contractor]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <input type="file" class="form-control" name="attachment[notes]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>معوقات</label>
                                <input type="file" class="form-control" name="attachment[constraints]">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-block btn-success">اضافة</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('additional-js')
    <script src="{{asset('template/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js')}}"></script>
@endsection