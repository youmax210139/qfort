@if ($isModelTranslatable)
    <span class="language-label js-language-label"></span>
    <input type="hidden"
           data-i18n="true"
           name="{{ $setting->key }}_i18n"
           id="{{ $setting->key }}_i18n"
           @if( !empty(session()->getOldInput($setting->key.'_i18n') && is_null($setting->id)) )
             value="{{ session()->getOldInput($setting->key.'_i18n') }}"
           @else
             value="{{ get_field_translations($setting, 'value') }}"
           @endif>
@endif
