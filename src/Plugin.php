<?php
/**
 * Notedis plugin for Craft CMS
 *
 * Embed a Notedis.com feedback widget on your Craft CMS site.
 *
 * @link      https://notedis.com
 * @copyright Copyright (c) Notedis
 */

namespace notedis\craftnotedis;

use Craft;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use craft\web\View;
use notedis\craftnotedis\models\Settings;
use yii\base\Event;

/**
 * Notedis plugin
 *
 * @author    Notedis
 * @package   Notedis
 * @since     1.0.0
 *
 * @property  Settings $settings
 * @method    Settings getSettings()
 */
class Plugin extends BasePlugin
{
    /**
     * @var Plugin
     */
    public static Plugin $plugin;

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = true;

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        // Register template hook to inject widget
        Event::on(
            View::class,
            View::EVENT_END_BODY,
            function(Event $event) {
                $this->injectWidget($event);
            }
        );

        Craft::info(
            Craft::t(
                'notedis',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    /**
     * Inject the Notedis widget into the page
     *
     * @param Event $event
     * @return void
     */
    protected function injectWidget(Event $event): void
    {
        $settings = $this->getSettings();
        $request = Craft::$app->getRequest();

        // Don't inject if site key is not configured
        if (empty($settings->siteKey)) {
            return;
        }

        // Check if we're in the control panel
        $isCpRequest = $request->getIsCpRequest();

        // Don't inject in CP unless showInAdmin is enabled
        if ($isCpRequest && !$settings->showInAdmin) {
            return;
        }

        // Check if logged-in only is enabled
        if ($settings->loggedInOnly && !Craft::$app->getUser()->getIdentity()) {
            return;
        }

        // Build the widget configuration
        $config = [
            'siteKey' => $settings->siteKey,
            'apiUrl' => $settings->apiEndpoint,
            'position' => $settings->widgetPosition,
            'color' => $settings->widgetColor,
        ];

        // Determine widget source URL
        if ($settings->widgetSource === 'cdn') {
            $widgetUrl = 'https://notedis.com/js/widget.js';
        } else {
            // Use local bundled version
            $widgetUrl = Craft::$app->assetManager->getPublishedUrl(
                '@notedis/craftnotedis/resources/js/widget.js',
                true
            );
        }

        // Build the script tag
        $script = sprintf(
            '<script>window.notedisConfig = %s;</script><script src="%s" defer></script>',
            json_encode($config, JSON_UNESCAPED_SLASHES),
            $widgetUrl
        );

        // Register the script using Craft's view
        Craft::$app->getView()->registerHtml($script);
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate(
            'notedis/settings',
            [
                'settings' => $this->getSettings(),
            ]
        );
    }
}
