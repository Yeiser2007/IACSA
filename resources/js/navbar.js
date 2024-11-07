// Espera a que todo el documento esté listo
document.addEventListener("DOMContentLoaded", function () {
    // Obtener la URL actual
    let currentUrl = window.location.pathname;

    // Comparar las rutas con los IDs del navbar
    if (currentUrl.includes("index.html")) {
        document.getElementById("nav-home").classList.add("active");
    } else if (currentUrl.includes("/html/Incidencias.html")) {
        document.getElementById("nav-incidencias").classList.add("active");
    } else if (currentUrl.includes("/html/Altas-usuarios.html")) {
        document.getElementById("nav-usuarios").classList.add("active");
    } else if (currentUrl.includes("/html/Altas-Empleados.html")) {
        document.getElementById("nav-empleados").classList.add("active");
    } else if (currentUrl.includes("Nominas.html")) {
        document.getElementById("nav-nominas").classList.add("active");
    } else if (currentUrl.includes("Reportes.html")) {
        document.getElementById("nav-reportes").classList.add("active");
    }
});
