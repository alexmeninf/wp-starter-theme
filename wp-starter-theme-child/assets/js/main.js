jQuery(function ($) {
  
  // $("input[type=tel], .mask-phone").on("keyup", function () {
  //   if ($(this).val().length >= 15) {
  //     $(this).mask("(00) 0 0000-0000");
  //   } else {
  //     $(this).mask("(00) 0000-00009");
  //   }
  // })
  // .trigger("keyup");
  
  // // animate
  //$(window).on('load', function() {
    // new WOW().init();
  //});

  smoothClick = (duration = 1200) => {
    // smooth scroll
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
  
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
  
          }, duration);
        }
      }
    });
  }

  drawerMobile = () => {
    let drawer = '.drawer-mobile',
      drawerButton = '.drawerButton',
      drawerClose = '.close-menu',
      drawerClosed = 'drawerClosed',
      drawerOpen = 'drawerOpen',
      listMenu = '.drawer-mobile .wrap',
      submenu = '.submenu',
      iconAnimate = 'rotateIcon';

    function openMenuSwiped() {
      $('body').css('overflow', 'hidden');
      $(drawer).removeClass(drawerClosed);
      $(drawer).addClass(drawerOpen);
      $(listMenu).animate({
        left: '0'
      });
      setTimeout(() => {
        $(drawerClose).addClass('open');
      }, 200);
    }

    function closeMenuSwiped() {
      $('body').css('overflow', '');
      $(drawerClose).removeClass('open');
      $(listMenu).animate({
        left: '-100%'
      });
      setTimeout(() => {
        $(drawer).addClass(drawerClosed);
        $(drawer).removeClass(drawerOpen);
      }, 600);
    }

    // Open
    $(drawerButton).click(function (e) {
      e.preventDefault();
      openMenuSwiped();
    });

    // close and open submenu
    $(listMenu + " ul > li > a," + drawerClose).click(function () {
      let parentLi = $(this).parent('li');
      let hasSubmenu = $(this).parents('li');

      if (parentLi.find(submenu).length) {
        hasSubmenu.siblings().find(submenu).slideUp();
        parentLi.find('>' + submenu).slideToggle();
        hasSubmenu.siblings().find('> a > i').removeClass(iconAnimate);
        $(this).find('i').toggleClass(iconAnimate);
        return false;

      } else {
        $(listMenu + '> li').find(submenu).slideUp();
        $(listMenu + '> li').find('i').removeClass(iconAnimate);
        closeMenuSwiped();
      }
    });

    document.addEventListener('swiped-right', function (e) {
      openMenuSwiped();
    });

    document.getElementById('drawer').addEventListener('swiped-left', function (e) {
      closeMenuSwiped();
    });
  }

  fixedMenu = () => {
    let fixColor = "new-bg",
      $header = $(".fixed-header");
  
    function checkHeader() {
      if ($(this).scrollTop() > 100) {
        $header.addClass(fixColor + " wow fadeInDown animated");
      } else {
        $header.removeClass(fixColor + " wow fadeInDown animated");
      }
    }
  
    $(window).ready(function () {
      checkHeader();
    });
  
    $(window).scroll(function () {
      checkHeader();
    });
  }

  smoothClick();
  // drawerMobile();
  // fixedMenu();
});
