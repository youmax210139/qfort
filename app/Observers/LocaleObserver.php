<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class LocaleObserver
{
    public function retrieved(Model $model)
    {
        $model->value = $model->getTranslatedAttribute('value', app()->getLocale());
    }
}
