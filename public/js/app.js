
// import Alpine from 'alpinejs';

// window.Alpine = Alpine;
// Alpine.start();

function isBottomOfElementOutOfViewport(element) {
  const rect = element.getBoundingClientRect();
  return rect.bottom < 0 || rect.bottom > (window.innerHeight || document.documentElement.clientHeight);
}

function resetAnimation(element) {
  const originalAnimation = element.style.animation;
  element.style.animation = 'none';
  void element.offsetWidth; // Forcer le reflow
  element.style.animation = originalAnimation;
}

document.addEventListener('DOMContentLoaded', function() {
  // Récupérer tous les boutons avec la classe 'particles-button'
  const buttons = document.querySelectorAll('.particles-button');
  
  buttons.forEach(function(button) {
    button.addEventListener('click', function() {
      // Options d'animation pour les particules
      const particlesOptions = {
        type: 'circle',
        duration: 1000,
        easing: 'easeOutQuart',
        size: 6,
        speed: 1,
        color: '#000',
        particlesAmountCoefficient: 8,
        oscillationCoefficient: 20
      };
      
      // Création de l'effet de particules lorsqu'on clique sur le bouton
      new Particles(button, particlesOptions);
    });
  });

  // Récupérer tous les éléments avec la classe 'scroll-animation'
  const scrollAnimations = document.querySelectorAll('.scroll-animation');

  // Fonction pour vérifier si un élément est à mi-chemin de l'écran et déclencher l'animation
  const checkScroll = () => {
    const triggerMiddle = window.innerHeight / 2;

    scrollAnimations.forEach(element => {
      const boxTop = element.getBoundingClientRect().top;
      const boxHeight = element.getBoundingClientRect().height;
      const boxMiddle = boxTop + boxHeight / 2;

      if (boxMiddle < triggerMiddle) {
          element.classList.add('animate');
      } else {
          element.classList.remove('animate');
      }
    });
  };

  // Appeler la fonction checkScroll chaque fois que l'utilisateur fait défiler la page
  window.addEventListener('scroll', checkScroll);
  // Appeler la fonction checkScroll dès le chargement de la page
  checkScroll();

  // Ajouter l'effet de particules sur le bouton "Inscription"
  const registerButton = document.getElementById('textblack2');
  
  if (registerButton) {
    registerButton.addEventListener('click', function() {
      // Options d'animation pour les particules
      const particlesOptions = {
        type: 'circle',
        duration: 1000,
        easing: 'easeOutQuart',
        size: 6,
        speed: 1,
        color: '#000',
        particlesAmountCoefficient: 8,
        oscillationCoefficient: 20
      };
      
      // Création de l'effet de particules lorsqu'on clique sur le bouton
      new Particles(registerButton, particlesOptions);
    });
  }

  // Récupérer l'élément avec l'id 'hero-text'
  const heroText = document.getElementById('hero-text');

  // Appeler la fonction resetAnimation chaque fois que l'utilisateur fait défiler la page
  window.addEventListener('scroll', function() {
    // Vérifie si le bas de l'élément 'hero-text' est hors du viewport
    if (isBottomOfElementOutOfViewport(heroText)) {
      // Si oui, réinitialise l'animation
      resetAnimation(heroText);
    }
  });

  const control = document.getElementById("direction-toggle");
  const marquees = document.querySelectorAll(".marquee");
  const wrapper = document.querySelector(".wrapper");

  control.addEventListener("click", () => {
    control.classList.toggle("toggle--vertical");
    wrapper.classList.toggle("wrapper--vertical");
    [...marquees].forEach((marquee) =>
      marquee.classList.toggle("marquee--vertical")
    );
  });

  // Création de l'embed Twitch
  var embed = new Twitch.Embed("twitch-embed", {
    width: 854,
    height: 480,
    channel: "{{ $streamer_principal->username }}",  // This will be updated from the server side
    autoplay: false
  });
});

$(document).ready(function() {
  $('.show-more').click(function() {
      $(this).toggleClass('expanded');
      $('.hidden-text').toggleClass('expanded');
      if ($(this).hasClass('expanded')) {
          $(this).text('Afficher moins');
      } else {
          $(this).text('Afficher plus');
      }
  });
});