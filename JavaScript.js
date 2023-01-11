$(document).ready(function() {
  // Configurer la carrousel d'images
  $("#carrousel").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>'
  });
  
  // Appliquer la classe CSS pour changer la couleur de fond de l'élément lorsque la souris passe dessus
  $('#musique li').mouseover(function() {
    $(this).addClass('hover');
  }).mouseout(function() {
    $(this).removeClass('hover');
  });
  //Ajouter un écouteur d'événement pour acheter album
  $('#musique a.acheter').click(function(event) {
    event.preventDefault();
    alert('Votre achat a été enregistré !');
  });

    // Ajouter un écouteur d'événement pour le bouton de mode sombre
    $('#dark-mode-button').click(function() {
      if ( $('body').hasClass('dark-mode')) {
        $('body').removeClass('dark-mode');
        $('body').removeClass('dark-mode-background');
        $(this).text('Activer le mode sombre');
      } else {
        $('body').addClass('dark-mode');
        $('body').addClass('dark-mode-background');
        $(this).text('Désactiver le mode sombre');
      }
    });
    // Ajouter un écouteur d'événement pour soumettre le formulaire de contact
    $('form').submit(function(event) {
      event.preventDefault();
      // Récupérer les données du formulaire
      const formData = $(this).serialize();
      // Envoyer les données du formulaire via AJAX
      $.ajax({
        type: 'POST',
        url: 'mail.php',
        data: formData,
        success: function() {
          // Afficher un message de confirmation lorsque le formulaire est soumis avec succès
          alert('Votre message a été envoyé !');
        }
      });
    });
  });
  