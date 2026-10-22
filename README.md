# Christian Steitz - WordPress Portfolio Theme

Für meine Semesterarbeit habe ich ein eigenes WordPress-Theme für mein Portfolio umgesetzt. Mir war wichtig, dass es nicht einfach nur eine statische Website wird. Die Projekte sollen direkt im WordPress-Backend erfasst und später auch ohne Änderungen am Code bearbeitet werden können.

Die Website ist mehrseitig aufgebaut. Auf der Startseite gibt es ein Hero-Video, zwei hervorgehobene Projekte, eine Über-mich-Section, meine Arbeitsbereiche Design, Motion und Sound sowie ein Grid mit allen Projekten. Wenn man auf ein Projekt klickt, öffnet sich automatisch eine eigene Projektseite mit weiteren Bildern, Texten und Videos.

Die Website funktioniert auf Desktop, Tablet und Smartphone. Für das responsive Menü habe ich ein animiertes Burger-Menü umgesetzt.

## 1. Theme installieren

Das Theme kann wie ein normales WordPress-Theme installiert werden:

1. Im WordPress-Backend **Design → Themes → Theme hinzufügen → Theme hochladen** öffnen.
2. Die ZIP-Datei des Themes auswählen.
3. Das Theme installieren und aktivieren.
4. Danach einmal **Einstellungen → Permalinks → Änderungen speichern** anklicken.
5. Unter **Einstellungen → Allgemein** können der Website-Titel und die Administrator-E-Mail kontrolliert werden.

Durch das erneute Speichern der Permalinks stellt WordPress sicher, dass die Links zu den einzelnen Projektseiten richtig funktionieren.

## 2. Inhalte der Startseite bearbeiten

Viele Inhalte der Startseite können direkt im WordPress-Customizer geändert werden. Dafür öffnet man:

**Design → Customizer → Portfolio-Startseite**

Dort lassen sich folgende Inhalte anpassen:

- mein Name im Hero
- die kleine Zeile im Hero
- der kurze Beschreibungstext
- der Text des Buttons
- der Titel und Text der Über-mich-Section
- die Schlagwörter zu meinem Arbeitsprozess
- der Profiltext bei Design, Motion und Sound
- die einzelnen Texte für Design, Motion und Sound
- das Hero-Video
- das Standbild für das Hero-Video
- mein Portrait in der Über-mich-Section

Mein Showreel ist bereits als Standardvideo im Theme eingebaut. Es kann später im Customizer durch ein anderes MP4-Video ersetzt werden. Das Video läuft automatisch, ohne Ton und in einer Schleife. Über den Pause-Button kann es gestoppt werden.

Das Standbild wird angezeigt, solange das Video noch nicht vollständig geladen ist. So entsteht beim Laden keine leere Fläche.

## 3. Logo

Mein CSLogo ist oben im Header und nochmals kleiner im Footer eingebaut. Die verwendete Datei liegt hier:

**assets/images/cs-logo-cropped.png**

Wenn ich später eine andere Version verwenden möchte, kann diese Datei ausgetauscht werden. Der Dateiname sollte dabei gleich bleiben.

## 4. Design, Motion und Sound

In diesem Bereich zeige ich die drei Arbeitsbereiche, mit denen ich mich als Multimedia Producer beschäftige.

Die Design-Karte ist standardmässig geöffnet. Dadurch wirkt die Section auch dann nicht leer, wenn man noch nicht mit der Maus darübergefahren ist. Beim Anklicken oder Darüberfahren kann zwischen Design, Motion und Sound gewechselt werden.

Die Interaktion funktioniert nicht nur mit der Maus, sondern auch per Tastatur und auf Touch-Geräten. Die dazugehörigen Texte können ebenfalls im Customizer bearbeitet werden.

## 5. Ein Projekt erstellen

Neue Projekte werden direkt im WordPress-Backend erfasst:

1. **Projekte → Projekt hinzufügen** öffnen.
2. Einen Projekttitel eintragen.
3. Im Feld **Textauszug** eine kurze Beschreibung schreiben.
4. Rechts ein **Beitragsbild** festlegen.
5. Unter **Disziplinen** eine passende Kategorie wie Film, Design, Motion oder Sound auswählen.
6. Den vollständigen Inhalt mit dem WordPress-Blockeditor erstellen.
7. Das Projekt veröffentlichen.

Der Textauszug wird vor allem bei den grossen Spotlight-Projekten verwendet. Das Beitragsbild erscheint in der Projektübersicht und auf der jeweiligen Projektseite.

