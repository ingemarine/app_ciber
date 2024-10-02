import L from 'leaflet';

// Inicializar el mapa centrado en Guatemala
const mapa = L.map('mapa', {
    center: [14.615, -90.505], // Coordenadas de inicio del mapa
   
    zoom: 7,
    layers: []
});

// Añadir capa de OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapa);

// Crear grupo de capas para los marcadores
const capaMarcadores = L.layerGroup();

// Definir el ícono personalizado
const icono = L.icon({
    iconUrl: './images/cit.png', // Asegúrate de que la ruta sea correcta
    iconSize: [40, 40]
});

// Array con las coordenadas de los marcadores
const coordenadas = [
    [14.64072, -90.513227], // Ciudad de Guatemala
    [14.97222, -89.53056],  // Zacapa
    [14.83472, -91.51806],  // Quetzaltenango
    [15.72778, -88.59444]   // Puerto Barrios
];

// Añadir un marcador para cada coordenada con el ícono personalizado
coordenadas.forEach(coordenada => {
    L.marker(coordenada, { icon: icono })
        .addTo(capaMarcadores);
});

// Añadir la capa de marcadores al mapa
capaMarcadores.addTo(mapa);

// Dibujar una línea que conecte todas las coordenadas
const polilinea = L.polyline(coordenadas, { color: 'blue' }).addTo(mapa);

// Ajustar la vista del mapa para que incluya todos los puntos
mapa.fitBounds(polilinea.getBounds());
