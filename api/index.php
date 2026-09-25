<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Nova Reyes — Frontend Developer &amp; Digital Designer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#0a0714; --bg2:#120b22;
  --violet-deep:#3b1d6e; --violet:#7c3aed; --violet-light:#a78bfa;
  --magenta:#c026d3; --indigo:#4f46e5;
  --text:#eae5f7; --text-dim:#a99fc4; --text-faint:#6f6590;
  --card:rgba(255,255,255,0.04); --border:rgba(167,139,250,0.18);
  --grad: linear-gradient(120deg,var(--violet) 0%,var(--magenta) 55%,var(--indigo) 100%);
  --glow: 0 0 40px rgba(124,58,237,0.35);
  padding-top: env(safe-area-inset-top,0px);
  padding-bottom: env(safe-area-inset-bottom,0px);
  box-sizing:border-box;
}
*{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;scroll-padding-top:env(safe-area-inset-top,0px);}
body{
  background:var(--bg); color:var(--text);
  font-family:'Inter',sans-serif; line-height:1.6;
  overflow-x:hidden;
}
h1,h2,h3,.logo,.nav-links a{font-family:'Outfit',sans-serif;}
a{color:inherit;text-decoration:none;}
img{max-width:100%;display:block;}
.wrap{max-width:1180px;margin:0 auto;padding:0 32px;}
section{padding:130px 0;position:relative;}
@media(max-width:700px){section{padding:90px 0;} .wrap{padding:0 20px;}}

/* --- background blobs --- */
.blobs{position:fixed;inset:0;z-index:0;overflow:hidden;pointer-events:none;}
.blob{position:absolute;border-radius:50%;filter:blur(90px);opacity:0.35;}
.blob1{width:520px;height:520px;background:var(--violet);top:-180px;left:-160px;animation:float1 22s ease-in-out infinite;}
.blob2{width:460px;height:460px;background:var(--magenta);top:40%;right:-200px;animation:float2 26s ease-in-out infinite;}
.blob3{width:400px;height:400px;background:var(--indigo);bottom:-160px;left:20%;animation:float1 30s ease-in-out infinite reverse;}
@keyframes float1{0%,100%{transform:translate(0,0) scale(1);}50%{transform:translate(60px,50px) scale(1.1);}}
@keyframes float2{0%,100%{transform:translate(0,0) scale(1);}50%{transform:translate(-70px,40px) scale(0.95);}}

/* --- nav --- */
header{
  position:fixed;top:0;left:0;right:0;z-index:100;
  padding:22px 0; transition:background .35s ease,backdrop-filter .35s ease,padding .35s ease,border-color .35s ease;
  border-bottom:1px solid transparent;
}
header.scrolled{background:rgba(10,7,20,0.75);backdrop-filter:blur(14px);padding:14px 0;border-color:var(--border);}
nav{display:flex;align-items:center;justify-content:space-between;}
.logo{font-weight:700;font-size:1.3rem;letter-spacing:-0.02em;}
.logo span{background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent;}
.nav-links{display:flex;gap:34px;list-style:none;}
.nav-links a{font-size:0.95rem;color:var(--text-dim);transition:color .25s;position:relative;}
.nav-links a:hover{color:var(--text);}
.nav-toggle{display:none;flex-direction:column;gap:5px;cursor:pointer;background:none;border:none;}
.nav-toggle span{width:24px;height:2px;background:var(--text);}
@media(max-width:800px){
  .nav-links{position:fixed;top:0;right:-100%;width:70%;max-width:320px;height:100vh;background:var(--bg2);
    flex-direction:column;padding:100px 32px;gap:26px;transition:right .4s ease;border-left:1px solid var(--border);}
  .nav-links.open{right:0;}
  .nav-toggle{display:flex;}
}

