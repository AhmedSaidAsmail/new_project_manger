@include('Admin.Layouts._schedule_row')
@section('additional-css')
    @parent
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700" rel="stylesheet">
    <link href="{{asset('date_picker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <style>

        label.en-label {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
        }

        .scroll-table {
            width: 98%;
            margin: 0 auto;
            overflow-x: scroll;
        }

        .scroll-table > table.table {
            width: 150%;
            max-width: 200%;
        }

        td.en-label {
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            direction: ltr;
        }

        .table.sp-table > tbody > tr > td {
            padding: 5px;
        }

        table.sp-table {
            border: 1px solid #eeeeee;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 60px;
        }

        table.sp-table td {
            border: 1px solid #eeeeee;
        }

        td.update-on_click > span {

        }

        td.update-on_click > input {
            display: inline-block;
            width: 90px;
            text-align: center;
            border: none;
        }

        td.update-on-change {
            padding: 0;
        }

        td.update-on-change > select {
            border: none;
            margin: 0;
        }

        td.update-on-change > input {
            border: none;
        }

        div.input-container {
            display: inline-block;
            background-color: #0b97c4;
        }

        div.input-container > input {
            border: none;
            text-align: center;
        }

        select.ajax-selection {
            border: none;
        }
    </style>
@endsection
@section('additional-js')
    @parent
    <script src="{{asset('date_picker/js/datepicker.min.js')}}"></script>
    <script src="{{asset('date_picker/js/i18n/datepicker.en.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
    <script>
        function select2PlugIn() {
            $(".select2-single").select2({
                theme: "bootstrap",
                placeholder: "Select a State",
                maximumSelectionSize: 6,
                containerCssClass: ':all:'
            });
        }

        select2PlugIn();

        function updateRows() {
            // Data Picker Inputs
            $('input#date_picker').datepicker({
                language: 'en',
                startDate: new Date(),
                dateFormat: 'yyyy-mm-dd',
                autoClose: true,
                onSelect: function (data) {
                    $("table.table").attr('data-ready-to-update', 'true');

                }
            });
            // Remove disabled attr from specified inputs
            $("td.update-on_click").dblclick(function () {
                var input = $(this).find('input');
                if (!input.is(":disabled")) {
                    input.prop('disabled', true);
                    return true;
                }
                input.prop('disabled', false);
            });
            $("div.input-container").dblclick(function () {
                var input = $(this).find('input');
                if (!input.is(":disabled")) {
                    input.prop('disabled', true);
                    return true;
                }
                input.prop('disabled', false);
            });
            // Update rows cross Ajax
            $("td.update-on_click").focusout(function () {
                var ready = $("table.table").attr('data-ready-to-update');
                if (ready === "true") {
                    var element = $(this).find('input');
                    ajaxUpdate(element);
                }

            });
            $("select.ajax-selection").change(function () {
                ajaxUpdate($(this));
            });
            $("input.ajax-input").focusout(function () {
                ajaxUpdate($(this));
            });

            function ajaxUpdate(element) {
                var value = element.val();
                var attribute = element.attr('name');
                var link = element.closest('tr').attr('data-ajax--url');
                var token = element.closest('tr').attr('data-tokens');
                var project_id = element.closest('tr').attr('data-project-id');
                var container = element.closest('tbody');
                $.ajax({
                    url: link,
                    type: 'post',
                    data: {
                        project_id: project_id,
                        attribute: attribute,
                        value: value,
                        _token: token,
                        _method: "PUT"
                    },
                    success: function (response) {
                        container.html(response);
                        updateRows();
                        select2PlugIn();
                        $("table.table").attr('data-ready-to-update', 'false');
                    }

                });
            }
        }

        updateRows();
        $(function () {
//            $('#date_picker').data('datepicker');


        });
    </script>
@endsection