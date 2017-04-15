# Introduction

This repository contains the source code of the "Forteroche" project as asked in the [CDPM Dev path in OpenClassrooms](https://openclassrooms.com/projects/creez-un-blog-pour-un-ecrivain-1).

## Suivi

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6c7fb848-5d85-409c-8385-133d2d693cb9/big.png)](https://insight.sensiolabs.com/projects/6c7fb848-5d85-409c-8385-133d2d693cb9)

## Brief

Vous venez de décrocher un contrat avec Jean Forteroche, acteur et écrivain. Il travaille actuellement sur son prochain roman, "Billet simple pour l'Alaska". Il souhaite innover et le publier par épisode en ligne sur son propre site.

Seul problème : Jean n'aime pas WordPress et souhaite avoir son propre outil de blog, offrant des fonctionnalités plus simples. Vous allez donc devoir développer un moteur de blog en PHP et MySQL.

Le livre de Jean Forteroche reste à écrire... mais il sera publié en ligne !

Vous développerez une application de blog simple en PHP et avec une base de données MySQL. Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture). On doit y retrouver tous les éléments d'un CRUD :

- Create : création de billets
- Read : lecture de billets
- Update : mise à jour de billets
- Delete : suppression de billets

Chaque billet doit permettre l'ajout de commentaires, qui pourront être modérés dans l'interface d'administration au besoin.
Un commentaire peut être une réponse à un autre commentaire : dans ce cas, il est légèrement décalé vers la droite pour montrer l'arborescence des commentaires. Il ne peut pas y avoir plus de 3 sous-niveaux de commentaires.
Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour être modérés.

L'interface d'administration sera protégée par mot de passe. La rédaction de billets se fera dans une interface WYSIWYG basée sur TinyMCE, pour que Jean n'ait pas besoin de rédiger son histoire en HTML (on comprend qu'il n'ait pas très envie !).

Le code sera construit sur une architecture MVC. Vous développerez autant que possible en orienté objet. Au minimum, le modèle doit être construit sous forme d'objet.

Si vous souhaitez héberger le projet en ligne, notre partenaire 1&1 offre 2 mois d'hébergement gratuits aux étudiants pour toute souscription à un pack d'hébergement (plus d'infos).
Ressources complémentaires

En plus des cours du parcours, vous pouvez consulter les ressources suivantes pour vous aider :

- [eBook] [UML 2 par la pratique - Études de cas et exercices corrigés](https://openclassrooms.com/ebooks/uml-2-par-la-pratique-etudes-de-cas-et-exercices-corriges)
- [OpenClassrooms] [Chapitre "Fonctions d'aggrégation" du cours MySQL](https://openclassrooms.com/courses/administrez-vos-bases-de-donnees-avec-mysql/fonctions-d-agregation)

###Fichiers à fournir

- Code HTML, CSS, PHP et JavaScript
- Export de la base de données MySQL

###Soutenance
Pour cette soutenance, vous vous positionnerez comme un développeur présentant pendant 25 minutes son travail à son collègue plus senior dans l’agence web afin de vérifier que le projet peut être présenté tel quel à Jean Forteroche. Cette étape sera suivie de 5 minutes de questions/réponses.