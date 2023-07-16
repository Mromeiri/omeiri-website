document.addEventListener('DOMContentLoaded', function() {
const urlParams = new URLSearchParams(window.location.search);

        const alertParam = urlParams.get('alert');
 if (alertParam === 'Wrong password') {
  var Probleme = document.getElementsByTagName('header')[0];
  Probleme.innerHTML='Wrong password';
  Probleme.style.color = "rgba(255, 0, 0, 0.6)";
         

        }
        if (alertParam === 'Username exist') {
          var Probleme = document.getElementsByTagName('header')[1];
          Probleme.innerHTML='Username exist';
          Probleme.style.color = "rgba(255, 0, 0, 0.6)";
                 
        
                }
      
      
      
      });