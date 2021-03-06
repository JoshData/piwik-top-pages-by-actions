<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\TopPagesByActions;

use Piwik\View;
use Piwik\Piwik;
use Piwik\Common;
use Piwik\Settings\SystemSetting;
use Piwik\Settings\UserSetting;
use Piwik\Settings\Manager as SettingsManager;

/**
 *
 */
class Controller extends \Piwik\Plugin\Controller
{

    private function getPluginSettings()
    {
        $pluginsSettings = SettingsManager::getPluginSettingsForCurrentUser();
        ksort($pluginsSettings);
        return $pluginsSettings;
    }
    public function index()
    {
		$settings = new Settings('TopPagesByActions');

        $view = new View('@TopPagesByActions/index.twig');
        $this->setBasicVariablesView($view);
        $view->refreshInterval = (int)$settings->refreshInterval->getValue();
        $view->numberOfEntries = (int)$settings->numberOfEntries->getValue();
        $view->idSite = $this->idSite;

        return $view->render();
    }
}
