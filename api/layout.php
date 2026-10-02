<?php
/**
 * layout.php : partie commune (design, navbar, footer, données des modules)
 * Utilisé par modules.php et tps.php. Pas besoin de l'ouvrir dans le navigateur.
 */

/* ============================== DATA ============================== */
$site = [
    'name'     => 'Hidaya El Achchab Hadji',
    'initials' => 'HE',
    'filiere'  => 'Développement Digital — Option Web Full Stack',
];

// Tes modules : code, lien du bouton "Voir les TPs", titre, description
$modules = [
    'M201' => ['link' => 'tps.php?module=M201', 'title' => 'Préparation d’un projet web',             'desc' => 'Préparation et organisation d’un projet de développement web.'],
    'M202' => ['link' => 'tps.php?module=M202', 'title' => 'Approche agile',                          'desc' => 'Méthodes et pratiques agiles utilisées dans la gestion des projets.'],
    'M203' => ['link' => 'tps.php?module=M203', 'title' => 'Gestion des données',                     'desc' => 'Conception, organisation et gestion des bases de données.'],
    'M204' => ['link' => 'tps.php?module=M204', 'title' => 'Développement front-end',                 'desc' => 'Création des interfaces web avec HTML, CSS et JavaScript.'],
    'M205' => ['link' => 'tps.php?module=M205', 'title' => 'Développement back-end',                  'desc' => 'Développement côté serveur avec PHP et gestion des fonctionnalités web.'],
    'M206' => ['link' => 'tps.php?module=M206', 'title' => 'Création d’une application Cloud native', 'desc' => 'Développement et déploiement d’applications adaptées au Cloud.'],
];

/* ============================== HELPERS ============================== */
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

// Encode un chemin de fichier (espaces, etc.) sans casser les "/"
function fileUrl(string $path): string {
    return implode('/', array_map('rawurlencode', explode('/', $path)));
}

