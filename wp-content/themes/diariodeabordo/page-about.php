<?php
/**
 * Template Name: About // El Arquitecto
 * Repositorio: Diario de Abordo 2.2
 */
get_header(); ?>

<style>
    .about-header { position: relative; height: 100vh; display: grid; grid-template-columns: 1fr 1fr; align-items: center; padding: 0 40px; background: #000; overflow: hidden; }
    .portrait-wrap { position: absolute; right: 0; top: 0; bottom: 0; width: 60vw; z-index: 1; filter: grayscale(1) contrast(1.05); pointer-events: none; }
    .portrait-img { width: 100%; height: 100%; object-fit: cover; opacity: 0.8; mask-image: linear-gradient(to right, transparent, black 40%); -webkit-mask-image: linear-gradient(to right, transparent, black 40%); }
    
    .header-content { position: relative; z-index: 10; max-width: 700px; }
    .header-content h1 { font-size: clamp(40px, 8vw, 120px); font-weight: 700; line-height: 0.9; letter-spacing: -0.04em; color: #fff; text-transform: uppercase; }
    .header-content h1 span { display: block; -webkit-text-stroke: 1px rgba(255,255,255,0.3); color: transparent; }

    .manifesto-section { padding: 120px 40px; background: #000; position: relative; z-index: 6; }
    .manifesto-text { font-size: clamp(22px, 3vw, 36px); font-weight: 300; line-height: 1.45; max-width: 900px; color: #ccc; border-left: 2px solid var(--accent); padding-left: 45px; }
    .manifesto-text strong { font-weight: 700; color: #fff; }

    .method-block { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1px; background: var(--line); margin-top: 100px; }
    .method-card { background: #080808; padding: 60px 40px; }
    .method-card span { font-family: var(--font-mono); color: var(--accent); font-size: 11px; letter-spacing: 0.3em; display: block; margin-bottom: 20px; }
    .method-card h3 { font-size: 20px; font-weight: 700; color: #fff; margin-bottom: 15px; }
    .method-card p { color: #888; font-size: 14px; line-height: 1.7; }
    
    @media (max-width: 1024px) {
        .about-header { grid-template-columns: 1fr; text-align: center; justify-items: center; }
        .portrait-wrap { width: 100%; opacity: 0.3; mask-image: none; -webkit-mask-image: none; }
        .header-content { padding-top: 100px; }
        .manifesto-text { font-size: 20px; padding-left: 20px; }
    }
</style>

<main class="page-content reveal">
    <header class="about-header">
        <div class="portrait-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/jose_maria.jpg" class="portrait-img" alt="Jose Maria Galarza">
        </div>
        <div class="header-content">
            <span class="technical-label" style="color:var(--accent); margin-bottom: 24px; display: block;">ESTRATEGIA &middot; LIDERAZGO &middot; SISTEMAS</span>
            <h1>EL ARQUITECTO<br><span>DE MANDO.</span></h1>
            <p style="font-family: var(--font-mono); font-size: 11px; color: #666; margin-top: 40px; letter-spacing: 0.2em;">JOSE MAR&Iacute;A G. &mdash; FUNDADOR DIARIO DE ABORDO</p>
        </div>
    </header>

    <section class="manifesto-section reveal">
        <div class="manifesto-text">
            No creo en la motivaci&oacute;n barata ni en los manuales de autoayuda. Creo en la <strong>Ingenier&iacute;a de Liderazgo</strong>.
            <br><br>
            Cada domingo, entrego instrucciones de mando para aquellos que han decidido dejar de ser tripulantes y empezar a ser los <strong>arquitectos de su propia ejecuci&oacute;n</strong>.
        </div>

        <div class="method-block reveal">
            <div class="method-card">
                <span>M&Eacute;TODO / B.A.R.C.O.</span>
                <h3>SISTEMAS DE ALTA GAMA</h3>
                <p>Dise&ntilde;o flujos de trabajo que no dependen del estado de &aacute;nimo, sino de la arquitectura. La disciplina es el algoritmo.</p>
            </div>
            <div class="method-card">
                <span>PILARES / ESTOICISMO</span>
                <h3>ESTOICISMO APLICADO</h3>
                <p>Dominar la dicotom&iacute;a del control para blindar la toma de decisiones en entornos de alta incertidumbre.</p>
            </div>
            <div class="method-card">
                <span>RESULTADO / IMPACTO</span>
                <h3>PROPIEDAD RADICAL</h3>
                <p>Tomar el tim&oacute;n significa aceptar la responsabilidad total del destino de tu negocio y de tu vida.</p>
            </div>
        </div>
    </section>

    <section class="reveal" style="padding: 120px 40px; text-align: center; border-top: 1px solid var(--line); background: #030303;">
        <h2 style="font-size: clamp(34px, 6vw, 84px); font-weight: 700;">EMPIEZA EL ASCENSO.</h2>
        <a href="<?php echo home_url('/#newsletter'); ?>" class="btn-primary" style="margin-top: 50px;">UNIRSE A LA BIT&Aacute;CORA &rarr;</a>
    </section>
</main>

<?php get_footer(); ?>
