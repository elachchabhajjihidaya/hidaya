<?php
/**
 * tps.php : espace TPs d'un module  (ex: tps.php?module=M201)
 * Chaque TP a sa PHOTO (image) + son fichier (PDF, .mdj, .loo...).
 * Pour ajouter un TP : copie un bloc dans 'items' du bon module.
 */
require __DIR__ . '/layout.php';

/* ============================== DATA ============================== */
// Structure : portfolio/api/tps.php  +  portfolio/public/docs  +  portfolio/public/images
// Sur Vercel, le contenu du dossier "public" est servi à la RACINE du site :
//   public/images/photo.jpg  ->  https://ton-site/images/photo.jpg
// Donc on utilise des chemins qui commencent par "/" (et SANS "public" dedans).
$docs = '/docs/';      // PDF, .mdj, .loo ...
$imgs = '/images/';    // photos / captures d'écran des TPs

$tpsData = [
    'M201' => [
        // catégories (filtres) : clé => [icône, nom]
        'categories' => [
            'uml'   => ['📐', 'UML'],
            'figma' => ['🎨', 'Figma'],
        ],
        'items' => [
            [
                'cat'   => 'uml',
                'title' => 'TP 1 — Les 5 diagrammes (Atelier)',
                'desc'  => 'Les cinq diagrammes UML réalisés pendant l’atelier.',
                'tags'  => ['UML'],
                'image' => '',                          // ex: $imgs . 'tp1.jpg'  (fichier dans public/images/)
                'file'  => $docs . 'AtelierDiag.pdf',
            ],
            [
                'cat'   => 'uml',
                'title' => 'TP 2 — MCD ChriwBi3',
                'desc'  => 'Modèle Conceptuel de Données réalisé avec Looping.',
                'tags'  => ['MCD', 'Looping'],
                'image' => '',
                'file'  => $docs . 'Chriwbi3_MCD.loo',
            ],
            [
                'cat'   => 'uml',
                'title' => 'TP 3 — Diagramme de classe',
                'desc'  => 'Diagramme de classe réalisé avec StarUML.',
                'tags'  => ['UML', 'StarUML'],
                'image' => '',
                'file'  => $docs . 'TP1_DiagrammeClass.mdj',
            ],
            [
                'cat'   => 'uml',
                'title' => 'TP 4 — Exercice StarUML',
                'desc'  => 'Travail UML réalisé avec StarUML.',
                'tags'  => ['StarUML'],
                'image' => '',
                'file'  => $docs . 'Ex.mdj',
            ],
            [
                'cat'   => 'uml',
                'title' => 'TP 5 — Use Case',
                'desc'  => 'Diagramme de cas d’utilisation réalisé avec StarUML.',
                'tags'  => ['Use Case', 'StarUML'],
                'image' => '',
                'file'  => $docs . 'USEcase.mdj',
            ],
            [
                'cat'   => 'uml',
                'title' => 'TP 6 — Use Case 2',
                'desc'  => 'Deuxième diagramme de cas d’utilisation.',
                'tags'  => ['Use Case', 'StarUML'],
                'image' => '',
                'file'  => $docs . 'USEcase2.mdj',
            ],
            [
                'cat'   => 'figma',
                'title' => 'Atelier 1 — Figma',
                'desc'  => 'Maquette réalisée avec Figma.',
                'tags'  => ['Figma', 'UI'],
                'image' => '',
                'file'  => $docs . 'Atelier1.pdf',
            ],
            [
                'cat'   => 'figma',
                'title' => 'Atelier 2 — Figma',
                'desc'  => 'Maquette réalisée avec Figma.',
                'tags'  => ['Figma', 'UI'],
                'image' => $imgs . 'Frame 4.jpg',        // ici la photo existe déjà
                'file'  => '',                          // pas de fichier : la photo suffit
            ],
        ],
    ],

    // ===================== M202 =====================
    'M202' => [
        'categories' => [
            'agile' => ['📋', 'Agile'],
        ],
        'items' => [
            [
                'cat'   => 'agile',
                'title' => 'TP 1 — Titre du TP',
                'desc'  => 'Description courte du TP.',
                'tags'  => ['Scrum'],
                'image' => $imgs . 'm202_tp1.jpg',     // photo à mettre dans public/images/
                'file'  => '',                         // ou $docs . 'm202_tp1.pdf' (fichier dans public/docs/)
            ],
            [
                'cat'   => 'agile',
                'title' => 'TP 2 — Titre du TP',
                'desc'  => 'Description courte du TP.',
                'tags'  => ['Agile'],
                'image' => $imgs . 'm202_tp2.jpg',
                'file'  => '',
            ],
        ],
    ],

    // Pour M203, M204... : copie le bloc 'M202' ci-dessus, change le nom et les infos.
];

