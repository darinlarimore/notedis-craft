# Installation Instructions

## Method 1: Composer Installation (Recommended)

### Step 1: Require the Package

From your Craft CMS project root directory, run:

```bash
composer require notedis/craft-notedis
```

### Step 2: Install the Plugin

Install via command line:

```bash
php craft plugin/install notedis
```

Or install via the Craft control panel:

1. Go to **Settings → Plugins**
2. Find **Notedis Widget**
3. Click **Install**

### Step 3: Configure the Plugin

1. Go to **Settings → Plugins → Notedis Widget**
2. Click the **Settings** gear icon
3. Enter your Notedis.com site key
4. Configure other options as desired
5. Click **Save**

---

## Method 2: Manual Installation

If you cannot use Composer, you can install the plugin manually:

### Step 1: Download the Plugin

Download the latest release from the GitHub repository or clone it:

```bash
git clone https://github.com/darinlarimore/notedis-craft.git
```

### Step 2: Copy to Vendor Directory

Copy the plugin files to your Craft CMS project:

```bash
mkdir -p vendor/notedis/craft-notedis
cp -r notedis-craft/* vendor/notedis/craft-notedis/
```

### Step 3: Update Composer Autoloader

Add the plugin to your project's `composer.json` file under the `autoload.psr-4` section:

```json
{
  "autoload": {
    "psr-4": {
      "notedis\\craftnotedis\\": "vendor/notedis/craft-notedis/src/"
    }
  }
}
```

Then regenerate the autoloader:

```bash
composer dump-autoload
```

### Step 4: Install the Plugin

Install via the Craft control panel:

1. Go to **Settings → Plugins**
2. Find **Notedis Widget**
3. Click **Install**

Or via command line:

```bash
php craft plugin/install notedis
```

### Step 5: Configure the Plugin

1. Go to **Settings → Plugins → Notedis Widget**
2. Click the **Settings** gear icon
3. Enter your Notedis.com site key
4. Configure other options as desired
5. Click **Save**

---

## Getting Your Site Key

Before you can use the plugin, you need a site key from Notedis.com:

1. Sign up or log in at [Notedis.com](https://notedis.com)
2. Go to your account settings
3. Navigate to the API or Integration section
4. Copy your site key
5. Paste it into the plugin settings in Craft CMS

---

## Verification

After installation and configuration:

1. Visit your website's frontend
2. You should see the Notedis feedback button in the position you configured
3. Click the button to test the widget
4. Submit a test feedback to verify it appears in your Notedis.com dashboard

---

## Troubleshooting Installation

### Plugin Doesn't Appear in Settings

- Make sure you ran `composer dump-autoload` if installing manually
- Check that the plugin files are in the correct directory
- Verify file permissions are correct

### Cannot Install Plugin

- Ensure you're running a compatible version of Craft CMS (4.0+ or 5.0+)
- Check that PHP version is 8.0.2 or higher
- Look for errors in `storage/logs/web.log`

### Widget Doesn't Appear After Installation

- Verify you entered a valid site key in settings
- Clear Craft cache: `php craft clear-caches/all`
- Check browser console for JavaScript errors
- Ensure you're not blocking the widget with "Logged-in Users Only" setting

---

## Updating the Plugin

### Via Composer

```bash
composer update notedis/craft-notedis
```

### Manual Update

1. Download the latest version
2. Replace the existing plugin files
3. Run `composer dump-autoload`
4. Clear caches: `php craft clear-caches/all`

---

## Uninstallation

### Via Command Line

```bash
php craft plugin/uninstall notedis
composer remove notedis/craft-notedis
```

### Via Control Panel

1. Go to **Settings → Plugins**
2. Find **Notedis Widget**
3. Click **Uninstall**
4. Remove the composer package: `composer remove notedis/craft-notedis`

---

## Support

If you encounter any issues during installation, please:

1. Check the [Troubleshooting Guide](README.md#troubleshooting) in the README
2. Review Craft logs in `storage/logs/`
3. Open an issue on [GitHub](https://github.com/darinlarimore/notedis-craft/issues)
