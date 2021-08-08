<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public $old = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'owner_id' => 'integer',
    ];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    /**
     * Record activity for a project
     *
     * @param string $type
     * @param \App\Project $project
     */
    public function recordActivity($description)
    {

        $this->activity()->create([
            'description' => $description,
            'changes'     => $this->activityChanges($description),
        ]);
    }

    public function activityChanges($description)
    {
        if ($description == 'updated') {
            return [
                'before' => array_diff($this->old, $this->getAttributes()),
                'after'  => $this->getChanges(),
            ];
        }
        return null;
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }
}
