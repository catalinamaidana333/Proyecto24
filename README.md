<div align="center">

  
  <h1>🎀 🩰 NEOGAUCHO 🩰 🎀</h1>
  <p><strong>Plataforma Web de Indumentaria Vintage & Luxury Archival</strong></p>

  <!-- Badges de Tecnologías -->
  <p>
    <img src="https://img.shields.io/badge/Laravel-13.3-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img src="https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  </p>

  <!-- Botón de Demo en Vivo (Ajusta la URL) -->
  

</div>

---

> ⚠️ **Nota de Hosting:**

---

## 📌 Sobre el Proyecto

**NEOGAUCHO** es un e-commerce exclusivo diseñado para la gestión y comercialización de indumentaria vintage y piezas de lujo de archivo. La plataforma integra dos experiencias optimizadas:

* **🛍️ Portal del Cliente:** Navegación dinámica por catálogo de archivo con filtrado por categorías, bolsa de compras con validación estricta de stock en tiempo real por talle, flujo de confirmación de pedidos y generación automática de tickets digitales en PDF.
* **🛡️ Panel de Administración:** Dashboard centralizado para la gestión del catálogo (CRUD completo y baja lógica para visibilidad), control de inventario detallado y módulo para la recepción y trazabilidad de consultas y transacciones.



---

## 🛠️ Stack Tecnológico & Dependencias

| Categoría | Tecnología / Librería | Descripción |
| :--- | :--- | :--- |
| **Backend** | `Laravel v13.3.0` / `PHP v8.4.19` | Framework principal y entorno de ejecución. |
| **Base de Datos** | `MySQL` | Persistencia relacional de datos. |
| **PDF Engine** | `barryvdh/laravel-dompdf` | Generación y maquetación de tickets en formato PDF. |
| **Frontend** | `Bootstrap 5.3` / `FontAwesome 6.4` | Maquetación responsiva, modales y tipografía de íconos. |

---

<details>
<summary>⚙️ <b>Instalación y Configuración Local (Desplegar)</b></summary>

<br>

1. Clonar el repositorio:
   ```bash
   git clone [https://github.com/tu-usuario/tu-repo.git](https://github.com/tu-usuario/tu-repo.git)

2. Dar formato a variables de entorno:
  ```bash
  cp .env.example .env

3. Instalar dependencias con Composer:
  ```bash
  composer install

4. Generar Key e iniciar migraciones:
```bash
  php artisan key:generate
  php artisan migrate --seed

<br>
--

## 👥 Equipo de Desarrollo — Grupo 24
👩‍💻 Catalina Maidana
👩‍💻 Camila Maidana