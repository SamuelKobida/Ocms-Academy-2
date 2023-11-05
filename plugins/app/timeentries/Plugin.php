<?php namespace App\TimeEntries;

use Backend;
use System\Classes\PluginBase;
use App\TimeEntries\Classes\Extend\TaskExtend;

/**
 * TimeEntries Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'TimeEntries',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        TaskExtend::extendTask();
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'App\TimeEntries\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'app.timeentries.some_permission' => [
                'tab' => 'TimeEntries',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'timeentries' => [
                'label'       => 'Time Entries',
                'url'         => Backend::url('app/timeentries/timeentries'),
                'icon'        => 'oc-icon-clock-o',
                'permissions' => ['app.timeentries.*'],
                'order'       => 500,
            ],
        ];
    }
}
