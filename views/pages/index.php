<style>
  body {
    background: linear-gradient(135deg, #1b2e4b, #3a5f9e);
    min-height: 100vh;
    color: white;
    font-family: 'Arial', sans-serif;
    text-align: center;
    font-family: "Concert One", sans-serif;
  }

  .hero-section {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    z-index: 1;
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2;
  }

  h1 {
    font-size: 4rem;
    z-index: 3;
  }

  .info-section {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    color: #fff;
  }

  .info-section div {
    background: rgba(255, 255, 255, 0.2);
    padding: 15px;
    border-radius: 10px;
    width: 30%;
    transition: transform 0.3s ease;
    cursor: pointer;
    text-align: center;
  }

  .info-section div:hover {
    transform: scale(1.1); /* Efecto de agrandamiento */
  }

  footer {
    background-color: #1b2e4b;
    color: white;
    padding: 20px 0;
    text-align: center;
    margin-top: 50px;
  }

  footer img {
    margin: 0 10px;
  }

  footer a {
    color: white;
    margin: 0 10px;
    font-size: 40px;
    transition: color 0.3s;
  }

  footer a:hover {
    color: #dc3545;
  }

  /* Ajuste del carrusel */
  .carousel-item {
    position: relative;
  }

  .carousel-caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    background: rgba(0, 0, 0, 0.6); /* Fondo oscuro para mejorar la visibilidad del texto */
    padding: 20px;
    border-radius: 10px;
  }

  .carousel-caption h1 {
    font-size: 3rem;
    font-weight: bold;
  }

  .carousel-caption p {
    font-size: 1.5rem;
  }

  .carousel-item img {
    width: 100%;
    height: 80vh; /* Se incrementa la altura para que ocupe más espacio */
    object-fit: cover; /* Esto mantendrá el aspecto de las imágenes sin deformarlas */
  }

  .progress-bar-animated {
    transition: width 0.6s ease;
  }

  .navbar-brand img {
    transition: transform 0.3s ease;
  }

  .navbar-brand img:hover {
    transform: scale(1.1);
  }

  /* Misión y Visión */
  .mission-vision-section {
    display: flex;
    justify-content: space-around;
    padding: 40px 20px;
    background-color: #223555;
    color: white;
    text-align: center;
  }

  .mission-vision {
    background: rgba(255, 255, 255, 0.2);
    padding: 20px;
    border-radius: 10px;
    width: 45%;
    transition: transform 0.3s ease;
    text-align: center;
  }

  .mission-vision:hover {
    transform: scale(1.1); /* Efecto de agrandamiento */
  }

  .mission-vision h2 {
    font-size: 2rem;
    margin-bottom: 15px;
  }

  .mission-vision p {
    font-size: 1.2rem;
    line-height: 1.5;
    margin: auto;
  }
</style>

<!-- Sección de Carrusel Bienvenido -->
<div class="hero-section">
  <div class="overlay"></div>
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="z-index: 3; width: 90%; margin: auto;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/carru.png" class="d-block w-100" alt="Slide 1">
        <div class="carousel-caption">
          <h1>Bienvenido a Ciberdefensa</h1>
          <p>Descubre lo mejor que tenemos para ti.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/carrousell4.png" class="d-block w-100" alt="Slide 2">
        <div class="carousel-caption">
          <h1>Seguridad Avanzada</h1>
          <p>Protegiendo tu información en el entorno digital.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/carrousell3.png" class="d-block w-100" alt="Slide 3">
        <div class="carousel-caption">
          <h1>Colaboración Internacional</h1>
          <p>Trabajando con instituciones globales para tu seguridad.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- Sección de Misión y Visión en formato de cuadros -->
<div class="mission-vision-section">
  <div class="mission-vision">
    <h2>Nuestra Misión</h2>
    <p>Proteger y garantizar la seguridad de la información y los sistemas mediante la implementación de tecnologías avanzadas y la mejora continua de nuestros servicios.</p>
  </div>
  <div class="mission-vision">
    <h2>Nuestra Visión</h2>
    <p>Ser un referente mundial en ciberseguridad, colaborando con instituciones internacionales para salvaguardar los activos digitales más valiosos del mundo.</p>
  </div>
</div>

<!-- Sección de información o logros -->
<div class="info-section">
  <div>
    <img src="./images/ciber.png" alt="Seguridad" width="100%">
    <h2>Seguridad Avanzada</h2>
    <p>Capacidades avanzadas en ciberseguridad.</p>
  </div>
  <div>
    <img src="./images/ciibbe.png" alt="Recursos" width="100%">
    <h2>Recursos de Primer Nivel</h2>
    <p>Accede a recursos de última generación.</p>
  </div>
  <div>
    <img src="./images/pine.png" alt="Colaboración" width="100%">
    <h2>Colaboración Internacional</h2>
    <p>Colaboramos con instituciones internacionales.</p>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <h4>Contacto</h4>
        <p>+502 4497 4318</p>
        <p>correo@ejemplo.com</p>
      </div>
      <div class="col-lg-4">
        <h4>Medios & Recursos</h4>
        <p>Acceso a nuestros recursos principales</p>
      </div>
      <div class="col-lg-4">
        <h4>Síguenos</h4>
        <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
        <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
        <a href="https://www.whatsapp.com" target="_blank"><i class="fa-brands fa-square-whatsapp"></i></a>
        <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
      </div>
    </div>
  </div>
</footer>

<script src="build/js/inicio.js"></script>
