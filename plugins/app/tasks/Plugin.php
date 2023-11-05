<?php namespace App\Tasks;

use Backend;
use System\Classes\PluginBase;
use App\Tasks\Classes\Extend\ProjectExtend;
use App\Tasks\Classes\Extend\UserExtend;

/**
 * Tasks Plugin Information File
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
            'name'        => 'Tasks',
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
        ProjectExtend::extendProject();
        UserExtend::extendUser();
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
            'App\Tasks\Components\MyComponent' => 'myComponent',
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
            'app.tasks.some_permission' => [
                'tab' => 'Tasks',
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
            'tasks' => [
                'label'       => 'Tasks',
                'url'         => Backend::url('app/tasks/tasks'),
                'icon'        => 'oc-icon-envelope-o',
                'permissions' => ['app.tasks.*'],
                'order'       => 500,
            ],
        ];
    }
}
