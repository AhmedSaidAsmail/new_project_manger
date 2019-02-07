<form action="{{route('shops-drawings.update',['id'=>$drawing->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="project_id" value="{{$drawing->project_id}}">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    <div class="form-group">
        <label class="control-label mb-10" for="">نوع المخطط</label>

        <div class="input-group">
            <div class="input-group-addon" style="background-color:#BDBDBD;"><i class="icon-user"></i></div>
            <select name="sort" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                <option value="">== اختر تصنيف ==</option>
                <option value="structural"{!! $drawing->sort=="structural"?" selected":null !!}>انشائي</option>
                <option value="architectural"{!! $drawing->sort=="architectural"?" selected":null !!}>معماري</option>
                <option value="electrically"{!! $drawing->sort=="electrically"?" selected":null !!}>كهرباء</option>
                <option value="mechanics"{!! $drawing->sort=="mechanics"?" selected":null !!}>ميكانيكا</option>
                <option value="general"{!! $drawing->sort=="general"?" selected":null !!}>موقع عام</option>
                <option value="other"{!! $drawing->sort=="other"?" selected":null !!}>اخري</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="message-text" class="control-label mb-10">التاريخ</label>
        <input name="date" type="date" value="{{$drawing->date}}" class="form-control" id="description">
    </div>
    <div class="form-group">
        <label for="message-text" class="control-label mb-10">الوصف</label>
        <input name="description" type="text" value="{{$drawing->description}}" class="form-control" id="description">
    </div>
    <div class="form-group">
        <div class="fileupload btn btn-danger btn-rounded btn-anim btn-block"><i class="fa fa-upload"></i><span class="btn-text">Upload</span>
            <input name="document" class="upload" type="file" multiple>
        </div>
    </div>
    <div class="form-group">
        <div class="modal-footer">
            <input type="submit" value="حفظ" class="btn btn-success btn-rounded btn-block">
        </div>
    </div>
</form>