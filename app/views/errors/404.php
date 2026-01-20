<?php
if (!isset($route)) {
    $route = '';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>404</title>
</head>
<body>
  <main>
    <h1>404</h1>
    <p>Halaman tidak ditemukan.</p>
    <?php if ($route !== '') : ?>
      <p>Route: <?php echo e($route); ?></p>
    <?php endif; ?>
    <a href="<?php echo e(route_url('admin/login')); ?>">Kembali ke Login</a>
  </main>
</body>
</html>
