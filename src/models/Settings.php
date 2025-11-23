<?php
/**
 * Notedis plugin for Craft CMS
 *
 * Settings model
 *
 * @link      https://notedis.com
 * @copyright Copyright (c) Notedis
 */

namespace notedis\craftnotedis\models;

use craft\base\Model;

/**
 * Notedis Settings Model
 *
 * @author    Notedis
 * @package   Notedis
 * @since     1.0.0
 */
class Settings extends Model
{
    /**
     * @var string Site Key (Required)
     */
    public string $siteKey = '';

    /**
     * @var string API Endpoint
     */
    public string $apiEndpoint = 'https://notedis.com';

    /**
     * @var string Widget Position
     */
    public string $widgetPosition = 'bottom-right';

    /**
     * @var string Widget Color
     */
    public string $widgetColor = '#3B82F6';

    /**
     * @var bool Show only for logged-in users
     */
    public bool $loggedInOnly = false;

    /**
     * @var bool Show in control panel/admin area
     */
    public bool $showInAdmin = false;

    /**
     * @var string Widget source (local or cdn)
     */
    public string $widgetSource = 'local';

    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        return [
            [['siteKey'], 'required'],
            [['siteKey', 'apiEndpoint', 'widgetPosition', 'widgetColor', 'widgetSource'], 'string'],
            [['apiEndpoint'], 'url'],
            [['widgetPosition'], 'in', 'range' => ['bottom-right', 'bottom-left', 'top-right', 'top-left']],
            [['widgetColor'], 'match', 'pattern' => '/^#?[0-9A-Fa-f]{6}$/'],
            [['widgetColor'], 'filter', 'filter' => function($value) {
                // Ensure color always has # prefix
                return str_starts_with($value, '#') ? $value : '#' . $value;
            }],
            [['widgetSource'], 'in', 'range' => ['local', 'cdn']],
            [['loggedInOnly', 'showInAdmin'], 'boolean'],
        ];
    }
}
