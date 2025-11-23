# Notedis Widget for Craft CMS

Add a floating feedback button to your Craft CMS site that lets visitors submit feedback, bug reports, and feature requests directly to your Notedis.com account.

## Description

The Notedis Widget plugin integrates the Notedis.com feedback widget into your Craft CMS site. Once configured, a floating feedback button will automatically appear on your site, allowing visitors to:

- Submit feedback with categories (Bug, Feature, Improvement, Question)
- Take annotated screenshots
- Provide detailed information automatically (browser, device, page URL, etc.)
- Send feedback directly to your Notedis.com dashboard

### Features

- **Automatic Integration**: Feedback button appears site-wide with zero configuration beyond site key
- **Customizable Appearance**: Control button position and color
- **User Control**: Show to all visitors or only logged-in users
- **Admin Support**: Optionally show in Craft CMS control panel for team feedback
- **Secure**: Proper input validation and sanitization
- **Craft Standards**: Follows Craft CMS coding standards and best practices

## Requirements

- **Craft CMS**: 4.0+ or 5.0+
- **PHP**: 8.0.2 or higher
- **Notedis.com Account**: Active account with valid site key
- **Modern Browser**: For visitors using the widget

## Installation

### Via Composer (Recommended)

1. Open your terminal and navigate to your Craft project:

```bash
cd /path/to/project
```

2. Require the plugin package:

```bash
composer require notedis/craft-notedis
```

3. Install the plugin:

```bash
php craft plugin/install notedis
```

### Manual Installation

1. Download or clone this repository
2. Copy the repository contents to your `vendor/notedis/craft-notedis` directory
3. Install the plugin from the Craft control panel: **Settings → Plugins → Notedis Widget → Install**

## Configuration

### Getting Your Site Key

1. Log in to your [Notedis.com](https://notedis.com) account
2. Navigate to your account settings
3. Find your site key in the API section
4. Copy it to your clipboard

### Plugin Settings

Go to **Settings → Plugins → Notedis Widget → Settings** in the Craft control panel:

#### Required Settings

**Site Key** (Required)
- Your unique Notedis.com site key
- Get this from your Notedis account
- The widget will not appear without a valid site key

#### Optional Settings

**API Endpoint**
- Default: `https://notedis.com`
- Leave as default unless instructed by Notedis support

**Button Position**
- Choose where the feedback button appears
- Options: Bottom Right (default), Bottom Left, Top Right, Top Left

**Button Color**
- Customize the button color to match your brand
- Default: `#3B82F6` (blue)
- Use the color picker or enter a hex color code

**Logged-in Users Only**
- When enabled, only logged-in Craft CMS users see the feedback button
- Useful for private sites, membership sites, or internal testing
- Default: Disabled (everyone can see the button)

**Show in Control Panel**
- When enabled, the feedback button also appears in Craft CMS control panel
- Great for collecting feedback from your team while they work
- Default: Disabled (frontend only)

**Widget Source**
- **Local**: Loads widget.js from your server (recommended for compliance)
- **CDN**: Loads from Notedis.com (always gets latest updates)
- Default: Local

## How It Works

1. **Visitor clicks the feedback button** - The floating button appears on every page
2. **Modal opens** - A feedback form slides in with categories and options
3. **Visitor fills out feedback** - They can choose category, priority, add screenshots with annotations
4. **Feedback is sent** - Goes directly to your Notedis.com dashboard
5. **You review** - View all feedback in your Notedis account with full context

## Configuration Examples

### Example 1: Public Website
```
Site Key: your-key-here
Position: bottom-right
Color: #3B82F6
Logged-in Users Only: ☐ Disabled
Show in Control Panel: ☐ Disabled

Result: All visitors see button on frontend pages only
```

### Example 2: Members-Only Feedback
```
Site Key: your-key-here
Position: bottom-left
Color: #10B981
Logged-in Users Only: ☑ Enabled
Show in Control Panel: ☐ Disabled

Result: Only logged-in members see button on frontend
```

### Example 3: Internal Team Tool
```
Site Key: your-key-here
Position: top-right
Color: #F59E0B
Logged-in Users Only: ☑ Enabled
Show in Control Panel: ☑ Enabled

Result: Team sees button everywhere (frontend + control panel)
```

### Example 4: Maximum Visibility
```
Site Key: your-key-here
Position: bottom-right
Color: #EF4444
Logged-in Users Only: ☐ Disabled
Show in Control Panel: ☑ Enabled

Result: Everyone sees button on all pages including control panel
```

## Technical Details

### What Gets Loaded

The plugin loads the official Notedis widget from:
```
https://notedis.com/js/widget.js (if using CDN)
```

Or from the local bundled version if using Local mode.

And configures it with:
```javascript
window.notedisConfig = {
    siteKey: 'your-site-key',
    apiUrl: 'https://notedis.com',
    position: 'bottom-right',
    color: '#3B82F6'
};
```

### Craft CMS Integration

The plugin:
- Only loads the widget when a valid site key is configured
- Respects logged-in user settings
- Can load in control panel if enabled
- Uses Craft CMS best practices for asset management
- Properly validates and sanitizes all settings
- Follows Craft CMS coding standards

### Performance

- Minimal overhead - just loads one external JavaScript file
- No database queries on frontend (settings cached)
- Lazy-loads the Notedis widget script
- No impact on page load speed

## Troubleshooting

### Widget Not Appearing

1. **Check Site Key** - Ensure you've entered a valid site key from Notedis.com
2. **Check Browser Console** - Look for JavaScript errors
3. **Check User Settings** - If "Logged-in Users Only" is enabled, log in
4. **Clear Cache** - Clear Craft cache and browser cache
5. **Check Conflicts** - Temporarily disable other plugins to check for conflicts

### Widget Appears But Doesn't Work

1. **Verify Site Key** - Ensure the site key is active in your Notedis account
2. **Check Browser Compatibility** - Widget requires modern browsers
3. **Check for JavaScript Errors** - Open browser console and look for errors
4. **Contact Notedis Support** - The issue may be with your Notedis account

## Security

This plugin follows Craft CMS security best practices:

- All settings are validated and sanitized
- All output is properly escaped
- Site keys stored securely in Craft project config
- No direct file access allowed
- External script loaded from official Notedis CDN only (when using CDN mode)

## Support

- **Plugin Issues**: Open an issue on the [GitHub repository](https://github.com/darinlarimore/notedis-craft/issues)
- **Notedis Service**: Contact [Notedis.com](https://notedis.com) support
- **Documentation**: Visit [Notedis.com](https://notedis.com) for widget documentation

## License

MIT

## Changelog

### 1.0.0 - 2024-11-22
- Initial release
- Loads Notedis.com feedback widget
- Configurable site key, position, and color
- Option to show only to logged-in users
- Option to show in Craft CMS control panel
- Craft CMS 4 and 5 compatible
- PHP 8.0.2+ compatible
- Secure and performant

## Credits

Developed for [Notedis.com](https://notedis.com)
