<div id="quntty_tab" class="tab-pane fade" role="tabpanel">
    <a href="{{route('quantity.create',['project_id'=>$project->id])}}" class="btn btn-block btn-success">
        اضافة مستخلص جديد
    </a>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <td>رقم المستخلص</td>
                <td>المالك</td>
                <td>المقاول</td>
                <td>الفترة من</td>
                <td>الفترة الي</td>
                <td>#</td>
            </tr>
            </thead>
            <tbody>
            @foreach($project->quantities as $quantity)
                <tr>
                    <td>{{$quantity->id}}</td>
                    <td>{{$quantity->owner->name}}</td>
                    <td>{{$quantity->contractor->name}}</td>
                    <td>{{$quantity->date_from->format('D d-M y')}}</td>
                    <td>{{$quantity->date_to->format('D d-M y')}}</td>
                    <td>
                        <a href="{{route('quantity.show',['project_id'=>$project->id,'id'=>$quantity->id])}}"
                           class="btn btn-primary">
                            <i class="fas fa-share-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>