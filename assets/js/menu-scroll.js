/**
 * Появление фиксированного заголовка при прокрутке
 * 
 * При прокрутке страницы больше чем на 100px, элемент с id="sliding-header"
 * получает класс "visible", благодаря которому он может, например, фиксироваться или анимированно появляться.
 * При прокрутке обратно вверх (меньше 100px) класс удаляется.
 * 
 * Используется флаг isVisible, чтобы избежать лишних изменений DOM.
 */

document.addEventListener('scroll', function () {
  var sliderHeader = document.getElementById('sliding-header');

  var prokrutka = window.pageYOffset;
  if (window.screen.width >= 992) {
    if (prokrutka > 300) {
      sliderHeader.style.top = '0px';
      sliderHeader.style.opacity = '1';
    } else if (prokrutka <= 300) {
      sliderHeader.style.top = '-100px';
      sliderHeader.style.opacity = '0';
    }
  }
});

/* Parallax home section */
$(window).scroll(function(e){
	var scrolled = $(window).scrollTop();
	$('.parallax-home-section').css('top',(-(scrolled*.35) )+'px'); // 35 - скорость прокрутки
});
/* End parallax home section */