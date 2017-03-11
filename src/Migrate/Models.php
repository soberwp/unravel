<?php

namespace Sober\Unravel\Migrate;

use Sober\Unravel\Migrate;

class Models extends Migrate
{
    public function setup()
    {
        $this->setDefaultPath('model-config');
        $this->setDestinationPath('models');
        $this->setOriginPath('sober/models/path');

        return $this;
    }
}