Im Blockeditor kann ich verschiedene Inhalte miteinander kombinieren:

- Texte und Überschriften
- einzelne Bilder
- Bildergalerien
- Logos
- Videos aus der WordPress-Mediathek
- YouTube- oder Vimeo-Videos
- Spalten
- breite Bilder und Vollbreitenbilder

Sobald ein Projekt veröffentlicht ist, erscheint es automatisch im Projektgrid. WordPress erstellt ebenfalls automatisch eine eigene Unterseite. Deshalb muss ich die Projektkarten nicht von Hand verlinken.

## 6. Spotlight-Projekte auswählen

Beim Bearbeiten eines Projekts gibt es auf der rechten Seite die Box **Startseite**. Dort kann folgende Option aktiviert werden:

**Als Spotlight-Projekt hervorheben**

Bis zu zwei ausgewählte Projekte werden direkt unter dem Hero besonders gross dargestellt.

Falls noch keine Projekte ausgewählt wurden, verwendet das Theme automatisch die zwei neusten Projekte. Im normalen Projektgrid bleiben trotzdem alle veröffentlichten Projekte sichtbar.

## 7. Projektgrid

Im Projektarchiv besitzen die Bilder eine einheitliche Höhe, können aber unterschiedliche Breiten haben. Dadurch entsteht ein abwechslungsreiches Grid, ohne dass zwischen den einzelnen Projektkarten grosse Leerräume entstehen.

Am Desktop erscheint der Projekttitel beim Hover über das Bild. Auf Smartphones und anderen Touch-Geräten bleibt der Titel auch ohne Hover erkennbar.

Jede Projektkarte führt auf die dazugehörige Projekt-Unterseite.

## 8. Empfohlene Bildgrössen

Damit die Bilder auch auf grossen Bildschirmen scharf dargestellt werden, verwende ich ungefähr folgende Grössen:

- Spotlight- und Beitragsbilder: 1800 × 1125 Pixel
- normale Bilder für das Grid: mindestens 1200 × 900 Pixel
- grosse Bilder auf Projektseiten: ungefähr 2000 Pixel breit

Die Bilder sollten vor dem Upload komprimiert werden. WordPress erstellt aus einem hochgeladenen Bild automatisch kleinere Varianten für unterschiedliche Bildschirmgrössen.

## 9. Videos auf einer Projektseite

Ein YouTube-Video kann direkt über den WordPress-Blockeditor eingefügt werden:

1. Das gewünschte Projekt bearbeiten.
2. Im Blockeditor auf **+** klicken.
3. Nach dem YouTube-Block suchen.
4. Den Link zum Video einfügen.
5. Das Video einbetten und das Projekt aktualisieren.

Das Theme stellt das eingebettete Video automatisch responsiv dar. Dadurch passt sich der Player an Desktop- und Smartphone-Bildschirme an.

Für längere Projektvideos verwende ich YouTube oder Vimeo. Dadurch müssen die grossen Videodateien nicht direkt über das WordPress-Hosting geladen werden.

## 10. Navigation und Footer

Unter **Design → Menüs** kann ein eigenes Menü erstellt und dem Bereich **Hauptnavigation** zugewiesen werden.

Falls noch kein eigenes Menü vorhanden ist, zeigt das Theme automatisch Links zu folgenden Bereichen:

- Spotlight
- Über mich
- Projekte

Im Footer gibt es zusätzlich Links zu Design, Motion und Sound sowie zu den wichtigsten Bereichen der Website.

Die Kontaktadresse ist momentan direkt im Theme als folgende Adresse hinterlegt:

**christian.steitz@outlook.com**

Sie befindet sich in **front-page.php** und **footer.php**.

## 11. Die Website in VS Code ansehen

Zusätzlich zum WordPress-Theme gibt es zwei statische HTML-Vorschauen:

- **index.html** zeigt eine Vorschau der Startseite.
- **project-demo.html** zeigt eine Beispiel-Projektseite.

Diese Dateien kann ich in VS Code mit Live Server öffnen, ohne dass WordPress installiert sein muss.

Die eigentliche WordPress-Startseite befindet sich aber in **front-page.php**. Die dynamischen Projektseiten werden durch **single-project.php** erstellt.

Änderungen an den HTML-Vorschauen verändern die WordPress-Website nicht automatisch. Dafür müssen die entsprechenden PHP-, CSS- oder JavaScript-Dateien angepasst werden.

## 12. Die wichtigsten Dateien

Das Theme besteht aus mehreren Dateien mit unterschiedlichen Aufgaben:

