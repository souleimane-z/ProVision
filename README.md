# ProVision - Plateforme de VOD

## 📌 Description
ProVision est une plateforme de vidéo à la demande (VOD) permettant aux utilisateurs de consulter un large choix de films et de séries. Le projet intègre une gestion des utilisateurs, des abonnements et une interaction avec l'API TMDB pour récupérer les données des films et séries.

## 🚀 Fonctionnalités principales
- **Affichage des films et séries** : Par genres, tendances et nouveautés.
- **Détails des films et séries** : Synopsis, casting, saisons et épisodes.
- **Système d'authentification** : Inscription, connexion et déconnexion des utilisateurs.
- **Recherche avancée** : Permet de trouver rapidement un contenu.
- **Gestion des abonnements** : Différents plans d'abonnement disponibles.
- **Interface responsive** : Adaptée aux mobiles et tablettes.

![ProVision Logo](https://res.cloudinary.com/dhqh98spd/image/upload/v1738425540/Provision-LOGO_qkjtew.png)

---

## 🌐 Démon Live
Vous pouvez retrouver une démo live du site hébergé par InfinityFree.

[ProVision](http://provision.kesug.com/)


---

## 🛠 Installation
### 1️⃣ Prérequis
- PHP 7.x ou supérieur
- MySQL
- Apache 

### 2️⃣ Cloner le projet
```bash
git clone https://github.com/ton-repo/provision.git
cd provision
```

### 3️⃣ Configuration de la base de données
1. **Créer la base de données**
```sql
CREATE DATABASE provision;
```
2. **Créer la table `users`**
```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

2. **Créer la table `contact_messages`**

```sql
CREATE TABLE contact_messages (
   id INT PRIMARY KEY AUTO_INCREMENT,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(255) NOT NULL,
   subject VARCHAR(200) NOT NULL,
   message TEXT NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
status ENUM('new', 'read', 'replied') DEFAULT 'new'
);
```
3. **Configurer `config.php`**
   Dans `includes/config.php`, renseignez vos identifiants MySQL :
```php
$host = ''; // URL de votre hébergement MySQL (défault : 'localhost')
$dbname = 'provision'; // nom de la BDD
$username = ''; // Votre nom d'utlisateur de base donnée (défault : "root")
$password = ''; // Votre mot de passe (défault : '' vide)
```

### 4️⃣ Lancer le projet
- Démarrer un serveur local PHP :
```bash
php -S localhost:8000
```
- Ouvrir `http://localhost:8000` dans un navigateur.

---

## 🛠 Technologies utilisées
- **Backend** : PHP, MySQL
- **Frontend** : HTML, CSS, JavaScript (Swiper.js pour le carrousel)
- **API** : TMDB pour les données des films et séries




