-- Insertion des statuts (Nécessaire pour l'inscription, comme vu précédemment)
INSERT INTO statut (id, libelle) VALUES (1, 'Actif') ON CONFLICT DO NOTHING;

-- Insertion des catégories
INSERT INTO categorie (id, libelle_categorie) VALUES
    (1, 'Communication'),
    (2, 'Cultures'),
    (3, 'Développement personnel'),
    (4, 'Intelligence émotionnelle'),
    (5, 'Loisirs'),
    (6, 'Monde professionnel'),
    (7, 'Parentalité'),
    (8, 'Qualité de vie'),
    (9, 'Recherche de sens'),
    (10, 'Santé physique'),
    (11, 'Santé psychique'),
    (12, 'Spiritualité'),
    (13, 'Vie affective')
ON CONFLICT DO NOTHING;

-- Insertion des types de relation
INSERT INTO type_relation (id_type_relation, libelle_type_relation) VALUES
    (1, 'Soi'),
    (2, 'Conjoints'),
    (3, 'Famille : enfants / parents / fratrie'),
    (4, 'Professionnelle : collègues, collaborateurs et managers'),
    (5, 'Amis et communautés'),
    (6, 'Inconnus')
ON CONFLICT DO NOTHING;

-- Insertion des types de ressource
INSERT INTO type_ressource (id_type_ressource,libelle_type_ressource) VALUES
    (1, 'Activité / Jeu à réaliser'),
    (2, 'Article'),
    (3, 'Carte défi'),
    (4, 'Cours au format PDF'),
    (5, 'Exercice / Atelier'),
    (6, 'Fiche de lecture'),
    (7, 'Jeu en ligne'),
    (8, 'Vidéo')
ON CONFLICT DO NOTHING;