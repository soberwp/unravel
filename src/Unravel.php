<?php

namespace Sober\Unravel;

use Sober\Unravel\Migrate\Models;
use Sober\Unravel\Migrate\AdvancedCustomFields;

class Unravel
{
    protected $path;

    public function __construct()
    {
        $this->migrate();
        $this->path();
        $this->models();
        $this->acf();
    }

    /**
     * Migrate files
     */
    protected function migrate()
    {
        (new AdvancedCustomFields())->setup()->register();
        (new Models())->setup()->register();
    }

    /**
     * Set path
     */
    protected function path()
    {
        $this->path = wp_upload_dir();
        $this->path = rtrim($this->path['basedir'], 'uploads') . 'models'; // fix rtrim uploads name
    }

    /**
     * Plugin: Models
     */
    protected function models()
    {
        add_filter('sober/models/path', function () {
            return $this->path;
        });
    }

    /**
     * Plugin: Advanced Custom Fields
     */
    protected function acf()
    {
        add_filter('acf/settings/save_json', function () {
            return $this->path . '/acf';
        });

        add_filter('acf/settings/load_json', function ($paths) {
            unset($paths[0]);
            $paths[] = $this->path . '/acf';
            return $paths;
        });
    }
}
