@extends('Engineer.Layouts.Master')
@section('container')
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark arabic-fonts">عرض المشاريع</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 top-directory">
            <ul class="list-inline arabic-fonts">
                <li class="active"><span>المشروعات</span></li>
                <li><a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i> اعدادات</span></a></li>
                <li><a href="{{route('admin.welcome')}}">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i> صفحة البداية</a></li>
            </ul>
        </div>
        <!-- /Breadcrumb -->
    </div>
    @if(session('success'))
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <p>{{session('success')}}</p>
        </div>
    @endif
    @if(session('fail'))
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

            <p>{{session('fail')}}</p>
        </div>
    @endif
    <div class="row arabic-fonts">
        <div class="col-lg-12 col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark h1">{{$project->name}}</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <p class="text-muted">بدايه المشروع
                            :<code>{{date('d-m-Y',strtotime($project->created_at))}}</code>

                        <p>{{$project->description}}</p>
                        @include('layouts._project-panel')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Ajax Result Container--}}
    <div class="project-edit-container">
        <div class="project-edit">
            {{-- Ajax Result--}}
        </div>
    </div>
    {{-- Ajax Result Container--}}
@endsection
@section('additional-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css" rel="stylesheet">
@endsection
@section('additional-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        $(function () {
            $("a.ajax-data").click(function (event) {
                event.preventDefault();
                var url = $(this).attr('href');
                var displayDiv = $("div" + $(this).attr('data-display'));
                displayDiv.empty();
                $.ajax({
                    url: url,
                    type: "get",
                    success: function (response) {
                        displayDiv.html(response);
                    }
                });
            });

            $("form#ajax-data").submit(function (event) {
                event.preventDefault();
                var url = $(this).attr('action');
                var displayDiv = $("div" + $(this).attr('data-display'));
                var formData = $(this).serialize();
                displayDiv.empty();
                $.ajax({
                    url: url,
                    type: "get",
                    data: formData,
                    success: function (response) {
                        displayDiv.html(response);
                    }
                });
            });


        });
    </script>
    <script>
        $(function () {
            getTestSort();

            function getTestSort() {
                $("select#test_sort").change(function () {
                    var val = $(this).val();
                    var relatedSelect = $("select#related_sort");
                    var url = relatedSelect.attr('data-ajax--url');
                    $.ajax({
                        url: url,
                        type: "get",
                        data: {related_to: val},
                        success: function (response) {
                            relatedSelect.html(response);
                        }
                    });
                });
            }

            $("a#project-item-edit").click(function (event) {
                event.preventDefault();
                var container = $(".project-edit-container");
                var itemContainer = container.find('.project-edit');
                var link = $(this).attr('href');
                container.fadeIn();
                $('html, body').css({
                    overflow: 'hidden',
                    height: '100%'
                });
                $.ajax({
                    type: "get",
                    url: link,
                    success: function (respons) {
                        itemContainer.html(respons);
                        getTestSort();
                    }
                });
            });
            $('.project-edit-container').click(function (e) {

                if (!$(e.target).closest('.project-edit').length) {
                    if ($(this).is(":visible")) {
                        $(this).fadeOut();
                    }
                }
            });
        });
        $("#watchNow").click(function (event) {
            event.preventDefault();

        });
    </script>
@endsection