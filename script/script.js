document.addEventListener('DOMContentLoaded', function() {
const urlParams = new URLSearchParams(window.location.search);
        const alertParam = urlParams.get('alert');
        
        // Display alert if query parameter is present
        if (alertParam === '1') {
            alert('No checkbox checked !');
        }
        if (alertParam === 'choose one') {
            alert('choose one !');
        }
});