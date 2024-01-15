document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.dropdown-button');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const menu = this.nextElementSibling; // Get the next sibling element, which is the dropdown menu

            // Close all other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                if (otherMenu !== menu) {
                    otherMenu.classList.add('hidden');
                }
            });
            menu.classList.toggle('hidden');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.dropdown-button')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
});