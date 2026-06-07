<?php
/**
 * Template Name: About // El Arquitecto
 * Repositorio: Diario de Abordo 2.2
 */
get_header(); ?>

<style>
    /* Hero puramente tipográfico, sin imagen lateral */
    .about-header { 
        position: relative; 
        min-height: 80vh; 
        display: flex; 
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 20px; 
        background: radial-gradient(circle at top, rgba(201,168,76,0.15) 0%, #000 70%);
        overflow: hidden; 
    }
    
    .header-content { position: relative; z-index: 10; max-width: 900px; }
    .header-content h1 { 
        font-size: clamp(50px, 10vw, 150px); 
        font-weight: 900; 
        line-height: 0.85; 
        letter-spacing: -0.05em; 
        color: #fff; 
        text-transform: uppercase; 
        margin-bottom: 30px;
    }
    .header-content h1 span { 
        display: block; 
        background: linear-gradient(180deg, #fff 0%, rgba(255,255,255,0.2) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Star Wars Crawl Effect */
    .manifesto-section { padding: 120px 20px; background: #000; position: relative; z-index: 6; display: flex; justify-content: center; flex-direction: column; align-items: center;}
    
    .star-wars-container {
        display: flex;
        justify-content: center;
        position: relative;
        height: 60vh;
        width: 100%;
        color: var(--accent);
        perspective: 600px;
        background: transparent;
        margin: 50px 0;
        overflow: hidden;
        z-index: 20;
    }

    .manifesto-text { 
        position: absolute;
        bottom: -100%; /* Empieza escondido abajo */
        font-size: clamp(20px, 3vw, 36px); 
        font-weight: 700; 
        line-height: 1.8; 
        max-width: 800px; 
        text-align: justify;
        color: var(--accent);
        transform-origin: 50% 100%;
        animation: crawl 40s linear infinite;
        /* Drop shadow para que resalte más y parezca brillante */
        text-shadow: 0 0 10px rgba(201,168,76, 0.5);
    }
    
    @keyframes crawl {
        0% {
            bottom: -50%;
            transform: rotateX(30deg) scale(1);
            opacity: 0;
        }
        5% {
            opacity: 1;
        }
        100% {
            bottom: 120%;
            transform: rotateX(40deg) scale(0.3);
            opacity: 0;
        }
    }

    .manifesto-text p { margin-bottom: 2.5rem; }

    /* Glassmorphism Cards */
    .method-block { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
        gap: 20px; 
        max-width: 1200px;
        width: 100%;
        margin: 50px auto 100px auto; 
        padding: 0 20px;
    }
    
    .method-card { 
        background: rgba(255, 255, 255, 0.02); 
        border: 1px solid rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 50px 40px; 
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
    }
    
    .method-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(201, 168, 76, 0.3); /* Accent Glow */
        box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    }

    .method-card span { font-family: var(--font-mono, 'Space Mono', monospace); color: var(--accent); font-size: 12px; letter-spacing: 0.3em; display: block; margin-bottom: 20px; }
    .method-card h3 { font-size: 24px; font-weight: 700; color: #fff; margin-bottom: 15px; letter-spacing: -0.02em; }
    .method-card p { color: #888; font-size: 15px; line-height: 1.7; margin: 0; }
</style>

<main class="page-content reveal">
    <header class="about-header">
        <div class="header-content reveal">
            <span class="technical-label" style="color:var(--accent); margin-bottom: 30px; display: block; letter-spacing: 0.3em;">MANIFIESTO</span>
            <h1>EL ARQUITECTO<br><span>DE MANDO.</span></h1>
            <p style="font-family: var(--font-mono); font-size: 12px; color: rgba(255,255,255,0.4); margin-top: 40px; letter-spacing: 0.2em; text-transform: uppercase;">JOSE MAR&Iacute;A G. &mdash; FUNDADOR DIARIO DE ABORDO</p>
        </div>
    </header>

    <section class="manifesto-section reveal">
        <div class="star-wars-container">
            <div class="manifesto-text">
                <p>Creemos que toda persona lleva dentro una direcci&oacute;n, una fuerza y una luz propia. Nuestro trabajo no es imponer un camino, sino acompa&ntilde;ar a cada persona para que descubra el suyo con mayor claridad, confianza y verdad.</p>
                
                <p>Creemos en el crecimiento personal como un proceso profundo, consciente y sostenido. No se trata de correr m&aacute;s, sino de avanzar con sentido; no de parecer, sino de transformar desde dentro.</p>
                
                <p>Somos ancla cuando hace falta estabilidad. Ofrecemos un espacio seguro para parar, escuchar, ordenar el ruido y volver al centro.</p>
                
                <p>Somos br&uacute;jula cuando llega el momento de elegir. Ayudamos a convertir la confusi&oacute;n en direcci&oacute;n, la intenci&oacute;n en decisi&oacute;n y el aprendizaje en acci&oacute;n.</p>
                
                <p>Somos faro cuando el camino se vuelve incierto. Iluminamos posibilidades, abrimos perspectiva y recordamos que incluso en la duda existe una forma de avanzar con conciencia.</p>
                
                <p>Creemos en un aprendizaje que une reflexi&oacute;n y acci&oacute;n. Porque crecer no es solo comprenderse mejor, sino atreverse a vivir de forma m&aacute;s coherente con lo que uno es y con la vida que quiere construir.</p>
                
                <p>Aqu&iacute; no venimos a encajar en moldes ajenos. Venimos a desarrollar criterio, fortalecer la identidad, expandir la mirada y construir una vida con prop&oacute;sito, equilibrio y presencia.</p>
                
                <p>Este es nuestro manifiesto: acompa&ntilde;ar procesos reales, honrar el ritmo de cada persona y convertir el crecimiento personal en una pr&aacute;ctica viva, valiente y transformadora.</p>
            </div>
        </div>

        <div class="method-block reveal">
            <div class="method-card">
                <span>PILARES / ANCLA</span>
                <h3>ESTABILIDAD RADICAL</h3>
                <p>Ofrecemos un espacio seguro para detenerse, ordenar el ruido y volver al centro en un mundo acelerado.</p>
            </div>
            <div class="method-card">
                <span>M&Eacute;TODO / BR&Uacute;JULA</span>
                <h3>DIRECCI&Oacute;N CLARA</h3>
                <p>Convertimos la confusi&oacute;n en foco y la intenci&oacute;n en ejecuci&oacute;n. Un mapa dise&ntilde;ado para tu propio ecosistema.</p>
            </div>
            <div class="method-card">
                <span>VISI&Oacute;N / FARO</span>
                <h3>PERSPECTIVA TOTAL</h3>
                <p>Iluminamos el entorno para revelar posibilidades donde otros solo ven niebla y resistencia.</p>
            </div>
        </div>
    </section>

    <section class="reveal" style="padding: 120px 40px; text-align: center; border-top: 1px solid rgba(255,255,255,0.05); background: #030303;">
        <h2 style="font-size: clamp(34px, 6vw, 84px); font-weight: 900; letter-spacing: -0.03em;">EMPIEZA EL ASCENSO.</h2>
        <a href="<?php echo home_url('/#newsletter'); ?>" class="btn-primary" style="margin-top: 50px; font-size: 14px;">UNIRSE A LA BIT&Aacute;CORA &rarr;</a>
    </section>
</main>

<?php get_footer(); ?>
