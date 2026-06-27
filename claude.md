# Memoria de Proyecto: Diario de Abordo Web (WordPress Theme)

## Registro de Sesiones

### [2026-06-18] Inicialización y Auditoría del Tema
**Tareas Realizadas:** 
- Inicialización del archivo de memoria `claude.md`.
- Auditoría del estado actual del repositorio. Revisión de las últimas subidas: actualización del texto "Hero" para alinearlo al manifiesto de crecimiento personal y correcciones en la plantilla del mapa del sitio (sitemap auto-match).
- Sincronización del estado de publicación entre el repositorio local de Markdown (`diariodeabordo`) y el despliegue del tema de WordPress (`diario de abordoeweb`).

**Arquitectura / Estado Técnico:**
- El repositorio es un Tema de WordPress a medida, sin depender fuertemente de constructores externos genéricos.
- Jerarquía de plantillas clara con `front-page.php`, `page-about.php`, `page-leadership.php`, `page-sistemas.php` y `page-growth.php` que segmentan los pilares temáticos del proyecto.
- Se utiliza `theme.json` integrándose en los estándares modernos de WordPress.

**Decisiones de Diseño / SEO:**
- Mantener enrutamientos SEO limpios y reglas de reescritura para sitemaps.
- El proyecto requiere que cualquier nueva entrada (como las newsletters) pase por la capa de inyección SEO (`publish-entry`) antes de ser volcada aquí a través del plugin o script de sincronización.

### [2026-06-18] Optimización Avanzada SEO y GEO (Fase 2)
**Tareas Realizadas:**
- Integración nativa de metadatos SEO. Modificamos `header.php` para usar `meta_description` de los campos personalizados y evitar depender de plugins externos.
- Inyección GEO (Generative Engine Optimization): Añadimos el Schema JSON-LD dinámico (`WebSite` para portada, `Article` para posts) en el `<head>` para que IAs como ChatGPT y Gemini lean la estructura correctamente.
- Modificamos `functions.php` con el filtro `document_title_parts` para usar el título SEO optimizado directamente en la pestaña del navegador.
- Actualizamos entradas antiguas (Semanas 4, 5 y 6) vía API REST para corregir títulos no optimizados e inyectar carátulas faltantes ("Lean para Ejecutivos") generadas por IA.
- Configuramos el automatizador local (`publish.ts` en el repositorio origen) para publicar siempre en estado `publish` en vez de `draft`.

### [2026-06-26] Limpieza de Diseño y Sincronización de Contenidos
**Tareas Realizadas:**
- Solución de problemas de visualización en las entradas (`single.php`) donde el texto era ilegible por un fallo en las variables de color CSS. Se actualizaron para usar las correctas (`--bg` y `--accent`).
- Se introdujo un escudo protector en `functions.php`: el filtro `antigravity_clean_injected_styles` en `the_content` para eliminar cualquier inyección de la etiqueta `<style>` que provenga del script local, protegiendo así el diseño del tema contra bloqueos futuros o estilos blancos en modo oscuro.
- Refactorización de la integración con el generador local de contenido, habilitando parseo robusto de Markdown y el auto-append de los Activos Tácticos de cada semana directamente en los posts de WordPress.
