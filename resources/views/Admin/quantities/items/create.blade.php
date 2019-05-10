@extends('Admin.Layouts.Master')
@section('container')
    <div class="row heading-bg arabic-fonts">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">
                {{$project->name}}
            </h5>
            <h5 class="txt-dark">
                <span>مستخلص رقم {{$quantity->id}}</span>
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
                <span>بنود المستخلص</span>
            </div>
            <div class="panel-body">
                <form method="post"
                      action="{{route('quantity_items.store',['project_id'=>$project->id,'quantity_id'=>$quantity->id])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="quantity_id" value="{{$quantity->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label mb-10">تصنيف البد</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <select class="form-control" name="sort">
                                        <option value="">== اختر تصنيف ==</option>
                                        <option value="structural">انشائي</option>
                                        <option value="architectural">معماري</option>
                                        <option value="electrically">كهرباء</option>
                                        <option value="mechanics">ميكانيكا</option>
                                        <option value="general">موقع عام</option>
                                        <option value="other">اخري</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وصـف البند</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <textarea class="form-control" name="name"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">الكمية التعاقدية</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <input class="form-control" name="contractual_quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">الوحدة</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <input class="form-control" name="unit">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">السعر</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <input class="form-control" name="price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">الكمية الحالية</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <input class="form-control" name="current_quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">المنفذ سابقا</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <input class="form-control" name="previous_done">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">المنفذ الحالي</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#BDBDBD;">
                                        <i class="icon-user"></i>
                                    </div>
                                    <input class="form-control" name="current_done">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-block">اضافة بند</button>
                </form>
            </div>
        </div>
    </div>
@endsection