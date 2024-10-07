

<style>
    /* Fondo de la página */
    body {
        background: linear-gradient(135deg, #f0f2f5, #ffffff);
        font-family: 'Montserrat', sans-serif; /* Fuente elegante y profesional */
        color: #333;
    }

    /* Estilo para los encabezados */
    h1, h2 {
        color: #1b2e4b; /* Azul oscuro para los títulos */
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Sombras ligeras para resaltar el texto */
    }

    h1 {
        font-size: 3rem; /* Tamaño grande para resaltar la importancia */
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    /* Estilo para el contenedor del mapa */
    #mapa {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
        background-color: #ffffff; /* Fondo blanco para resaltar el mapa */
        border: 1px solid #1b2e4b; /* Borde azul oscuro que combina con el diseño */
    }

    /* Responsivo */
    @media (max-width: 768px) {
        h1 {
            font-size: 2.5rem;
        }

        h2 {
            font-size: 1.8rem;
        }

        #mapa {
            height: 50vh; /* Reducir el tamaño en dispositivos móviles */
        }
    }
</style>

<!-- Contenido HTML -->
<h1 class="text-center">CARTA DE SITUACIÓN</h1>
<h2 class="text-center">BRIGADA DE COMUNICACIONES DEL EJÉRCITO</h2>
<div class="row justify-content-center">
    <div class="col-lg-11 col-md-12 p-3 border rounded mx-auto" id="mapa" style="height: 70vh; min-height: auto;">
        <!-- Aquí va el contenido del mapa -->
    </div>
</div>

<script src="<?= asset('./build/js/mapa/index.js')?>"></script>
