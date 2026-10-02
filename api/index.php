<?php
/**
 * index.php: Personal portfolio
 * Edit the arrays below; the HTML renders from them automatically.
 * Pages liées : modules.php (cartes des modules) -> tps.php (TPs d'un module), layout.php (commun)
 */
session_start();

/* ============================== CONTENT ============================== */
$config = [
    'send_mail' => true,                              // set false to simulate sending (local testing)
    'mail_to'   => 'elachchabhajjihidaya@gmail.com',
];

$profile = [
    'name'     => 'Hidaya El Achchab Hadji',
    'title'    => 'Full Stack Developer',
    'subtitle' => 'Digital Development student',
    'location' => 'Tanger, Morocco',
    'email'    => 'elachchabhajjihidaya@gmail.com',
    'phone'    => '0631812693',
    'photo'    => '',  // e.g. 'assets/me.jpg' (leave empty to show initials)
    'bio'      => [
        "Hi, I'm Hidaya! I'm a second-year Digital Development student (Full Stack option) at ISTA NTIC Tanger.",
        "I love building modern, responsive web applications and I'm always eager to learn new technologies. I'm currently looking for internship and freelance opportunities, so feel free to reach out!",
    ],
    'links'    => [
        'LinkedIn' => '#',   // put your LinkedIn URL
        'GitHub'   => '#',   // put your GitHub URL
    ],
];

$education = [
    ['period' => '2025 - Present', 'title' => 'Digital Development, Full Stack option (2nd year)', 'place' => 'ISTA NTIC Tanger'],
    ['period' => '2024 - 2025',    'title' => 'Digital Development (1st year)',                     'place' => 'ISTA NTIC Tanger'],
    ['period' => '2025',           'title' => 'Baccalaureate in Physical Sciences',                 'place' => 'Sciences Physiques'],
];

$skills = [   // name => level (%)
    'HTML' => 90, 'CSS' => 85, 'JavaScript' => 75,
    'PHP' => 75, 'MySQL' => 70, 'Git / GitHub' => 70,
];

$languages = [
    ['name' => 'Arabic',  'level' => 'Native'],
    ['name' => 'French',  'level' => 'Professional'],
    ['name' => 'English', 'level' => 'Intermediate'],
];

/* Carte "Mes modules" (clic -> modules.php) */
$modulesCard = [
    'icon'  => '📚',
    'title' => 'Mes modules',
    'text'  => 'Découvre les modules de ma formation en Développement Digital (Web Full Stack) et les TPs réalisés pour chacun.',
    'count' => 6,                  // nombre de modules (juste pour l'affichage)
    'url'   => 'modules.php',
];

$projects = [
    [
        'title'    => 'Project 1 title',
        'problem'  => 'Describe the problem this project solves.',
        'solution' => 'Describe how you solved it.',
        'result'   => 'Describe the outcome (users, speed, grade...).',
        'tools'    => ['HTML', 'CSS', 'PHP', 'MySQL'],
        'link'     => 'modules.php',   // clic -> page des modules
        'image'    => '',   // e.g. 'assets/p1.jpg'
    ],
    [
        'title'    => 'Project 2 title',
        'problem'  => 'Describe the problem this project solves.',
        'solution' => 'Describe how you solved it.',
        'result'   => 'Describe the outcome.',
        'tools'    => ['JavaScript', 'CSS'],
        'link'     => 'modules.php',   // clic -> page des modules
        'image'    => '',
    ],
    [
        'title'    => 'Project 3 title',
        'problem'  => 'Describe the problem this project solves.',
        'solution' => 'Describe how you solved it.',
        'result'   => 'Describe the outcome.',
        'tools'    => ['PHP', 'MySQL', 'Git'],
        'link'     => 'modules.php',   // clic -> page des modules
        'image'    => '',
    ],
];

$seo = [
    'title' => $profile['name'] . ' | ' . $profile['title'],
    'desc'  => $profile['name'] . ', Full Stack Developer student in Tanger, Morocco. Portfolio, projects and contact.',
];

/* ============================== HELPERS ============================== */
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

/* ============================== CONTACT FORM ============================== */
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(32)); }

