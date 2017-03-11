<?php

namespace Sober\Unravel\Migrate;

use Sober\Unravel\Migrate;

class AdvancedCustomFields extends Migrate
{
    public function setup()
    {
        $this->setDefaultPath('acf-json');
        $this->setDestinationPath('models/acf');
        $this->setOriginPath('acf/settings/save_json');

        return $this;
    }
}
