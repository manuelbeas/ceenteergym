
  function mover_foto_1()
  {
    $('#foto_1').addClass('animated bounceOutLeft');
    $('#title_2').text('');
    $('#subtitle_3').text('');
    $('#circle_1').attr('style', 'color: #FBBA42');
    $('#circle_2').attr('style', 'color: #212529');
    $('#circle_3').attr('style', 'color: #212529');
    $('#circle_4').attr('style', 'color: #212529');
    $('#circle_5').attr('style', 'color: #212529');

    var delay = 500;
    setTimeout(function() {
      $('#foto_1').attr('src', 'icons/cardio4.png');
      $('#foto_1').removeClass('animated bounceOutLeft');
      $('#back_1').removeClass('program_training_2');
      $('#back_1').removeClass('program_training_3');
      $('#back_1').removeClass('program_training_4');
      $('#back_1').removeClass('program_training_5');
      $('#back_1').addClass('program_training_1');
      $('#title_2').text('Cardio Trining');
      $('#subtitle_3').text('Duis aute irure dolor in reprehenderit');
      $('#foto_1').addClass('animated bounceInRight');
    }, delay);
  }


  function mover_foto_2()
  {
    $('#foto_1').addClass('animated bounceOutLeft');
    $('#title_2').text('');
    $('#subtitle_3').text('');
    $('#circle_1').attr('style', 'color: #212529');
    $('#circle_2').attr('style', 'color: #FBBA42');
    $('#circle_3').attr('style', 'color: #212529');
    $('#circle_4').attr('style', 'color: #212529');
    $('#circle_5').attr('style', 'color: #212529');

    var delay = 500;
    setTimeout(function() {
      $('#foto_1').attr('src', 'icons/body.png');
      $('#foto_1').removeClass('animated bounceOutLeft');
      $('#back_1').removeClass('program_training_1');
      $('#back_1').removeClass('program_training_3');
      $('#back_1').removeClass('program_training_4');
      $('#back_1').removeClass('program_training_5');
      $('#back_1').addClass('program_training_2');
      $('#title_2').text('Entrenamiento muscular');
      $('#subtitle_3').text('Lorem ipsum dolor sit a met.');
      $('#foto_1').addClass('animated bounceInRight');
    }, delay);
  }

  function mover_foto_3()
  {
    $('#foto_1').addClass('animated bounceOutLeft');
    $('#title_2').text('');
    $('#subtitle_3').text('');
    $('#circle_1').attr('style', 'color: #212529');
    $('#circle_2').attr('style', 'color: #212529');
    $('#circle_3').attr('style', 'color: #FBBA42');
    $('#circle_4').attr('style', 'color: #212529');
    $('#circle_5').attr('style', 'color: #212529');

    var delay = 500;
    setTimeout(function() {
      $('#foto_1').attr('src', 'icons/bodyfemale.png');
      $('#foto_1').removeClass('animated bounceOutLeft');
      $('#back_1').removeClass('program_training_1');
      $('#back_1').removeClass('program_training_2');
      $('#back_1').removeClass('program_training_4');
      $('#back_1').removeClass('program_training_5');
      $('#back_1').addClass('program_training_3');
      $('#title_2').text('Entrenamiento Funcional');
      $('#subtitle_3').text('Sed do eiusmod tempor incididunt ut labore et dolore');
      $('#foto_1').addClass('animated bounceInRight');
    }, delay);
  }

  function mover_foto_4()
  {
    $('#foto_1').addClass('animated bounceOutLeft');
    $('#title_2').text('');
    $('#subtitle_3').text('');
    $('#circle_1').attr('style', 'color: #212529');
    $('#circle_2').attr('style', 'color: #212529');
    $('#circle_3').attr('style', 'color: #212529');
    $('#circle_4').attr('style', 'color: #FBBA42');
    $('#circle_5').attr('style', 'color: #212529');

    var delay = 500;
    setTimeout(function() {
      $('#foto_1').attr('src', 'icons/ballet.png');
      $('#foto_1').removeClass('animated bounceOutLeft');
      $('#back_1').removeClass('program_training_1');
      $('#back_1').removeClass('program_training_2');
      $('#back_1').removeClass('program_training_3');
      $('#back_1').removeClass('program_training_5');
      $('#back_1').addClass('program_training_4');
      $('#title_2').text('Clases de danza');
      $('#subtitle_3').text('Ullamco laboris nisi ut aliquip ex ea commodo consequat.');
      $('#foto_1').addClass('animated bounceInRight');
    }, delay);
  }

  function mover_foto_5()
  {
    $('#foto_1').addClass('animated bounceOutLeft');
    $('#title_2').text('');
    $('#subtitle_3').text('');
    $('#circle_1').attr('style', 'color: #212529');
    $('#circle_2').attr('style', 'color: #212529');
    $('#circle_3').attr('style', 'color: #212529');
    $('#circle_4').attr('style', 'color: #212529');
    $('#circle_5').attr('style', 'color: #FBBA42');

    var delay = 500;
    setTimeout(function() {
      $('#foto_1').attr('src', 'icons/cardio2.png');
      $('#foto_1').removeClass('animated bounceOutLeft');
      $('#back_1').removeClass('program_training_1');
      $('#back_1').removeClass('program_training_2');
      $('#back_1').removeClass('program_training_3');
      $('#back_1').removeClass('program_training_4');
      $('#back_1').addClass('program_training_5');
      $('#title_2').text('Ejercicios de alto impacto');
      $('#subtitle_3').text('Excepteur sint occaecat cupidatat non proident, sunt in');
      $('#foto_1').addClass('animated bounceInRight');
    }, delay);
  }

  function loop(){
    setTimeout(function() {
      mover_foto_1();
    }, 0000);
    setTimeout(function() {
      mover_foto_2();
    }, 5000);
    setTimeout(function() {
      mover_foto_3();
    }, 10000);
    setTimeout(function() {
      mover_foto_4();
    }, 15000);
    setTimeout(function() {
      mover_foto_5();
    }, 20000);
    setTimeout(function() {
      loop()
    }, 25000);
  }
  $( document ).ready(function() {
    loop();
  });
