<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Persona</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- CSS only -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
        />
        <!-- JavaScript Bundle with Popper -->
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"
        ></script>

        <style>
            form > input {
                margin-bottom: 0.7em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center p-5">
                <div class="col-sm-6">
                    <h5>Formulario</h5>
                    <hr />
                    <form id="mainForm">
                        <input type="hidden" id="id" />
                        <label for="pnombre">
                            <span style="color: red">*</span>
                            Primer Nombre
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="pnombre"
                            placeholder="Primer Nombre"
                            autofocus
                            required
                        />
                        <label for="snombre">Segundo Nombre</label>
                        <input
                            type="text"
                            class="form-control"
                            id="snombre"
                            placeholder="Segundo Nombre"
                        />
                        <label for="appaterno">
                            <span style="color: red">*</span>
                            Apellido Paterno
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="appaterno"
                            placeholder="Apellido Paterno"
                            required
                        />
                        <label for="apmaterno">Apellido Materno</label>
                        <input
                            type="text"
                            class="form-control"
                            id="apmaterno"
                            placeholder="Primer Nombre"
                        />
                        <label for="email">
                            <span style="color: red">*</span>
                            Email
                        </label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="email@email.com"
                            required
                        />
                        <label for="edad">
                            <span style="color: red">*</span>
                            Edad
                        </label>
                        <input
                            type="number"
                            class="form-control"
                            id="edad"
                            placeholder="18"
                            min="18"
                            max="99"
                            required
                        />
                        <br />
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Cancelar
                            </button>
                        </div>
                    </form>
                    <br />
                </div>
                <h5>Listado</h5>
                <hr />
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Edad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
        <script src="./assets/js/index.js"></script>
    </body>
</html>
