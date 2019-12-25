@if ($isModelTranslatable)
    <span class="language-label js-language-label"></span>
    <input type="hidden"
           data-i18n="true"
           name="value{{ $setting->id }}_i18n"
           id="value{{ $setting->id }}_i18n"
           @if(!empty(session()->getOldInput('value_i18n') && is_null($setting->id)))
             value="{{ session()->getOldInput('value_i18n') }}"
           @else
             value="{{ get_field_translations($setting, 'value') }}"
           @endif>
@endif
