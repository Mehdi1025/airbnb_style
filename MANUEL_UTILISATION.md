# Manuel d’utilisation — Casa Del Concierge

*Document destiné aux utilisateurs finaux de la plateforme (administrateurs, propriétaires et voyageurs).*

---

## Introduction

**Casa Del Concierge** est une plateforme web de **location d’hébergements** avec services associés (conciergerie, options à la réservation, paiement en ligne). Elle met en relation :

| Rôle sur la plateforme | Qui c’est ? | Accès principal |
|------------------------|-------------|-----------------|
| **Administrateur** | Gestionnaire du site | Tableau de bord admin, validation des candidatures propriétaires |
| **Propriétaire** *(rôle technique « locataire »)* | Hôte qui publie des biens | Espace « locataire » : biens, réservations reçues, statistiques |
| **Voyageur** *(compte « utilisateur »)* | Client qui réserve | Catalogue, réservations, paiement Stripe |

La **page d’accueil** présente l’offre ; le **catalogue** (`Nos biens`) permet de parcourir et filtrer les logements ; une **demande pour devenir propriétaire** peut être déposée via le formulaire dédié, puis traitée par l’administrateur.

> **Astuce** — Les URL exactes dépendent de votre nom de domaine (ex. production sur Cloudways). Remplacez `https://votre-domaine.fr` par l’adresse fournie par votre hébergeur.

---

## Guide Administrateur

### Connexion à l’espace d’administration

1. Ouvrez la page **`/admin/login`** (ex. `https://votre-domaine.fr/admin/login`).
2. Saisissez l’**adresse e-mail** et le **mot de passe** du compte administrateur.
3. Après connexion, vous accédez au **`/admin/dashboard`**.

> **Astuce** — Le compte administrateur est distinct des comptes voyageurs et propriétaires. Utilisez toujours cette URL pour l’administration, et non la connexion classique du site public.

---

### Gestion des utilisateurs (vue d’ensemble)

L’interface d’administration permet de **consulter** l’activité globale : nombre d’utilisateurs, de propriétaires, de réservations, répartition des biens, etc. Les **listes** (utilisateurs récents, biens, réservations) servent au **pilotage** et au **support** (identifier un compte, une réservation, un bien).

Dans la version actuelle de l’application, la **création manuelle d’un compte** côté admin n’est pas un formulaire séparé : les **nouveaux propriétaires** sont créés lorsque vous **acceptez une demande de location** (voir ci‑dessous). Les **voyageurs** se créent eux‑mêmes via **Inscription** sur le site public.

> **Astuce** — Pour toute modification de rôle ou de compte hors de ces flux, prévoyez une procédure interne (contact technique ou base de données), selon votre organisation.

---

### Validation et modération des demandes « devenir propriétaire »

Les personnes souhaitant proposer des biens remplissent le formulaire **Demande de location** (informations personnelles, description des biens, e-mail, mot de passe choisi).

1. Dans le **tableau de bord administrateur**, repérez la section des **demandes en attente**.
2. Pour chaque dossier :
   - **Accepter** : un **compte propriétaire** est créé avec les informations fournies ; le candidat pourra se connecter à l’espace propriétaire avec l’e-mail et le mot de passe qu’il a définis lors de la demande.
   - **Refuser** : la demande est supprimée ; aucun compte n’est créé.

> **Astuce** — Vérifiez la cohérence des informations avant acceptation (identité, faisabilité des biens décrits), conformément à votre politique interne.

---

### Biens immobiliers : qui publie quoi ?

**L’administrateur ne crée pas les fiches de logements** dans l’interface actuelle. Les **annonces** (description, prix, photos, options) sont **ajoutées et modifiées par les propriétaires** connectés à leur espace (`/locataire/...` et gestion des biens).

L’administrateur a une **vision transverse** (statistiques, listes de biens, réservations) pour **suivre** l’activité et aider au **support client**.

> **Astuce** — Si votre processus métier exige une relecture des annonces avant mise en ligne, prévoyez une étape hors outil (validation par e-mail ou procédure interne) jusqu’à l’éventuelle évolution de la plateforme.

