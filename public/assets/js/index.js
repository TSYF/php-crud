var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const app = {
    tbody: document.getElementById("tbody"),
    id: document.getElementById("id"),
    pnombre: document.getElementById("pnombre"),
    snombre: document.getElementById("snombre"),
    appaterno: document.getElementById("appaterno"),
    apmaterno: document.getElementById("apmaterno"),
    email: document.getElementById("email"),
    edad: document.getElementById("edad"),
    listar() {
        return __awaiter(this, void 0, void 0, function* () {
            try {
                const data = yield fetch("http://localhost:4000/controllers/listar.php", {
                    method: "GET",
                }).then((res) => res.json());
                this.tbody.innerHTML = "";
                data.forEach((item) => {
                    this.tbody.insertAdjacentHTML("beforeend", 
                    /* html */ `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.pnombre} ${item.snombre || ""} ${item.appaterno} ${item.apmaterno || ""}</td>
                                <td>${item.email}</td>
                                <td>${item.edad}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="app.editar(${item.id})" >Editar</button>
                                    <button class="btn btn-danger btn-sm" onclick="app.eliminar(${item.id})" >Eliminar</button>
                                </td>
                            </tr>
                            `);
                });
            }
            catch (err) {
                console.log(err);
            }
        });
    },
    crear() {
        return __awaiter(this, void 0, void 0, function* () {
            const form = new FormData();
            form.append("pnombre", this.pnombre.value);
            form.append("snombre", this.snombre.value);
            form.append("appaterno", this.appaterno.value);
            form.append("apmaterno", this.apmaterno.value);
            form.append("email", this.email.value);
            form.append("edad", this.edad.value);
            form.append("id", this.id.value);
            try {
                const data = yield fetch(`http://localhost:4000/controllers/${!!this.id.value ? "actualizar" : "crear"}.php`, {
                    method: "POST",
                    body: form,
                }).then((res) => res.json());
                console.log(data);
                this.listar();
                this.limpiar();
            }
            catch (err) {
                console.error(err);
            }
        });
    },
    editar(id) {
        return __awaiter(this, void 0, void 0, function* () {
            const form = new FormData();
            form.append("id", `${id}`);
            try {
                const { id, pnombre, snombre, appaterno, apmaterno, email, edad } = yield fetch("http://localhost:4000/controllers/editar.php", {
                    method: "POST",
                    body: form,
                }).then((res) => res.json());
                this.id.value = id;
                this.pnombre.value = pnombre;
                this.snombre.value = snombre;
                this.appaterno.value = appaterno;
                this.apmaterno.value = apmaterno;
                this.email.value = email;
                this.edad.value = edad;
            }
            catch (err) {
                console.error(err);
            }
        });
    },
    eliminar(id) {
        return __awaiter(this, void 0, void 0, function* () {
            try {
                const form = new FormData();
                form.append("id", `${id}`);
                const data = yield fetch("http://localhost:4000/controllers/eliminar.php", {
                    method: "POST",
                    body: form,
                }).then((res) => res.json());
                console.log(data);
                this.listar();
            }
            catch (err) {
                console.error(err);
            }
        });
    },
    limpiar() {
        this.id.value = "";
        this.pnombre.value = "";
        this.snombre.value = "";
        this.appaterno.value = "";
        this.apmaterno.value = "";
        this.email.value = "";
        this.edad.value = "";
    },
};
document.addEventListener("DOMContentLoaded", (e) => {
    app.listar();
});
const mainForm = document.getElementById("mainForm");
mainForm.addEventListener("submit", (e) => {
    e.preventDefault();
    app.crear();
});
