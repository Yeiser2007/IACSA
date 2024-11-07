function generatePayroll() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    if (!startDate || !endDate) {
        alert('Por favor, selecciona un rango de fechas.');
        return;
    }
    console.log(`Generando nómina desde ${startDate} hasta ${endDate}`);
}