$old = ['name' => '', 'email' => '', 'message' => ''];
$errors = [];
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize (strip line breaks from single-line fields to prevent header injection)
    $old['name']    = trim(preg_replace('/[\r\n]+/', ' ', strip_tags($_POST['name'] ?? '')));
    $old['email']   = trim(preg_replace('/[\r\n]+/', '', $_POST['email'] ?? ''));
    $old['message'] = trim(strip_tags($_POST['message'] ?? ''));

    // CSRF + honeypot
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) { $errors[] = 'Invalid session. Please reload the page and try again.'; }
    if (!empty($_POST['website'])) { $errors[] = 'Spam detected.'; }

    // Validation
    if (mb_strlen($old['name']) < 2 || mb_strlen($old['name']) > 80)          $errors[] = 'Please enter your name (2-80 characters).';
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL))                    $errors[] = 'Please enter a valid email address.';
    if (mb_strlen($old['message']) < 10 || mb_strlen($old['message']) > 3000) $errors[] = 'Message must be 10-3000 characters.';

    if (!$errors) {
        $subject = 'Portfolio contact from ' . $old['name'];
        $body    = "Name: {$old['name']}\nEmail: {$old['email']}\n\n{$old['message']}";
        $headers = "From: no-reply@" . ($_SERVER['SERVER_NAME'] ?? 'localhost') . "\r\n" .
                   "Reply-To: {$old['email']}\r\nContent-Type: text/plain; charset=UTF-8";

        // mail() needs a configured mail server; on XAMPP it usually fails locally.
        $sent = $config['send_mail'] ? @mail($config['mail_to'], $subject, $body, $headers) : true;

        $_SESSION['flash'] = $sent
            ? ['type' => 'success', 'msg' => 'Thank you! Your message has been sent. I will reply soon.']
            : ['type' => 'error',   'msg' => 'Mail server is not configured. Please email me directly at ' . $profile['email'] . '.'];
        $_SESSION['csrf'] = bin2hex(random_bytes(32));  // rotate token
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '#contact');  // Post/Redirect/Get
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
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
  // Apply saved theme before paint (prevents flash)
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
h2.title{font-size:clamp(1.6rem,4vw,2.2rem);margin-bottom:2.5rem;text-align:center;
  background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.btn{display:inline-block;padding:.8rem 1.6rem;border-radius:999px;border:2px solid transparent;font:600 .95rem 'Poppins',sans-serif;
  cursor:pointer;background:var(--btn);color:#fff;box-shadow:var(--shadow);transition:transform .2s,box-shadow .2s}
.btn:hover{transform:translateY(-3px);box-shadow:0 14px 34px rgba(124,58,237,.35)}
.btn.outline{background:transparent;color:var(--accent);border-color:var(--accent);box-shadow:none}
:focus-visible{outline:3px solid var(--p400);outline-offset:3px}
.chip{display:inline-block;padding:.2rem .8rem;border-radius:999px;background:var(--accent-soft);color:var(--text);font-size:.8rem;font-weight:500}
/* ---------- Navbar ---------- */
header{position:sticky;top:0;z-index:50;background:var(--nav);backdrop-filter:blur(12px);border-bottom:1px solid var(--border)}
.nav{display:flex;align-items:center;justify-content:space-between;height:68px}
.logo{font-weight:700;font-size:1.2rem;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent}
.menu{display:flex;gap:1.6rem;list-style:none;align-items:center}
.menu a{color:var(--text);font-weight:500;font-size:.92rem;transition:color .2s}
.menu a:hover{color:var(--accent)}
.icon-btn{background:var(--card);border:1px solid var(--border);color:var(--text);width:40px;height:40px;border-radius:50%;cursor:pointer;font-size:1.1rem}
.burger{display:none}
@media(max-width:800px){
  .burger{display:inline-block}
  .menu{position:absolute;top:68px;left:0;right:0;flex-direction:column;background:var(--bg);padding:1.2rem 0;
    border-bottom:1px solid var(--border);display:none}
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
.avatar{width:min(280px,70%);aspect-ratio:1;margin-inline:auto;border-radius:30% 70% 60% 40%/40% 40% 60% 60%;background:var(--grad);
  display:grid;place-items:center;font-size:4rem;font-weight:700;color:#fff;box-shadow:var(--shadow);overflow:hidden;animation:morph 9s ease-in-out infinite}
.avatar img{width:100%;height:100%;object-fit:cover}
@keyframes morph{50%{border-radius:60% 40% 40% 60%/60% 60% 40% 40%}}
@media(max-width:800px){.hero .container{grid-template-columns:1fr;text-align:center}.hero p{margin-inline:auto}.hero .actions{justify-content:center}.avatar{order:-1}}
/* ---------- Cards / grids ---------- */
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:1.6rem;box-shadow:var(--shadow);transition:transform .3s,box-shadow .3s}
.card:hover{transform:translateY(-6px);box-shadow:0 18px 40px rgba(124,58,237,.22)}
.about p{max-width:760px;margin:0 auto 1rem;text-align:center;color:var(--muted)}
.info{display:flex;flex-wrap:wrap;gap:.8rem;justify-content:center;margin-top:1.5rem}
/* Timeline */
.timeline{position:relative;max-width:720px;margin:auto;padding-left:2rem;border-left:3px solid var(--p300)}
.t-item{position:relative;margin-bottom:1.6rem}
.t-item::before{content:"";position:absolute;left:calc(-2rem - 9px);top:1.6rem;width:15px;height:15px;border-radius:50%;background:var(--accent);border:3px solid var(--bg)}
.t-item span{color:var(--accent);font-weight:600;font-size:.85rem}
.t-item h3{font-size:1.05rem;margin:.2rem 0}
.t-item p{color:var(--muted);font-size:.9rem}
/* Skills */
.grid{display:grid;gap:1.5rem}
.skills{grid-template-columns:repeat(auto-fit,minmax(260px,1fr))}
.bar{height:10px;border-radius:99px;background:var(--accent-soft);overflow:hidden;margin-top:.5rem}
.bar i{display:block;height:100%;width:0;border-radius:99px;background:var(--grad);transition:width 1.2s ease}
.skill-head{display:flex;justify-content:space-between;font-weight:600;font-size:.95rem}
.langs{grid-template-columns:repeat(auto-fit,minmax(200px,1fr));text-align:center}
.langs h3{color:var(--accent)}
/* Carte Modules */
.module-cta{display:flex;align-items:center;gap:1.6rem;max-width:760px;margin:auto;padding:2.2rem;color:var(--text)}
.module-cta .m-icon{font-size:3.4rem;width:90px;height:90px;flex:none;display:grid;place-items:center;border-radius:24px;background:var(--grad)}
.module-cta h3{font-size:1.4rem;margin-bottom:.3rem}
.module-cta p{color:var(--muted);font-size:.95rem;margin-bottom:1rem}
.module-cta .go{font-weight:600;color:var(--accent)}
.module-cta:hover .go{letter-spacing:.02em}
@media(max-width:600px){.module-cta{flex-direction:column;text-align:center}}
/* Projects */
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
/* Contact */
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
/* Footer */
footer{background:var(--footer);color:var(--p100);text-align:center;padding:2rem 0;font-size:.9rem}
footer a{color:var(--p300);margin:0 .6rem}
/* Scroll animation */
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s,transform .7s}
.reveal.show{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important}html{scroll-behavior:auto}.reveal{opacity:1;transform:none}}
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
        <div class="t-item card reveal">
          <span><?= e($ed['period']) ?></span>
          <h3><?= e($ed['title']) ?></h3>
          <p><?= e($ed['place']) ?></p>
        </div>
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

<!-- ============ MODULES (carte -> modules.php) ============ -->
<section id="modules">
  <div class="container">
    <h2 class="title">Modules</h2>
    <a class="card module-cta reveal" href="<?= e($modulesCard['url']) ?>">
      <div class="m-icon" aria-hidden="true"><?= e($modulesCard['icon']) ?></div>
      <div>
        <h3><?= e($modulesCard['title']) ?></h3>
        <p><?= e($modulesCard['text']) ?></p>
        <span class="chip"><?= (int)$modulesCard['count'] ?> modules</span>
        <span class="go">&nbsp; Voir mes modules →</span>
      </div>
    </a>
  </div>
</section>

<!-- ============ PROJECTS ============ -->
<section id="projects">
  <div class="container">
    <h2 class="title">Projects</h2>
    <div class="grid projects">
      <?php foreach ($projects as $p): ?>
        <article class="card project reveal">
          <div class="thumb">
            <?php if ($p['image']): ?><img src="<?= e($p['image']) ?>" alt="<?= e($p['title']) ?> screenshot" loading="lazy"><?php else: ?>&lt;/&gt;<?php endif; ?>
          </div>
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

<!-- ============ FOOTER ============ -->
<footer>
  <div class="container">
    <p><?php foreach ($profile['links'] as $label => $url): ?><a href="<?= e($url) ?>" target="_blank" rel="noopener"><?= e($label) ?></a><?php endforeach; ?></p>
    <p>© <?= date('Y') ?> <?= e($profile['name']) ?>. All rights reserved.</p>
  </div>
</footer>

<script>
/* Theme toggle (saved in localStorage) */
const root = document.documentElement, themeBtn = document.getElementById('themeBtn');
const paint = () => themeBtn.textContent = root.dataset.theme === 'dark' ? '☀️' : '🌙';
paint();
themeBtn.addEventListener('click', () => {
  root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
  try { localStorage.setItem('theme', root.dataset.theme); } catch (e) {}
  paint();
});

/* Mobile menu */
const menu = document.getElementById('menu');
document.getElementById('burger').addEventListener('click', () => menu.classList.toggle('open'));
menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => menu.classList.remove('open')));

/* Scroll reveal + skill bar animation */
const io = new IntersectionObserver((entries) => {
  entries.forEach(en => {
    if (!en.isIntersecting) return;
    en.target.classList.add('show');
    const bar = en.target.querySelector('.bar i');
    if (bar) bar.style.width = bar.dataset.w + '%';
    io.unobserve(en.target);
  });
}, { threshold: .15 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>
</body>
</html>