// resources/js/datepicker.js

import Datepicker from 'flowbite-datepicker/Datepicker';

document.addEventListener('DOMContentLoaded', function () {
    // Initialize datepicker for existing elements
    initializeDatepicker();

    // Use MutationObserver to detect changes in the DOM
    const observer = new MutationObserver(function (mutationsList, observer) {
        for (const mutation of mutationsList) {
            if (mutation.type === 'childList') {
                // New nodes have been added, initialize datepicker for each new element
                mutation.addedNodes.forEach(function (node) {
                    if (node instanceof HTMLElement) {
                        initializeDatepicker(node);
                    }
                });
            }
        }
    });

    // Start observing changes in the entire document
    observer.observe(document.documentElement, { childList: true, subtree: true });

    function initializeDatepicker(container) {
        container = container || document;

        // Find all input elements with the 'datepicker' class within the specified container
        const datepickerInputs = container.querySelectorAll('input.datepicker');

        // Loop through each element and initialize datepicker
        datepickerInputs.forEach(function (datepickerEl) {
            // Get the dynamic ID from the data-id attribute
            const dynamicId = datepickerEl.getAttribute('data-id');

            // Check if dynamicId is not null or undefined
            if (dynamicId) {
                // Construct the full ID by appending the dynamic ID to 'datepicker_'
                const fullId = dynamicId;

                // Check if the element with the generated ID exists
                const targetElement = document.getElementById(fullId);

                if (targetElement) {
                    // Initialize Datepicker for the specific element
                    new Datepicker(targetElement, {
                        // options
                    });
                } else {
                    console.error('Element with dynamic ID not found:', fullId);
                }
            } else {
                console.error('Dynamic ID is null or undefined.');
            }
        });
    }
});