/* --- buttons --- */
.btn{
  display:inline-flex;align-items:center;gap:10px;padding:15px 30px;border-radius:100px;
  font-weight:600;font-size:0.95rem;border:none;cursor:pointer;position:relative;overflow:hidden;
  transition:transform .3s ease, box-shadow .3s ease;
}
.btn-primary{background:var(--grad);color:#fff;box-shadow:0 8px 30px rgba(124,58,237,0.35);}
.btn-primary:hover{transform:translateY(-3px);box-shadow:0 14px 40px rgba(192,38,211,0.45);}
.btn-ghost{border:1px solid var(--border);color:var(--text);background:rgba(255,255,255,0.02);}
.btn-ghost:hover{border-color:var(--violet-light);background:rgba(124,58,237,0.08);}

/* --- hero --- */
.hero{min-height:100vh;display:flex;align-items:center;padding-top:140px;}
.hero-grid{display:grid;grid-template-columns:1.1fr 0.8fr;gap:60px;align-items:center;}
@media(max-width:900px){.hero-grid{grid-template-columns:1fr;text-align:left;}}
.eyebrow{color:var(--violet-light);font-size:0.9rem;font-weight:500;margin-bottom:18px;}
.hero h1{font-size:clamp(2.6rem,6vw,4.4rem);font-weight:700;line-height:1.06;letter-spacing:-0.02em;margin-bottom:22px;}
.hero h1 em{font-style:normal;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hero p{color:var(--text-dim);font-size:1.15rem;max-width:520px;margin-bottom:36px;}
.hero-cta{display:flex;gap:16px;flex-wrap:wrap;}
.hero-visual{position:relative;aspect-ratio:1;border-radius:32px;background:linear-gradient(160deg,rgba(124,58,237,0.25),rgba(192,38,211,0.15));border:1px solid var(--border);display:flex;align-items:center;justify-content:center;backdrop-filter:blur(6px);}
.hero-visual::before{content:'';position:absolute;inset:0;border-radius:32px;box-shadow:var(--glow);}
.hero-visual span{font-size:6rem;}
@media(max-width:900px){.hero-visual{max-width:280px;margin:0 auto;}}

/* --- reveal --- */
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s ease,transform .7s ease;}
.reveal.show{opacity:1;transform:none;}

/* --- section head --- */
.section-head{max-width:560px;margin-bottom:60px;}
.section-head h2{font-size:clamp(1.8rem,3.5vw,2.6rem);font-weight:700;letter-spacing:-0.01em;margin-bottom:14px;}
.section-head p{color:var(--text-dim);font-size:1.05rem;}

/* --- about --- */
.about-grid{display:grid;grid-template-columns:0.7fr 1.3fr;gap:56px;align-items:center;}
@media(max-width:800px){.about-grid{grid-template-columns:1fr;}}
.avatar{width:100%;aspect-ratio:1;border-radius:28px;background:var(--grad);position:relative;display:flex;align-items:center;justify-content:center;font-size:5rem;box-shadow:var(--glow);}
.about-text p{color:var(--text-dim);margin-bottom:18px;font-size:1.05rem;}
.highlights{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:30px;}
@media(max-width:600px){.highlights{grid-template-columns:1fr;}}
.highlight{padding:20px;border:1px solid var(--border);border-radius:16px;background:var(--card);}
.highlight strong{display:block;font-size:1.6rem;background:var(--grad);-webkit-background-clip:text;background-clip:text;color:transparent;margin-bottom:4px;}
.highlight span{color:var(--text-faint);font-size:0.88rem;}

/* --- skills --- */
.skills-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:38px 60px;}
@media(max-width:700px){.skills-grid{grid-template-columns:1fr;}}
.skill-row{margin-bottom:6px;}
.skill-top{display:flex;justify-content:space-between;margin-bottom:9px;font-size:0.95rem;}
.skill-top span:last-child{color:var(--text-faint);}
.bar{height:7px;border-radius:6px;background:rgba(255,255,255,0.06);overflow:hidden;}
.bar-fill{height:100%;border-radius:6px;background:var(--grad);width:0;transition:width 1.1s cubic-bezier(.2,.8,.2,1);}

/* --- projects --- */
.projects-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(310px,1fr));gap:28px;}
.card{
  border-radius:22px;border:1px solid var(--border);background:var(--card);overflow:hidden;
  transition:transform .35s ease,border-color .35s ease,box-shadow .35s ease;backdrop-filter:blur(8px);
}
.card:hover{transform:translateY(-8px);border-color:var(--violet-light);box-shadow:0 20px 50px rgba(124,58,237,0.25);}
.card-cover{aspect-ratio:16/10;background:var(--grad);opacity:0.85;display:flex;align-items:center;justify-content:center;font-size:2.6rem;}
.card-body{padding:26px;}
.card-body h3{font-size:1.2rem;margin-bottom:10px;}
.card-body p{color:var(--text-dim);font-size:0.94rem;margin-bottom:18px;}
.tags{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;}
.tag{font-size:0.76rem;padding:5px 11px;border-radius:100px;background:rgba(124,58,237,0.14);color:var(--violet-light);border:1px solid var(--border);}
.card-links{display:flex;gap:18px;}
.card-links a{font-size:0.9rem;font-weight:600;color:var(--text);border-bottom:1px solid var(--violet-light);padding-bottom:2px;transition:opacity .2s;}
.card-links a:hover{opacity:0.7;}

