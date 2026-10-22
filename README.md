# Christian Motion Bento — WordPress Theme

Dieses Theme ist ein responsives, mehrseitiges Portfolio für Christian Steitz. Die Hybrid Edition verbindet die markanten Überschriften der Bento-Version mit der ruhigen Sans-Serif-Typografie der früheren Portfolio-Version, flüssigem Lenis-Scrolling, GSAP-Scroll-Animationen, der grosszügigen V3-Über-mich-Section und einem lückenlosen Projektraster. Jedes veröffentlichte Projekt erhält automatisch eine eigene Case-Study-Seite.

## 1. Theme installieren

1. Im WordPress-Backend **Design → Themes → Theme hinzufügen → Theme hochladen** öffnen.
2. Die ZIP-Datei **christian-motion-experience.zip** auswählen.
3. Theme installieren und aktivieren.
4. Einmal **Einstellungen → Permalinks → Änderungen speichern** anklicken.
5. Unter **Einstellungen → Allgemein** den Website-Titel und die richtige Administrator-E-Mail eintragen.

## 2. Hero-Video, Name und Texte ändern

Öffne **Design → Customizer → Portfolio-Startseite**. Dort kannst du ohne Code ändern:

- den grossen Namen im Hero
- die kleine Zeile über dem Intro
- den kurzen Introtext links
- den Text des Buttons
- Titel, Text und Schlagwörter der Über-mich-Section
- den Profiltext über **Design. Motion. Sound.**
- die Erklärungen für Design, Motion und Sound
- das Hero-Video
- das Standbild des Videos
- ein Portrait oder Arbeitsbild für die grosse Über-mich-Fotokarte

Das fertige Showreel ist bereits als Standardvideo eingebaut. Du kannst es im Customizer jederzeit durch ein eigenes MP4 ersetzen oder später wieder auf die mitgelieferte Datei zurückwechseln. Das Video wird stumm, automatisch und als Loop abgespielt. Das Standbild verhindert eine leere Fläche während des Ladens. Über den sichtbaren Button kann das Video pausiert werden.

Das mitgelieferte CSLogo ist fest im Header und klein im Footer eingebaut. Es liegt unter **assets/images/cs-logo-cropped.png**. Auf dunklem Hintergrund wird es automatisch hell dargestellt.

## 3. Design, Motion und Sound

Die Design-Karte ist immer sichtbar, damit der Bereich nie leer wirkt. Beim Darüberfahren, Fokussieren oder Antippen wechselt sie zu Motion oder Sound. Die Interaktion funktioniert mit Maus, Tastatur und Touch. Die drei Texte kannst du unter **Design → Customizer → Portfolio-Startseite** bearbeiten.

## 4. Ein Projekt erstellen

1. Im Backend **Projekte → Projekt hinzufügen** öffnen.
2. Projekttitel eintragen.
3. Im Feld **Textauszug** einen kurzen Untertitel schreiben. Dieser erscheint bei Spotlight-Projekten.
4. Rechts ein **Beitragsbild** setzen. Dieses Bild wird auf der Startseite und oben auf der Projektseite verwendet.
5. Unter **Disziplinen** zum Beispiel Film, Design, Motion oder Sound auswählen.
6. Den vollständigen Projektinhalt im Blockeditor aufbauen.
7. Auf **Veröffentlichen** klicken.

Im Blockeditor kannst du beliebig verwenden:

- Text und Überschriften
- einzelne Bilder
- Bildergalerien
- Projektlogos als Bildblock
- Videos aus der Mediathek
- YouTube- oder Vimeo-Links als Einbettung
- Spalten und Vollbreitenbilder

Alle Projektkarten verlinken automatisch auf die passende Unterseite. Dafür muss kein Link von Hand erstellt werden.

Im Projektarchiv haben alle Karten dieselbe Höhe, aber unterschiedliche Breiten. Die Zeilen schliessen ohne Zwischenräume ab; auf kleinen Displays werden die Bilder gross und einspaltig dargestellt. Der Titel erscheint am Desktop beim Hover und bleibt auf Touch-Geräten lesbar.

## 5. Spotlight-Projekte auswählen

Beim Bearbeiten eines Projekts findest du rechts die Box **Startseite**. Aktiviere dort:

**Als Spotlight-Projekt hervorheben**

Bis zu zwei markierte Projekte erscheinen gross direkt unter dem Hero. Falls noch nichts markiert wurde, nimmt das Theme automatisch die zwei neusten Projekte. Die normalen Projektkarten darunter zeigen weiterhin alle veröffentlichten Projekte.

## 6. Projektbilder

Empfohlene Mindestgrössen:

