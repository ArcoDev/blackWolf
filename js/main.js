/*============================================
VAnimacion del menu movil
============================================*/
addEventListener("DOMContentLoaded", () => {
    const menMov = document.getElementById("menMov");
    if (menMov) {
        menMov.addEventListener("click", () => {
            const link = document.getElementById("enlaces");
            link.classList.toggle("show");
        });
    }
});

function remover() {
    const link = document.getElementById("enlaces");
    link.classList.remove("show");
}

/* Agregar clase active a los enlaces */
addEventListener("DOMContentLoaded", () => {
    let ul = document.querySelector("ul");
    let a = document.querySelectorAll("a");
    a.forEach(lista => {
        lista.addEventListener("click", function() {
            ul.querySelector(".active").classList.remove("active");
            lista.classList.add("active");
        });
    });
});
/*============================================
Filtro por categorias en la pagina de 
catalogo.php
============================================*/
function filtroCategorias() {
    const seleccionarCat = document.getElementById("seleccionarCat");
    const opcionesCat = seleccionarCat.value;
    const anillos = document.getElementById("anillos");
    const brasaletes = document.getElementById("brasaletes");
    const collares = document.getElementById("collares");
    const txtAnillos = document.getElementById("txtAnillos");
    const txtBrasaletes = document.getElementById("txtBrasaletes");
    const txtCollares = document.getElementById("txtCollares");


    if (opcionesCat === "todos") {
        anillos.style.display = "block";
        brasaletes.style.display = "block";
        collares.style.display = "block";
        txtAnillos.style.display = "block";
        txtBrasaletes.style.display = "block";
        txtCollares.style.display = "block";
        t
    } else if (opcionesCat === "anillos") {
        anillos.style.display = "block";
        brasaletes.style.display = "none";
        collares.style.display = "none";
        txtAnillos.style.display = "block";
        txtBrasaletes.style.display = "none";
        txtCollares.style.display = "none";

    } else if (opcionesCat === "brasaletes") {
        brasaletes.style.display = "block";
        anillos.style.display = "none";
        collares.style.display = "none";
        txtAnillos.style.display = "none";
        txtBrasaletes.style.display = "block";
        txtCollares.style.display = "none";

    } else if (opcionesCat === "collares") {
        collares.style.display = "block";
        anillos.style.display = "none";
        brasaletes.style.display = "none";
        txtAnillos.style.display = "none";
        txtBrasaletes.style.display = "none";
        txtCollares.style.display = "block";

    }
}

function cambiarImg(idImg) {
    if (idImg === 1) {
        alert("Soy la 1");
    } else if (idImg === 2) {
        alert("soy la 2");
    }
}