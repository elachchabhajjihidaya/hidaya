<?php
/**
 * index.php : PORTFOLIO COMPLET DANS UN SEUL FICHIER
 * ------------------------------------------------------------------
 *  - Tout le contenu est dans les tableaux PHP ci-dessous.
 *  - Modules -> Ateliers -> TPs s'ouvrent DANS la même page (pas d'autres pages).
 *  - PHOTOS : crée simplement un dossier par TP et mets-y tes photos (n'importe quel nom) :
 *        public/images/m201/atelier1/tp1/   (photos du TP 1 de l'atelier 1 du module M201)
 *        public/images/m201/atelier1/tp2/   ...
 *        public/images/m201/atelier2/tp1/   ...
 *    Elles apparaissent automatiquement, SANS rien écrire dans le code.
 *    Conseil : nomme-les 1.jpg, 2.jpg, 3.jpg ... (marche partout, même sur Vercel).
 *  - FICHIERS (PDF, .mdj, .loo...) : mets-les dans public/docs/ et écris le nom dans 'file'.
 */
session_start();

/* ============================== CONTENT ============================== */
$config = [
    'send_mail' => true,                              // false = simuler l'envoi (test en local)
    'mail_to'   => 'elachchabhajjihidaya@gmail.com',
];

$profile = [
    'name'     => 'Hidaya El Achchab Hadji',
    'title'    => 'Full Stack Developer',
    'subtitle' => 'Digital Development student',
    'location' => 'Tanger, Morocco',
    'email'    => 'elachchabhajjihidaya@gmail.com',
    'phone'    => '0631812693',
    'photo'    => '',  // ex: 'images/me.jpg' (vide = initiales)
    'bio'      => [
        "Hi, I'm Hidaya! I'm a second-year Digital Development student (Full Stack option) at ISTA NTIC Tanger.",
        "I love building modern, responsive web applications and I'm always eager to learn new technologies. I'm currently looking for internship and freelance opportunities, so feel free to reach out!",
    ],
    'links'    => [
        'LinkedIn' => '#',   // ton URL LinkedIn
        'GitHub'   => '#',   // ton URL GitHub
    ],
];

$education = [
    ['period' => '2025 - Present', 'title' => 'Digital Development, Full Stack option (2nd year)', 'place' => 'ISTA NTIC Tanger'],
    ['period' => '2024 - 2025',    'title' => 'Digital Development (1st year)',                     'place' => 'ISTA NTIC Tanger'],
    ['period' => '2025',           'title' => 'Baccalaureate in Physical Sciences',                 'place' => 'Sciences Physiques'],
];

$skills = [ 'HTML' => 90, 'CSS' => 85, 'JavaScript' => 75, 'PHP' => 75, 'MySQL' => 70, 'Git / GitHub' => 70 ];

$languages = [
    ['name' => 'Arabic',  'level' => 'Native'],
    ['name' => 'French',  'level' => 'Professional'],
    ['name' => 'English', 'level' => 'Intermediate'],
];

$filiere = 'Développement Digital — Option Web Full Stack';

/* ---------- MODULES -> ATELIERS -> TPs ----------
 * Chaque TP : title, desc, tags (optionnel), file (optionnel, dans public/docs/),
 *             photos (optionnel, noms à la main si le scan automatique ne marche pas)
 * Dossier des photos du TP = images/{module}/atelier{N}/tp{K}/   (N et K = position dans la liste)
 */
