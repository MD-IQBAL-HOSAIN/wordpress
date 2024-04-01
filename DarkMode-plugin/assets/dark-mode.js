/* dark-mode.js */

/* function toggleDarkMode() {
    var body = document.querySelector('body');
    body.classList.toggle('dark-mode');
    // অন্যান্য ডার্ক মোড লজিক যোগ করুন
}
 */

//.............

/* dark-mode.js */

function toggleDarkMode() {
    var body = document.querySelector('body');
    var darkModeBtn = document.querySelector('#darkModeBtn');
    
    body.classList.toggle('dark-mode');
    
    // যদি ডার্ক মোড অন হয়, তাহলে টেক্সট বাটন চেঞ্জ করুন
    if (body.classList.contains('dark-mode')) {
        darkModeBtn.textContent = 'Light Mode';
    } else {
        // অন্যথায়, লাইট মোড চেঞ্জ করুন
        darkModeBtn.textContent = 'Dark Mode';
    }
}
