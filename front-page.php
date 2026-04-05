<?php 
/**
 * Template Name: Home Page Godly Full
 */
get_header(); ?>

<style>
/* ── DIARIO DE ABORDO — GODLY ENGINE ── */
:root {
    --bg: #080808;
    --accent: #c9a84c;
    --text: #f0ede8;
    --text-muted: #888884;
    --line: #222;
}

#godly-root {
    background: var(--bg);
    color: var(--text);
    font-family: 'Space Grotesk', sans-serif;
    overflow-x: hidden;
    position: relative;
}

/* Animations */
@keyframes da-ticker{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
@keyframes da-fadeUp{to{opacity:1;transform:translateY(0)}}
.da-reveal{opacity:0;transform:translateY(30px);transition:opacity .8s ease,transform .8s ease;}
.da-reveal.da-vis{opacity:1;transform:none;}

/* Hero */
.da-hero {
    min-height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 140px 40px 80px;
}

.da-btn-primary { 
    display: inline-flex; align-items: center; gap: 8px; 
    background: #fff; color: #000 !important; 
    font-size: 11px; font-weight: 700; letter-spacing: .1em; 
    text-transform: uppercase; text-decoration: none; 
    padding: 14px 28px; transition: all .3s; 
}
.da-btn-secondary { 
    display: inline-flex; align-items: center; gap: 8px; 
    color: #fff; font-size: 11px; font-weight: 600; 
    letter-spacing: .1em; text-transform: uppercase; 
    text-decoration: none; padding: 14px 28px; 
    border: 1px solid rgba(255,255,255,0.2); transition: all .3s; 
}

/* Ticker */
.da-ticker-wrap {
    overflow: hidden; border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); 
    padding: 18px 0; background: #111;
}
.da-ticker-content {
    display: flex; animation: da-ticker 30s linear infinite; width: max-content;
}