/* ============================== ROUTING ============================== */
$code = strtoupper($_GET['module'] ?? 'M201');
if (!isset($modules[$code])) { $code = 'M201'; }
$module = $modules[$code];
$cats   = $tpsData[$code]['categories'] ?? [];
$items  = $tpsData[$code]['items'] ?? [];

$codes = array_keys($modules);
$pos   = array_search($code, $codes, true);
$prev  = $codes[$pos - 1] ?? null;
$next  = $codes[$pos + 1] ?? null;

/* ============================== CSS (cette page) ============================== */
$css = <<<'CSS'
.container{width:min(1150px,92%)}
/* Hero du module */
.mhero{padding:3.5rem 0 1.5rem;text-align:center;background:radial-gradient(circle at 85% 0,var(--p200) 0,transparent 45%),radial-gradient(circle at 5% 100%,var(--p100) 0,transparent 40%)}
[data-theme="dark"] .mhero{background:radial-gradient(circle at 85% 0,var(--p800) 0,transparent 45%),radial-gradient(circle at 5% 100%,var(--p900) 0,transparent 40%)}
.badge{display:inline-block;padding:.25rem 1rem;border-radius:999px;background:var(--btn);color:#fff;font-weight:700;letter-spacing:.08em;font-size:.85rem;margin-bottom:.8rem}
.mhero .stats{display:flex;gap:.6rem;justify-content:center;flex-wrap:wrap;margin-top:1rem}
/* Sélecteur de modules */
.pills{display:flex;gap:.5rem;justify-content:center;flex-wrap:wrap;margin:1.6rem 0 0}
.pill{padding:.35rem 1rem;border-radius:999px;border:1px solid var(--border);background:var(--card);color:var(--text);font-weight:600;font-size:.82rem;transition:.2s}
.pill:hover{border-color:var(--accent);color:var(--accent)}
.pill.active{background:var(--btn);color:#fff;border-color:transparent}
/* Filtres */
.filters{display:flex;gap:.6rem;justify-content:center;flex-wrap:wrap;margin:2.2rem 0 2rem}
.filter{padding:.5rem 1.2rem;border-radius:999px;border:1px solid var(--border);background:var(--card);color:var(--text);font:600 .88rem 'Poppins',sans-serif;cursor:pointer;transition:.2s}
.filter:hover{border-color:var(--accent)}
.filter.active{background:var(--btn);color:#fff;border-color:transparent}
.filter small{opacity:.75;margin-left:.3rem}
/* Grille de TPs */
.tp-grid{display:grid;gap:1.6rem;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));padding-bottom:3rem}
.tpc{padding:0;overflow:hidden;display:flex;flex-direction:column}
.tpc[hidden]{display:none}
.shot{position:relative;aspect-ratio:16/10;background:var(--grad);overflow:hidden;border:0;width:100%;padding:0;display:block}
.shot.has{cursor:zoom-in}
.shot img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.tpc:hover .shot img{transform:scale(1.06)}
.shot .zoom{position:absolute;right:.8rem;bottom:.8rem;background:rgba(26,11,46,.7);color:#fff;font-size:.75rem;font-weight:600;padding:.25rem .7rem;border-radius:999px;opacity:0;transition:.3s}
.tpc:hover .zoom{opacity:1}
.shot.empty{display:grid;place-items:center;color:#fff;text-align:center;cursor:default}
.shot.empty b{font-size:3rem;display:block;line-height:1.2}
.shot.empty span{font-size:.78rem;opacity:.85;font-weight:500}
.tpc-body{padding:1.4rem;display:flex;flex-direction:column;gap:.6rem;flex:1}
.tpc-top{display:flex;justify-content:space-between;gap:.5rem;align-items:center}
.tpc h3{font-size:1.1rem;line-height:1.35}
.tpc p{color:var(--muted);font-size:.9rem}
.tags{display:flex;gap:.4rem;flex-wrap:wrap}
.actions{display:flex;gap:.6rem;flex-wrap:wrap;margin-top:auto;padding-top:.6rem}
.actions .btn{padding:.5rem 1.1rem;font-size:.82rem}
/* Message module vide */
.soon{max-width:640px;margin:2.5rem auto 3rem;text-align:center;border-style:dashed;border-width:2px}
.soon .big{font-size:3.2rem}
.soon h3{margin:.4rem 0}
.soon p{color:var(--muted);margin-bottom:1.2rem}
/* Précédent / Suivant */
.pn{display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;padding-bottom:4rem}
/* Lightbox */
dialog#lb{border:0;background:transparent;max-width:min(1000px,94vw);width:100%;margin:auto;padding:0;overflow:visible}
dialog#lb::backdrop{background:rgba(18,7,31,.85);backdrop-filter:blur(4px)}
#lb figure{background:var(--card);border-radius:var(--radius);overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.5)}
#lb img{width:100%;max-height:78vh;object-fit:contain;background:#12071F}
#lb figcaption{padding:1rem 1.4rem;font-weight:600}
#lb .x{position:absolute;top:-14px;right:-6px;width:42px;height:42px;border-radius:50%;border:0;background:var(--btn);color:#fff;font-size:1.2rem;cursor:pointer;box-shadow:var(--shadow)}
CSS;

page_start('TPs ' . $code . ' — ' . $module['title'], 'Mes travaux pratiques du module ' . $module['title'], $css);

$count = count($items);
?>
<!-- ============ HERO DU MODULE ============ -->
<section class="mhero">
  <div class="container reveal">
    <a href="modules.php" class="crumb">← Retour aux modules</a><br>
    <span class="badge"><?= e($code) ?></span>
    <h1 class="title"><?= e($module['title']) ?></h1>
    <p class="subtitle"><?= e($module['desc']) ?></p>
    <div class="stats">
      <span class="chip">📁 <?= $count ?> TP<?= $count > 1 ? 's' : '' ?></span>
      <span class="chip">🗂️ <?= count($cats) ?> catégorie<?= count($cats) > 1 ? 's' : '' ?></span>
    </div>
    <!-- Aller directement à un autre module -->
    <nav class="pills" aria-label="Modules">
      <?php foreach ($modules as $c => $m): ?>
        <a class="pill <?= $c === $code ? 'active' : '' ?>" href="<?= e($m['link'] ?? 'tps.php?module=' . $c) ?>"><?= e($c) ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</section>

<div class="container">
<?php if (!$items): ?>

  <!-- ============ MODULE SANS TP ============ -->
  <div class="card soon reveal">
    <div class="big">🖼️</div>
    <h3>L’espace de ce module est prêt</h3>
    <p>Les TPs et leurs photos seront ajoutés ici très bientôt.</p>
    <a class="btn outline" href="modules.php">← Voir les autres modules</a>
  </div>

<?php else: ?>

  <!-- ============ FILTRES ============ -->
  <div class="filters" role="group" aria-label="Filtrer par catégorie">
    <button class="filter active" data-cat="all">Tous <small><?= $count ?></small></button>
    <?php foreach ($cats as $k => [$icon, $name]):
          $n = count(array_filter($items, fn($i) => $i['cat'] === $k)); ?>
      <button class="filter" data-cat="<?= e($k) ?>"><?= e($icon) ?> <?= e($name) ?> <small><?= $n ?></small></button>
    <?php endforeach; ?>
  </div>

  <!-- ============ CARTES DE TPs (avec photo) ============ -->
  <div class="tp-grid">
    <?php foreach ($items as $tp):
          [$icon, $catName] = $cats[$tp['cat']] ?? ['📄', ''];
          $img  = !empty($tp['image']) ? fileUrl($tp['image']) : '';
          $file = !empty($tp['file'])  ? fileUrl($tp['file'])  : '';
          $ext  = strtolower(pathinfo($tp['file'] ?? '', PATHINFO_EXTENSION));
          $open = in_array($ext, ['pdf', 'jpg', 'jpeg', 'png', 'webp'], true); ?>
      <article class="card tpc reveal" data-cat="<?= e($tp['cat']) ?>">

        <?php if ($img): ?>
          <button type="button" class="shot has" data-img="<?= e($img) ?>" data-title="<?= e($tp['title']) ?>" aria-label="Agrandir la photo : <?= e($tp['title']) ?>">
            <img src="<?= e($img) ?>" alt="Photo du <?= e($tp['title']) ?>" loading="lazy">
            <span class="zoom">🔍 Agrandir</span>
          </button>
        <?php else: ?>
          <!-- Pas encore de photo : mets le chemin dans 'image' -->
          <div class="shot empty"><div><b><?= e($icon) ?></b><span>Photo à ajouter</span></div></div>
        <?php endif; ?>

        <div class="tpc-body">
          <div class="tpc-top"><span class="chip"><?= e($icon . ' ' . $catName) ?></span></div>
          <h3><?= e($tp['title']) ?></h3>
          <p><?= e($tp['desc']) ?></p>
          <?php if (!empty($tp['tags'])): ?>
            <div class="tags"><?php foreach ($tp['tags'] as $t): ?><span class="chip"><?= e($t) ?></span><?php endforeach; ?></div>
          <?php endif; ?>
          <div class="actions">
            <?php if ($img): ?><button type="button" class="btn outline" data-img="<?= e($img) ?>" data-title="<?= e($tp['title']) ?>">Voir la photo</button><?php endif; ?>
            <?php if ($file): ?>
              <a class="btn" href="<?= e($file) ?>" <?= $open ? 'target="_blank" rel="noopener"' : 'download' ?>><?= $open ? 'Ouvrir le fichier' : 'Télécharger' ?></a>
            <?php endif; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

  <!-- ============ MODULE PRÉCÉDENT / SUIVANT ============ -->
  <div class="pn">
    <?php if ($prev): ?><a class="btn outline" href="tps.php?module=<?= $prev ?>">← <?= e($prev) ?></a><?php else: ?><span></span><?php endif; ?>
    <?php if ($next): ?><a class="btn outline" href="tps.php?module=<?= $next ?>"><?= e($next) ?> →</a><?php endif; ?>
  </div>
</div>

<!-- ============ LIGHTBOX (photo en grand) ============ -->
<dialog id="lb" aria-label="Photo du TP">
  <button class="x" type="button" aria-label="Fermer">✕</button>
  <figure><img id="lbImg" src="" alt=""><figcaption id="lbCap"></figcaption></figure>
</dialog>

<script>
/* Filtre par catégorie */
const filters = document.querySelectorAll('.filter');
filters.forEach(btn => btn.addEventListener('click', () => {
  filters.forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.tpc').forEach(c => {
    c.hidden = btn.dataset.cat !== 'all' && c.dataset.cat !== btn.dataset.cat;
  });
}));

/* Lightbox */
const lb = document.getElementById('lb');
document.querySelectorAll('[data-img]').forEach(el => el.addEventListener('click', () => {
  document.getElementById('lbImg').src = el.dataset.img;
  document.getElementById('lbImg').alt = el.dataset.title;
  document.getElementById('lbCap').textContent = el.dataset.title;
  lb.showModal();
}));
lb.querySelector('.x').addEventListener('click', () => lb.close());
lb.addEventListener('click', e => { if (e.target === lb) lb.close(); });   // clic en dehors = fermer
</script>
<?php page_end();