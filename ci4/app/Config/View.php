<?php

namespace Config;

use CodeIgniter\Config\View as BaseView;

class View extends BaseView
{
    // Jangan pakai tipe data (tidak pakai ": bool")
    public $saveData = true;

    public $filters = [];

    public $plugins = [];
}