/* Pillars */
.da-pillar {
    background: var(--bg); padding: 52px 44px; position: relative; overflow: hidden; 
    border: 1px solid var(--line); transition: background .4s ease;
}
.da-pillar:hover { background: #111 !important; }

/* Responsive */
@media(max-width:768px){
    .da-hero { padding: 110px 24px 60px; }
    .da-pillars-grid { grid-template-columns: 1fr !important; }
    .da-stats { grid-template-columns: 1fr !important; }
}
</style>

<div id="godly-root">
    <!-- HERO -->
    <section class="da-hero">
        <p style="font-family:'Space Mono',monospace; font-size:11px; color:var(--accent); letter-spacing:.25em; text-transform:uppercase; margin-bottom:40px;">
            ⊜ Newsletter · Estrategia · Liderazgo Estoico
        </p>
        <h1 style="font-size:clamp(54px,9vw,118px); font-weight:700; line-height:.95; letter-spacing:-.03em; max-width:900px; margin:0;">
            Toma el tim&oacute;n<br>de tu <span style="color:var(--accent);">liderazgo.</span>
        </h1>
        <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:40px;">
            <a href="<?php echo site_url('/about'); ?>" class="da-btn-secondary">Mi Manifiesto →</a>
            <a href="#newsletter" class="da-btn-primary">Subir a bordo →</a>
        </div>
    </section>

    <!-- TICKER -->
    <div class="da-ticker-wrap">
        <div class="da-ticker-content">
            <?php for($i=0; $i<2; $i++): ?>
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--text-muted); letter-spacing:.2em; text-transform:uppercase; padding:0 40px;">Liderazgo Estoico <span style="color:var(--accent);">✱</span></span>
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--text-muted); letter-spacing:.2em; text-transform:uppercase; padding:0 40px;">Sistemas de Productividad <span style="color:var(--accent);">✱</span></span>
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--text-muted); letter-spacing:.2em; text-transform:uppercase; padding:0 40px;">Philosophy &amp; Execution <span style="color:var(--accent);">✱</span></span>
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--text-muted); letter-spacing:.2em; text-transform:uppercase; padding:0 40px;">Decisiones de Alto Impacto <span style="color:var(--accent);">✱</span></span>
            <?php endfor; ?>
        </div>
    </div>

    <!-- PILLARS -->
    <section style="padding:120px 40px; border-bottom:1px solid var(--line);">
        <div class="da-reveal" style="margin-bottom:80px;">
            <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--accent); letter-spacing:.25em; text-transform:uppercase;">⊜ Las tres velas</span>
        </div>
        <div class="da-pillars-grid da-reveal" style="display:grid; grid-template-columns:repeat(3,1fr); gap:1px; background:var(--line);">
            <div class="da-pillar">
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--accent); margin-bottom:32px; display:block;">01 ————</span>
                <h2 style="font-size:28px; font-weight:700; margin-bottom:20px;">Leadership</h2>
                <p style="font-size:14px; color:var(--text-muted); line-height:1.7;">Gu&iacute;a basada en principios estoicos. Navega la niebla de la infoxicaci&oacute;n con claridad.</p>
                <a href="<?php echo site_url('/category/leadership'); ?>" style="display:inline-flex; margin-top:32px; font-size:12px; font-weight:600; color:var(--accent); text-decoration:none;">Explorar →</a>
            </div>
            <div class="da-pillar">
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--accent); margin-bottom:32px; display:block;">02 ————</span>
                <h2 style="font-size:28px; font-weight:700; margin-bottom:20px;">Growth</h2>
                <p style="font-size:14px; color:var(--text-muted); line-height:1.7;">El viaje interior como motor de crecimiento. Herramientas para tu evoluci&oacute;n.</p>
                <a href="<?php echo site_url('/category/growth'); ?>" style="display:inline-flex; margin-top:32px; font-size:12px; font-weight:600; color:var(--accent); text-decoration:none;">Explorar →</a>
            </div>
            <div class="da-pillar">
                <span style="font-family:'Space Mono',monospace; font-size:11px; color:var(--accent); margin-bottom:32px; display:block;">03 ————</span>
                <h2 style="font-size:28px; font-weight:700; margin-bottom:20px;">Productivity</h2>
                <p style="font-size:14px; color:var(--text-muted); line-height:1.7;">Sistemas de mantenimiento de alto rendimiento. Pr&aacute;ctico y sostenible.</p>
                <a href="<?php echo site_url('/category/productivity'); ?>" style="display:inline-flex; margin-top:32px; font-size:12px; font-weight:600; color:var(--accent); text-decoration:none;">Explorar →</a>
            </div>
        </div>
    </section>

    <!-- STATEMENT -->
    <section style="padding:140px 40px; border-bottom:1px solid var(--line);">
        <blockquote class="da-reveal" style="font-size:clamp(30px,4.5vw,58px); font-weight:700; line-height:1.1; max-width:900px; margin:0; border:none; padding:0;">
            &ldquo;El liderazgo no es el ruido que haces.<br>
            Es la <span style="color:var(--accent);">direcci&oacute;n que mantienes</span><br>
            cuando el mar se pone dif&iacute;cil.&rdquo;
        </blockquote>
    </section>

    <!-- STATS -->
    <div class="da-stats" style="display:grid; grid-template-columns:repeat(3,1fr); gap:1px; background:var(--line); border-bottom:1px solid var(--line);">
        <div class="da-reveal" style="background:var(--bg); padding:64px 48px;">
            <div style="font-size:64px; font-weight:700; line-height:1; margin-bottom:12px;">2.000<span style="color:var(--accent);">+</span></div>
            <div style="font-size:13px; color:var(--text-muted); text-transform:uppercase; font-family:'Space Mono',monospace;">Lectores</div>
        </div>
        <div class="da-reveal" style="background:var(--bg); padding:64px 48px;">
            <div style="font-size:64px; font-weight:700; line-height:1; margin-bottom:12px;">52<span style="color:var(--accent);">×</span></div>
            <div style="font-size:13px; color:var(--text-muted); text-transform:uppercase; font-family:'Space Mono',monospace;">Ediciones al a&ntilde;o</div>
        </div>
        <div class="da-reveal" style="background:var(--bg); padding:64px 48px;">
            <div style="font-size:64px; font-weight:700; line-height:1; margin-bottom:12px;">100<span style="color:var(--accent);">%</span></div>
            <div style="font-size:13px; color:var(--text-muted); text-transform:uppercase; font-family:'Space Mono',monospace;">Manual de Impacto</div>
        </div>
    </div>

    <!-- NEWSLETTER -->
    <section id="newsletter" style="padding:120px 40px; text-align:center;">
        <div class="da-reveal">
            <h2 style="font-size:54px; font-weight:700; margin-bottom:40px;">&Uacute;NETE A LA TRIPULACI&Oacute;N.</h2>
            <div style="max-width:500px; margin: 0 auto; border: 1px solid var(--line); border-radius: 4px; overflow: hidden;">
                <iframe src="https://josemgalarza.substack.com/embed" width="100%" height="320" style="border:none; filter: invert(1) hue-rotate(180deg);"></iframe>
            </div>
        </div>
    </section>
</div>

<script>
window.addEventListener('DOMContentLoaded', () => {
    const obs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if(e.isIntersecting) {
                e.target.classList.add('da-vis');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.da-reveal').forEach(el => obs.observe(el));
});
</script>

<?php get_footer(); ?>
