import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { Dropdown } from "bootstrap";

const formulario = document.getElementById('formMantenimiento');
const tabla = document.getElementById('tablaMantenimiento');
const btnGuardar = document.getElementById('btnGuardar');
const btnModificar = document.getElementById('btnModificar');
const btnCancelar = document.getElementById('btnCancelar');

// Inicializar DataTable
const datatable = new DataTable('#tablaMantenimiento', {
    data: null,
    language: lenguaje,
    columns: [
        { title: 'Dependencia', data: 'nombre_dep' },
        { title: 'Operaciones', data: 'num_op' },
        { title: 'Computadoras', data: 'num_compu' },
        { title: 'Antivirus', data: 'num_antivirus' },
        {
            title: 'Acciones',
            data: 'id_mant',
            render: (data, type, row) => {
                return `
                <button class="btn btn-warning modificar" data-id_mant="${data}" data-nombre_dep="${row.nombre_dep}" data-num_op="${row.num_op}" data-num_compu="${row.num_compu}" data-num_antivirus="${row.num_antivirus}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="btn btn-danger eliminar" data-id_mant="${data}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                `;
            }
        },
    ]
});

// Ocultar botones de modificar y cancelar al inicio
btnModificar.parentElement.style.display = 'none';
btnModificar.disabled = true;
btnCancelar.parentElement.style.display = 'none';
btnCancelar.disabled = true;

// Función para guardar nuevo mantenimiento
const guardar = async (e) => {
    e.preventDefault();

    if (!validarFormulario(formulario, ['id_mant'])) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        return;
    }

    try {
        const body = new FormData(formulario);
        const url = "/app_ciber/API/mantenimiento/guardar";
        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 1) {
            Toast.fire({
                icon: 'success',
                title: mensaje
            });
            formulario.reset();
            buscar();
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Error al guardar mantenimiento'
            });
        }
    } catch (error) {
        console.error(error);
    }
};

// Función para buscar mantenimientos
const buscar = async () => {
    try {
        const url = "/app_ciber/API/mantenimiento/buscar";
        const config = {
            method: 'GET'
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { datos } = data;

        datatable.clear().draw();

        if (datos) {
            datatable.rows.add(datos).draw();
        }
    } catch (error) {
        console.error(error);
    }
};
buscar();

// Función para traer los datos de un mantenimiento y llenar el formulario
const traerDatos = (e) => {
    const elemento = e.currentTarget.dataset;

    formulario.id_mant.value = elemento.id_mant;
    formulario.nombre_dep.value = elemento.nombre_dep;
    formulario.num_op.value = elemento.num_op;
    formulario.num_compu.value = elemento.num_compu;
    formulario.num_antivirus.value = elemento.num_antivirus;

    btnGuardar.parentElement.style.display = 'none';
    btnGuardar.disabled = true;
    btnModificar.parentElement.style.display = '';
    btnModificar.disabled = false;
    btnCancelar.parentElement.style.display = '';
    btnCancelar.disabled = false;
};

// Función para cancelar la edición
const cancelar = () => {
    formulario.reset();
    btnGuardar.parentElement.style.display = '';
    btnGuardar.disabled = false;
    btnModificar.parentElement.style.display = 'none';
    btnModificar.disabled = true;
    btnCancelar.parentElement.style.display = 'none';
    btnCancelar.disabled = true;
};

// Función para modificar un mantenimiento
const modificar = async (e) => {
    e.preventDefault();

    if (!validarFormulario(formulario)) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        return;
    }

    try {
        const body = new FormData(formulario);
        const url = "/app_ciber/API/mantenimiento/modificar";
        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 1) {
            Toast.fire({
                icon: 'success',
                title: mensaje
            });
            formulario.reset();
            buscar();
            cancelar();
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Error al modificar mantenimiento'
            });
        }
    } catch (error) {
        console.error(error);
    }
};

// Función para eliminar un mantenimiento
const eliminar = async (e) => {
    const id = e.currentTarget.dataset.id_mant;

    const confirmacion = await Swal.fire({
        title: '¿Está seguro?',
        text: "Esta acción no se puede deshacer.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    });

    if (confirmacion.isConfirmed) {
        try {
            const body = new FormData();
            body.append('id_mant', id);

            const url = '/app_ciber/API/mantenimiento/eliminar';
            const config = {
                method: 'POST',
                body
            };

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            const { codigo, mensaje } = data;

            if (codigo === 1) {
                Swal.fire('Eliminado', mensaje, 'success');
                buscar();
            } else {
                Swal.fire('Error', 'No se pudo eliminar el mantenimiento', 'error');
            }
        } catch (error) {
            console.error(error);
        }
    }
};

// Event Listeners
formulario.addEventListener('submit', guardar);
btnCancelar.addEventListener('click', cancelar);
btnModificar.addEventListener('click', modificar);
datatable.on('click', '.modificar', traerDatos);
datatable.on('click', '.eliminar', eliminar);