---

### Suivi des réservations et des paiements (Stripe)

Le tableau de bord admin présente des **indicateurs** sur les réservations (états : en attente, confirmée, annulée) et les **paiements** (dont le suivi via l’intégration **Stripe**).

- Les **réservations confirmées** et les **montants** associés alimentent les **statistiques de revenus** affichées.
- Le **détail du paiement** par carte passe par **Stripe Checkout** côté voyageur ; le statut de paiement est mis à jour dans le système (y compris via les notifications Stripe).

> **Astuce** — Pour les litiges, remboursements ou exports comptables, utilisez aussi le **tableau de bord Stripe** (compte marchand) en complément de la plateforme.

---

## Guide du voyageur (recherche, réservation, paiement)

*Ce guide correspond à ce que vous pourriez appeler « client » ou « locataire » au sens courant — compte **utilisateur** sur le site.*

### Inscription et connexion

1. **Inscription** : page **`/register`** — prénom, nom, e-mail, mot de passe.
2. **Connexion** : page **`/login`**.
3. **Déconnexion** : action prévue dans l’interface une fois connecté.

---

### Recherche et sélection d’un bien

1. Ouvrez **`/nos-biens`** (catalogue).
2. Utilisez les **filtres** (recherche textuelle, type de logement, fourchettes de prix ou de surface, tri) pour affiner la liste.
3. Cliquez sur une **fiche bien** (`/nos-biens/{identifiant}`) pour voir la description, les photos, le prix, les options proposées par le propriétaire.

---

### Processus de réservation

1. **Connectez-vous** (obligatoire pour réserver).
2. Sur la fiche d’un bien, accédez au **formulaire de réservation** (dates de début et fin, éventuelles notes, options choisies).
3. Le système **vérifie la disponibilité** sur la période et les règles (par exemple durée maximale de séjour).
4. Une **réservation** est créée avec un statut adapté (souvent en attente de paiement tant que le paiement n’est pas finalisé).

> **Astuce** — Si une réservation est déjà en attente de paiement pour le même bien, la plateforme peut vous demander de finaliser ou d’annuler celle-ci avant d’en créer une nouvelle.

---

### Gestion du profil et historique des locations

- **Mes réservations** : page **`/mes-reservations`** — liste de vos séjours, avec possibilité de **modifier** ou **annuler** selon les règles prévues à l’écran.
- Le **profil** au sens « nom / e-mail » est géré dans la mesure où l’inscription et le compte le permettent ; pour toute modification sensible, suivez les écrans disponibles ou contactez le support.

---

### Paiement en ligne (Stripe)

1. Après création d’une réservation éligible, accédez à l’**étape de paiement** (page de paiement Stripe).
2. Vous êtes **redirigé vers Stripe Checkout** (carte bancaire, interface sécurisée).
3. En cas de **succès**, vous revenez sur le site avec une **confirmation** ; en cas d’**abandon**, la réservation peut rester en attente selon les règles affichées.

> **Astuce** — Conservez les e-mails de confirmation ou captures d’écran Stripe si vous avez besoin de justifier un paiement.

---

## Guide du propriétaire (hôte)

*Compte avec le rôle **propriétaire** — dans l’interface, l’URL contient souvent **`/locataire/`** (terminologie technique du projet).*

### Connexion

- Page **`/locataire/login`** — identifiants reçus après **acceptation** de votre demande par l’administrateur (ou compte créé par votre équipe selon votre processus).

---

### Tableau de bord et statistiques

- **`/locataire/dashboard`** : vue d’ensemble de vos biens, réservations reçues, indicateurs (revenus, notes, etc.).
- **`/locataire/statistiques`** : analyses plus détaillées (graphiques, répartitions), selon ce qui est affiché à l’écran.

---

### Ajouter ou modifier une maison

Les propriétaires gèrent leurs annonces via les écrans de **création** et **édition** de biens (routes prévues pour les utilisateurs connectés avec le bon rôle).

**Champs à connaître :**

