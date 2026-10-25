# RottweilChameleonExtension
Chameleon Skin Extension for Rottweiler Bilder

From the MediaWiki root, add the extension to `composer.local.json`:
```json
{
	"repositories": [
		{
			"type": "vcs",
			"url": "https://github.com/patrickfl/RottweilChameleonExtension"
		}
	],
	"require": {
		"patrickfl/rottweil-chameleon-extension": "^2.0"
	}
}
```

Remove any manually installed copies of this extension or Chameleon first. Then run `composer update --no-dev` and enable the skin and extension in `LocalSettings.php`:
```php
wfLoadSkin( 'chameleon' );
wfLoadExtension( 'RottweilChameleonExtension' );
$wgDefaultSkin = 'chameleon';

$egChameleonLayoutFile = __DIR__ . '/extensions/RottweilChameleonExtension/layouts/rottweil-default.xml';
$egChameleonThemeFile = __DIR__ . '/extensions/RottweilChameleonExtension/styles/RottweilSkin.scss';
```