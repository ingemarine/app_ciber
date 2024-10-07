import L from 'leaflet';
import { Dropdown } from 'bootstrap';

// Inicializar el mapa centrado en Guatemala
const mapa = L.map('mapa', {
    center: [14.71889, -90.64417], // Coordenadas de inicio del mapa
    zoom: 7,
    layers: []
});

// Añadir capa de OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapa);

// Crear grupo de capas para los marcadores
const capaMarcadores = L.featureGroup(); 

// // Definir el ícono personalizado
// const icono = L.icon({
//     iconUrl: './images/cit.png', // Asegúrate de que la ruta sea correcta
//     iconSize: [40, 40]
// }); 

// Array con las coordenadas de los marcadores y sus nombres
const coordenadas = [

    {
        latLng: [14.58028, -90.53083], 
        nombre: "Servicio de Material de Guerra", 
        icono: './images/material.png',  
        imagen: './images/serviciomg.png',  
        direccion: "11 avenida 17-50 zona 13, Colonia Aurora II",  
        telefono: "2261-4224"  
    },
    

    
    { latLng: [14.61278, -90.51111], nombre: "Primera Brigada de Policía Militar 'Guardia de Honor ", icono: './images/pbgh.png' },
    { latLng: [14.615635, -90.505577], nombre: "Comando de Informática y Tecnología", icono: './images/cit.png' },
    { latLng: [15.69361, -88.62222], nombre: "Astillero Naval De Guatemala", icono: './images/astimar.png' },
    { latLng: [16.63806, -90.18], nombre: "Brigada Especial de Operaciones de Selva 'TTE. CNEL. Victor Augusto Quilo Ayuso'", icono: './images/beos.png' },
    { latLng: [14.65028, -90.51417], nombre: "Servicio de Músicas Militares", icono: './images/musica.png' },
    { latLng: [14.63611, -90.47806], nombre: "Comando Superior de Educación del Ejército de Guatemala" , icono: './images/cosede.png' },
    { latLng: [14.83694, -89.51250], nombre: "Instituto 'Adolfo V Hall' Chiquimula" , icono: './images/hall.png' },
    { latLng: [15.73917, -88.58917], nombre: "Brigada de Infantería de Marina, Puerto Barrios, Izabal" , icono: './images/bim.png'},
    { latLng: [14.61333, -90.51306], nombre: "Dirección General de Finanzas del Ministerio de la Defensa Nacional", icono: './images/mdn.png' },
    { latLng: [13.92167, -90.80167], nombre: "Comando de Fuerza Especial Naval", icono: './images/cofen.png' },
    { latLng: [14.575, -90.53361], nombre: "Comando de Comunicaciones del Ejército de Guatemala" , icono: './images/bg.png'},
    { latLng: [15.10806, -90.29806], nombre: "Séptima Brigada de Infantería 'General Kjell Eugenio Laugerud Garcia'", icono: './images/septima.png' },
    { latLng: [14.64472, -90.47472], nombre: "Brigada Militar 'Mariscal Zavala'" , icono: './images/mariscal.png' },
    { latLng: [15.01222, -91.14972], nombre: "Instituto 'Adolfo V Hall' Norooccidente Quiche" , icono: './images/hall.png' },
    { latLng: [14.62806, -90.46250], nombre: "Centro Médico Militar" , icono: './images/cmm.png'},
    { latLng: [14.64000, -90.49806], nombre: "Comando de Apoyo Logístico" , icono: './images/cal.png'},
    { latLng: [13.92667, -90.80361], nombre: "Escuela Naval de Guatemala, Puerto Quetzal, Escuintla" , icono: './images/eng.png' },
    { latLng: [15.30944, -91.52167], nombre: "Quinta Brigada de Infantería 'MGS'" , icono: './images/quinta.png'},
    { latLng: [16.92139, -89.89111], nombre: "Comando Aéreo del Norte 'TTE. CNEL. Danilo Eugenio Henry Sanchez', Santa Elena, Petén"  , icono: './images/canorte.png' },
    { latLng: [15.69222, -88.62056], nombre: "Comando Naval del Caribe, Puerto Santo Tomás de Castilla, Puerto Barrios, Izabal" , icono: './images/conacar.png' },
    { latLng: [15.97028, -90.74583], nombre: "Sexta Brigada de Infantería 'Coronel Antonio José de Irisarri', Playa Grande", icono: './images/sexta.png' },
    { latLng: [14.96306, -91.85556], nombre: "Brigada de Operaciones para Montaña, 'General José María Reina Barrios'"  , icono: './images/bopm.png'},
    { latLng: [14.64000, -90.50028], nombre: "Guardia Presidencial" , icono: './images/gp.png' },
    { latLng: [14.60861, -90.51250], nombre: "Estado Mayor de la Defensa Nacional" , icono: './images/em.png'},
    { latLng: [14.63083, -90.46250], nombre: "Servicio de Sanidad Militar", icono: './images/ssm.png' },
    { latLng: [14.54611, -91.68194], nombre: "Instituto 'Adolfo V Hall' Sur, Retalhuleu" , icono: './images/hall.png'},
    { latLng: [14.55083, -91.55250], nombre: "Cuarta Brigada de Infantería 'General Justo Rufino Barrios', Suchitepequez" , icono: './images/cuarta.png'},
    { latLng: [15.48333, -90.39667], nombre: "Fábrica de Municiones del Ejército,  Cobán, Alta Verapaz" , icono: './images/fme.png'},
    { latLng: [15.48194, -90.40250], nombre: "Comando Regional de Entrenamiento de Operaciones de Mantenimiento de Paz, Cobán, Alta Verapaz", icono: './images/creompaz.png' },
    { latLng: [14.97000, -89.51694], nombre: "Instituto 'Adolfo V Hall' Oriente, Zacapa", icono: './images/hall.png' },
    { latLng: [15.48139, -90.31778], nombre: "Instituto 'Adolfo V Hall' Norte, Cobán, Alta Verapaz" , icono: './images/hall.png' },
    { latLng: [14.59139, -90.52333], nombre: "Comando Aéreo Central 'La Aurora'" , icono: './images/cacen.png' },
    { latLng: [13.92806, -90.80306], nombre: "Comando Naval del Pacífico, Puerto Quetzal, Escuintla", icono: './images/conapac.png' },
    { latLng: [14.57528, -90.52694], nombre: "Escuela Militar de Aviación", icono: './images/etma.png' },
    { latLng: [14.61056, -89.97306], nombre: "Instituto 'Adolfo V Hall' Jalapa" , icono: './images/hall.png' },
    { latLng: [14.59389, -90.52222], nombre: "Reservas Militares de la República" , icono: './images/reservas.png' },
    { latLng: [14.58778, -90.53056], nombre: "Servicio de Capellanía del Ejército de Guatemala" , icono: './images/capellania.png' },
    { latLng: [14.62750, -90.51722], nombre: "Servicio de Historia Militar " , icono: './images/sh.png' },
    { latLng: [14.61528, -90.50556], nombre: "Servicio de Intendencia del Ejército" , icono: './images/sie.png' },
    { latLng: [16.90472, -89.82972], nombre: "Primera Brigada de Infantería 'GLGL'" , icono: './images/primera.png' },
    { latLng: [16.33583, -89.40528], nombre: "Brigada de Fuerzas Especiales, Poptún, Petén" , icono: './images/fe.png' },
    { latLng: [14.587295, -90.523978], nombre: "Comandancia de la Fuerza Aérea Guatemalteca" , icono: './images/cfag.png' },
    { latLng: [14.61333, -90.51306], nombre: "Ministerio de la Defensa Nacional" , icono: './images/mdn.png'},
    { latLng: [16.36972, -89.43472], nombre: "Centro de Adiestramiento del Ejército de Guatemala, Poptún, Petén" , icono: './images/caeg.png'},
    { latLng: [14.75556, -90.64056], nombre: "Escuela Politécnica, San Juan Sacatepéquez", icono: './images/ep.png' },
    { latLng: [14.59694, -90.53083], nombre: "Instituto 'Adolfo V Hall' Central" , icono: './images/hall.png' },
    { latLng: [14.96667, -91.79028], nombre: "Instituto 'Adolfo V Hall' Occidente, San Marcos" , icono: './images/hall.png'},
    { latLng: [14.95806, -89.53361], nombre: "Segunda Brigada de Infantería 'Capitán General Rafael Carrera', Zacapa" , icono: './images/segunda.png' },
    { latLng: [14.29111, -89.93528], nombre: "Tercera Brigada de Infantería 'General Manuel Aguilar Santamaría', Jutiapa", icono: './images/tercera.png' },
    { latLng: [14.57250, -90.53389], nombre: "Hospital Nuestra Señora Virgen de Loreto" , icono: './images/virgen.png' },
    { latLng: [14.52444, -91.68556], nombre: "Comando Aéreo del Sur 'Coronel Mario Enrique Vasquez Maldonado', Retalhuleu" , icono: './images/casur.png'},
    { latLng: [14.61583, -90.50611], nombre: "Industria Militar" , icono: './images/im.png'},
    { latLng: [13.94194, -90.83611], nombre: "Brigada de Paracaidistas 'General Felipe Cruz', Puerto San José, Escuintla" , icono: './images/paraca.png'},
    { latLng: [14.58250, -90.53222], nombre: "Cuerpo de Ingenieros del Ejército 'TTE. CNEL. DE ING. Francisco Vela Arango'", icono: './images/ingenieros.png' },
    { latLng: [14.57528, -90.53194], nombre: "Comandancia de la Marina de la Defensa Nacional", icono: './images/comadena.png' },
    { latLng: [14.75833, -90.64389], nombre: "Segunda Brigada de Policía Militar 'Gral. de Div. Héctor Alejandro Gramajo Morales', San José" , icono: './images/2pm.png'},
    { latLng: [14.61750, -90.50917], nombre: "Direccion General De Armas Y Municiones DIGECAM" , icono: './images/digecam.png' },
];