/* ============================== PAGE START ============================== */
function page_start(string $title, string $desc = ''): void {
    global $site; ?>
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?> | <?= e($site['name']) ?></title>
<meta name="description" content="<?= e($desc ?: $title . ' - ' . $site['name']) ?>">
<meta name="theme-color" content="#7C3AED">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
  // Thème sauvegardé (même clé que index.php)
  (function(){try{var t=localStorage.getItem('theme');
  if(!t&&window.matchMedia('(prefers-color-scheme: dark)').matches)t='dark';
  if(t)document.documentElement.setAttribute('data-theme',t);}catch(e){}})();
</script>
<style>
:root{
  --p100:#E9DDFF;--p200:#D8C4FF;--p300:#C4A6FF;--p400:#A678FF;--p800:#4C1D95;--p900:#2E1065;
  --bg:#F5F0FF;--card:#fff;--text:#1A0B2E;--muted:#4C1D95;--border:#D8C4FF;
  --accent:#7C3AED;--accent-soft:#E9DDFF;--footer:#1A0B2E;--nav:rgba(245,240,255,.85);
  --grad:linear-gradient(135deg,#7C3AED,#C4A6FF);--btn:linear-gradient(135deg,#7C3AED,#8B5CF6);
  --shadow:0 10px 30px rgba(124,58,237,.12);--radius:16px;
}
[data-theme="dark"]{
  --bg:#1A0B2E;--card:#2E1065;--text:#F5F0FF;--muted:#D8C4FF;--border:#4C1D95;
  --accent:#A678FF;--accent-soft:#4C1D95;--footer:#12071F;--nav:rgba(26,11,46,.85);
  --grad:linear-gradient(135deg,#A678FF,#E9DDFF);--shadow:0 10px 30px rgba(0,0,0,.35);
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Poppins',system-ui,sans-serif;background:var(--bg);color:var(--text);line-height:1.7;transition:background .3s,color .3s;min-height:100vh;display:flex;flex-direction:column}
main{flex:1}
a{color:var(--accent);text-decoration:none}
.container{width:min(1000px,92%);margin-inline:auto}
:focus-visible{outline:3px solid var(--p400);outline-offset:3px}
/* Navbar */
header{position:sticky;top:0;z-index:50;background:var(--nav);backdrop-filter:blur(12px);border-bottom:1px solid var(--border)}
.nav{display:flex;align-items:center;justify-content:space-between;height:68px}
.logo{font-weight:700;font-size:1.2rem;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.nav-right{display:flex;align-items:center;gap:1.2rem}
.nav-right a{color:var(--text);font-weight:500;font-size:.92rem}
.nav-right a:hover{color:var(--accent)}
.icon-btn{background:var(--card);border:1px solid var(--border);color:var(--text);width:40px;height:40px;border-radius:50%;cursor:pointer;font-size:1.1rem}
/* Titles / buttons */
.page-head{padding:4rem 0 2.5rem;text-align:center}
h1.title{font-size:clamp(1.8rem,5vw,2.6rem);background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent;margin-bottom:.5rem}
.subtitle{color:var(--muted)}
.crumb{display:inline-block;margin-bottom:1rem;font-weight:500;font-size:.92rem}
.btn{display:inline-block;padding:.6rem 1.3rem;border-radius:999px;border:2px solid transparent;font:600 .88rem 'Poppins',sans-serif;cursor:pointer;background:var(--btn);color:#fff;box-shadow:var(--shadow);transition:transform .2s,box-shadow .2s;white-space:nowrap}
.btn:hover{transform:translateY(-3px);box-shadow:0 14px 34px rgba(124,58,237,.35);color:#fff}
.btn.outline{background:transparent;color:var(--accent);border-color:var(--accent);box-shadow:none}
.chip{display:inline-block;padding:.2rem .8rem;border-radius:999px;background:var(--accent-soft);color:var(--text);font-size:.8rem;font-weight:600}
/* Cards */
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.8rem;box-shadow:var(--shadow);transition:transform .3s,box-shadow .3s}
.card:hover{transform:translateY(-6px);box-shadow:0 18px 40px rgba(124,58,237,.22)}
.grid{display:grid;gap:1.5rem;padding-bottom:4rem}
.grid.two{grid-template-columns:repeat(2,1fr)}
@media(max-width:700px){.grid.two{grid-template-columns:1fr}}
/* Modules */
.module{display:flex;flex-direction:column;gap:.5rem}
.module .code{color:var(--accent);font-weight:700;letter-spacing:.06em}
.module h2{font-size:1.25rem}
.module p{color:var(--muted);font-size:.92rem;margin-bottom:1rem}
.module .btn{margin-top:auto;align-self:flex-start}
/* Catégories (TPs) */
.cat{text-align:center;cursor:pointer;border:1px solid var(--border);font:inherit;color:inherit;width:100%}
.cat .icon{font-size:3rem;margin-bottom:.5rem}
.cat h3{font-size:1.4rem;margin-bottom:.4rem}
.cat p{color:var(--muted);font-size:.92rem}
.cat .count{margin-top:.8rem}
/* Liste de TPs */
.panel[hidden]{display:none}
.panel-head{display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:1.5rem}
.panel-head h2{color:var(--accent);font-size:1.5rem}
.tp-list{display:grid;gap:1rem;padding-bottom:4rem}
.tp{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:1.4rem 1.6rem}
.tp h3{font-size:1.05rem}
.tp p{color:var(--muted);font-size:.9rem}
.empty{text-align:center;color:var(--muted);padding:3rem 1.5rem}
@media(max-width:600px){.tp{flex-direction:column;align-items:flex-start}.tp .btn{width:100%;text-align:center}}
/* Footer */
footer{background:var(--footer);color:var(--p100);text-align:center;padding:1.8rem 0;font-size:.9rem}
/* Animation */
.reveal{opacity:0;transform:translateY(24px);transition:opacity .6s,transform .6s}
.reveal.show{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){*{transition:none!important}.reveal{opacity:1;transform:none}}
</style>
</head>
<body>
<header>
  <nav class="container nav" aria-label="Navigation">
    <a href="index.php" class="logo"><?= e($site['initials']) ?>.</a>
    <div class="nav-right">
      <a href="index.php">Accueil</a>
      <a href="modules.php">Modules</a>
      <button class="icon-btn" id="themeBtn" aria-label="Changer de thème">🌙</button>
    </div>
  </nav>
</header>
<main>
<?php }

/* ============================== PAGE END ============================== */
function page_end(): void {
    global $site; ?>
</main>
<footer>
  <div class="container">© <?= date('Y') ?> <?= e($site['name']) ?> — Portfolio</div>
</footer>
<script>
/* Thème clair / sombre */
const root = document.documentElement, themeBtn = document.getElementById('themeBtn');
const paint = () => themeBtn.textContent = root.dataset.theme === 'dark' ? '☀️' : '🌙';
paint();
themeBtn.addEventListener('click', () => {
  root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
  try { localStorage.setItem('theme', root.dataset.theme); } catch (e) {}
  paint();
});
/* Animation au scroll */
const io = new IntersectionObserver(es => es.forEach(en => {
  if (en.isIntersecting) { en.target.classList.add('show'); io.unobserve(en.target); }
}), { threshold: .12 });
const watch = () => document.querySelectorAll('.reveal:not(.show)').forEach(el => io.observe(el));
watch();
</script>
</body>
</html>
<?php }