
document.addEventListener('DOMContentLoaded', function() {
  // Your code here

const urlParams = new URLSearchParams(window.location.search);
        const alertParam = urlParams.get('alert');
 if (alertParam === 'Password or Username unvalid') {
          var Probleme = document.getElementsByTagName('header')[0];
Probleme.innerHTML='Password or Username unvalid';
Probleme.style.color = "rgba(255, 0, 0, 0.6)";
var firstinput = document.getElementsByClassName('input-field')[0];
firstinput.style.background= "rgba(255, 0, 0, 0.6)";
var firstinput = document.getElementsByClassName('input-field')[1];
firstinput.style.background= "rgba(255, 0, 0, 0.6)";
        }
        if (alertParam === 'Username exist') {
          var Probleme = document.getElementsByTagName('header')[1];
          Probleme.innerHTML='Username exist';
          Probleme.style.color = "rgba(255, 0, 0, 0.9)";
          register()


        }
      
      
      
      });