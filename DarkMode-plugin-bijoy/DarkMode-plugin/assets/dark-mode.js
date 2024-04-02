/* dark-mode.js */

function toggleDarkMode() {
    var body = document.querySelector('body');
    var darkModeBtn = document.querySelector('#darkModeBtn');
    
    body.classList.toggle('dark-mode');
    
    // Check if dark mode is enabled
    var isDarkModeEnabled = body.classList.contains('dark-mode');

    // Update button text based on dark mode status
    if (isDarkModeEnabled) {
        darkModeBtn.textContent = 'Light Mode';
    } else {
        darkModeBtn.textContent = 'Dark Mode';
        // Remove dark mode class when switching to light mode
        body.classList.remove('dark-mode');
    }
}