/* --- timeline --- */
.timeline{position:relative;max-width:760px;margin:0 auto;}
.timeline::before{content:'';position:absolute;left:9px;top:6px;bottom:6px;width:2px;background:linear-gradient(var(--violet),var(--magenta),var(--indigo));}
.t-item{position:relative;padding-left:44px;margin-bottom:46px;}
.t-item:last-child{margin-bottom:0;}
.t-dot{position:relative;position:absolute;left:0;top:4px;width:20px;height:20px;border-radius:50%;background:var(--bg);border:2px solid var(--violet-light);box-shadow:0 0 16px rgba(124,58,237,0.6);}
.t-date{color:var(--violet-light);font-size:0.85rem;font-weight:600;margin-bottom:6px;}
.t-item h3{font-size:1.15rem;margin-bottom:6px;}
.t-item p{color:var(--text-dim);font-size:0.95rem;}

/* --- testimonials --- */
.testi-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:26px;}
.testi{padding:28px;border-radius:20px;border:1px solid var(--border);background:var(--card);}
.testi p{color:var(--text-dim);font-style:italic;margin-bottom:20px;font-size:0.98rem;}
.testi-author{display:flex;align-items:center;gap:12px;}
.testi-avatar{width:40px;height:40px;border-radius:50%;background:var(--grad);display:flex;align-items:center;justify-content:center;font-size:1.1rem;}
.testi-author strong{display:block;font-size:0.92rem;}
.testi-author span{color:var(--text-faint);font-size:0.8rem;}

/* --- contact --- */
.contact-grid{display:grid;grid-template-columns:0.9fr 1.1fr;gap:56px;}
@media(max-width:800px){.contact-grid{grid-template-columns:1fr;}}
.social-list{display:flex;flex-direction:column;gap:14px;margin-top:26px;}
.social-list a{display:flex;align-items:center;gap:12px;color:var(--text-dim);transition:color .25s;font-size:0.98rem;}
.social-list a:hover{color:var(--violet-light);}
.field{margin-bottom:20px;}
.field label{display:block;font-size:0.88rem;color:var(--text-dim);margin-bottom:8px;}
.field input,.field textarea{
  width:100%;padding:14px 16px;border-radius:12px;border:1px solid var(--border);
  background:rgba(255,255,255,0.03);color:var(--text);font-family:inherit;font-size:0.95rem;
  transition:border-color .25s,box-shadow .25s;
}
.field input:focus,.field textarea:focus{outline:none;border-color:var(--violet-light);box-shadow:0 0 0 3px rgba(124,58,237,0.2);}
.field textarea{resize:vertical;min-height:120px;}
.form-note{font-size:0.82rem;color:var(--text-faint);margin-top:10px;}

/* --- footer --- */
footer{border-top:1px solid var(--border);padding:40px 0;}
.footer-row{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;}
.footer-row p{color:var(--text-faint);font-size:0.85rem;}

/* --- back to top --- */
#toTop{
  position:fixed;bottom:calc(28px + env(safe-area-inset-bottom,0px));right:28px;width:48px;height:48px;border-radius:50%;
  background:var(--grad);border:none;color:#fff;font-size:1.2rem;cursor:pointer;z-index:90;
  display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(124,58,237,0.4);
  opacity:0;pointer-events:none;transform:translateY(10px);transition:opacity .3s,transform .3s;
}
#toTop.show{opacity:1;pointer-events:auto;transform:none;}

@media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important;}}
</style>
</head>
<body>

<div class="blobs"><div class="blob blob1"></div><div class="blob blob2"></div><div class="blob blob3"></div></div>

<header id="siteHeader">
  <nav class="wrap">
    <a href="#top" class="logo">nova<span>.</span></a>
    <ul class="nav-links" id="navLinks">
      <li><a href="#about">À propos</a></li>
      <li><a href="#skills">Compétences</a></li>
      <li><a href="#projects">Projets</a></li>
      <li><a href="#experience">Parcours</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <button class="nav-toggle" id="navToggle" aria-label="Menu"><span></span><span></span><span></span></button>
  </nav>