- Spotlight- und Beitragsbild: 1800 × 1125 Pixel
- normales Grid-Bild: mindestens 1200 × 900 Pixel
- Projektseite/Vollbreite: ungefähr 2000 Pixel breit

WordPress erstellt aus einem hochgeladenen Bild automatisch die benötigten kleineren Varianten.

## 7. YouTube-Video auf einer Projektseite

1. Projekt bearbeiten.
2. Im Blockeditor auf **+** klicken.
3. Nach **YouTube** suchen.
4. Den Link zum Video einsetzen.
5. Auf **Einbetten** und danach **Aktualisieren** klicken.

Der Player wird automatisch responsiv dargestellt.

## 8. Navigation und Footer

Unter **Design → Menüs** kann ein eigenes Menü erstellt und dem Platz **Hauptnavigation** zugewiesen werden. Ohne eigenes Menü verwendet das Theme automatisch die Links Spotlight, Über mich und Projekte.

Die E-Mail-Adresse im Footer kommt aus **Einstellungen → Allgemein → Administrator-E-Mail-Adresse**.

## 9. In VS Code ansehen

- **index.html** ist die statische Vorschau der Startseite.
- **project-demo.html** zeigt eine statische Beispiel-Projektseite.
- **front-page.php** ist die echte WordPress-Startseite.
- **single-project.php** erzeugt die dynamischen Projekt-Unterseiten.

Die HTML-Dateien funktionieren ohne WordPress und können mit Live Server geöffnet werden. Änderungen an diesen Vorschauen verändern die WordPress-Seite nicht automatisch.

## 10. Wichtigste Dateien

- **style.css** — komplette Gestaltung und Responsive Design
- **assets/js/main.js** — Burger-Menü, GSAP-/Lenis-Scroll-Effekte und Videosteuerung
- **assets/css/tailwind-source.css** — Tailwind-Quelle und gescannte Theme-Dateien
- **assets/css/tailwind.css** — lokal kompiliertes Tailwind-CSS ohne CDN
- **functions.php** — Theme-Einrichtung, Projekte und Spotlight-Auswahl
- **inc/customizer.php** — Hero-Video und bearbeitbare Startseitentexte
- **front-page.php** — Startseite
- **template-parts/project-spotlight.php** — grosse Spotlight-Karte
- **template-parts/project-card.php** — normale Projektkarte
- **single-project.php** — Projekt-Unterseite
- **archive-project.php** — Projektarchiv

## 11. Für die Semesterabgabe

Das Theme zeigt nachvollziehbar den Einsatz von:

- HTML für die Seitenstruktur
- CSS für Layout, Grid, Hover-Effekte und Responsive Design
- JavaScript für Burger-Menü, Animationen und Videosteuerung
- PHP für dynamische Inhalte aus dem WordPress-Backend
- WordPress Custom Post Types für Projekte
- WordPress Customizer und Mediathek
- Gutenberg-Blöcken für die Projektseiten
- Tailwind CSS 4 als lokaler, kompilierter Utility-Layer
- GSAP mit ScrollTrigger und Lenis für das Scroll-Erlebnis

## 12. Tailwind CSS weiterentwickeln

Das fertige CSS ist bereits in der ZIP enthalten; für WordPress musst du nichts installieren. Wenn du später Tailwind-Klassen im Code ergänzt, führe im Theme-Ordner einmal `npm install` und danach `npm run build:css` aus. Der Build nutzt bewusst kein Tailwind-Preflight, damit das klassische WordPress-Styling stabil bleibt.

## Typografie

Fliesstext, Navigation und Footer verwenden wieder den System-Stack **Helvetica Neue / Helvetica / Arial** aus der früheren Portfolio-Version. Für Überschriften bleiben die Display-Stacks **The Seasons**, **Benedict** und **Advetime** vorbereitet. Da die Originaldateien dieser drei Schriften nicht mitgeliefert werden dürfen beziehungsweise lokal nicht vorhanden waren, verwendet das Theme Gloock und System-Schreibschriften als visuell passende Fallbacks. Sobald lizenzierte Webfont-Dateien vorhanden sind, können sie über `@font-face` ergänzt werden, ohne das Layout neu zu bauen.

GSAP, ScrollTrigger und Lenis liegen lokal unter **assets/vendor/**. Die Website benötigt dafür kein CDN und funktioniert nach dem WordPress-Upload direkt.

## Merksatz

**HTML baut die Struktur. CSS gestaltet sie. JavaScript steuert die Interaktionen. PHP lädt deine Inhalte aus WordPress.**

## Lizenz

GNU General Public License v2 oder neuer. Siehe **LICENSE.txt**.
