<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Login';
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
    <h1>Login Admin</h1>
    <?php if (!empty($errors)) : ?>
      <div>
        <ul>
          <?php foreach ($errors as $error) : ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route_url('admin/login')); ?>">
      <?php echo csrf_field(); ?>
      <div>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="<?php echo e($username ?? ''); ?>" required>
      </div>
      <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </main>
</body>
</html>
