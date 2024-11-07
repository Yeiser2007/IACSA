document.getElementById("buscador").addEventListener("keyup", function () {
    const filter = this.value.toLowerCase();
    const tableRows = document.querySelectorAll(".table tbody tr");

    tableRows.forEach((row) => {
      const rowText = row.textContent.toLowerCase();
      row.style.display = rowText.includes(filter) ? "" : "none";
    });
  });