// Añadir un marcador para cada coordenada con su ícono personalizado y el nombre al pasar el cursor
coordenadas.forEach(ubicacion => {
    const iconoPersonalizado = L.icon({
        iconUrl: ubicacion.icono,  // Usa el ícono personalizado para esta ubicación
        iconSize: [40, 40],        // Tamaño del ícono
        iconAnchor: [20, 40],      // Punto de anclaje del ícono
        popupAnchor: [0, -40]      // Punto donde aparece el popup en relación al ícono
    });


    

// L.marker(ubicacion.latLng, { icon: iconoPersonalizado })
// .bindTooltip(ubicacion.nombre)  // Muestra el nombre al pasar el cursor
// .addTo(capaMarcadores);


//
const popupContenido = `
<div>
    <h5>${ubicacion.nombre}</h5>
    <img src="${ubicacion.imagen}" alt="${ubicacion.nombre}" width="200" height="100" style="object-fit:cover;">
    <p><strong>Dirección:</strong> ${ubicacion.direccion}</p>
    <p><strong>Teléfono:</strong> ${ubicacion.telefono}</p>
</div>
`;

L.marker(ubicacion.latLng, { icon: iconoPersonalizado })
.bindTooltip(ubicacion.nombre)  // Muestra el nombre al pasar el cursor
.bindPopup(popupContenido)  // Muestra el popup con la información
.addTo(capaMarcadores);


// Añadir la capa de marcadores al mapa
capaMarcadores.addTo(mapa);

// Ajustar la vista del mapa para que incluya todos los puntos
mapa.fitBounds(capaMarcadores.getBounds());
});
