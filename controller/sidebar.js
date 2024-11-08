document.addEventListener('DOMContentLoaded', function () {
    // Elementos
    const openSidebarBtn = document.getElementById('openSidebarBtn');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');
    const sidebar = document.getElementById('sidebar');

    // Abre a sidebar
    openSidebarBtn.addEventListener('click', function () {
        sidebar.style.width = '250px';
    });

    // Fecha a sidebar
    closeSidebarBtn.addEventListener('click', function () {
        sidebar.style.width = '0';
    });
});
