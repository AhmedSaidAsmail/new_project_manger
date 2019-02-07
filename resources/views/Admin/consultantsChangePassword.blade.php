@extends('Admin.Layouts.Master')
@section('container')
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark arabic-fonts">تعيين كلمة سر جديدة</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 top-directory">
            <ul class="list-inline arabic-fonts">
                <li class="active"><span>الاستشاريين</span></li>
                <li><a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i> اعدادات</span></a></li>
                <li><a href="{{route('admin.welcome')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> صفحة
                        البداية</a></li>
            </ul>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <div class="row arabic-fonts">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">اضافة استشاري</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form method="post" action="{{route('consultants.password',['id'=>$consultant->id])}}">
                                <input type="hidden" name="_method" value="PUT">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{!! $errors->has('password')?" has-error":null !!}">
                                            <label class="control-label mb-10 text-left">الرقم السري</label>
                                            <input class="form-control" name="password" type="password">
                                            @if($errors->has('password'))
                                                <span class="help-block">
                                            <strong class="text-danger">{{$errors->first('password')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">تاكيد الرقم السري</label>
                                            <input class="form-control" name="password_confirmation" type="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-key"></i>
                                        تعديل كلمة السر
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection