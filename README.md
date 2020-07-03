# TIS - The Teacher's information System
![image](https://www.juplay.me/LISPreview3.png)  
## Projektbeschreibung
Das Projekt "TIS" wurde geschrieben, um die Verwaltung des Kollegiums in Folgenden Punkten Technisch zu Vereinfachen:  
&#35;1: &Uuml;bersicht über Vorhandene **Lehrer** sowie Erstellung neuer Lehrereinträge  
&#35;2: &Uuml;bersicht, Erstellung und Einteilung von **Aufgaben**  
&#35;3: &Uuml;bersicht und Erstellung Von **Klassen** sowie Aufteilung Von **(Stellvertretenden) Klassenlehrern**  
&#35;4: &Uuml;bersicht, Erstellung und Einteilung von **Fakultas**  
&#35;5: &Uuml;bersicht, Erstellung und Einteilung von **Zertifikatskursen**   
## Benutzte 3rd-Party-Tools
&bull; **[Admin-LTE](https://github.com/ColorlibHQ/AdminLTE)** - Responsive Admin Template  
&bull; **[FontAwesome](https://fontawesome.com/)** - Iconset mit &gt; 1500 Icons  
&bull; **[Bootstrap-Datetimepicker](https://github.com/eonasdan/bootstrap-datetimepicker/)** - Datum Auswählbar machen und automatisch für MySQL Formatieren
## Voraussetzungen
Um das Projekt im geplanten, vollen Umfang verwenden zu können, muss der Server über Eine Domain mit SSL-Verschlüsselung (HTTPS) erreichbar sein.  
Ein Demoprojekt wird auf der Domain [Juplay.me](https://juplay.me) erreichbar sein.  
Zugangsdaten zum Testbenutzer werden auf Anfrage per [E-Mail](mailto://contact@juplay.me) Versandt.
## Dateistruktur
```
/ 				    <------------- Server Root  
├──Auth.php			    <------------- Login Bestätigen, Authentifizierung Durchfüren    
├──Index.php 			    <------------- Landing Page  
├──Login.php		    	    <------------- Login Seite
├──Logout.php		    	    <------------- Logout  
├──manifest.json	    	    <------------- Manifest, wird für PWA funktionalität benötigt  
├──LICENSE		    	    <------------- GNU GPLv3 Lizenz
├──README.MD		    	    <------------- This File
├──SW.js		    	    <------------- Service Worker, Wird für PWA funktionalität benötigt
├──View/
│   ├──AufgabenAnzeigen.php         <------------- Zeigt Lehreraufgaben an  
│   ├──DGAnzeigen.php               <------------- Zeigt Dienstgrade an
│   ├──FakultasAnzeigen.php         <------------- Zeigt Fakultas an
│   ├──KlassenAnzeigen.php          <------------- Zeigt Klassen an
│   ├──KLEditAct.php                <------------- Aktionsdatei, Bearbeitet Klassenlehrer Status
│   ├──KollegiumAnzeigen.php        <------------- Zeigt alle Lehrer an
│   ├──LehrerAnzeigen.php           <------------- Zeigt alle informationen zu einem Lehrer an (Allgemeine Informationen, Klassenlehrer, Fakultas, ZKs, Aufgaben)
│   ├──LehrerBearbeitenAction.php   <------------- Aktionsdatei, Bearbeitet Lehrerinformationen
│   ├──LehrerHinzufuegen.php        <------------- Aktionsdatei, Fügt neuen Lehrer in Datenbank ein
│   ├──LehrerLoeschen.php           <------------- Aktionsdatei, Löscht Lehrer aus Datenbank
│   └──ZKAnzeigen.php               <------------- Zeigt Zertifikatskurse an
├──Webfonts/                        <------------- Enthält Fontawesome Icons
├──img/
│   ├──icon/
│   │   └──...                      <------------- Favicons für verschiedene geräte, benötigt vom Manifest und head.php
│   ├──account-icon.png             <------------- Bild welches, wenn Nutzer eingeloggt ist, angezeigt wird
│   ├──bkr_lis.ico                  <------------- Haupticon der Seite
│   └──login-bg.jpg                 <------------- Hintergrundbild der Loginseite
├──includes/
│   ├──conn.php                     <------------- MySql-verbindung 1
│   ├──Connect.php                  <------------- MySql-verbindung 2
│   ├──Footer.php                   <------------- Fester Footer
│   ├──head.php                     <------------- Includes und Metadaten
│   ├──navbar.php                   <------------- Navigationsleiste
│   └──Sidebar.php                  <------------- Sidebarnavigation
```
