# Quick Start Guide

Get the Notedis widget running on your Craft CMS site in 5 minutes.

## Prerequisites

- Craft CMS 4.0+ or 5.0+ installed
- PHP 8.0.2+
- Composer installed
- A Notedis.com account

## Step 1: Get Your Site Key

1. Go to [Notedis.com](https://notedis.com)
2. Sign up or log in
3. Navigate to Settings → API
4. Copy your site key

## Step 2: Install the Plugin

From your Craft project root:

```bash
composer require notedis/craft-notedis
php craft plugin/install notedis
```

## Step 3: Configure

1. Open your Craft control panel
2. Go to **Settings → Plugins**
3. Find **Notedis Widget** and click the settings gear
4. Paste your site key
5. Click **Save**

## Step 4: Test

1. Visit your website's frontend
2. Look for the feedback button (bottom-right by default)
3. Click it and submit test feedback
4. Check your Notedis.com dashboard

## That's It!

Your feedback widget is now live. Visitors can submit feedback with screenshots directly from your site.

## Optional Customization

Want to customize? Go back to plugin settings and adjust:

- **Button Position**: Move to any corner
- **Button Color**: Match your brand
- **Logged-in Only**: Restrict to members
- **Show in Control Panel**: Enable for team feedback

## Troubleshooting

**Button not appearing?**
- Check site key is correct
- Clear cache: `php craft clear-caches/all`
- Check browser console for errors

**Widget not working?**
- Verify site key is active on Notedis.com
- Check for JavaScript conflicts
- Try switching Widget Source to CDN

## Need Help?

- [Full Documentation](README.md)
- [Installation Guide](INSTALL.md)
- [GitHub Issues](https://github.com/darinlarimore/notedis-craft/issues)
- [Notedis Support](https://notedis.com/support)

---

Made with Craft CMS ❤️
