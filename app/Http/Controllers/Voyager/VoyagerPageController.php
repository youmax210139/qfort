<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerSettingsController as BaseVoyagerController;

class VoyagerPageController extends BaseVoyagerController
{

    protected function get_permission_name($prefix)
    {
        $route = explode('.', request()->route()->getName());
        return $prefix . '_' . implode('_', array_splice($route, 1, -1));
    }

    protected function get_group()
    {
        $route = explode('.', request()->route()->getName());
        return implode('_', array_splice($route, 1, -1));
    }

    protected function get_update_route()
    {
        $route = explode('.', request()->route()->getName());
        array_splice($route, -1);
        return implode('.', $route).'.update';
    }

    protected function get_title()
    {
        $route = explode('.', request()->route()->getName());
        return implode(' ', array_splice($route, 1, -1));
    }

    public function index()
    {
        // Check permission
        $this->authorize($this->get_permission_name('browse'));
        $route = $this->get_update_route();
        $group = $this->get_group();
        $title = $this->get_title();
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
        $this->authorize($this->get_permission_name('edit'));
        $group = $this->get_group();
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
}
