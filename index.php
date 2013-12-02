<?php
require (__DIR__ . '/vendor/autoload.php');

use Composer\Factory;
use Composer\IO\BufferIO;
use Composer\Repository\RepositoryManager;
use Composer\DependencyResolver\Operation\UpdateOperation;
use Composer\Package\PackageInterface;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Platphorm</title>
<meta name="author" content="Fylhan" />
</head>
<body>
	<p>Hello World!</p>
	<?php
	$bufferIo = new BufferIO();
	$composer = Factory::create($bufferIo);
	$package = $composer->getPackage();
	// Display
	echo '<ul>';
	foreach ($composer->getRepositoryManager()
		->getLocalRepository()
		->getCanonicalPackages() as $package) {
		// Update
		if (! empty($_GET['id'])) {
			if ($package->getName() == $_GET['id']) {
				echo @$_GET['id'] . ' ' . @$_GET['version'];
// 				var_dump($package);
				var_dump($composer->getInstallationManager()->update($composer->getRepositoryManager()
					->getLocalRepository(), new UpdateOperation($package, $package)));
				var_dump($composer->getRepositoryManager()->getLocalRepository()->findPackage("enygma/xacmlphp", "dev-master"));
			}
		}
		echo '<li>' . $package->getName() . ': ' . $package->getDescription() . ' <a href="index.php?id=' . $package->getName() . '&version=' . $package->getVersion() . '">Install</a></li>';
	}
	echo '</ul>';
	var_dump($composer->getRepositoryManager()->getLocalRepository());
	var_dump($composer->getRepositoryManager()
		->createRepository("vcs", $repoConfig)
		->getPackages());
	var_dump($composer->getInstallationManager()->update($composer->getRepositoryManager()
		->createRepository("vcs", $repoConfig)
		->getPackages(), new UpdateOperation($package, $package)));
	?>
</body>
</html>