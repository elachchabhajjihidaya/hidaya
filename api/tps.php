<?php
/**
 * tps.php : espace d'un module
 *   tps.php?module=M201              -> cartes des ATELIERS du module
 *   tps.php?module=M201&atelier=2    -> les TPs de l'atelier 2
 *
 * Structure des données :  module -> ateliers -> TPs (photo + fichier)
 */
require __DIR__ . '/layout.php';

/* ============================== DATA ============================== */
// Vercel sert le contenu de "public/" à la racine du site :
//   public/images/x.jpg -> /images/x.jpg      public/docs/x.pdf -> /docs/x.pdf
$docs = '/docs/';
$imgs = '/images/';

/**
 * photos('m201/atelier1/tp1', 4)  ->  /images/m201/atelier1/tp1-1.jpg ... tp1-4.jpg
 * (les fichiers doivent s'appeler tp1-1.jpg, tp1-2.jpg, ... dans public/images/m201/atelier1/)
 */
function photos(string $base, int $n, string $ext = 'jpg'): array {
    global $imgs;
    $list = [];
    for ($i = 1; $i <= $n; $i++) { $list[] = $imgs . $base . '-' . $i . '.' . $ext; }
    return $list;
}

$tpsData = [

    /* ===================== M201 ===================== */
    'M201' => ['ateliers' => [

        [   // ---------- Atelier 1 ----------
            'title' => 'UML',
            'icon'  => '📐',
            'desc'  => 'MCD, diagrammes de classes et cas d’utilisation réalisés avec Looping et StarUML.',
            'cover' => '',                                   // ex: $imgs . 'atelier1_cover.jpg' (image de la carte)
            // EXEMPLE plusieurs photos pour un TP :
            //   'images' => photos('m201/atelier1/tp1', 4),   // = tp1-1.jpg ... tp1-4.jpg dans public/images/m201/atelier1/
            'tps'   => [
                ['title' => 'TP 1 — Les 5 diagrammes',  'desc' => 'Les cinq diagrammes UML réalisés pendant l’atelier.',        'tags' => ['UML'],                 'image' => '', 'file' => $docs . 'AtelierDiag.pdf'],
                ['title' => 'TP 2 — MCD ChriwBi3',      'desc' => 'Modèle Conceptuel de Données réalisé avec Looping.',        'tags' => ['MCD', 'Looping'],      'image' => '', 'file' => $docs . 'Chriwbi3_MCD.loo'],
                ['title' => 'TP 3 — Diagramme de classe','desc' => 'Diagramme de classe réalisé avec StarUML.',                'tags' => ['UML', 'StarUML'],      'image' => '', 'file' => $docs . 'TP1_DiagrammeClass.mdj'],
                ['title' => 'TP 4 — Exercice StarUML',  'desc' => 'Travail UML réalisé avec StarUML.',                         'tags' => ['StarUML'],             'image' => '', 'file' => $docs . 'Ex.mdj'],
                ['title' => 'TP 5 — Use Case',          'desc' => 'Diagramme de cas d’utilisation réalisé avec StarUML.',      'tags' => ['Use Case', 'StarUML'], 'image' => '', 'file' => $docs . 'USEcase.mdj'],
                ['title' => 'TP 6 — Use Case 2',        'desc' => 'Deuxième diagramme de cas d’utilisation.',                  'tags' => ['Use Case', 'StarUML'], 'image' => '', 'file' => $docs . 'USEcase2.mdj'],
            ],
        ],

        [   // ---------- Atelier 2 ----------
            'title' => 'Figma',
            'icon'  => '🎨',
            'desc'  => 'Mes travaux de conception et de design d’interfaces réalisés avec Figma.',
            'cover' => '',
            'tps'   => [
                ['title' => 'Atelier 1 — Figma', 'desc' => 'Maquette réalisée avec Figma.', 'tags' => ['Figma', 'UI'], 'image' => '',                    'file' => $docs . 'Atelier1.pdf'],
                ['title' => 'Atelier 2 — Figma', 'desc' => 'Maquette réalisée avec Figma.', 'tags' => ['Figma', 'UI'], 'image' => $imgs . 'Frame 4.jpg', 'file' => ''],
            ],
        ],
    ]],

    /* ===================== M202 ===================== */
    'M202' => ['ateliers' => [
        [
            'title' => 'Atelier 1',
            'icon'  => '📋',
            'desc'  => 'Description de l’atelier 1.',
            'cover' => '',
            'tps'   => [
                ['title' => 'TP 1 — Titre', 'desc' => 'Description du TP.', 'tags' => ['Scrum'], 'image' => $imgs . 'm202_tp1.jpg', 'file' => ''],
                ['title' => 'TP 2 — Titre', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'image' => $imgs . 'm202_tp2.jpg', 'file' => ''],
            ],
        ],
        [
            'title' => 'Atelier 2',
            'icon'  => '🧩',
            'desc'  => 'Description de l’atelier 2.',
            'cover' => '',
            'tps'   => [
                ['title' => 'TP 1 — Titre', 'desc' => 'Description du TP.', 'tags' => ['Kanban'], 'image' => '', 'file' => ''],
            ],
        ],
    ]],

    // Pour M203, M204... : copie le bloc 'M202', change le nom et les infos.
];

