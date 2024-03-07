jQuery(document).ready(function ($) {
  $(".terminal-faq-header").each(function (index, element) {
    $(this).click(function (e) {
      e.preventDefault();
      //get the parent
      let parentDiv = $(this).parent();
      //close all open terminal-faq-body
      $(".terminal-faq-body").each(function (index, element) {
        //get the prev element
        let prevElement = $(this).prev();
        //replace img src from accordion-close.svg to accordion-open.svg
        prevElement.find("img").attr("src", (i, val) => {
          return val.replace("accordion-close.svg", "accordion-open.svg");
        });

        //slide up
        $(this).slideUp();
      });
      //find .terminal-faq-body and slide down
      parentDiv.find(".terminal-faq-body").slideDown();
      //replace img src from accordion-open.svg to accordion-close.svg
      $(this)
        .find("img")
        .attr("src", (i, val) => {
          return val.replace("accordion-open.svg", "accordion-close.svg");
        });
    });
  });

  /**
   * terminal-mobile-menu-content-trigger
   *
   */
  $(".terminal-mobile-menu-content-trigger").click(function (e) {
    e.preventDefault();
    //toggle fade in and out on .terminal-mobile-menu-content
    $(".terminal-mobile-menu-content").fadeToggle();
  });

  //check if current with is above 1200px then hide the mobile menu content
  $(window).resize(function () {
    if ($(window).width() > 1200) {
      $(".terminal-mobile-menu-content").hide();
    }
  });

  //check if user scroll then hide the mobile menu content
  $(window).scroll(function () {
    $(".terminal-mobile-menu-content").hide();
  });

  //hide all .customize-partial-edit-shortcut under .t-hub-menu-ul
  setInterval(() => {
    //ul
    var ul_terminal_menu = $(".t-hub-menu-ul");
    //hide all .customize-partial-edit-shortcut
    ul_terminal_menu.find(".customize-partial-edit-shortcut").hide();
  }, 100);
});
