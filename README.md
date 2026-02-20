# Player Notes Management

Este proyecto implementa un módulo de **Historial de Notas de Jugador** para agentes de soporte, construido con **Laravel 12**, **Livewire**, **TailwindCSS** y **Alpine.js**, siguiendo buenas prácticas de arquitectura, el patrón **Repositorio**, y control de permisos con **Spatie Laravel Permission**.

Permite:

- Visualizar un listado de jugadores (`Players`).

- Gestionar notas internas de cada jugador (`Player Notes`).

- Crear nuevas notas (solo agentes con permiso).

- Paginación dinámica, loading states y toasts en SPA con Livewire.

Roles implementados:

- `agent`: Puede ver jugadores y crear notas.

- `viewer`: Solo puede ver jugadores y notas, no puede crear.

- `player`: Usuarios a gestionar.

## 🚀 Tecnologías utilizadas

- **Framework:** Laravel 12
- **Entorno:** Laravel Sail (Docker)
- **Base de Datos:** MySQL
- **Gestor de Base de Datos**: Adminer

### URL de la aplicacion web

```bash
http://localhost
```

### URL del gestor Adminer

```bash
http://localhost:7777
```

---

## Requerimientos

- PHP >= 8.2
- Composer
- Node.js >= 20 (para Vite, Tailwind y Alpine.js)
- Docker + Docker Compose
- Laravel 12

---

## 🛠️ Instalación y Configuración

Para facilitar la revisión, el proyecto está configurado con **Laravel Sail**. Asegúrate de tener Docker instalado en tu sistema.

1. **Clonar el repositorio:**

   ```bash
   git clone git@github.com:Jopsam/player-notes-panel.git
   cd player-notes-panel
   ```

2. **Configurar el archivo de entorno:**

    ```bash
    cp .env.example .env
    ```

3. **Instalar dependencias de Composer:**

    ```bash
    docker run --rm\
        -u "$(id -u):$(id -g)"\
        -v "$(pwd):/var/www/html"\
        -w /var/www/html\
        laravelsail/php84-composer:latest\
        composer install --ignore-platform-reqs

    ./vendor/bin/sail up -d
    ```

    ó bien, teniendo composer instalado:

    ```bash
    composer install --ignore-platform-reqs
    ./vendor/bin/sail build
    ./vendor/bin/sail up -d
    ./vendor/bin/sail composer install
    ```

    Posteriormente, ejecutar:

    ```bash
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    ```

4. **Generar la clave de la aplicación:**

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

5. **Ejecutar migraciones y seeders:**

    ```bash
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

6. **Acceder a la aplicación**

    - Abrir http://localhost

    - Ingresar con uno de los usuarios seed:

      - Agent: `agent@test.com` / `password`
      - Viewer: `viewer@test.com` / `password`

7. **Acceder a Adminer (gestor de BD visual)**

    - Abrir http://localhost:7777

    - System: `MySQL`
    - Server: `mysql`
    - Username: `sail`
    - Password: `password`
    - Database: `laravel`

## Ejecutar Tests

```bash
./vendor/bin/sail test
```
