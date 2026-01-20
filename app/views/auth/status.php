<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Status Login';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e($pageTitle); ?></title>
</head>
<body>
  <main>
    <h1>Status Login</h1>
    <?php if (!empty($user)) : ?>
      <p>Login sebagai: <?php echo e($user['username']); ?></p>
      <a href="<?php echo e(route_url('admin/logout')); ?>">Logout</a>
    <?php else : ?>
      <p>Belum login.</p>
      <a href="<?php echo e(route_url('admin/login')); ?>">Login</a>
    <?php endif; ?>
  </main>
</body>
</html>