$modules = [
    'M201' => ['title' => 'Préparation d’un projet web', 'desc' => 'Préparation et organisation d’un projet de développement web.', 'ateliers' => [
        ['title' => 'UML', 'icon' => '📐', 'desc' => 'MCD, diagrammes de classes et cas d’utilisation réalisés avec Looping et StarUML.', 'tps' => [
            ['title' => 'TP 1 — Les 5 diagrammes',   'desc' => 'Les cinq diagrammes UML réalisés pendant l’atelier.',   'tags' => ['UML'],                 'file' => 'AtelierDiag.pdf'],
            ['title' => 'TP 2 — MCD ChriwBi3',       'desc' => 'Modèle Conceptuel de Données réalisé avec Looping.',    'tags' => ['MCD', 'Looping'],      'file' => 'Chriwbi3_MCD.loo'],
            ['title' => 'TP 3 — Diagramme de classe','desc' => 'Diagramme de classe réalisé avec StarUML.',             'tags' => ['UML', 'StarUML'],      'file' => 'TP1_DiagrammeClass.mdj'],
            ['title' => 'TP 4 — Exercice StarUML',   'desc' => 'Travail UML réalisé avec StarUML.',                     'tags' => ['StarUML'],             'file' => 'Ex.mdj'],
            ['title' => 'TP 5 — Use Case',           'desc' => 'Diagramme de cas d’utilisation réalisé avec StarUML.',  'tags' => ['Use Case', 'StarUML'], 'file' => 'USEcase.mdj'],
            ['title' => 'TP 6 — Use Case 2',         'desc' => 'Deuxième diagramme de cas d’utilisation.',              'tags' => ['Use Case', 'StarUML'], 'file' => 'USEcase2.mdj'],
        ]],
        ['title' => 'Figma', 'icon' => '🎨', 'desc' => 'Mes travaux de conception et de design d’interfaces réalisés avec Figma.', 'tps' => [
            ['title' => 'Atelier 1 — Figma', 'desc' => 'Maquette réalisée avec Figma.', 'tags' => ['Figma', 'UI'], 'file' => 'Atelier1.pdf'],
            ['title' => 'Atelier 2 — Figma', 'desc' => 'Maquette réalisée avec Figma.', 'tags' => ['Figma', 'UI'], 'file' => '', 'photos' => ['Frame 4.jpg']],
        ]],
    ]],
    'M202' => ['title' => 'Approche agile', 'desc' => 'Méthodes et pratiques agiles utilisées dans la gestion des projets.', 'ateliers' => [
        ['title' => 'Atelier 1', 'icon' => '📋', 'desc' => 'Gestion de projet: Méthodes classiques', 'tps' => [
            ['title' => 'TP 1 — Approche Agile1', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
            ['title' => 'TP 2 — Approche Agile2', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
            ['title' => 'TP 3 — Approche Agile3', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
        ]],
        ['title' => 'Atelier 2', 'icon' => '🧩', 'desc' => 'Gestion de projet Agile.', 'tps' => [
            ['title' => 'TP 1 — Agile et Scrum', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
        ]],
        ['title' => 'Atelier 3', 'icon' => '🧩', 'desc' => 'Les bases de Gitè.', 'tps' => [
            ['title' => 'TP 1 — Titre', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
        ]],
        ['title' => 'Atelier 4', 'icon' => '🧩', 'desc' => 'Les bases de Gitè.', 'tps' => [
            ['title' => 'TP 1 — Titre', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
        ]],
        ['title' => 'Atelier 5', 'icon' => '🧩', 'desc' => 'Git EFM.', 'tps' => [
            ['title' => 'TP 1 — Titre', 'desc' => 'Description du TP.', 'tags' => ['Agile'], 'file' => ''],
        ]],
        ['title' => 'Gestion des stagiaires', 'icon' => '👥','desc'  => 'Application web permettant d’inscrire des stagiaires, d’enregistrer leurs informations dans une base de données MySQL et de gérer leurs photos avec Cloudinary.','link'  => 'https://atelier6-stagiaires-wvwo.vercel.app/'],
    ]],
    'M203' => ['title' => 'Gestion des données',                     'desc' => 'Conception, organisation et gestion des bases de données.',            'ateliers' => []],
    'M204' => ['title' => 'Développement front-end',                 'desc' => 'Création des interfaces web avec HTML, CSS et JavaScript.',            'ateliers' => []],
    'M205' => ['title' => 'Développement back-end',                  'desc' => 'Développement côté serveur avec PHP et gestion des fonctionnalités web.', 'ateliers' => []],
    'M206' => ['title' => 'Création d’une application Cloud native','desc' => 'Développement et déploiement d’applications adaptées au Cloud.',         'ateliers' => []],
    // Pour ajouter des ateliers à M203... : copie le bloc 'ateliers' de M202.
];

$projects = [
    ['title' => 'Project 1 title', 'problem' => 'Describe the problem this project solves.', 'solution' => 'Describe how you solved it.', 'result' => 'Describe the outcome (users, speed, grade...).', 'tools' => ['HTML', 'CSS', 'PHP', 'MySQL'], 'link' => '#modules', 'image' => ''],
    ['title' => 'Project 2 title', 'problem' => 'Describe the problem this project solves.', 'solution' => 'Describe how you solved it.', 'result' => 'Describe the outcome.',                    'tools' => ['JavaScript', 'CSS'],          'link' => '#modules', 'image' => ''],
    ['title' => 'Project 3 title', 'problem' => 'Describe the problem this project solves.', 'solution' => 'Describe how you solved it.', 'result' => 'Describe the outcome.',                    'tools' => ['PHP', 'MySQL', 'Git'],        'link' => '#modules', 'image' => ''],
];

$seo = [
    'title' => $profile['name'] . ' | ' . $profile['title'],
    'desc'  => $profile['name'] . ', Full Stack Developer student in Tanger, Morocco. Portfolio, projects and contact.',
];

/* ============================== HELPERS ============================== */
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

// Trouve le dossier des images sur le serveur (plusieurs emplacements possibles)
function find_dir(array $cands): ?string {
    foreach ($cands as $c) { if ($c && @is_dir($c)) return $c; }
    return null;
}
// Liste les photos d'un dossier (ordre naturel : tp1-2 avant tp1-10)
function scan_photos(?string $root, string $folder): array {
    if (!$root || strpos($folder, '..') !== false) return [];
    $folder = trim($folder, '/');
    $dir = $root . '/' . $folder;
    if (!@is_dir($dir)) return [];
    $out = [];
    foreach (@scandir($dir) ?: [] as $f) {
        if (preg_match('/\.(jpe?g|png|webp|gif|avif)$/i', $f)) $out[] = $f;
    }
    natcasesort($out);
    return array_map(fn($f) => $folder . '/' . $f, array_values($out));
}

$docRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
$imgRoot = find_dir([__DIR__ . '/public/images', __DIR__ . '/../public/images', __DIR__ . '/images', $docRoot . '/images', $docRoot . '/public/images']);

/* Construit les données envoyées au JavaScript (modules -> ateliers -> TPs + photos) */
$DATA = [];
foreach ($modules as $code => $m) {
    $ats = [];
    foreach ($m['ateliers'] as $ai => $a) {
        $tps = []; $cover = '';
        foreach ($a['tps'] as $ti => $tp) {
            $folder = $tp['folder'] ?? strtolower($code) . '/atelier' . ($ai + 1) . '/tp' . ($ti + 1);
            $photos = scan_photos($imgRoot, $folder);
            if (!$photos && !empty($tp['photos'])) {
                $photos = array_map(fn($p) => ltrim($p, '/'), $tp['photos']);
            }
            if (!$cover && $photos) $cover = $photos[0];
            $tps[] = ['title' => $tp['title'], 'desc' => $tp['desc'] ?? '', 'tags' => $tp['tags'] ?? [], 'folder' => $folder, 'photos' => $photos, 'file' => $tp['file'] ?? ''];
        }
        $ats[] = ['title' => $a['title'], 'icon' => $a['icon'] ?? '📁', 'desc' => $a['desc'] ?? '', 'cover' => $a['cover'] ?? $cover, 'tps' => $tps];
    }
    $DATA[$code] = ['title' => $m['title'], 'desc' => $m['desc'], 'ateliers' => $ats];
}

/* ============================== CONTACT FORM ============================== */
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(32)); }
$old = ['name' => '', 'email' => '', 'message' => ''];
$errors = [];
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['name']    = trim(preg_replace('/[\r\n]+/', ' ', strip_tags($_POST['name'] ?? '')));
    $old['email']   = trim(preg_replace('/[\r\n]+/', '', $_POST['email'] ?? ''));
    $old['message'] = trim(strip_tags($_POST['message'] ?? ''));

    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) { $errors[] = 'Invalid session. Please reload the page and try again.'; }
    if (!empty($_POST['website'])) { $errors[] = 'Spam detected.'; }
    if (mb_strlen($old['name']) < 2 || mb_strlen($old['name']) > 80)          $errors[] = 'Please enter your name (2-80 characters).';
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL))                    $errors[] = 'Please enter a valid email address.';
    if (mb_strlen($old['message']) < 10 || mb_strlen($old['message']) > 3000) $errors[] = 'Message must be 10-3000 characters.';

    if (!$errors) {
        $subject = 'Portfolio contact from ' . $old['name'];
        $body    = "Name: {$old['name']}\nEmail: {$old['email']}\n\n{$old['message']}";
        $headers = "From: no-reply@" . ($_SERVER['SERVER_NAME'] ?? 'localhost') . "\r\n" .
                   "Reply-To: {$old['email']}\r\nContent-Type: text/plain; charset=UTF-8";
        $sent = $config['send_mail'] ? @mail($config['mail_to'], $subject, $body, $headers) : true;

        $_SESSION['flash'] = $sent
            ? ['type' => 'success', 'msg' => 'Thank you! Your message has been sent. I will reply soon.']
            : ['type' => 'error',   'msg' => 'Mail server is not configured. Please email me directly at ' . $profile['email'] . '.'];
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '#contact');
        exit;
    }
}
$initials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), array_slice(explode(' ', $profile['name']), 0, 2)));
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($seo['title']) ?></title>
<meta name="description" content="<?= e($seo['desc']) ?>">
<meta name="author" content="<?= e($profile['name']) ?>">
<meta property="og:title" content="<?= e($seo['title']) ?>">
<meta property="og:description" content="<?= e($seo['desc']) ?>">
<meta property="og:type" content="website">
<meta name="theme-color" content="#7C3AED">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script>
  (function(){try{var t=localStorage.getItem('theme');
  if(!t&&window.matchMedia('(prefers-color-scheme: dark)').matches)t='dark';
  if(t)document.documentElement.setAttribute('data-theme',t);}catch(e){}})();
