<?php

class DatabaseAdminer extends StudIPPlugin implements SystemPlugin
{

    public function __construct()
    {
        parent::__construct();
        if ($GLOBALS['perm']->have_perm("root")) {
            $nav = new Navigation(_("Datenbank"), PluginEngine::getURL($this, array(), "database/overview"));
            Navigation::addItem("/admin/adminer", $nav);
        }
    }

}