/* ============================== ROUTING ============================== */
$code = strtoupper($_GET['module'] ?? 'M201');
if (!isset($modules[$code])) { $code = 'M201'; }
$module   = $modules[$code];
$ateliers = $tpsData[$code]['ateliers'] ?? [];

$aNum = (int)($_GET['atelier'] ?? 0);                       // 1, 2, 3... (0 = liste des ateliers)
if ($aNum < 1 || $aNum > count($ateliers)) { $aNum = 0; }
$atelier = $aNum ? $ateliers[$aNum - 1] : null;

$codes = array_keys($modules);
$pos   = array_search($code, $codes, true);
$prevM = $codes[$pos - 1] ?? null;
$nextM = $codes[$pos + 1] ?? null;

$gradients = [
    'linear-gradient(135deg,#7C3AED,#C4A6FF)',
    'linear-gradient(135deg,#4C1D95,#A678FF)',
    'linear-gradient(135deg,#8B5CF6,#E9DDFF)',
    'linear-gradient(135deg,#2E1065,#7C3AED)',
];
$num = fn(int $n): string => sprintf('%02d', $n);

/* ============================== CSS (cette page) ============================== */
$css = <<<'CSS'
.container{width:min(1150px,92%)}
#prog{position:fixed;top:0;left:0;height:3px;width:0;background:var(--grad);z-index:100}
/* ---------- Hero ---------- */
.hero2{position:relative;overflow:hidden;padding:4rem 0 3rem;text-align:center;isolation:isolate}
.blob{position:absolute;border-radius:50%;filter:blur(70px);opacity:.55;z-index:-1;animation:float 12s ease-in-out infinite}
.b1{width:340px;height:340px;background:var(--p300);top:-120px;right:-60px}
.b2{width:300px;height:300px;background:var(--p400);bottom:-140px;left:-60px;animation-delay:-5s}
[data-theme="dark"] .blob{opacity:.3}
@keyframes float{50%{transform:translate(30px,25px) scale(1.08)}}
.big{font-weight:800;line-height:.85;font-size:clamp(5rem,20vw,13rem);color:transparent;-webkit-text-stroke:2px var(--p300);opacity:.55;user-select:none;margin-bottom:-.28em}
[data-theme="dark"] .big{-webkit-text-stroke-color:var(--p400);opacity:.4}
.hero2 .title{position:relative;font-size:clamp(1.9rem,5.5vw,3.2rem)}
.kicker{display:inline-flex;gap:.5rem;align-items:center;padding:.3rem 1rem;border-radius:999px;background:var(--card);border:1px solid var(--border);font-weight:600;font-size:.8rem;letter-spacing:.08em;text-transform:uppercase;color:var(--accent)}
.hero2 .stats{display:flex;gap:.6rem;justify-content:center;flex-wrap:wrap;margin-top:1.2rem}
.pills{display:flex;gap:.5rem;justify-content:center;flex-wrap:wrap;margin-top:1.6rem}
.pill{padding:.35rem 1rem;border-radius:999px;border:1px solid var(--border);background:var(--card);color:var(--text);font-weight:600;font-size:.82rem;transition:.2s}
.pill:hover{border-color:var(--accent);color:var(--accent)}
.pill.active{background:var(--btn);color:#fff;border-color:transparent}
/* ---------- Cartes d'ateliers ---------- */
.sec-title{font-size:1.1rem;font-weight:600;color:var(--muted);text-align:center;margin:1rem 0 2rem;letter-spacing:.04em}
.at-grid{display:grid;gap:1.8rem;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));padding-bottom:3.5rem}
.at{position:relative;display:flex;flex-direction:column;justify-content:flex-end;min-height:380px;border-radius:26px;overflow:hidden;color:#fff;
    box-shadow:var(--shadow);transform:perspective(900px) rotateX(var(--rx,0deg)) rotateY(var(--ry,0deg));transition:transform .25s ease,box-shadow .3s}
