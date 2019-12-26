<?php

namespace App\Models;

use TCG\Voyager\Models\Setting as Model;
use TCG\Voyager\Events\SettingUpdated;
use TCG\Voyager\Traits\Translatable;

class Setting extends Model
{
    use Translatable;

    protected $table = 'settings';

    protected $guarded = [];

    public $timestamps = false;

    protected $translatable = ['value'];

    protected $dispatchesEvents = [
        'updating' => SettingUpdated::class,
    ];

    public function getInputKeyAttribute(){
        return str_replace('.', '_', $this->key);
    }

    public function prepareTranslations(&$request)
    {
        $translations = [];

        // Translatable Fields
        $key = str_replace('.', '_', $this->key);
        if (!$request->input($key.'_i18n')) {
            throw new \Exception('Invalid Translatable field '.$key.'_i18n');
        }

        $trans = json_decode($request->input($key.'_i18n'), true);
        // Set the default local value
        $request->merge([$key => $trans[config('voyager.multilingual.default', 'en')]]);

        $translations['value'] = $this->setAttributeTranslations(
            'value',
            $trans
        );
        // Remove field hidden input
        unset($request[$key.'_i18n']);

        // Remove language selector input
        unset($request['i18n_selector']);

        return $translations;
    }
}