</script>
<style>
/* ---------- Design tokens ---------- */
:root{
  --p50:#F5F0FF;--p100:#E9DDFF;--p200:#D8C4FF;--p300:#C4A6FF;
  --p400:#A678FF;--p500:#8B5CF6;--p600:#7C3AED;
  --p700:#5B21B6;--p800:#4C1D95;--p900:#2E1065;--p950:#1A0B2E;
  --bg:#F5F0FF;--card:#fff;--text:#1A0B2E;--muted:#4C1D95;--border:#D8C4FF;
  --accent:#7C3AED;--accent-soft:#E9DDFF;--footer:#1A0B2E;--nav:rgba(245,240,255,.85);
  --grad:linear-gradient(135deg,#7C3AED,#C4A6FF);
  --btn:linear-gradient(135deg,#7C3AED,#8B5CF6);
  --shadow:0 10px 30px rgba(124,58,237,.12);--radius:16px;
}
[data-theme="dark"]{
  --bg:#1A0B2E;--card:#2E1065;--text:#F5F0FF;--muted:#D8C4FF;--border:#4C1D95;
  --accent:#A678FF;--accent-soft:#4C1D95;--footer:#12071F;--nav:rgba(26,11,46,.85);
  --grad:linear-gradient(135deg,#A678FF,#E9DDFF);
  --shadow:0 10px 30px rgba(0,0,0,.35);
}
/* ---------- Base ---------- */
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scroll-padding-top:80px}
body{font-family:'Poppins',system-ui,sans-serif;background:var(--bg);color:var(--text);line-height:1.7;transition:background .3s,color .3s}
a{color:var(--accent);text-decoration:none}
img{max-width:100%;display:block}
.container{width:min(1100px,92%);margin-inline:auto}
section{padding:5rem 0}
h2.title{font-size:clamp(1.6rem,4vw,2.2rem);margin-bottom:2.5rem;text-align:center;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.btn{display:inline-block;padding:.8rem 1.6rem;border-radius:999px;border:2px solid transparent;font:600 .95rem 'Poppins',sans-serif;cursor:pointer;background:var(--btn);color:#fff;box-shadow:var(--shadow);transition:transform .2s,box-shadow .2s}
.btn:hover{transform:translateY(-3px);box-shadow:0 14px 34px rgba(124,58,237,.35);color:#fff}
.btn.outline{background:transparent;color:var(--accent);border-color:var(--accent);box-shadow:none}
.btn.sm{padding:.5rem 1.1rem;font-size:.82rem}
:focus-visible{outline:3px solid var(--p400);outline-offset:3px}
.chip{display:inline-block;padding:.2rem .8rem;border-radius:999px;background:var(--accent-soft);color:var(--text);font-size:.8rem;font-weight:500}
/* ---------- Navbar ---------- */
header{position:sticky;top:0;z-index:50;background:var(--nav);backdrop-filter:blur(12px);border-bottom:1px solid var(--border)}
.nav{display:flex;align-items:center;justify-content:space-between;height:68px}
.logo{font-weight:700;font-size:1.2rem;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.menu{display:flex;gap:1.5rem;list-style:none;align-items:center}
.menu a{color:var(--text);font-weight:500;font-size:.92rem;transition:color .2s}
.menu a:hover{color:var(--accent)}
.icon-btn{background:var(--card);border:1px solid var(--border);color:var(--text);width:40px;height:40px;border-radius:50%;cursor:pointer;font-size:1.1rem}
.burger{display:none}
@media(max-width:900px){
  .burger{display:inline-block}
  .menu{position:absolute;top:68px;left:0;right:0;flex-direction:column;background:var(--bg);padding:1.2rem 0;border-bottom:1px solid var(--border);display:none}
  .menu.open{display:flex}
}
/* ---------- Hero ---------- */
.hero{padding:6rem 0 5rem;background:radial-gradient(circle at 80% 10%,var(--p200) 0,transparent 45%),radial-gradient(circle at 10% 90%,var(--p100) 0,transparent 40%)}
[data-theme="dark"] .hero{background:radial-gradient(circle at 80% 10%,var(--p800) 0,transparent 45%),radial-gradient(circle at 10% 90%,var(--p900) 0,transparent 40%)}
.hero .container{display:grid;gap:3rem;align-items:center;grid-template-columns:1.2fr .8fr}
.hero small{color:var(--accent);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
.hero h1{font-size:clamp(2rem,6vw,3.4rem);line-height:1.15;margin:.5rem 0;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.hero p{color:var(--muted);margin-bottom:1.8rem;max-width:520px}
.hero .actions{display:flex;gap:1rem;flex-wrap:wrap}
.avatar{width:min(280px,70%);aspect-ratio:1;margin-inline:auto;border-radius:30% 70% 60% 40%/40% 40% 60% 60%;background:var(--grad);display:grid;place-items:center;font-size:4rem;font-weight:700;color:#fff;box-shadow:var(--shadow);overflow:hidden;animation:morph 9s ease-in-out infinite}
.avatar img{width:100%;height:100%;object-fit:cover}
@keyframes morph{50%{border-radius:60% 40% 40% 60%/60% 60% 40% 40%}}
@media(max-width:800px){.hero .container{grid-template-columns:1fr;text-align:center}.hero p{margin-inline:auto}.hero .actions{justify-content:center}.avatar{order:-1}}
/* ---------- Cards / grids ---------- */
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.6rem;box-shadow:var(--shadow);transition:transform .3s,box-shadow .3s}
.card:hover{transform:translateY(-6px);box-shadow:0 18px 40px rgba(124,58,237,.22)}
.about p{max-width:760px;margin:0 auto 1rem;text-align:center;color:var(--muted)}
.info{display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center;margin-top:1.5rem}
.timeline{position:relative;max-width:720px;margin:auto;padding-left:2rem;border-left:3px solid var(--p300)}
.t-item{position:relative;margin-bottom:1.6rem}
.t-item::before{content:"";position:absolute;left:calc(-2rem - 9px);top:1.6rem;width:15px;height:15px;border-radius:50%;background:var(--accent);border:3px solid var(--bg)}
.t-item span{color:var(--accent);font-weight:600;font-size:.85rem}
.t-item h3{font-size:1.05rem;margin:.2rem 0}
.t-item p{color:var(--muted);font-size:.9rem}
.grid{display:grid;gap:1.5rem}
.skills{grid-template-columns:repeat(auto-fit,minmax(260px,1fr))}
.bar{height:10px;border-radius:99px;background:var(--accent-soft);overflow:hidden;margin-top:.5rem}
.bar i{display:block;height:100%;width:0;border-radius:99px;background:var(--grad);transition:width 1.2s ease}
.skill-head{display:flex;justify-content:space-between;font-weight:600;font-size:.95rem}
.langs{grid-template-columns:repeat(auto-fit,minmax(200px,1fr));text-align:center}
.langs h3{color:var(--accent)}
/* ---------- Modules (cartes de la page) ---------- */
.mods{grid-template-columns:repeat(auto-fit,minmax(300px,1fr))}
.mod{display:flex;flex-direction:column;gap:.4rem}
.mod .code{color:var(--accent);font-weight:700;letter-spacing:.08em}
.mod h3{font-size:1.2rem}
.mod p{color:var(--muted);font-size:.92rem;margin-bottom:.8rem}
.mod .meta{display:flex;gap:.4rem;flex-wrap:wrap;margin-bottom:1rem}
.mod .btn{margin-top:auto;align-self:flex-start}
.sub{text-align:center;color:var(--muted);margin:-1.6rem 0 2.5rem}
/* ---------- Projects ---------- */
.projects{grid-template-columns:repeat(auto-fit,minmax(300px,1fr))}
.project{padding:0;overflow:hidden;display:flex;flex-direction:column}
.thumb{height:170px;background:var(--grad);display:grid;place-items:center;font-size:3rem;color:#fff;font-weight:700}
.thumb img{width:100%;height:100%;object-fit:cover}
.p-body{padding:1.5rem;display:flex;flex-direction:column;gap:.7rem;flex:1}
.p-body h3{font-size:1.2rem}
.p-body h4{font-size:.78rem;text-transform:uppercase;letter-spacing:.06em;color:var(--accent)}
.p-body p{font-size:.9rem;color:var(--muted)}
.tools{display:flex;flex-wrap:wrap;gap:.4rem}
.p-body .btn{margin-top:auto;align-self:flex-start;padding:.5rem 1.2rem;font-size:.85rem}
/* ---------- Contact ---------- */
.contact-wrap{display:grid;gap:2rem;grid-template-columns:1fr 1.3fr}
@media(max-width:800px){.contact-wrap{grid-template-columns:1fr}}
.contact-info p{margin-bottom:.8rem}
form label{display:block;font-weight:500;font-size:.9rem;margin-bottom:.3rem}
form input,form textarea{width:100%;padding:.8rem 1rem;margin-bottom:1rem;border-radius:12px;border:1px solid var(--border);background:var(--bg);color:var(--text);font:inherit}
form input:focus,form textarea:focus{outline:2px solid var(--accent);border-color:transparent}
.hp{position:absolute;left:-9999px}
.alert{padding:1rem;border-radius:12px;margin-bottom:1rem;font-size:.92rem}
.alert.success{background:#E6F7EC;color:#14532D}
.alert.error{background:#FDE8E8;color:#7F1D1D}
.alert ul{padding-left:1.2rem}
footer{background:var(--footer);color:var(--p100);text-align:center;padding:2rem 0;font-size:.9rem}
footer a{color:var(--p300);margin:0 .6rem}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s,transform .7s}
.reveal.show{opacity:1;transform:none}

/* =====================================================================
   PANNEAU MODULES / ATELIERS / TPs  (s'ouvre dans la même page)
   ===================================================================== */
.panel{position:fixed;inset:0;z-index:80;background:var(--bg);display:flex;flex-direction:column;animation:pin .35s ease}
.panel[hidden]{display:none}
@keyframes pin{from{opacity:0;transform:translateY(24px)}}
.p-top{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.8rem 4%;background:var(--nav);backdrop-filter:blur(12px);border-bottom:1px solid var(--border)}
.p-crumb{font-weight:600;font-size:.9rem;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.p-scroll{flex:1;overflow-y:auto;overscroll-behavior:contain}
.wrap{width:min(1150px,92%);margin-inline:auto}
#prog{position:absolute;left:0;bottom:-1px;height:3px;width:0;background:var(--grad)}
.p-top{position:relative}
.hero2{position:relative;overflow:hidden;padding:3.5rem 0 2.5rem;text-align:center;isolation:isolate}
.blob{position:absolute;border-radius:50%;filter:blur(70px);opacity:.5;z-index:-1;animation:float 12s ease-in-out infinite;pointer-events:none}
.b1{width:340px;height:340px;background:var(--p300);top:-120px;right:-60px}
.b2{width:300px;height:300px;background:var(--p400);bottom:-140px;left:-60px;animation-delay:-5s}
[data-theme="dark"] .blob{opacity:.28}
@keyframes float{50%{transform:translate(30px,25px) scale(1.08)}}
.big{pointer-events:none;font-weight:800;line-height:.85;font-size:clamp(5rem,20vw,12rem);color:transparent;-webkit-text-stroke:2px var(--p300);opacity:.55;user-select:none;margin-bottom:-.28em}
[data-theme="dark"] .big{-webkit-text-stroke-color:var(--p400);opacity:.4}
.hero2 h1{position:relative;font-size:clamp(1.8rem,5.5vw,3rem);line-height:1.2;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent;margin-bottom:.4rem}
.hero2 .lead{color:var(--muted);max-width:640px;margin:0 auto}
.kicker{display:inline-flex;gap:.5rem;align-items:center;padding:.3rem 1rem;border-radius:999px;background:var(--card);border:1px solid var(--border);font-weight:600;font-size:.78rem;letter-spacing:.08em;text-transform:uppercase;color:var(--accent);margin-bottom:.6rem;position:relative}
.stats{display:flex;gap:.6rem;justify-content:center;flex-wrap:wrap;margin-top:1.2rem}
.pills{display:flex;gap:.5rem;justify-content:center;flex-wrap:wrap;margin-top:1.4rem}
.pill{padding:.35rem 1rem;border-radius:999px;border:1px solid var(--border);background:var(--card);color:var(--text);font-weight:600;font-size:.82rem;transition:.2s}
.pill:hover{border-color:var(--accent);color:var(--accent)}
.pill.active{background:var(--btn);color:#fff;border-color:transparent}
.sec-title{font-weight:600;color:var(--muted);text-align:center;margin:1rem 0 2rem;letter-spacing:.04em;font-size:1.05rem}
.at-grid{display:grid;gap:1.8rem;grid-template-columns:repeat(auto-fit,minmax(min(100%,340px),1fr));padding-bottom:3rem}
.at{position:relative;display:flex;flex-direction:column;justify-content:flex-end;min-height:380px;border-radius:26px;overflow:hidden;color:#fff;background:var(--g);box-shadow:var(--shadow);transform:perspective(900px) rotateX(var(--rx,0deg)) rotateY(var(--ry,0deg));transition:transform .25s ease,box-shadow .3s,opacity .7s}
.at:hover{box-shadow:0 26px 60px rgba(124,58,237,.35);color:#fff}
.at-bg{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform .6s}
.at:hover .at-bg{transform:scale(1.08)}
.at-bg.pat{display:grid;place-items:center;font-size:7rem}
.at-bg.pat::before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 20% 20%,rgba(255,255,255,.35) 0 90px,transparent 91px),radial-gradient(circle at 85% 70%,rgba(255,255,255,.2) 0 130px,transparent 131px)}
.at-bg.pat span{position:relative;filter:drop-shadow(0 8px 16px rgba(0,0,0,.25));transform:translateY(-40px)}
.at::after{content:"";position:absolute;inset:0;background:radial-gradient(circle at var(--mx,50%) var(--my,0%),rgba(255,255,255,.28),transparent 45%);opacity:0;transition:opacity .3s;pointer-events:none}
.at:hover::after{opacity:1}
.at-num{pointer-events:none;position:absolute;top:.4rem;right:1.2rem;font-size:5.5rem;font-weight:800;line-height:1;color:transparent;-webkit-text-stroke:2px rgba(255,255,255,.8)}
.at-body{position:relative;padding:5rem 1.6rem 1.6rem;background:linear-gradient(transparent,rgba(26,11,46,.92) 70%);display:flex;flex-direction:column;gap:.5rem}
.glass{background:rgba(255,255,255,.18);backdrop-filter:blur(8px);color:#fff;align-self:flex-start;border:1px solid rgba(255,255,255,.3)}
.at h2{font-size:1.7rem;line-height:1.2}
.at p{font-size:.9rem;opacity:.92}
.at-foot{display:flex;justify-content:space-between;align-items:center;margin-top:.6rem;font-size:.85rem;font-weight:600}
.arrow{padding:.4rem 1rem;border-radius:999px;background:#fff;color:var(--p700);transition:.3s}
.at:hover .arrow{transform:translateX(6px)}
img.broken{visibility:hidden}
/* Vitrine des TPs */
.showcase{display:grid;gap:4.5rem;padding:1rem 0 3.5rem}
.row{display:grid;gap:2.5rem;align-items:center;grid-template-columns:1.15fr .85fr}
.row:nth-child(even) .frame-wrap{order:2}
.frame{border-radius:18px;overflow:hidden;background:var(--card);border:1px solid var(--border);box-shadow:0 24px 50px rgba(124,58,237,.22);transform:rotate(-1.6deg);transition:transform .5s}
.row:nth-child(even) .frame{transform:rotate(1.6deg)}
.row:hover .frame{transform:rotate(0) scale(1.02)}
.fbar{display:flex;gap:.4rem;align-items:center;padding:.6rem .9rem;background:var(--accent-soft)}
.fbar i{width:11px;height:11px;border-radius:50%;background:var(--p400)}
.fbar i:nth-child(2){background:var(--p300)}
.fbar i:nth-child(3){background:var(--p200)}
.fbar span{margin-left:.6rem;font-size:.75rem;font-weight:600;color:var(--muted)}
.shot{display:block;width:100%;aspect-ratio:16/10;border:0;padding:0;background:var(--grad);position:relative;overflow:hidden}
.shot.has{cursor:zoom-in}
.shot img{width:100%;height:100%;object-fit:cover;transition:transform .6s}
.row:hover .shot img{transform:scale(1.05)}
.zoom{position:absolute;right:.8rem;bottom:.8rem;background:rgba(26,11,46,.75);color:#fff;font-size:.75rem;font-weight:600;padding:.3rem .8rem;border-radius:999px;opacity:0;transition:.3s}
.row:hover .zoom{opacity:1}
.shot.empty{display:grid;place-items:center;color:#fff;text-align:center}
.shot.empty b{font-size:3.4rem;display:block;line-height:1.2}
.shot.empty span{font-size:.8rem;opacity:.85}
.thumbs{display:grid;grid-template-columns:repeat(5,1fr);gap:.4rem;padding:.5rem;background:var(--accent-soft)}
.th{position:relative;aspect-ratio:1;border:2px solid transparent;border-radius:8px;overflow:hidden;padding:0;cursor:zoom-in;background:var(--card)}
.th:hover{border-color:var(--accent)}
.th img{width:100%;height:100%;object-fit:cover}
.more{position:absolute;inset:0;display:grid;place-items:center;background:rgba(26,11,46,.7);color:#fff;font-weight:700}
.tpn{pointer-events:none;display:block;font-size:5rem;font-weight:800;line-height:.9;color:transparent;-webkit-text-stroke:2px var(--p300);opacity:.7;margin-bottom:-.5rem}
[data-theme="dark"] .tpn{-webkit-text-stroke-color:var(--p400)}
.tinfo{position:relative;min-width:0}
.tinfo h3{font-size:1.5rem;line-height:1.3;margin-bottom:.5rem}
.tinfo p{color:var(--muted);margin-bottom:1rem}
.hint{display:block;margin-top:.6rem;font-size:.72rem;opacity:.95;word-break:break-all}
.hint a{color:#fff;text-decoration:underline}
.tags{display:flex;gap:.4rem;flex-wrap:wrap;margin-bottom:1.2rem}
.acts{display:flex;gap:.6rem;flex-wrap:wrap}
.pn{display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;padding-bottom:4rem}
.soon{max-width:640px;margin:2rem auto 3rem;text-align:center;border-style:dashed;border-width:2px}
.soon .bigi{font-size:3.2rem}
.soon h3{margin:.4rem 0}
.soon p{color:var(--muted)}
@media(max-width:800px){.row{grid-template-columns:1fr;gap:1.2rem}.row:nth-child(even) .frame-wrap{order:0}.showcase{gap:3.5rem}}
/* Lightbox */
dialog#lb{border:0;background:transparent;max-width:min(1000px,94vw);width:100%;margin:auto;padding:0;overflow:visible}
dialog#lb::backdrop{background:rgba(18,7,31,.88);backdrop-filter:blur(5px)}
#lb figure{background:var(--card);border-radius:var(--radius);overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.5)}
#lb img{width:100%;max-height:78vh;object-fit:contain;background:#12071F}
#lb figcaption{padding:1rem 1.4rem;font-weight:600}
#lb .x{position:absolute;top:-14px;right:-6px;width:42px;height:42px;border-radius:50%;border:0;background:var(--btn);color:#fff;font-size:1.2rem;cursor:pointer;z-index:2}
#lb .nv{position:absolute;top:50%;transform:translateY(-50%);width:44px;height:44px;border-radius:50%;border:0;background:rgba(124,58,237,.9);color:#fff;font-size:1.3rem;cursor:pointer;z-index:2}
#lb .pv{left:10px}#lb .nx{right:10px}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}html{scroll-behavior:auto}.reveal{opacity:1;transform:none}.at,.frame{transform:none!important}}
</style>
</head>
<body>

<!-- ============ NAVBAR ============ -->
<header>
  <nav class="container nav" aria-label="Main navigation">
    <a href="#home" class="logo"><?= e($initials) ?>.</a>
    <ul class="menu" id="menu">
      <?php foreach (['about'=>'About','education'=>'Education','skills'=>'Skills','languages'=>'Languages','modules'=>'Modules','projects'=>'Projects','contact'=>'Contact'] as $id => $label): ?>
        <li><a href="#<?= $id ?>"><?= $label ?></a></li>
      <?php endforeach; ?>
      <li><button class="icon-btn" id="themeBtn" aria-label="Toggle light/dark theme">🌙</button></li>
    </ul>
    <button class="icon-btn burger" id="burger" aria-label="Open menu">☰</button>
  </nav>
</header>

<main>
<!-- ============ HERO ============ -->
<section class="hero" id="home">
  <div class="container">
    <div class="reveal">
      <small>Hello, I'm</small>
      <h1><?= e($profile['name']) ?></h1>
      <p><strong><?= e($profile['title']) ?></strong> · <?= e($profile['subtitle']) ?><br>📍 <?= e($profile['location']) ?></p>
      <div class="actions">
        <a href="#modules" class="btn">View my work</a>
        <a href="#contact" class="btn outline">Contact me</a>
      </div>
    </div>
    <div class="avatar reveal">
      <?php if ($profile['photo']): ?><img src="<?= e($profile['photo']) ?>" alt="Portrait of <?= e($profile['name']) ?>"><?php else: ?><?= e($initials) ?><?php endif; ?>
    </div>
  </div>
</section>

<!-- ============ ABOUT ============ -->
<section id="about" class="about">
  <div class="container reveal">
    <h2 class="title">About me</h2>
    <?php foreach ($profile['bio'] as $para): ?><p><?= e($para) ?></p><?php endforeach; ?>
    <div class="info">
      <span class="chip">📍 <?= e($profile['location']) ?></span>
      <a class="chip" href="mailto:<?= e($profile['email']) ?>">✉️ <?= e($profile['email']) ?></a>
      <a class="chip" href="tel:<?= e($profile['phone']) ?>">📞 <?= e($profile['phone']) ?></a>
    </div>
  </div>
</section>

<!-- ============ EDUCATION ============ -->
<section id="education">
  <div class="container">
    <h2 class="title">Education</h2>
    <div class="timeline">
      <?php foreach ($education as $ed): ?>
        <div class="t-item card reveal"><span><?= e($ed['period']) ?></span><h3><?= e($ed['title']) ?></h3><p><?= e($ed['place']) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ SKILLS ============ -->
<section id="skills">
  <div class="container">
    <h2 class="title">Skills</h2>
    <div class="grid skills">
      <?php foreach ($skills as $name => $level): ?>
        <div class="card reveal">
          <div class="skill-head"><span><?= e($name) ?></span><span><?= (int)$level ?>%</span></div>
          <div class="bar" role="progressbar" aria-valuenow="<?= (int)$level ?>" aria-valuemin="0" aria-valuemax="100"><i data-w="<?= (int)$level ?>"></i></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ LANGUAGES ============ -->
<section id="languages">
  <div class="container">
    <h2 class="title">Languages</h2>
    <div class="grid langs">
      <?php foreach ($languages as $l): ?>
        <div class="card reveal"><h3><?= e($l['name']) ?></h3><p><?= e($l['level']) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ MODULES (cartes) ============ -->
<section id="modules">
  <div class="container">
    <h2 class="title">Mes modules</h2>
    <p class="sub"><?= e($filiere) ?></p>
    <div class="grid mods">
      <?php foreach ($DATA as $code => $m):
            $nA = count($m['ateliers']);
            $nT = array_sum(array_map(fn($a) => count($a['tps']), $m['ateliers'])); ?>
        <article class="card mod reveal">
          <span class="code"><?= e($code) ?></span>
          <h3><?= e($m['title']) ?></h3>
          <p><?= e($m['desc']) ?></p>
          <div class="meta">
            <?php if ($nA): ?><span class="chip">🧪 <?= $nA ?> atelier<?= $nA > 1 ? 's' : '' ?></span><span class="chip">📁 <?= $nT ?> TP<?= $nT > 1 ? 's' : '' ?></span>
            <?php else: ?><span class="chip">🚧 Bientôt</span><?php endif; ?>
          </div>
          <a class="btn" href="#/<?= strtolower($code) ?>">Voir les TPs</a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ PROJECTS ============ -->
<section id="projects">
  <div class="container">
    <h2 class="title">Projects</h2>
    <div class="grid projects">
      <?php foreach ($projects as $p): ?>
        <article class="card project reveal">
          <div class="thumb"><?php if ($p['image']): ?><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?> screenshot" loading="lazy"><?php else: ?>&lt;/&gt;<?php endif; ?></div>
          <div class="p-body">
            <h3><?= e($p['title']) ?></h3>
            <div><h4>Problem</h4><p><?= e($p['problem']) ?></p></div>
            <div><h4>Solution</h4><p><?= e($p['solution']) ?></p></div>
            <div><h4>Result</h4><p><?= e($p['result']) ?></p></div>
            <div class="tools"><?php foreach ($p['tools'] as $t): ?><span class="chip"><?= e($t) ?></span><?php endforeach; ?></div>
            <a class="btn" href="<?= e($p['link']) ?>">View project →</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ CONTACT ============ -->
<section id="contact">
  <div class="container">
    <h2 class="title">Contact</h2>
    <div class="contact-wrap">
      <div class="card contact-info reveal">
        <h3>Let's work together</h3><br>
        <p>I'm open to internships and freelance projects.</p>
        <p>✉️ <a href="mailto:<?= e($profile['email']) ?>"><?= e($profile['email']) ?></a></p>
        <p>📞 <a href="tel:<?= e($profile['phone']) ?>"><?= e($profile['phone']) ?></a></p>
        <p>📍 <?= e($profile['location']) ?></p>
        <p><?php foreach ($profile['links'] as $label => $url): ?><a class="chip" href="<?= e($url) ?>" target="_blank" rel="noopener"><?= e($label) ?></a> <?php endforeach; ?></p>
      </div>
      <form class="card reveal" method="post" action="#contact" novalidate>
        <?php if ($flash): ?><div class="alert <?= e($flash['type']) ?>" role="status"><?= e($flash['msg']) ?></div><?php endif; ?>
        <?php if ($errors): ?><div class="alert error" role="alert"><ul><?php foreach ($errors as $er): ?><li><?= e($er) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
        <input class="hp" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" required maxlength="80" value="<?= e($old['name']) ?>">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required value="<?= e($old['email']) ?>">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required maxlength="3000"><?= e($old['message']) ?></textarea>
        <button class="btn" type="submit">Send message</button>
      </form>
    </div>
  </div>
</section>
</main>

<footer>
  <div class="container">
    <p><?php foreach ($profile['links'] as $label => $url): ?><a href="<?= e($url) ?>" target="_blank" rel="noopener"><?= e($label) ?></a><?php endforeach; ?></p>
    <p>© <?= date('Y') ?> <?= e($profile['name']) ?>. All rights reserved.</p>
  </div>
</footer>

<!-- ============ PANNEAU Modules > Ateliers > TPs ============ -->
<div class="panel" id="panel" hidden role="dialog" aria-modal="true" aria-label="Modules, ateliers et TPs">
  <div class="p-top">
    <button class="btn outline sm" id="pBack" type="button">← Retour</button>
    <span class="p-crumb" id="pCrumb"></span>
    <button class="icon-btn" id="pClose" type="button" aria-label="Fermer">✕</button>
    <div id="prog"></div>
  </div>
  <div class="p-scroll" id="pScroll"><div class="wrap" id="pBody"></div></div>
</div>

<!-- Lightbox -->
<dialog id="lb" aria-label="Photo du TP">
  <button class="x" type="button" aria-label="Fermer">✕</button>
  <button class="nv pv" type="button" aria-label="Photo précédente">‹</button>
  <button class="nv nx" type="button" aria-label="Photo suivante">›</button>
  <figure><img id="lbImg" src="" alt=""><figcaption id="lbCap"></figcaption></figure>
</dialog>

<script>
/* ---------------- Thème, menu mobile, animations ---------------- */
const root = document.documentElement, themeBtn = document.getElementById('themeBtn');
const paint = () => themeBtn.textContent = root.dataset.theme === 'dark' ? '☀️' : '🌙';
paint();
themeBtn.addEventListener('click', () => {
  root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
  try { localStorage.setItem('theme', root.dataset.theme); } catch (e) {}
  paint();
});
const menu = document.getElementById('menu');
document.getElementById('burger').addEventListener('click', () => menu.classList.toggle('open'));
menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => menu.classList.remove('open')));

const io = new IntersectionObserver(entries => entries.forEach(en => {
  if (!en.isIntersecting) return;
  en.target.classList.add('show');
  const bar = en.target.querySelector('.bar i');
  if (bar) bar.style.width = bar.dataset.w + '%';
  io.unobserve(en.target);
}), { threshold: .12 });
const watch = scope => (scope || document).querySelectorAll('.reveal:not(.show)').forEach(el => io.observe(el));
watch();

/* ---------------- Données (venant de PHP) ---------------- */
const DATA = <?= json_encode($DATA, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
const CODES = Object.keys(DATA);
const GRADS = ['linear-gradient(135deg,#7C3AED,#C4A6FF)','linear-gradient(135deg,#4C1D95,#A678FF)','linear-gradient(135deg,#8B5CF6,#E9DDFF)','linear-gradient(135deg,#2E1065,#7C3AED)'];

const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const pad = n => String(n).padStart(2, '0');
const enc = p => p.split('/').map(encodeURIComponent).join('/');

/* ---------------- Chargement intelligent des photos ----------------
   Selon l'hébergement, le dossier "public" est servi à des adresses différentes.
   On essaie plusieurs préfixes et on garde celui qui marche. */
const IMG_PREFIXES = ['/images/', '/public/images/', 'images/', 'public/images/', '../public/images/'];
const DOC_PREFIXES = ['/docs/', '/public/docs/', 'docs/', 'public/docs/', '../public/docs/'];
let goodImg = null;
function loadImg(img, rel) {
  const list = goodImg ? [goodImg, ...IMG_PREFIXES.filter(p => p !== goodImg)] : IMG_PREFIXES;
  let i = 0;
  img.classList.remove('broken');
  img.onload  = () => { goodImg = list[i]; };
  img.onerror = () => { if (++i < list.length) img.src = list[i] + enc(rel); else { img.onerror = null; img.classList.add('broken'); } };
  img.src = list[0] + enc(rel);
}
const loadImgs = scope => scope.querySelectorAll('img[data-rel]').forEach(i => loadImg(i, i.dataset.rel));

let goodDoc = null;
async function openDoc(name) {
  const list = goodDoc ? [goodDoc, ...DOC_PREFIXES.filter(p => p !== goodDoc)] : DOC_PREFIXES;
  for (const p of list) {
    const url = p + enc(name);
    try {
      const r = await fetch(url, { method: 'HEAD' });
      if (r.ok && !(r.headers.get('content-type') || '').includes('text/html')) { goodDoc = p; window.open(url, '_blank', 'noopener'); return; }
    } catch (e) {}
  }
  alert('Fichier introuvable : ' + name + '\nVérifie qu’il est bien dans le dossier docs/ (même nom exactement).');
}


/* ---------------- Détection automatique des photos (sans rien écrire dans le code) ----------------
   Si le serveur ne peut pas lister le dossier, on cherche  1.jpg, 2.jpg, 3.jpg ...  dans le dossier du TP. */
const PROBE_EXTS = ['jpg', 'jpeg', 'png', 'webp', 'JPG', 'PNG'];
function canLoad(rel) {
  return new Promise(res => {
    const list = goodImg ? [goodImg] : IMG_PREFIXES;
    let i = 0; const im = new Image();
    im.onload  = () => { goodImg = list[i]; res(true); };
    im.onerror = () => { if (++i < list.length) im.src = list[i] + enc(rel); else res(false); };
    im.src = list[0] + enc(rel);
  });
}
async function probe(folder) {
  const found = []; let miss = 0;
  for (let i = 1; i <= 40 && miss < 2; i++) {
    let hit = null;
    for (const ext of PROBE_EXTS) { const rel = folder + '/' + i + '.' + ext; if (await canLoad(rel)) { hit = rel; break; } }
    if (hit) { found.push(hit); miss = 0; } else miss++;
  }
  return found;
}
function probeAtelier(code, n) {
  const a = DATA[code].ateliers[n - 1];
  a.tps.forEach(async (tp, k) => {
    if (tp.photos.length || !tp.folder || tp.probed) return;
    tp.probed = true;
    const found = await probe(tp.folder);
    if (!found.length) return;
    tp.photos = found; if (!a.cover) a.cover = found[0];
    const row = pBody.querySelector(`.row[data-k="${k}"]`);
    if (row && pBody.dataset.view === code + n) {
      row.outerHTML = tpRow(code, n, a, tp, k).replace('class="row reveal"', 'class="row reveal show"');
      loadImgs(pBody);
    }
  });
}

/* ---------------- Rendu du panneau ---------------- */
const panel = document.getElementById('panel'), pBody = document.getElementById('pBody'),
      pScroll = document.getElementById('pScroll'), pCrumb = document.getElementById('pCrumb');
const countTps = ats => ats.reduce((n, a) => n + a.tps.length, 0);
const link = (c, a) => '#/' + c.toLowerCase() + (a ? '/' + a : '');

function viewModule(code) {
  const M = DATA[code], A = M.ateliers;
  pCrumb.textContent = code + ' · ' + M.title;
  const hero = `
    <section class="hero2"><span class="blob b1"></span><span class="blob b2"></span>
      <div class="reveal">
        <div class="big" aria-hidden="true">${esc(code)}</div>
        <h1>${esc(M.title)}</h1><p class="lead">${esc(M.desc)}</p>
        ${A.length ? `<div class="stats"><span class="chip">🧪 ${A.length} atelier${A.length > 1 ? 's' : ''}</span><span class="chip">📁 ${countTps(A)} TPs</span></div>` : ''}
        <nav class="pills" aria-label="Modules">${CODES.map(c => `<a class="pill ${c === code ? 'active' : ''}" href="${link(c)}">${c}</a>`).join('')}</nav>
      </div></section>`;
  let body;
  if (!A.length) {
    body = `<div class="card soon reveal"><div class="bigi">🖼️</div><h3>L’espace de ce module est prêt</h3><p>Les ateliers et leurs TPs seront ajoutés ici très bientôt.</p></div>`;
  } else {
    body = `<p class="sec-title">Choisis un atelier pour découvrir ses TPs ↓</p><div class="at-grid">` +
      A.map((a, i) => `
      <a class="at reveal" href="${link(code, i + 1)}" style="--g:${GRADS[i % GRADS.length]}" aria-label="Ouvrir l’atelier ${i + 1} : ${esc(a.title)}">
        ${a.cover ? `<img class="at-bg" data-rel="${esc(a.cover)}" alt="" loading="lazy">` : `<div class="at-bg pat"><span>${esc(a.icon)}</span></div>`}
        <span class="at-num" aria-hidden="true">${pad(i + 1)}</span>
        <div class="at-body">
          <span class="chip glass">Atelier ${pad(i + 1)}</span>
          <h2>${esc(a.title)}</h2><p>${esc(a.desc)}</p>
          <div class="at-foot"><span>📁 ${a.tps.length} TP${a.tps.length > 1 ? 's' : ''}</span><span class="arrow">Ouvrir →</span></div>
        </div>
      </a>`).join('') + `</div>`;
  }
  const k = CODES.indexOf(code), prev = CODES[k - 1], next = CODES[k + 1];
  const nav = `<div class="pn">${prev ? `<a class="btn outline" href="${link(prev)}">← ${prev}</a>` : '<span></span>'}${next ? `<a class="btn outline" href="${link(next)}">${next} →</a>` : ''}</div>`;
  return hero + body + nav;
}

function tpRow(code, n, a, tp, k) {
    const ph = tp.photos || [], open = `data-open="${code}|${n}|${k}|`;
    const frame = ph.length ? `
      <button type="button" class="shot has" ${open}0" aria-label="Agrandir : ${esc(tp.title)}"><img data-rel="${esc(ph[0])}" alt="Photo du ${esc(tp.title)}" loading="lazy"><span class="zoom">🔍 Agrandir</span></button>
      ${ph.length > 1 ? `<div class="thumbs">${ph.slice(0, 5).map((p, j) => `<button type="button" class="th" ${open}${j}" aria-label="Photo ${j + 1}"><img data-rel="${esc(p)}" alt="" loading="lazy">${j === 4 && ph.length > 5 ? `<span class="more">+${ph.length - 5}</span>` : ''}</button>`).join('')}</div>` : ''}`
      : `<div class="shot empty"><div><b>${esc(a.icon)}</b><span>Photos à ajouter</span>
        <small class="hint">Dossier : public/images/${esc(tp.folder)}/<br>Noms : 1.jpg, 2.jpg, 3.jpg…<br>Tester : <a href="/images/${enc(tp.folder)}/1.jpg" target="_blank" rel="noopener">/images/…/1.jpg</a> · <a href="/public/images/${enc(tp.folder)}/1.jpg" target="_blank" rel="noopener">/public/images/…/1.jpg</a></small></div></div>`;
    return `
    <article class="row reveal" data-k="${k}">
      <div class="frame-wrap"><div class="frame">
        <div class="fbar"><i></i><i></i><i></i><span>TP ${pad(k + 1)}${ph.length > 1 ? ' · ' + ph.length + ' photos' : ''}</span></div>${frame}
      </div></div>
      <div class="tinfo">
        <span class="tpn" aria-hidden="true">${pad(k + 1)}</span>
        <h3>${esc(tp.title)}</h3><p>${esc(tp.desc)}</p>
        ${tp.tags && tp.tags.length ? `<div class="tags">${tp.tags.map(t => `<span class="chip">${esc(t)}</span>`).join('')}</div>` : ''}
        <div class="acts">
          ${ph.length ? `<button type="button" class="btn outline sm" ${open}0">Voir les photos${ph.length > 1 ? ' (' + ph.length + ')' : ''}</button>` : ''}
          ${tp.file ? `<button type="button" class="btn sm" data-doc="${esc(tp.file)}">Ouvrir le fichier</button>` : ''}
        </div>
      </div>
    </article>`;
}

function viewAtelier(code, n) {
  const M = DATA[code], A = M.ateliers, a = A[n - 1];
  pCrumb.textContent = code + ' · Atelier ' + pad(n) + ' · ' + a.title;
  const hero = `
    <section class="hero2"><span class="blob b1"></span><span class="blob b2"></span>
      <div class="reveal">
        <div class="big" aria-hidden="true">${pad(n)}</div>
        <span class="kicker">${esc(a.icon)} ${esc(code)} · Atelier ${pad(n)}</span>
        <h1>${esc(a.title)}</h1><p class="lead">${esc(a.desc)}</p>
        <div class="stats"><span class="chip">📁 ${a.tps.length} TP${a.tps.length > 1 ? 's' : ''}</span></div>
        <nav class="pills" aria-label="Ateliers">${A.map((x, i) => `<a class="pill ${i + 1 === n ? 'active' : ''}" href="${link(code, i + 1)}">Atelier ${pad(i + 1)}</a>`).join('')}</nav>
      </div></section>`;
  const rows = a.tps.map((tp, k) => tpRow(code, n, a, tp, k)).join('');
  const nav = `<div class="pn">${n > 1 ? `<a class="btn outline" href="${link(code, n - 1)}">← Atelier ${pad(n - 1)}</a>` : `<a class="btn outline" href="${link(code)}">← Tous les ateliers</a>`}${n < A.length ? `<a class="btn" href="${link(code, n + 1)}">Atelier ${pad(n + 1)} →</a>` : ''}</div>`;
  return hero + `<div class="showcase">${rows}</div>` + nav;
}

/* ---------------- Routeur (adresse #/m201  ou  #/m201/2) ---------------- */
function route() {
  const m = location.hash.match(/^#\/(m\d+)(?:\/(\d+))?$/i);
  if (!m) { panel.hidden = true; document.body.style.overflow = ''; return; }
  const code = m[1].toUpperCase();
  if (!DATA[code]) { location.hash = '#modules'; return; }
  const n = +m[2] || 0;
  const isAt = n >= 1 && n <= DATA[code].ateliers.length;
  pBody.innerHTML = isAt ? viewAtelier(code, n) : viewModule(code);
  pBody.dataset.view = isAt ? code + n : code;
  panel.hidden = false; document.body.style.overflow = 'hidden';
  pScroll.scrollTop = 0;
  loadImgs(pBody); watch(pBody);
  if (isAt) probeAtelier(code, n);
}
addEventListener('hashchange', route);
route();

document.getElementById('pClose').addEventListener('click', () => { location.hash = '#modules'; });
document.getElementById('pBack').addEventListener('click', () => {
  const m = location.hash.match(/^#\/(m\d+)\/(\d+)$/i);
  location.hash = m ? '#/' + m[1] : '#modules';          // atelier -> module -> accueil
});
addEventListener('keydown', e => { if (e.key === 'Escape' && !panel.hidden && !lb.open) location.hash = '#modules'; });

/* Barre de progression + effet 3D des cartes + clics (photos / fichiers) */
pScroll.addEventListener('scroll', () => {
  document.getElementById('prog').style.width = (pScroll.scrollTop / Math.max(1, pScroll.scrollHeight - pScroll.clientHeight) * 100) + '%';
}, { passive: true });

if (matchMedia('(hover:hover)').matches && !matchMedia('(prefers-reduced-motion:reduce)').matches) {
  pBody.addEventListener('mousemove', e => {
    const c = e.target.closest('.at'); if (!c) return;
    const r = c.getBoundingClientRect(), x = (e.clientX - r.left) / r.width, y = (e.clientY - r.top) / r.height;
    c.style.setProperty('--ry', ((x - .5) * 10) + 'deg'); c.style.setProperty('--rx', ((.5 - y) * 10) + 'deg');
    c.style.setProperty('--mx', (x * 100) + '%');         c.style.setProperty('--my', (y * 100) + '%');
  });
  pBody.addEventListener('mouseout', e => { const c = e.target.closest('.at'); if (c) { c.style.setProperty('--rx', '0deg'); c.style.setProperty('--ry', '0deg'); } });
}

pBody.addEventListener('click', e => {
  const o = e.target.closest('[data-open]'), d = e.target.closest('[data-doc]');
  if (o) { const [c, n, k, j] = o.dataset.open.split('|'); openGallery(DATA[c].ateliers[n - 1].tps[k], +j); }
  if (d) openDoc(d.dataset.doc);
});

/* ---------------- Lightbox / galerie ---------------- */
const lb = document.getElementById('lb'), lbImg = document.getElementById('lbImg'), lbCap = document.getElementById('lbCap');
let pics = [], idx = 0, ttl = '';
function showPic() {
  loadImg(lbImg, pics[idx]); lbImg.alt = ttl;
  lbCap.textContent = ttl + (pics.length > 1 ? '  (' + (idx + 1) + ' / ' + pics.length + ')' : '');
  lb.querySelectorAll('.nv').forEach(b => b.hidden = pics.length < 2);
}
const step = d => { idx = (idx + d + pics.length) % pics.length; showPic(); };
function openGallery(tp, start) { pics = tp.photos; ttl = tp.title; idx = start || 0; showPic(); lb.showModal(); }
lb.querySelector('.pv').addEventListener('click', () => step(-1));
lb.querySelector('.nx').addEventListener('click', () => step(1));
lb.querySelector('.x').addEventListener('click', () => lb.close());
lb.addEventListener('click', e => { if (e.target === lb) lb.close(); });
addEventListener('keydown', e => { if (!lb.open) return; if (e.key === 'ArrowLeft') step(-1); if (e.key === 'ArrowRight') step(1); });
</script>
</body>
</html>