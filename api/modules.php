<?php
/**
 * modules.php : page "Mes modules"
 * Les modules sont définis dans layout.php (tableau $modules).
 */
require __DIR__ . '/layout.php';
page_start('Mes Modules', 'Les modules de ma formation en ' . $site['filiere']);
?>
<section class="page-head">
  <div class="container reveal">
    <a href="index.php" class="crumb">← Retour au portfolio</a>
    <h1 class="title">Mes Modules</h1>
    <p class="subtitle"><?= e($site['filiere']) ?></p>
  </div>
</section>

<div class="container">
  <div class="grid two">
    <?php foreach ($modules as $code => $m): ?>
      <article class="card module reveal">
        <span class="code"><?= e($code) ?></span>
        <h2><?= e($m['title']) ?></h2>
        <p><?= e($m['desc']) ?></p>
        <!-- Clic -> page des TPs de ce module -->
        <a class="btn" href="<?= e($m['link'] ?? 'tps.php?module=' . urlencode($code)) ?>">Voir les TPs</a>
      </article>
    <?php endforeach; ?>
  </div>
</div>
<?php page_end();