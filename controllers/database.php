<?php

require_once 'app/controllers/plugin_controller.php';

class DatabaseController extends PluginController {

    public function overview_action() {
        if (!$GLOBALS['perm']->have_perm("root")) {
            throw new AccessDeniedException(_("Sie haben keinen Zugriff auf diese Methode."));
        }
        Navigation::activateItem("/admin/adminer");

        $config_file = @fopen(__DIR__."/../adminer/config.php", "w");
        if ($config_file === false) {
            PageLayout::postError(_("Kann Zugangsdaten nicht in Pluginverzeichnis schreiben."));
        } else {
            fwrite($config_file, "<?php ");
            fwrite($config_file, '$STUDIP_DB_SERVER = ' . "'" . $GLOBALS['DB_STUDIP_HOST'] . "'; ");
            fwrite($config_file, '$STUDIP_DB_USER = ' . "'" . $GLOBALS['DB_STUDIP_USER'] . "'; ");
            fwrite($config_file, '$STUDIP_DB_NAME = ' . "'" . $GLOBALS['DB_STUDIP_DATABASE'] . "'; ");
            fwrite($config_file, '$STUDIP_DB_PASSWORD = ' . "'" . $GLOBALS['DB_STUDIP_PASSWORD'] . "'; ");
            fclose($config_file);
        }
        $this->url = $this->plugin->getPluginURL() . "/adminer/adminer.php";
        PageLayout::addStylesheet($this->plugin->getPluginURL()."/assets/adminer.css");
    }

}
