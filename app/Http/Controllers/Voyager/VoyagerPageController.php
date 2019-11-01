<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerSettingsController as BaseVoyagerController;

class VoyagerPageController extends BaseVoyagerController
{

    protected function get_current_route()
    {
        return explode('/', request()->path());
    }

    protected function get_permission_name($prefix)
    {
        $route =  $this->get_current_route();
        return $prefix . '_' . implode('_', array_splice($route, 1));
    }

    protected function get_group()
    {
        $route = $this->get_current_route();
        return implode('_', array_splice($route, 1));
    }

    protected function get_title()
    {
        $route = $this->get_current_route();
        return implode(' ', array_splice($route, 1));
    }

    public function index()
    {
        // dd($this->get_permission_name('browse'));
        // Check permission
        $this->authorize($this->get_permission_name('browse'));
        $route = 'voyager.page_setting.update';
        $group = $this->get_group();
        $title = $this->get_title();
        // dd($title);
        $data = Voyager::model('Setting')->where('group', $group)->orderBy('order', 'ASC')->get();

        $settings = [];
        $settings[__('voyager::settings.group_general')] = [];
        foreach ($data as $d) {
            if ($d->group == '' || $d->group == __('voyager::settings.group_general')) {
                $settings[__('voyager::settings.group_general')][] = $d;
            } else {
                $settings[$d->group][] = $d;
            }
        }
        if (count($settings[__('voyager::settings.group_general')]) == 0) {
            unset($settings[__('voyager::settings.group_general')]);
        }

        return view('vendor.voyager.page.index', compact('settings', 'group', 'title', 'route'));
    }

    public function update(Request $request)
    {
        // Check permission
        $group = $request->group;
        $this->authorize('edit_'.$group);

        $settings = Voyager::model('Setting')->where('group', $group)->get();
        foreach ($settings as $setting) {
            $content = $this->getContentBasedOnType($request, 'settings', (object) [
                'type'    => $setting->type,
                'field'   => str_replace('.', '_', $setting->key),
                'group'   => $setting->group,
            ], $setting->details);

            if ($setting->type == 'image' && $content == null) {
                continue;
            }

            if ($setting->type == 'file' && $content == json_encode([])) {
                continue;
            }

            // $key = preg_replace('/^'.Str::slug($setting->group).'./i', '', $setting->key);

            // $setting->key = implode('.', [Str::slug($setting->group), $key]);
            $setting->value = $content;
            $setting->save();
        }

        return back()->with([
            'message'    => __('voyager::settings.successfully_saved'),
            'alert-type' => 'success',
        ]);
    }


    public function export(Request $request, $slug)
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();


        $ids = $request->ids?explode(',', $request->ids): null;

        $model = app(str_replace('Models', 'Exports', $dataType->model_name));

        return $model->forIds($ids)->download("{$slug}.xlsx");
    }
}
