<?php
/**
 * Template Name: Leadership // Manifiesto
 */
get_header(); ?>

<main class="page-content reveal">
    <header class="article-hero" style="position: relative; overflow: hidden; min-height: 100vh; display: flex; align-items: center; padding: 60px 0;">
        <div class="hero-bg" style="position:absolute; top:0; left:0; right:0; bottom:0; z-index:-1; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.8)), url('<?php echo get_template_directory_uri(); ?>/leadership.png'); background-size: cover; background-position: center;"></div>
        
        <div class="container hero-content" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 8vw; align-items: center; max-width: 1400px; margin: 0 auto; padding: 0 40px; width: 100%;">
            <div class="hero-left">
                <span class="technical-label" style="color:var(--accent); letter-spacing: 0.3em; font-family:var(--font-mono); font-size: 13px; display:block; margin-bottom: 20px;">SEMANA 01 // OWNERSHIP RADICAL</span>
                <h1 style="font-size: clamp(38px, 6vw, 60px); line-height: 0.85; margin-bottom: 30px;">TU EQUIPO NO ES MEDIOCRE.<br>T&Uacute; LO ERES.</h1>
                
                <div class="body-text" style="font-size: 1.1rem; line-height: 1.8; color: rgba(255,255,255,0.85); max-width: 800px;">
                    <p style="margin-bottom: 30px;">Si algo falla, es tu culpa. Si algo sale bien, es gracias a ellos. <strong style="color:var(--fg);">El liderazgo t&aacute;ctico requiere la eliminaci&oacute;n total de las excusas de tu vocabulario.</strong></p>
                    <p style="margin-bottom: 40px; border-left: 2px solid var(--accent); padding-left: 30px; font-style: italic; color: #fff;">"No busques culpables. Busca soluciones. Si eres el l&iacute;der, la responsabilidad es tuya o no es de nadie."</p>

                    <h2 style="font-family: var(--font-mono); font-size: 0.9rem; letter-spacing: 0.2em; color: var(--accent); margin-top: 60px; margin-bottom: 20px;">CADENA DE MANDO</h2>
                    <span class="premium-tag" style="background: var(--accent); color: #000; padding: 4px 12px; font-size: 10px; font-weight: 700; border-radius: 2px; text-transform: uppercase; letter-spacing: 0.1em;">PREMIUM CONTENT</span>
                    
                    <ul style="list-style: none; padding: 0; margin-top: 40px;">
                        <li style="margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <strong style="color: var(--accent); display: block; margin-bottom: 5px;">01 TRANSPARENCIA RADICAL</strong>
                            Identificaci&oacute;n de Fallo: Deja de buscar culpables. El fallo est&aacute; en tu comunicaci&oacute;n.
                        </li>
                        <li style="margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <strong style="color: var(--accent); display: block; margin-bottom: 5px;">02 ACCI&Oacute;N CORRECTIVA</strong>
                            Asume el error delante de tu equipo y asume el coste inmediatamente.
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="hero-right">
                <div class="image-frame" style="border: 1px solid rgba(255,255,255,0.1); padding: 10px; background: #080808;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; filter: grayscale(0.2) contrast(1.1); display: block;']); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/leadership.png" alt="Leadership Portada" style="width: 100%; height: auto; filter: grayscale(0.2) contrast(1.1); display: block;">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <div class="content-body" style="max-width: 850px; margin: 0 auto; padding: 120px 40px;">
        <div class="editorial-lead reveal" style="font-size: clamp(24px, 3.5vw, 42px); line-height: 1.3; color: #fff; font-weight: 300; margin-bottom: 150px; letter-spacing: -0.02em;">
            La mayor&iacute;a de los directivos culpan al mercado por sus fracasos y a su talento por sus &eacute;xitos. <strong style="color: var(--accent); font-weight: 700;">Mentira absoluta.</strong>
            <br><br>
            Si el mercado cae, tu sistema de defensa deber&iacute;a haberlo previsto. Si tu equipo falla, t&uacute; los entrenaste o t&uacute; los elegiste. Toma el mando o entrega el tim&oacute;n.
        </div>

        <div class="quote-block reveal" style="border-left: 2px solid var(--accent); padding: 40px 60px; margin: 100px 0; background: rgba(255,255,255,0.03);">
            <p style="font-size: 24px; font-style: italic; color: #aaa; margin: 0; line-height: 1.5;">"La disciplina es el algoritmo que convierte el caos en resultados. No esperes a que tu equipo sea excelente; construye un entorno donde sea imposible ser mediocre."</p>
        </div>

        <div class="deep-premium reveal" style="background: #080808; border: 1px solid var(--line); padding: 100px 80px; position: relative; margin-top: 200px; box-shadow: 0 100px 150px rgba(0,0,0,0.9);">
            <div style="position: absolute; top: -14px; left: 80px; background: var(--accent); color: #000; font-family: var(--font-mono); font-size: 10px; font-weight: 700; padding: 4px 16px;">SISTEMA DE MANDO / TOP SECRET</div>
            <h2 style="font-size: 42px; font-weight: 700; color: #fff; margin-bottom: 0;">PROTOCOLO DE COMBATE: LUNES 08:00 AM</h2>
            <p style="color: #666; margin-top: 10px;">Instrucciones bal&iacute;sticas para purgar la inactividad operativa.</p>
            
            <div class="protocol-grid" style="display: flex; flex-direction: column; gap: 60px; margin-top: 80px;">
                <div class="protocol-item" style="display: grid; grid-template-columns: 100px 1fr; gap: 40px; border-bottom: 1px solid #111; padding-bottom: 60px;">
                    <div class="step-num" style="font-family: var(--font-mono); font-size: 24px; color: var(--accent); opacity: 0.5;">01</div>
                    <div>
                        <h3 style="font-size: 28px; font-weight: 700; color: #fff; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 0.05em;">Simplificar hasta que duela</h3>
                        <p style="font-size: 18px; line-height: 1.8; color: #888;">Si no puedes explicar tu orden en 3 l&iacute;neas, tu equipo fallar&aacute;. El ruido operativo es el cáncer de la ejecución. Poda la burocracia mental.</p>
                    </div>
                </div>
                <div class="protocol-item" style="display: grid; grid-template-columns: 100px 1fr; gap: 40px; border-bottom: 1px solid #111; padding-bottom: 60px;">
                    <div class="step-num" style="font-family: var(--font-mono); font-size: 24px; color: var(--accent); opacity: 0.5;">02</div>
                    <div>
                        <h3 style="font-size: 28px; font-weight: 700; color: #fff; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 0.05em;">Priorizar y Ejecutar</h3>
                        <p style="font-size: 18px; line-height: 1.8; color: #888;">Elige UN fuego. Si disparas a 10 objetivos, fallas los 10. La energía debe ser un láser, no una lámpara ambiental.</p>
                    </div>
                </div>
                <div class="protocol-item" style="display: grid; grid-template-columns: 100px 1fr; gap: 40px;">
                    <div class="step-num" style="font-family: var(--font-mono); font-size: 24px; color: var(--accent); opacity: 0.5;">03</div>
                    <div>
                        <h3 style="font-size: 28px; font-weight: 700; color: #fff; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 0.05em;">Responsabilidad 360&#176;</h3>
                        <p style="font-size: 18px; line-height: 1.8; color: #888;">No hay malos equipos, solo malos líderes. Cuando algo falla abajo, el fallo nació arriba. Identifica el error en el diseño, no en la pieza.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
