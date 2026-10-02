<?php
/**
 * tps.php : page des TPs d'un module  (ex: tps.php?module=M201)
 * Ajoute tes TPs dans le tableau $tpsData ci-dessous.
 */
require __DIR__ . '/layout.php';

/* ============================== DATA ============================== */
$docs = 'docs/';      // dossier de tes fichiers (PDF, .mdj, .loo...). Change-le si besoin (ex: '../public/docs/')

$tpsData = [
    'M201' => [
        'uml' => [
            'icon' => '📐', 'name' => 'UML',
            'desc' => 'Mes travaux réalisés avec Looping et StarUML : MCD, diagrammes de classes, Use Case...',
            'items' => [
                ['title' => 'TP 1 — Les 5 diagrammes (Atelier)', 'desc' => 'UML',                                                  'file' => $docs . 'AtelierDiag.pdf'],
                ['title' => 'TP 2 — MCD ChriwBi3',              'desc' => 'Modèle Conceptuel de Données réalisé avec Looping.',   'file' => $docs . 'Chriwbi3_MCD.loo'],
                ['title' => 'TP 3 — Diagramme de classe',       'desc' => 'Diagramme de classe réalisé avec StarUML.',            'file' => $docs . 'TP1_DiagrammeClass.mdj'],
                ['title' => 'TP 4 — Exercice StarUML',          'desc' => 'Travail UML réalisé avec StarUML.',                    'file' => $docs . 'Ex.mdj'],
                ['title' => 'TP 5 — Use Case',                  'desc' => 'Diagramme de cas d\'utilisation réalisé avec StarUML.', 'file' => $docs . 'USEcase.mdj'],
                ['title' => 'TP 6 — Use Case 2',                'desc' => 'Travail UML réalisé avec StarUML.',                    'file' => $docs . 'USEcase2.mdj'],
            ],
        ],
        'figma' => [
            'icon' => '🎨', 'name' => 'Figma',
            'desc' => 'Mes travaux de conception et de design réalisés avec Figma.',
            'items' => [
                ['title' => 'Atelier 1 — Figma', 'desc' => 'Travail réalisé avec Figma.', 'file' => $docs . 'Atelier1.pdf'],
                ['title' => 'Atelier 2 — Figma', 'desc' => 'Travail réalisé avec Figma.', 'file' => 'images/Frame 4.jpg'],
            ],
        ],
    ],
    // 'M202' => [ 'categorie' => ['icon'=>'📋','name'=>'Agile','desc'=>'...','items'=>[ [...] ]] ],
];

/* ============================== ROUTING ============================== */
$code = strtoupper($_GET['module'] ?? 'M201');
if (!isset($modules[$code])) { $code = 'M201'; }       // module inconnu -> M201
$module = $modules[$code];
$cats   = $tpsData[$code] ?? [];

page_start('TPs ' . $code, 'Mes travaux pratiques du module ' . $module['title']);
?>
<section class="page-head">
  <div class="container reveal">
    <a href="modules.php" class="crumb">← Retour aux modules</a>
    <h1 class="title">Mes TPs</h1>
    <p class="subtitle"><?= e($code) ?> — <?= e($module['title']) ?></p>
  </div>
</section>

<div class="container">
<?php if (!$cats): ?>
  <div class="card empty reveal">
    <div style="font-size:3rem">🚧</div>
    <h3>Bientôt disponible</h3>
    <p>Les TPs de ce module seront ajoutés prochainement.</p>
  </div>
  <p style="text-align:center;margin:2rem 0 4rem"><a class="btn outline" href="modules.php">← Voir les autres modules</a></p>
<?php else: ?>

  <!-- ===== Catégories (cartes) ===== -->
  <div id="cats" class="grid two">
    <?php foreach ($cats as $key => $c): ?>
      <button type="button" class="card cat reveal" data-open="<?= e($key) ?>">
        <div class="icon"><?= e($c['icon']) ?></div>
        <h3><?= e($c['name']) ?></h3>
        <p><?= e($c['desc']) ?></p>
        <span class="chip count"><?= count($c['items']) ?> TP<?= count($c['items']) > 1 ? 's' : '' ?></span>
      </button>
    <?php endforeach; ?>
  </div>

  <!-- ===== Liste des TPs de chaque catégorie ===== -->
  <?php foreach ($cats as $key => $c): ?>
    <div class="panel" id="panel-<?= e($key) ?>" hidden>
      <div class="panel-head">
        <h2><?= e($c['icon']) ?> Mes travaux <?= e($c['name']) ?></h2>
        <button type="button" class="btn outline" data-back>← Retour</button>
      </div>
      <div class="tp-list">
        <?php foreach ($c['items'] as $tp):
              $ext  = strtolower(pathinfo($tp['file'], PATHINFO_EXTENSION));
              $view = in_array($ext, ['pdf', 'jpg', 'jpeg', 'png', 'webp'], true); // s'ouvre dans le navigateur ?>
          <div class="card tp">
            <div>
              <h3><?= e($tp['title']) ?></h3>
              <p><?= e($tp['desc']) ?></p>
            </div>
            <a class="btn" href="<?= e(fileUrl($tp['file'])) ?>"
               <?= $view ? 'target="_blank" rel="noopener"' : 'download' ?>>Voir le TP</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>

<?php endif; ?>
</div>

<script>
/* Affiche une catégorie / revient aux cartes */
const cats = document.getElementById('cats');
const panels = document.querySelectorAll('.panel');
function show(key) {
  panels.forEach(p => p.hidden = true);
  if (key && document.getElementById('panel-' + key)) {
    cats.hidden = true;
    document.getElementById('panel-' + key).hidden = false;
  } else if (cats) { cats.hidden = false; }
  window.scrollTo({ top: 0, behavior: 'smooth' });
}
document.querySelectorAll('[data-open]').forEach(b => b.addEventListener('click', () => show(b.dataset.open)));
document.querySelectorAll('[data-back]').forEach(b => b.addEventListener('click', () => show(null)));
</script>
<?php page_end();