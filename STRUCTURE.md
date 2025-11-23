# Craft CMS Plugin Structure

This document outlines the correct structure for the Notedis Craft CMS plugin.

## Repository Structure

Following [Craft CMS plugin guidelines](https://craftcms.com/docs/5.x/extend/plugin-guide.html), the plugin files are at the repository root:

```
notedis-craft/                    (repository root)
├── .gitignore                    # Git ignore rules
├── CHANGELOG.md                  # Version history
├── composer.json                 # Package definition
├── icon.svg                      # Plugin icon
├── INSTALL.md                    # Installation guide
├── LICENSE.md                    # MIT License
├── QUICK-START.md                # Quick start guide
├── README.md                     # Main documentation
├── STRUCTURE.md                  # This file
├── SUMMARY.md                    # Development summary
└── src/                          # Plugin source code
    ├── Plugin.php                # Main plugin class
    ├── models/
    │   └── Settings.php          # Settings model
    ├── resources/
    │   └── js/
    │       └── widget.js         # Notedis widget script
    └── templates/
        └── settings.twig         # Settings template
```

## Key Points

1. **No parent folder**: Files are at repository root, not in a `craft-plugin/` subfolder
2. **composer.json at root**: Required for Composer to recognize the package
3. **src/ directory**: Contains all PHP source code
4. **PSR-4 autoloading**: `notedis\craftnotedis\` namespace maps to `src/`

## Installation Locations

### Via Composer (Recommended)

When installed via Composer, the plugin will be placed in:
```
your-craft-project/
└── vendor/
    └── notedis/
        └── craft-notedis/        (this repository)
            ├── composer.json
            ├── src/
            └── ...
```

### Manual Installation

For manual installation, copy to:
```
your-craft-project/
└── vendor/
    └── notedis/
        └── craft-notedis/        (copy repository contents here)
            ├── composer.json
            ├── src/
            └── ...
```

## Composer Configuration

The `composer.json` file defines:

- **Package name**: `notedis/craft-notedis`
- **Type**: `craft-plugin`
- **Autoload**: PSR-4 mapping `notedis\craftnotedis\` → `src/`
- **Plugin handle**: `notedis`
- **Main class**: `notedis\craftnotedis\Plugin`

## File Purposes

| File/Directory | Purpose |
|----------------|---------|
| `composer.json` | Package definition for Composer |
| `src/Plugin.php` | Main plugin class, extends `craft\base\Plugin` |
| `src/models/Settings.php` | Settings model with validation |
| `src/templates/settings.twig` | Control panel settings page |
| `src/resources/js/widget.js` | Notedis widget JavaScript |
| `icon.svg` | Plugin icon shown in Craft CP |
| `README.md` | User documentation |
| `INSTALL.md` | Installation instructions |
| `CHANGELOG.md` | Version history |
| `LICENSE.md` | MIT license text |

## Namespace Structure

```php
notedis\craftnotedis\
├── Plugin                        (src/Plugin.php)
└── models\
    └── Settings                  (src/models/Settings.php)
```

## Compliance with Craft Guidelines

This structure follows the official [Craft Plugin Guide](https://craftcms.com/docs/5.x/extend/plugin-guide.html):

- ✅ Repository root contains `composer.json`
- ✅ Source code in `src/` directory
- ✅ PSR-4 autoloading configured
- ✅ Plugin class extends `craft\base\Plugin`
- ✅ Settings model extends `craft\base\Model`
- ✅ Templates in `src/templates/`
- ✅ Resources in `src/resources/`
- ✅ Plugin icon as SVG
- ✅ Proper documentation

## Common Mistakes to Avoid

❌ **Don't** create a parent folder like `craft-plugin/` containing the files
✅ **Do** put `composer.json` and `src/` at the repository root

❌ **Don't** nest the plugin deeper than `vendor/notedis/craft-notedis/`
✅ **Do** install directly to this path

❌ **Don't** use different namespace than defined in `composer.json`
✅ **Do** use `notedis\craftnotedis\` namespace

## References

- [Craft CMS Plugin Guide](https://craftcms.com/docs/5.x/extend/plugin-guide.html)
- [Composer Documentation](https://getcomposer.org/doc/)
- [PSR-4 Autoloading](https://www.php-fig.org/psr/psr-4/)