- **style.css** enthält das Design, das Grid und die responsive Darstellung.
- **assets/js/main.js** steuert das Burger-Menü, die Animationen und das Hero-Video.
- **assets/css/tailwind-source.css** enthält die Tailwind-Quelldatei.
- **assets/css/tailwind.css** ist das fertig kompilierte Tailwind-CSS.
- **functions.php** richtet das Theme und den eigenen Projekttyp ein.
- **inc/customizer.php** enthält die bearbeitbaren Einstellungen der Startseite.
- **front-page.php** baut die Startseite auf.
- **single-project.php** erstellt die einzelnen Projektseiten.
- **archive-project.php** erstellt das Projektarchiv.
- **template-parts/project-spotlight.php** enthält die grossen Spotlight-Projekte.
- **template-parts/project-card.php** enthält die normalen Projektkarten.
- **header.php** enthält den Header und die Navigation.
- **footer.php** enthält den Footer.

## 13. Verwendete Technologien

Für das Theme habe ich verschiedene Webtechnologien miteinander verbunden:

- HTML für den Aufbau und die Struktur
- CSS für das Design, das Grid und die responsive Darstellung
- JavaScript für das Burger-Menü, Animationen und die Videosteuerung
- PHP für die Verbindung mit WordPress und für dynamische Inhalte
- WordPress Custom Post Types für meine Projekte
- WordPress Customizer für anpassbare Inhalte
- Gutenberg-Blöcke für die Projektseiten
- Tailwind CSS 4 als zusätzlicher Utility-Layer
- GSAP und ScrollTrigger für die Animationen
- Lenis für das flüssige Scrollverhalten

PHP sorgt dabei dafür, dass meine Projekte automatisch aus dem WordPress-Backend geladen werden. Die Projekte müssen dadurch nicht fest in jede HTML-Datei geschrieben werden.

## 14. Tailwind CSS

Das fertig kompilierte Tailwind-CSS ist bereits im Theme enthalten. Für die Installation in WordPress muss deshalb nichts zusätzlich installiert werden.

Wenn später neue Tailwind-Klassen im Code ergänzt werden, können im Theme-Ordner folgende Befehle ausgeführt werden:

`npm install`

und danach:

`npm run build:css`

Dadurch wird die fertige CSS-Datei neu erstellt. Der Tailwind-Preflight ist nicht aktiv, damit er nicht mit dem restlichen WordPress-Styling in Konflikt kommt.

## 15. Typografie

Für die längeren Texte, die Navigation und den Footer verwende ich einen ruhigen Sans-Serif-Font. Dadurch bleiben auch längere Texte gut lesbar.

Für die grossen Überschriften verwende ich auffälligere Display-Schriften. Im Design waren dafür unter anderem The Seasons, Benedict und Advetime vorgesehen.

Da die originalen Webfont-Dateien dieser Schriften nicht vorhanden waren beziehungsweise nicht einfach mitgeliefert werden dürfen, verwendet das Theme Gloock und passende Systemschriften als Fallback. Wenn später lizenzierte Webfont-Dateien vorhanden sind, können sie über `@font-face` eingebunden werden.

Die aktuell verwendeten Webfonts sind lokal im Theme gespeichert. Auch GSAP, ScrollTrigger und Lenis liegen unter **assets/vendor/**. Die Website benötigt deshalb für diese Dateien kein externes CDN.

## 16. Responsive Design

Das Theme wurde für unterschiedliche Bildschirmgrössen aufgebaut. Die wichtigsten Anpassungen sind:

- animiertes Burger-Menü auf kleinen Bildschirmen
- einspaltige Projektkarten auf Smartphones
- angepasste Schriftgrössen
- responsive Bilder und Videos
- neu angeordnete Karten in der Über-mich-Section
- bedienbare Design-, Motion- und Sound-Karten auf Touch-Geräten
- eine responsive Introanimation

Dadurch bleibt der Aufbau der Website auch auf kleineren Geräten verständlich und bedienbar.

## 17. Was ich mit dem Theme zeigen möchte

Mit meinem Theme möchte ich zeigen, wie HTML, CSS, JavaScript, PHP und WordPress zusammenarbeiten.

HTML baut die Grundstruktur auf. CSS ist für die Gestaltung verantwortlich. JavaScript steuert die Interaktionen und Animationen. PHP lädt meine Inhalte aus dem WordPress-Backend und setzt sie automatisch in das Design ein.

Dadurch habe ich nicht nur eine statische Portfolioseite, sondern ein eigenes WordPress-Theme, das ich später weiterverwenden und mit neuen Projekten ergänzen kann.