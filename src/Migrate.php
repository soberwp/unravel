<?php

namespace Sober\Unravel;

class Migrate
{
    protected $destinationPath;
    protected $defaultPath;
    protected $originPath;

    public function __construct()
    {
        // empty
    }

    /**
     * Set destination path
     */
    protected function setDestinationPath($folder)
    {
        $this->destinationPath = wp_upload_dir();
        $this->destinationPath = rtrim($this->destinationPath['basedir'], 'uploads') . $folder; // fix rtrim uploads name
    }

    /**
     * Set destination path
     */
    protected function setDefaultPath($default)
    {
        $this->pathDefault = $default;
    }

    /**
     * Get origin path
     */
    protected function setOriginPath($filter)
    {
        $this->originPath = (has_filter($filter) ?  apply_filters($filter, rtrim($this->originPath)) : get_stylesheet_directory() . '/' . $this->pathDefault);
    }

    /**
     * Folder exists
     */
    protected function folderExist($path)
    {
        if (file_exists($path)) return true;
    }

    /**
     * Register
     */
    public function register()
    {
        if ($this->folderExist($this->destinationPath)) return;
        if (!$this->folderExist($this->originPath)) return;
        rename($this->originPath, $this->destinationPath);
    }

    /**
     * Deregister
     */

     // make it work for advanced custom fields
    public function deregister()
    {
        $this->pathOrigin = get_stylesheet_directory() . '/' . $this->pathDefault;
        if ($this->folderExist($this->pathOrigin)) return;
        rename($this->destinationPath, $this->pathOrigin);
    }
}