| Champ (concept) | Rôle pour le client final |
|-----------------|---------------------------|
| **Description** | Texte présentant le logement. |
| **Lieu** | Localisation affichée (ville, zone). |
| **Surface** | Superficie (ex. m²). |
| **Type** | Studio, F1… selon les choix proposés. |
| **Prix** | Tarif de base (par nuit, selon l’affichage du site). |
| **Note affichée** | Indice de satisfaction ; peut être géré selon votre politique. |
| **Photos** | Images importées (formats images courants, taille limitée côté serveur). |
| **Petit-déjeuner / Chambre d’amour** | Options récurrentes avec **prix forfaitaires** si vous les activez. |
| **Options supplémentaires** | Liste d’options **nom + prix** (voir section suivante). |

Enregistrez après chaque modification. Les voyageurs voient les **mises à jour** sur la fiche publique.

> **Astuce** — Des photos nettes et une description honnête réduisent les annulations et les litiges.

---

### Suivi des réservations reçues

- Depuis le **tableau de bord** ou la **fiche d’un bien**, consultez les **réservations** liées à ce logement (dates, client, options, statut).
- Les **revenus** affichés tiennent compte du **nombre de nuits**, des options fixes et des **options supplémentaires** choisies par le voyageur.

---

## Gestion du contenu : les « options supplémentaires » (Additional Options)

Les **options supplémentaires** permettent au **propriétaire** d’ajouter des **services ou équipements facturés en plus** du prix de la nuit (ex. parking, ménage de fin de séjour, navette).

**Fonctionnement côté propriétaire (annonce)**  
- Lors de la **création ou modification** d’un bien, vous pouvez définir une **liste d’options**, chacune avec un **libellé** et un **prix** (montant).  
- Ces options apparaissent sur la **fiche du bien** pour guider le voyageur.

**Fonctionnement côté voyageur (réservation)**  
- À la réservation, le voyageur peut **cocher** ou **sélectionner** les options proposées pour ce bien.  
- Le **montant total** de la réservation inclut : le **séjour** (prix × nombre de nuits), les **options fixes** (petit-déjeuner, chambre d’amour si proposées), et la **somme des options supplémentaires** choisies.

**Paiement**  
- Le **paiement Stripe** est calculé sur ce **total** (séjour + options), afin que le montant débité corresponde au détail affiché avant validation.

> **Astuce** — Limitez les options à des **prestations claires** et **prix stables** pour éviter les incompréhensions au moment du paiement.

---

## Maintenance de base et accès

### URLs de connexion (à adapter à votre domaine)

| Fonction | Chemin d’accès (exemple) |
|----------|-------------------------|
| Site public | `/` |
| Connexion voyageur | `/login` |
| Inscription | `/register` |
| Connexion administrateur | `/admin/login` |
| Connexion propriétaire | `/locataire/login` |
| Catalogue | `/nos-biens` |
| Mes réservations (connecté) | `/mes-reservations` |

---

### Réinitialisation du mot de passe

La plateforme dispose des **tables et mécanismes** Laravel habituels pour une réinitialisation par e-mail, mais **l’activation d’un écran « Mot de passe oublié »** dépend de la configuration livrée par votre prestataire. En l’absence d’un lien visible sur la page de connexion :

- **Voyageurs / propriétaires** : contactez l’**administrateur** du site ou le **support** pour une réinitialisation manuelle ou une procédure interne.
- **Administrateur** : gardez un **accès de secours** (compte technique, accès hébergeur) défini avec votre équipe.

> **Astuce** — Documentez pour votre client une **adresse de contact** unique (support@…) pour les problèmes de compte et de mot de passe.

---

### Bonnes pratiques

- Utiliser **HTTPS** (cadenas dans le navigateur) sur le site en production.
- Ne **partager jamais** les mots de passe par e-mail en clair ; privilégier un **outil de gestion de mots de passe** ou une réinitialisation sécurisée.
- Pour les **changements de site** (textes, processus), référez-vous à la **version en ligne** réelle : certaines captures d’écran peuvent différer selon les mises à jour.

---

*Fin du manuel — Casa Del Concierge.*
