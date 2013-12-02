<?php
require (__DIR__ . '/vendor/autoload.php');

use Composer\Factory;
use Composer\IO\BufferIO;
use Composer\Repository\RepositoryManager;
use Composer\DependencyResolver\Operation\UpdateOperation;
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
	$repo = $composer->getPackage()->getRepositories();
	$repoConfig = $repo[0];
	$package = $composer->getPackage();
	var_dump($composer->getRepositoryManager()->createRepository("vcs", $repoConfig)->getPackages());
	var_dump($composer->getInstallationManager()->update($composer->getRepositoryManager()->createRepository("vcs", $repoConfig)->getPackages(), new UpdateOperation($package, $package)));
	?>
</body>
</html>