</header>

<main id="top">
  <!-- HERO -->
  <section class="hero">
    <div class="wrap hero-grid">
      <div>
        <p class="eyebrow">Frontend Developer & Digital Designer</p>
        <h1>Je conçois des interfaces qui <em>racontent quelque chose</em></h1>
        <p>Nova Reyes — je transforme des idées en expériences web fluides, entre code soigné et design sensible. Basée à Casablanca, je collabore avec des studios et des fondateurs à travers le monde.</p>
        <div class="hero-cta">
          <a href="#projects" class="btn btn-primary">Voir mes projets</a>
          <a href="#contact" class="btn btn-ghost">Me contacter</a>
        </div>
      </div>
      <div class="hero-visual"><span>✧</span></div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about">
    <div class="wrap about-grid reveal">
      <div class="avatar">🪐</div>
      <div class="about-text">
        <div class="section-head"><h2>À propos</h2></div>
        <p>Depuis 6 ans, je conçois et développe des sites et applications qui allient rigueur technique et sensibilité visuelle. Mon approche : comprendre le fond avant la forme, puis sculpter chaque détail — typographie, rythme, micro-interactions.</p>
        <p>J'ai travaillé avec des startups en phase de lancement comme avec des marques établies, toujours avec la même exigence : un produit fini qui ne ressemble à aucun autre.</p>
        <div class="highlights">
          <div class="highlight"><strong>40+</strong><span>projets livrés</span></div>
          <div class="highlight"><strong>6 ans</strong><span>d'expérience</span></div>
          <div class="highlight"><strong>98%</strong><span>clients satisfaits</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- SKILLS -->
  <section id="skills">
    <div class="wrap">
      <div class="section-head reveal"><h2>Compétences</h2><p>Les outils et langages que j'utilise au quotidien pour donner vie aux interfaces.</p></div>
      <div class="skills-grid reveal">
        <div>
          <div class="skill-row"><div class="skill-top"><span>HTML / CSS</span><span>95%</span></div><div class="bar"><div class="bar-fill" data-w="95"></div></div></div>
          <div class="skill-row"><div class="skill-top"><span>JavaScript</span><span>90%</span></div><div class="bar"><div class="bar-fill" data-w="90"></div></div></div>
          <div class="skill-row"><div class="skill-top"><span>React</span><span>85%</span></div><div class="bar"><div class="bar-fill" data-w="85"></div></div></div>
        </div>
        <div>
          <div class="skill-row"><div class="skill-top"><span>UI / UX Design</span><span>88%</span></div><div class="bar"><div class="bar-fill" data-w="88"></div></div></div>
          <div class="skill-row"><div class="skill-top"><span>Figma</span><span>92%</span></div><div class="bar"><div class="bar-fill" data-w="92"></div></div></div>
          <div class="skill-row"><div class="skill-top"><span>Node.js</span><span>75%</span></div><div class="bar"><div class="bar-fill" data-w="75"></div></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECTS -->
  <section id="projects">
    <div class="wrap">
      <div class="section-head reveal"><h2>Projets</h2><p>Une sélection de réalisations récentes, du concept à la mise en ligne.</p></div>
      <div class="projects-grid reveal">
        <div class="card">
          <div class="card-cover">🌌</div>
          <div class="card-body">
            <h3>Aurora — Plateforme SaaS</h3>
            <p>Dashboard analytique pour une startup fintech, focus sur la clarté des données.</p>
            <div class="tags"><span class="tag">React</span><span class="tag">TypeScript</span><span class="tag">Figma</span></div>
            <div class="card-links"><a href="#">Démo</a><a href="#">GitHub</a></div>
          </div>
        </div>
        <div class="card">
          <div class="card-cover">🛍️</div>
          <div class="card-body">
            <h3>Lumen — E-commerce</h3>
            <p>Boutique en ligne de design scandinave, parcours d'achat repensé.</p>
            <div class="tags"><span class="tag">Next.js</span><span class="tag">Stripe</span></div>
            <div class="card-links"><a href="#">Démo</a><a href="#">GitHub</a></div>
          </div>
        </div>
        <div class="card">
          <div class="card-cover">🎧</div>
          <div class="card-body">
            <h3>Echo — App mobile</h3>
            <p>Application de streaming audio indépendant, identité sonore visuelle.</p>
            <div class="tags"><span class="tag">React Native</span><span class="tag">UI Design</span></div>
            <div class="card-links"><a href="#">Démo</a><a href="#">GitHub</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- EXPERIENCE -->
  <section id="experience">
    <div class="wrap">
      <div class="section-head reveal"><h2>Parcours</h2><p>Les étapes clés de mon évolution professionnelle.</p></div>
      <div class="timeline reveal">
        <div class="t-item"><div class="t-dot"></div><div class="t-date">2023 — Aujourd'hui</div><h3>Développeuse Frontend Senior — Studio Orbite</h3><p>Direction technique de projets web pour des clients internationaux, mentorat d'une équipe de 3 développeurs.</p></div>
        <div class="t-item"><div class="t-dot"></div><div class="t-date">2021 — 2023</div><h3>Développeuse Frontend — Kōan Agency</h3><p>Conception et développement de sites vitrines et d'applications sur-mesure pour des marques créatives.</p></div>
        <div class="t-item"><div class="t-dot"></div><div class="t-date">2019 — 2021</div><h3>Designer UI/UX Freelance</h3><p>Accompagnement de startups early-stage sur l'identité visuelle et les premières interfaces produit.</p></div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section id="testimonials">
    <div class="wrap">
      <div class="section-head reveal"><h2>Témoignages</h2><p>Ce que mes clients disent de notre collaboration.</p></div>
      <div class="testi-grid reveal">
        <div class="testi">
          <p>Nova a transformé notre vision en une interface qui dépasse ce qu'on imaginait. Un vrai sens du détail.</p>
          <div class="testi-author"><div class="testi-avatar">M</div><div><strong>Mehdi Aboud</strong><span>Fondateur, Aurora</span></div></div>
        </div>
        <div class="testi">
          <p>Rigoureuse, créative et toujours à l'écoute. Le site a fait grimper nos conversions de 30%.</p>
          <div class="testi-author"><div class="testi-avatar">S</div><div><strong>Sofia Lentz</strong><span>CMO, Lumen</span></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact">
    <div class="wrap contact-grid reveal">
      <div>
        <div class="section-head"><h2>Travaillons ensemble</h2><p>Une idée de projet ? Discutons-en autour d'un café virtuel.</p></div>
        <div class="social-list">
          <a href="mailto:hello@novareyes.dev">✉ hello@novareyes.dev</a>
          <a href="#">◈ GitHub</a>
          <a href="#">◈ LinkedIn</a>
          <a href="#">◈ Dribbble</a>
        </div>
      </div>
      <form id="contactForm" onsubmit="event.preventDefault(); document.getElementById('formMsg').textContent='Message envoyé — merci, je reviens vers vous rapidement !';this.reset();">
        <div class="field"><label for="name">Nom</label><input id="name" type="text" placeholder="Votre nom" required></div>
        <div class="field"><label for="email">Email</label><input id="email" type="email" placeholder="vous@exemple.com" required></div>
        <div class="field"><label for="message">Message</label><textarea id="message" placeholder="Parlez-moi de votre projet..." required></textarea></div>
        <button type="submit" class="btn btn-primary">Envoyer le message</button>
        <p class="form-note" id="formMsg">Formulaire de démonstration — remplacez par votre propre backend.</p>
      </form>
    </div>
  </section>
</main>

<footer>
  <div class="wrap footer-row">
    <p>© 2026 Nova Reyes. Tous droits réservés.</p>
    <p>Conçu &amp; développé avec soin.</p>
  </div>
</footer>

<button id="toTop" aria-label="Retour en haut">↑</button>

<script>
// Nav scroll state
const header = document.getElementById('siteHeader');
const toTop = document.getElementById('toTop');
window.addEventListener('scroll', () => {
  const y = window.scrollY;
  header.classList.toggle('scrolled', y > 40);
  toTop.classList.toggle('show', y > 500);
});

// Mobile nav toggle
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');
navToggle.addEventListener('click', () => navLinks.classList.toggle('open'));
navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));

// Back to top
toTop.addEventListener('click', () => window.scrollTo({top:0, behavior:'smooth'}));

// Scroll reveal + skill bars
const io = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if(e.isIntersecting){
      e.target.classList.add('show');
      e.target.querySelectorAll('.bar-fill').forEach(b => b.style.width = b.dataset.w + '%');
      io.unobserve(e.target);
    }
  });
}, {threshold:0.15});
document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>
</body>
</html>