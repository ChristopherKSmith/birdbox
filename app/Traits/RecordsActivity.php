<?php

namespace App\Traits;

use App\Activity;

trait RecordsActivity
{
    /**
     * The Projects old attributes
     *
     * @var array
     */
    public $oldAttributes = [];

    public static function bootRecordsActivity()
    {

        foreach (self::recordableEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });
        }

        if ($event === 'updated') {
            static::updating(function ($model) {
                $model->oldAttributes = $model->getOriginal();
            });
        }
    }

    protected static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return $recordableEvents = static::$recordableEvents;
        }

        return ['created', 'updated', 'deleted'];
    }

    protected function activityDescription($description)
    {
        return "{$description}_" . strtolower(class_basename($this));
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
            'changes'     => $this->activityChanges(),
            'project_id'  => class_basename($this) === 'Project' ? $this->id : $this->project->id,
        ]);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    public function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                'before' => array_diff($this->oldAttributes, $this->getAttributes()),
                'after'  => $this->getChanges(),
            ];
        }
        return null;
    }
}
