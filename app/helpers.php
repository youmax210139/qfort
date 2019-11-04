<?php

if (!function_exists('menu')) {
    function menu($menuName, $type = null, array $options = [])
    {
        return app('App\Models\Menu')->display($menuName, $type, $options);
    }
}

if (!function_exists('get_browse_field_translations')) {
    /**
     * Return all field translations.
     *
     * @param Illuminate\Database\Eloquent\Model $model
     * @param string                             $field
     * @param string                             $rowType
     * @param bool                               $stripHtmlTags
     */
    function get_browse_field_translations($model, $field, $rowType = '', $stripHtmlTags = true)
    {
        $_out = $model->getTranslationsOf($field);
        $limit = $field == 'content'? 40: 20;
        if ($stripHtmlTags) {
            foreach ($_out as $language => $value) {
                $_out[$language] = str_limit(strip_tags($_out[$language]), $limit, '...');
            }
        }

        return json_encode($_out);
    }
}

if (!function_exists('get_read_field_translations')) {
    /**
     * Return all field translations.
     *
     * @param Illuminate\Database\Eloquent\Model $model
     * @param string                             $field
     * @param string                             $rowType
     * @param bool                               $stripHtmlTags
     */
    function get_read_field_translations($model, $field, $rowType = '', $stripHtmlTags = false)
    {
        $_out = $model->getTranslationsOf($field);
        if ($stripHtmlTags) {
            foreach ($_out as $language => $value) {
                $_out[$language] =  html_entity_decode(strip_tags($_out[$language], '<img>'));
            }
        }
        return json_encode($_out);
    }
}
