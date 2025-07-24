<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class AdminActivityObserver
{
    public function created(Model $model)
    {
        log_activity('created', class_basename($model), "Created new " . class_basename($model) . " (ID: {$model->id})");
    }

    public function updated(Model $model)
    {
        log_activity('updated', class_basename($model), "Updated " . class_basename($model) . " (ID: {$model->id})");
    }

    public function deleted(Model $model)
    {
        log_activity('deleted', class_basename($model), "Deleted " . class_basename($model) . " (ID: {$model->id})");
    }
}
