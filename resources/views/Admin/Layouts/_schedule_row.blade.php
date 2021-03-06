@foreach($timeLines as $timeLine)
    <tr>
        <td colspan="15" style="background-color: {{$colors['color']}}; color: #ffffff;">
            {!! $timeLine->getModel()->nameWithAllParents(' <i class="fas fa-angle-left"></i> ') !!}
        </td>
    </tr>
    @foreach($timeLine->schedules as $schedule)
        <tr data-ajax--url="{{route('schedulesNew.update',['schedule'=>$schedule->id])}}"
            data-tokens="{{csrf_token()}}" data-project-id="{{$project->id}}">
            <?php
            $resolver = new \App\Http\Controllers\Admin\ScheduleResolver($schedule);
            $planed_st_date = isset($schedule->planed_starting_date)
                ? \Carbon\Carbon::parse($schedule->planed_starting_date)->format('d-M-y') : null;
            ?>
            <td class="en-label">{{ucfirst($schedule->activity_id)}}</td>
            <td class="en-label">{!! $schedule->related_to?ucfirst($schedule->related_to):"-" !!}</td>
            <td>{{Lang::get('terms.'.$schedule->sort)}}</td>
            <td>{{$schedule->activity_name}}</td>
            <td>{{$schedule->default_duration}}</td>
            <td class="en-label">{!! $resolver->getPlanedStDate()?$resolver->getPlanedStDate():"---" !!}</td>
            <td class="en-label">{!! $resolver->getPlanedEndDate()?$resolver->getPlanedEndDate():"---" !!}</td>
            <td class="en-label update-on_click">
                <input name="actual_starting_date" id="date_picker"
                       value="{{$resolver->getActualStDate()}}" disabled>

            </td>
            <td class="en-label update-on_click">
                <input name="actual_ending_date" id="date_picker"
                       value="{{$resolver->getActualEndDate()}}" disabled>
            </td>
            <td>
                {{--<input name="status" class="ajax-selection" list="status"--}}
                       {{--value="{{$resolver->getStatusName($schedule->status)}}">--}}
                <select name="status" class="form-control select2-single ajax-selection" dir="rtl">
                    <option value="">جاري</option>
                    @for($i=0;$i<=100;$i++)
                        <option value="{{$i}}" {!! $i==$schedule->status?"selected":null !!}>{{$resolver->getStatusName($i)}}</option>
                    @endfor
                </select>
            </td>
            <td>
                <div class="input-container">
                    <input class="ajax-input" name="status_reason" value="{{$schedule->status_reason}}" disabled>
                </div>
            </td>
            <td>
                <div class="input-container">
                    <input class="ajax-input" name="note" value="{{$schedule->note}}" disabled>
                </div>
            </td>
            <td class="en-label">{!! $resolver->getCompletionPercentage()?$resolver->getCompletionPercentage()."%":"---" !!}</td>
            <td class="en-label">{!! $resolver->getDelayPercentage()?$resolver->getDelayPercentage()."%":"---" !!}</td>
            <td class="en-label">{!! !is_null($resolver->getDelayDuration())?$resolver->getDelayDuration():"---" !!}</td>
        </tr>
    @endforeach
    {!! timeLinesSons($timeLine,$project,$colors['child']) !!}
@endforeach