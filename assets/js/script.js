document.addEventListener('DOMContentLoaded', () => {
    console.log('Page loaded successfully.');
});

// Example of triggering a modal or dropdown
function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('show');
}

fetch('/api/trivia.php')
    .then(response => response.json())
    .then(data => console.log(data));
