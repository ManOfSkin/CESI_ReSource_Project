# Projet Académique : Simulation d'un Site d'État

**Formation :** Bachelor Responsable en Ingénierie des Logiciels  
**Établissement :** CESI  
**Année :** 2021-2022  
**Type de projet :** Cube 1 (Conception et Réalisation)  

---

## Description du Projet

Ce projet s'inscrit dans le cadre de la formation "Responsable en Ingénierie des Logiciels" au CESI. Il consiste en la simulation et le développement d'un **site web d'État**, incluant l'analyse des besoins, la conception modélisée (UML / MCD) et le développement de l'application (basé sur Symfony, comme l'attestent les sources du projet).

---

## Structure du Projet & Documents d'Analyse

Le dépôt et les livrables du projet s'articulent autour des éléments suivants :

### 1. Analyse & Conception (Dossier `Cubes/Cube 1/Analyse & Conception/`)
* **Diagrammes de Cas d'Utilisation (Use Case) :** Modélisation des interactions entre les citoyens, les agents administratifs et le système.
* **Diagrammes de Séquence :** Représentation textuelle et visuelle des échanges chronologiques entre les objets du système.
* **Modèle Conceptuel de Données (MCD) :** Définition de la structure des données et du dictionnaire de données associé (`.xlsx`, `.lo1`, `.loo`).
* **Maquettage / Visio :** Fichiers de modélisation sous format Microsoft Visio (`.vsdx`).

### 2. Implémentation technique (Dossier `Projet_Cube_1/`)
* **Framework Backend :** Symfony (configuration `composer.json`, `services.yaml`, routes, entités Doctrine ORM).
* **Frontend & Assets :** Intégration via Webpack Encore, styles CSS/Sass, et templates Twig pour l'interface utilisateur.
* **Base de données & Migrations :** Gestion des entités (Utilisateurs, Ressources, Commentaires, Relations, etc.) et scripts de migration.
* **Conteneurisation :** Fichiers de configuration `docker-compose.yml` pour le déploiement et l'environnement de simulation.

### 3. Compte-Rendu & Soutenance (Dossier `Cubes/Cube 1/Compte-Rendu/`)
* **Cahier des Charges (CDCF) :** Document de spécifications fonctionnelles et techniques.
* **Présentation Orale :** Support de présentation (`.pptx`) et ressources multimédias associées.
