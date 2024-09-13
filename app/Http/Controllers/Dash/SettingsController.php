<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:settings-list', ['only' => ['index']]);
        $this->middleware('permission:settings-edit', ['only' => ['update']]);
    }
    protected string $redirectRoute = 'dashboard.settings.index';

    public function index($group = 'app')
    {
        $menu = [];
        foreach (Config::get("settings") as $key => $value) {
            $menu[$key] = [
                'name' => $value['name_menu'],
                'icon' => $value['icon']
            ];
         }
        $settings = Config::get("settings.{$group}", []);
        if (!$settings) {
            abort(404);
        }
        $view = 'dashboard.settings.$group';
        if (!View::exists($view)) {
            $view = 'dashboard.pages.settings';
        }

        return View::make($view, [
            'settings' => $this->prepareSettings($settings['settings']),
            'page_title' => $settings['title'],
            'menu' => $menu,
            'group' => $group,
        ]);
    }

    public function update(Request $request, $group = 'app')
    {
        $settings = Config::get("settings.{$group}", []);

        foreach ($settings['settings'] as $name => $setting){
            $input = str_replace('.', '_', $name);
            if ($setting['type']==='image' || $setting['type'] === 'file') {
                $value = $this->upload($request->file($input), $name);
            }else{
                $value = $request->post($input);
            }
            Setting::updateOrCreate([
                'name' => $name,
            ],[
                'value' => $value,
            ]);
        }
        Cache::forget('app-settings');

        return redirect()->route($this->redirectRoute, [$group])->with('success', 'Settings Saved Successfully!');
    }

    protected function upload($file, $name)
    {
        if (!$file || !$file->isValid()) {
           return Config::get($name);
        }

        $name .= '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('settings', $name, [
            'disk' => 'media',
        ]);
        return asset('storage/media/'. $path);
    }


    protected function prepareSettings($settings)
    {
        foreach ($settings as $key => $setting){
            if (isset($setting['options']) && is_callable($setting['options'])){
                $settings[$key]['options'] = call_user_func($setting['options']);
            }
        }
        return $settings;
    }
}
