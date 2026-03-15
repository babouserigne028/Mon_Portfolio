# Mon Portfolio Laravel

Portfolio web développé avec Laravel 12, Blade, Tailwind CSS et MySQL.

## Fonctionnalités

- Présentation dynamique de projets, technologies et domaines de compétence
- Filtrage des projets par technologie
- Interface responsive et moderne
- Espace d'administration protégé par authentification (CRUD projets, technologies, domaines, profil)
- Stockage d'images via `storage/app/public`

## Stack technique

- PHP >= 8.2
- Laravel 12
- MySQL
- Tailwind CSS (via Vite)
- Blade

---

## Installation locale (développement)

```bash
git clone <url-du-repo>
cd Mon_Portfolio_Laravel

composer install
npm install

cp .env.example .env
php artisan key:generate

# Configurer DB_* dans .env, puis :
php artisan migrate
php artisan storage:link

npm run dev
php artisan serve
```

Accès : [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Déploiement en production

### 1. Prérequis serveur

- PHP >= 8.2 avec extensions : `mbstring`, `pdo_mysql`, `xml`, `fileinfo`, `curl`, `gd`
- Composer
- Node.js & npm (build des assets uniquement)
- MySQL
- Serveur web : Apache ou Nginx (document root → `public/`)

---

### 2. Cloner et installer les dépendances

```bash
git clone <url-du-repo>
cd Mon_Portfolio_Laravel

composer install --no-dev --optimize-autoloader
npm install
npm run build
```

---

### 3. Configurer l'environnement

```bash
cp .env.example .env
```

Adapter les variables dans `.env` :

```dotenv
APP_NAME="Mon Portfolio"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe

# Optionnel : email de contact
MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS=contact@votre-domaine.com
```

> **Important :** `APP_DEBUG=false` est obligatoire en production pour ne pas exposer les traces d'erreur.

---

### 4. Générer la clé et migrer la base

```bash
php artisan key:generate
php artisan migrate --force
php artisan storage:link
```

---

### 5. Optimiser pour la production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

Pour effacer les caches (après une mise à jour) :

```bash
php artisan optimize:clear
```

---

### 6. Permissions des dossiers

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

### 7. Configuration Nginx (exemple)

```nginx
server {
    listen 80;
    server_name votre-domaine.com;
    root /var/www/Mon_Portfolio_Laravel/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

> Pour Apache, activer `mod_rewrite` et s'assurer que le `.htaccess` de `public/` est actif (`AllowOverride All`).

---

### 8. Créer le compte administrateur

Après la migration, créer le premier compte admin via Tinker :

```bash
php artisan tinker
```

```php
\App\Models\Utilisateur::create([
    'name'     => 'Votre Nom',
    'email'    => 'admin@votre-domaine.com',
    'password' => bcrypt('mot_de_passe_securise'),
]);
```

Accès admin : `https://votre-domaine.com/login`

---

### 9. Mise à jour de l'application

```bash
git pull origin main
composer install --no-dev --optimize-autoloader
npm run build
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Structure des routes

| URL | Description |
|-----|-------------|
| `/` | Page d'accueil |
| `/projet` | Liste des projets |
| `/a_propos` | À propos |
| `/contact` | Contact |
| `/login` | Connexion admin |
| `/admin` | Dashboard admin (authentifié) |
| `/admin/projets` | CRUD projets |
| `/admin/technologies` | CRUD technologies |
| `/admin/domaines` | CRUD domaines |
| `/admin/profil` | Gestion du profil |

---

## Auteur

Serigne Abdoulaye Babou

## Licence

Ce projet est sous licence MIT.
