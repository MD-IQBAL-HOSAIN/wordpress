/* time-plugin.js */
/* function updateTime() {
    var now = new Date();
    var timeString = now.toLocaleTimeString();
    document.getElementById('time-display').innerText = timeString;
}

setInterval(updateTime, 1000); */

/* time-plugin.js */
function updateTime() {
    const now = new Date();
    let hours = now.getHours();
    const minutes = now.getMinutes();
    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12;
    const formattedHours = hours < 10 ? '0' + hours : hours;
    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
    const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;
    document.getElementById('time-display').innerText = timeString;
}

updateTime(); // Update time when the plugin loads
setInterval(updateTime, 1000); // Update time every second
