<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeLine extends Model
{
    protected $fillable = ['project_id', 'name', 'parent', 'activity_id', 'activity_name', 'original', 'starting_date', 'ending_date'];

    public function childs()
    {
        return $this->hasMany(get_class($this), 'parent', 'id');
    }

    public function parentItem()
    {
        return $this->belongsTo(__CLASS__, 'parent', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function items()
    {
        return $this->hasMany(TimeLinesItems::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function nameWithAllParents($split_tag = " > ")
    {
        $fullName = [];
        $fullName[] = $this->name;
        if (!is_null($this->parentItem)) {
            $fullName[] = $this->parentItem->nameWithAllParents($split_tag);

        }
        return implode($split_tag, array_reverse($fullName));

    }
}