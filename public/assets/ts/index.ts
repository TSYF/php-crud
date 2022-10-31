const app = {
    tbody: document.getElementById("tbody"),
    id: document.getElementById("id"),
    pnombre: document.getElementById("pnombre"),
    snombre: document.getElementById("snombre"),
    appaterno: document.getElementById("appaterno"),
    apmaterno: document.getElementById("apmaterno"),
    email: document.getElementById("email"),
    edad: document.getElementById("edad"),
    async listar() {
        try {
            const data = await fetch(
                "http://localhost:4000/controllers/listar.php",
                {
                    method: "GET",
                }
            ).then((res) => res.json());

            this.tbody.innerHTML = "";

            data.forEach((item) => {
                this.tbody.insertAdjacentHTML(
                    "beforeend",
                    /* html */ `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.pnombre} ${item.snombre || ""} ${
                        item.appaterno
                    } ${item.apmaterno || ""}</td>
                                <td>${item.email}</td>
                                <td>${item.edad}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="app.editar(${
                                        item.id
                                    })" >Editar</button>
                                    <button class="btn btn-danger btn-sm" onclick="app.eliminar(${
                                        item.id
                                    })" >Eliminar</button>
                                </td>
                            </tr>
                            `
                );
            });
        } catch (err) {
            console.log(err);
        }
    },
    async crear() {
        const form = new FormData();

        form.append("pnombre", this.pnombre.value);
        form.append("snombre", this.snombre.value);
        form.append("appaterno", this.appaterno.value);
        form.append("apmaterno", this.apmaterno.value);
        form.append("email", this.email.value);
        form.append("edad", this.edad.value);
        form.append("id", this.id.value);

        try {
            const data = await fetch(
                `http://localhost:4000/controllers/${
                    !!this.id.value ? "actualizar" : "crear"
                }.php`,
                {
                    method: "POST",
                    body: form,
                }
            ).then((res) => res.json());

            console.log(data);
            this.listar();
            this.limpiar();
        } catch (err) {
            console.error(err);
        }
    },
    async editar(id: number) {
        const form = new FormData();
        form.append("id", `${id}`);

        try {
            const { id, pnombre, snombre, appaterno, apmaterno, email, edad } =
                await fetch("http://localhost:4000/controllers/editar.php", {
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
        } catch (err) {
            console.error(err);
        }
    },
    async eliminar(id: number) {
        try {
            const form = new FormData();
            form.append("id", `${id}`);

            const data = await fetch(
                "http://localhost:4000/controllers/eliminar.php",
                {
                    method: "POST",
                    body: form,
                }
            ).then((res) => res.json());

            console.log(data);
            this.listar();
        } catch (err) {
            console.error(err);
        }
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

document.addEventListener("DOMContentLoaded", (e: Event) => {
    app.listar();
});

const mainForm = document.getElementById("mainForm") as HTMLFormElement;

mainForm.addEventListener("submit", (e: Event) => {
    e.preventDefault();
    app.crear();
});
