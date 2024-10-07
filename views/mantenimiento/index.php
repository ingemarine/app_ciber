<div class="row justify-content-center text-center mt-5">
    <form id="formMantenimiento" class="border bg-light shadow rounded p-4 col-lg-6">
        <h1 class="text-center">Registro de Mantenimientos</h1>
        <input type="hidden" name="id_mant" id="id_mant">
        <div class="row mb-3">
            <div class="col">
                <label for="nombre_dep">Dependencia</label>
                <select class="form-select" name="nombre_dep" id="nombre_dep" class="form-control" required>
                    <option selected>Seleccione...</option>
                    <!-- Aquí se cargan las dependencias desde la base de datos -->
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="num_op">Número de Operaciones</label>
                <input type="number" name="num_op" id="num_op" class="form-control" required>
            </div>
            <div class="col">
                <label for="num_compu">Número de Computadoras</label>
                <input type="number" name="num_compu" id="num_compu" class="form-control" required>
            </div>
            <div class="col">
                <label for="num_antivirus">Número de Antivirus</label>
                <input type="number" name="num_antivirus" id="num_antivirus" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3 justify-content-center text-center">
            <div class="col-lg-5">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col-lg-5">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<div class="row justify-content-center mt-5">
    <div class="col table-responsive col-lg-11 table-wrapper border shadow bg-light rounded">
        <table class="table table-bordered table-hover w-100 text-center shadow" id="tablaMantenimiento"></table>
    </div>
</div>

<script src="<?= asset('./build/js/mantenimiento/index.js') ?>"></script>