.at:hover{box-shadow:0 26px 60px rgba(124,58,237,.35);color:#fff}
.at-bg{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform .6s}
.at:hover .at-bg{transform:scale(1.08)}
.at-bg.pat{background:var(--g);display:grid;place-items:center;font-size:7rem;opacity:1}
.at-bg.pat::before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 20% 20%,rgba(255,255,255,.35) 0 90px,transparent 91px),radial-gradient(circle at 85% 70%,rgba(255,255,255,.2) 0 130px,transparent 131px)}
.at-bg.pat span{position:relative;filter:drop-shadow(0 8px 16px rgba(0,0,0,.25));transform:translateY(-40px)}
.at::after{content:"";position:absolute;inset:0;background:radial-gradient(circle at var(--mx,50%) var(--my,0%),rgba(255,255,255,.28),transparent 45%);opacity:0;transition:opacity .3s;pointer-events:none}
.at:hover::after{opacity:1}
.at-num{position:absolute;top:.4rem;right:1.2rem;font-size:5.5rem;font-weight:800;line-height:1;color:transparent;-webkit-text-stroke:2px rgba(255,255,255,.75)}
.at-body{position:relative;padding:5rem 1.6rem 1.6rem;background:linear-gradient(transparent,rgba(26,11,46,.92) 70%);display:flex;flex-direction:column;gap:.5rem}
.glass{background:rgba(255,255,255,.18);backdrop-filter:blur(8px);color:#fff;align-self:flex-start;border:1px solid rgba(255,255,255,.3)}
.at h2{font-size:1.7rem;line-height:1.2}
.at p{font-size:.9rem;opacity:.9}
.at-foot{display:flex;justify-content:space-between;align-items:center;margin-top:.6rem;font-size:.85rem;font-weight:600}
.arrow{padding:.4rem 1rem;border-radius:999px;background:#fff;color:var(--p700);transition:.3s}
.at:hover .arrow{transform:translateX(6px)}
/* ---------- Vitrine des TPs ---------- */
.showcase{display:grid;gap:4.5rem;padding:1.5rem 0 4rem}
.row{display:grid;gap:2.5rem;align-items:center;grid-template-columns:1.15fr .85fr}
.row:nth-child(even) .frame-wrap{order:2}
.frame-wrap{perspective:1000px}
.frame{border-radius:18px;overflow:hidden;background:var(--card);border:1px solid var(--border);box-shadow:0 24px 50px rgba(124,58,237,.22);transform:rotate(-1.6deg);transition:transform .5s}
.row:nth-child(even) .frame{transform:rotate(1.6deg)}
.row:hover .frame{transform:rotate(0) scale(1.02)}
.bar{display:flex;gap:.4rem;align-items:center;padding:.6rem .9rem;background:var(--accent-soft)}
.bar i{width:11px;height:11px;border-radius:50%;background:var(--p400)}
.bar i:nth-child(2){background:var(--p300)}
.bar i:nth-child(3){background:var(--p200)}
.bar span{margin-left:.6rem;font-size:.75rem;font-weight:600;color:var(--muted)}
.shot{display:block;width:100%;aspect-ratio:16/10;border:0;padding:0;background:var(--grad);position:relative;overflow:hidden}
.shot.has{cursor:zoom-in}
.shot img{width:100%;height:100%;object-fit:cover;transition:transform .6s}
.row:hover .shot img{transform:scale(1.05)}
.shot .zoom{position:absolute;right:.8rem;bottom:.8rem;background:rgba(26,11,46,.75);color:#fff;font-size:.75rem;font-weight:600;padding:.3rem .8rem;border-radius:999px;opacity:0;transition:.3s}
.row:hover .zoom{opacity:1}
.shot.empty{display:grid;place-items:center;color:#fff;text-align:center}
.shot.empty b{font-size:3.4rem;display:block;line-height:1.2}
.shot.empty span{font-size:.8rem;opacity:.85}
.info{position:relative}
.tpn{display:block;font-size:5rem;font-weight:800;line-height:.9;color:transparent;-webkit-text-stroke:2px var(--p300);opacity:.7;margin-bottom:-.5rem}
[data-theme="dark"] .tpn{-webkit-text-stroke-color:var(--p400)}
.info h3{font-size:1.5rem;line-height:1.3;margin-bottom:.5rem}
.info p{color:var(--muted);margin-bottom:1rem}
.tags{display:flex;gap:.4rem;flex-wrap:wrap;margin-bottom:1.2rem}
.actions{display:flex;gap:.6rem;flex-wrap:wrap}
@media(max-width:800px){
  .row{grid-template-columns:1fr;gap:1.2rem}
  .row:nth-child(even) .frame-wrap{order:0}
  .showcase{gap:3.5rem}
}
/* Miniatures */
.thumbs{display:grid;grid-template-columns:repeat(5,1fr);gap:.4rem;padding:.5rem;background:var(--accent-soft)}
.th{position:relative;aspect-ratio:1;border:2px solid transparent;border-radius:8px;overflow:hidden;padding:0;cursor:zoom-in;background:var(--card)}
.th:hover{border-color:var(--accent)}
.th img{width:100%;height:100%;object-fit:cover}
.th .more{position:absolute;inset:0;display:grid;place-items:center;background:rgba(26,11,46,.7);color:#fff;font-weight:700}
/* ---------- Divers ---------- */
.soon{max-width:640px;margin:2.5rem auto 3rem;text-align:center;border-style:dashed;border-width:2px}
.soon .bigi{font-size:3.2rem}
.soon h3{margin:.4rem 0}
.soon p{color:var(--muted);margin-bottom:1.2rem}
.pn{display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;padding-bottom:4rem}
dialog#lb{border:0;background:transparent;max-width:min(1000px,94vw);width:100%;margin:auto;padding:0;overflow:visible}
dialog#lb::backdrop{background:rgba(18,7,31,.88);backdrop-filter:blur(5px)}
#lb figure{background:var(--card);border-radius:var(--radius);overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.5)}
#lb img{width:100%;max-height:78vh;object-fit:contain;background:#12071F}
#lb figcaption{padding:1rem 1.4rem;font-weight:600}
#lb .nav{position:absolute;top:50%;transform:translateY(-50%);width:44px;height:44px;border-radius:50%;border:0;background:rgba(124,58,237,.9);color:#fff;font-size:1.3rem;cursor:pointer;z-index:2}
#lb .prev{left:10px}#lb .next{right:10px}
#lb .x{position:absolute;top:-14px;right:-6px;width:42px;height:42px;border-radius:50%;border:0;background:var(--btn);color:#fff;font-size:1.2rem;cursor:pointer;box-shadow:var(--shadow);z-index:2}
@media(prefers-reduced-motion:reduce){.blob{animation:none}.at,.frame{transform:none!important}}
CSS;

$pageTitle = $atelier ? $code . ' — Atelier ' . $num($aNum) . ' ' . $atelier['title'] : $code . ' — ' . $module['title'];
page_start($pageTitle, 'Mes travaux pratiques : ' . $module['title'], $css);
?>
<div id="prog"></div>

<?php if (!$ateliers): ?>
<!-- ======================= MODULE SANS ATELIER ======================= -->
<section class="hero2">
  <span class="blob b1"></span><span class="blob b2"></span>
  <div class="container reveal">
    <a href="modules.php" class="crumb">← Retour aux modules</a>
    <div class="big" aria-hidden="true"><?= e($code) ?></div>
    <h1 class="title"><?= e($module['title']) ?></h1>
    <p class="subtitle"><?= e($module['desc']) ?></p>
  </div>
</section>
<div class="container">
  <div class="card soon reveal">
    <div class="bigi">🖼️</div>
    <h3>L’espace de ce module est prêt</h3>
    <p>Les ateliers et leurs TPs seront ajoutés ici très bientôt.</p>
    <a class="btn outline" href="modules.php">← Voir les autres modules</a>
  </div>
</div>

<?php elseif (!$atelier): ?>
<!-- ======================= LISTE DES ATELIERS ======================= -->
<section class="hero2">
  <span class="blob b1"></span><span class="blob b2"></span>
  <div class="container reveal">
    <a href="modules.php" class="crumb">← Retour aux modules</a><br>
    <div class="big" aria-hidden="true"><?= e($code) ?></div>
    <h1 class="title"><?= e($module['title']) ?></h1>
    <p class="subtitle"><?= e($module['desc']) ?></p>
    <div class="stats">
      <span class="chip">🧪 <?= count($ateliers) ?> atelier<?= count($ateliers) > 1 ? 's' : '' ?></span>
      <span class="chip">📁 <?= array_sum(array_map(fn($a) => count($a['tps']), $ateliers)) ?> TPs</span>
    </div>
    <nav class="pills" aria-label="Modules">
      <?php foreach ($modules as $c => $m): ?>
        <a class="pill <?= $c === $code ? 'active' : '' ?>" href="<?= e($m['link'] ?? 'tps.php?module=' . $c) ?>"><?= e($c) ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</section>

<div class="container">
  <p class="sec-title">Choisis un atelier pour découvrir ses TPs ↓</p>
  <div class="at-grid">
    <?php foreach ($ateliers as $i => $a):
          $n = $i + 1; $cover = !empty($a['cover']) ? fileUrl($a['cover']) : ''; ?>
      <a class="at reveal" href="tps.php?module=<?= e($code) ?>&amp;atelier=<?= $n ?>" aria-label="Ouvrir l’atelier <?= $n ?> : <?= e($a['title']) ?>">
        <?php if ($cover): ?>
          <img class="at-bg" src="<?= e($cover) ?>" alt="" loading="lazy">
        <?php else: ?>
          <div class="at-bg pat" style="--g:<?= $gradients[$i % count($gradients)] ?>"><span><?= e($a['icon']) ?></span></div>
        <?php endif; ?>
        <span class="at-num" aria-hidden="true"><?= $num($n) ?></span>
        <div class="at-body">
          <span class="chip glass">Atelier <?= $num($n) ?></span>
          <h2><?= e($a['title']) ?></h2>
          <p><?= e($a['desc']) ?></p>
          <div class="at-foot"><span>📁 <?= count($a['tps']) ?> TP<?= count($a['tps']) > 1 ? 's' : '' ?></span><span class="arrow">Ouvrir →</span></div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="pn">
    <?php if ($prevM): ?><a class="btn outline" href="tps.php?module=<?= $prevM ?>">← <?= e($prevM) ?></a><?php else: ?><span></span><?php endif; ?>
    <?php if ($nextM): ?><a class="btn outline" href="tps.php?module=<?= $nextM ?>"><?= e($nextM) ?> →</a><?php endif; ?>
  </div>
</div>

<?php else: ?>
<!-- ======================= TPs D'UN ATELIER ======================= -->
<section class="hero2">
  <span class="blob b1"></span><span class="blob b2"></span>
  <div class="container reveal">
    <a href="tps.php?module=<?= e($code) ?>" class="crumb">← Retour aux ateliers de <?= e($code) ?></a><br>
    <div class="big" aria-hidden="true"><?= $num($aNum) ?></div>
    <span class="kicker"><?= e($atelier['icon']) ?> <?= e($code) ?> · Atelier <?= $num($aNum) ?></span>
    <h1 class="title" style="margin-top:.8rem"><?= e($atelier['title']) ?></h1>
    <p class="subtitle"><?= e($atelier['desc']) ?></p>
    <div class="stats"><span class="chip">📁 <?= count($atelier['tps']) ?> TP<?= count($atelier['tps']) > 1 ? 's' : '' ?></span></div>
    <nav class="pills" aria-label="Ateliers">
      <?php foreach ($ateliers as $i => $a): ?>
        <a class="pill <?= $i + 1 === $aNum ? 'active' : '' ?>" href="tps.php?module=<?= e($code) ?>&amp;atelier=<?= $i + 1 ?>">Atelier <?= $num($i + 1) ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</section>

<div class="container">
  <div class="showcase">
    <?php foreach ($atelier['tps'] as $k => $tp):
          // Photos du TP : 'images' => [..] (plusieurs)  ou  'image' => '..' (une seule)
          $pics = array_values(array_filter((array)($tp['images'] ?? ($tp['image'] ?? []))));
          $pics = array_map('fileUrl', $pics);
          $file = !empty($tp['file']) ? fileUrl($tp['file']) : '';
          $ext  = strtolower(pathinfo($tp['file'] ?? '', PATHINFO_EXTENSION));
          $open = in_array($ext, ['pdf', 'jpg', 'jpeg', 'png', 'webp'], true);
          $g    = e(json_encode($pics)); ?>
      <article class="row reveal">
        <div class="frame-wrap">
          <div class="frame">
            <div class="bar"><i></i><i></i><i></i><span>TP <?= $num($k + 1) ?><?= count($pics) > 1 ? ' · ' . count($pics) . ' photos' : '' ?></span></div>
            <?php if ($pics): ?>
              <button type="button" class="shot has" data-gallery="<?= $g ?>" data-start="0" data-title="<?= e($tp['title']) ?>" aria-label="Agrandir : <?= e($tp['title']) ?>">
                <img src="<?= e($pics[0]) ?>" alt="Photo du <?= e($tp['title']) ?>" loading="lazy">
                <span class="zoom">🔍 Agrandir</span>
              </button>
              <?php if (count($pics) > 1): ?>
                <div class="thumbs">
                  <?php foreach (array_slice($pics, 0, 5) as $ti => $u): ?>
                    <button type="button" class="th" data-gallery="<?= $g ?>" data-start="<?= $ti ?>" data-title="<?= e($tp['title']) ?>" aria-label="Photo <?= $ti + 1 ?>">
                      <img src="<?= e($u) ?>" alt="" loading="lazy">
                      <?php if ($ti === 4 && count($pics) > 5): ?><span class="more">+<?= count($pics) - 5 ?></span><?php endif; ?>
                    </button>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            <?php else: ?>
              <div class="shot empty"><div><b><?= e($atelier['icon']) ?></b><span>Photos à ajouter</span></div></div>
            <?php endif; ?>
          </div>
        </div>
        <div class="info">
          <span class="tpn" aria-hidden="true"><?= $num($k + 1) ?></span>
          <h3><?= e($tp['title']) ?></h3>
          <p><?= e($tp['desc']) ?></p>
          <?php if (!empty($tp['tags'])): ?>
            <div class="tags"><?php foreach ($tp['tags'] as $t): ?><span class="chip"><?= e($t) ?></span><?php endforeach; ?></div>
          <?php endif; ?>
          <div class="actions">
            <?php if ($pics): ?><button type="button" class="btn outline" data-gallery="<?= $g ?>" data-start="0" data-title="<?= e($tp['title']) ?>">Voir les photos<?= count($pics) > 1 ? ' (' . count($pics) . ')' : '' ?></button><?php endif; ?>
            <?php if ($file): ?><a class="btn" href="<?= e($file) ?>" <?= $open ? 'target="_blank" rel="noopener"' : 'download' ?>><?= $open ? 'Ouvrir le fichier' : 'Télécharger' ?></a><?php endif; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

  <div class="pn">
    <?php if ($aNum > 1): ?><a class="btn outline" href="tps.php?module=<?= e($code) ?>&amp;atelier=<?= $aNum - 1 ?>">← Atelier <?= $num($aNum - 1) ?></a><?php else: ?><a class="btn outline" href="tps.php?module=<?= e($code) ?>">← Tous les ateliers</a><?php endif; ?>
    <?php if ($aNum < count($ateliers)): ?><a class="btn" href="tps.php?module=<?= e($code) ?>&amp;atelier=<?= $aNum + 1 ?>">Atelier <?= $num($aNum + 1) ?> →</a><?php endif; ?>
  </div>
</div>
<?php endif; ?>

<!-- Lightbox (photo en grand) -->
<dialog id="lb" aria-label="Photo du TP">
  <button class="x" type="button" aria-label="Fermer">✕</button>
  <button class="nav prev" type="button" aria-label="Photo précédente">‹</button>
  <button class="nav next" type="button" aria-label="Photo suivante">›</button>
  <figure><img id="lbImg" src="" alt=""><figcaption id="lbCap"></figcaption></figure>
</dialog>

<script>
/* Barre de progression du scroll */
const prog = document.getElementById('prog');
addEventListener('scroll', () => {
  const h = document.documentElement;
  prog.style.width = (h.scrollTop / Math.max(1, h.scrollHeight - h.clientHeight) * 100) + '%';
}, { passive: true });

/* Effet 3D + lumière sur les cartes d'ateliers */
if (matchMedia('(hover:hover)').matches && !matchMedia('(prefers-reduced-motion:reduce)').matches) {
  document.querySelectorAll('.at').forEach(c => {
    c.addEventListener('mousemove', e => {
      const r = c.getBoundingClientRect(), x = (e.clientX - r.left) / r.width, y = (e.clientY - r.top) / r.height;
      c.style.setProperty('--ry', ((x - .5) * 10) + 'deg');
      c.style.setProperty('--rx', ((.5 - y) * 10) + 'deg');
      c.style.setProperty('--mx', (x * 100) + '%');
      c.style.setProperty('--my', (y * 100) + '%');
    });
    c.addEventListener('mouseleave', () => { c.style.setProperty('--rx', '0deg'); c.style.setProperty('--ry', '0deg'); });
  });
}

/* Lightbox avec galerie (flèches ← → du clavier aussi) */
const lb = document.getElementById('lb'), lbImg = document.getElementById('lbImg'), lbCap = document.getElementById('lbCap');
let pics = [], idx = 0, ttl = '';
const showPic = () => {
  lbImg.src = pics[idx]; lbImg.alt = ttl;
  lbCap.textContent = ttl + (pics.length > 1 ? '  (' + (idx + 1) + ' / ' + pics.length + ')' : '');
  lb.querySelectorAll('.nav').forEach(n => n.hidden = pics.length < 2);
};
const step = d => { idx = (idx + d + pics.length) % pics.length; showPic(); };
document.querySelectorAll('[data-gallery]').forEach(el => el.addEventListener('click', () => {
  pics = JSON.parse(el.dataset.gallery); idx = +el.dataset.start || 0; ttl = el.dataset.title;
  showPic(); lb.showModal();
}));
lb.querySelector('.prev').addEventListener('click', () => step(-1));
lb.querySelector('.next').addEventListener('click', () => step(1));
lb.querySelector('.x').addEventListener('click', () => lb.close());
lb.addEventListener('click', e => { if (e.target === lb) lb.close(); });
addEventListener('keydown', e => { if (!lb.open) return; if (e.key === 'ArrowLeft') step(-1); if (e.key === 'ArrowRight') step(1); });
</script>
<?php page_end();