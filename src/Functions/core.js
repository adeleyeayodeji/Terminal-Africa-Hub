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
   * terminal-form-fields
   *
   */
  $("#terminal-submit-contact").submit(function (e) {
    e.preventDefault();
    //get the form
    var form = $(this);
    //get name, email and message
    var name = form.find("input[name='name']").val();
    var email = form.find("input[name='email']").val();
    var message = form.find("textarea[name='message']").val();
    var contact_mail = form.find("input[name='contact_mail']").val();
    //ajax
    $.ajax({
      type: "POST",
      url: terminal_africa_hub.ajax_url,
      data: {
        name,
        email,
        message,
        contact_mail,
        nonce: terminal_africa_hub.nonce,
        action: "terminal_hub_contact_form"
      },
      dataType: "json",
      beforeSend: function () {
        //block the form
        form.block({
          message: null,
          overlayCSS: {
            background: "#fff",
            opacity: 0.6
          }
        });
      },
      success: function (response) {
        //unblock the form
        form.unblock();
        console.log(response);
        //show the message
        if (response.success) {
          //show success message
          form
            .find(".terminal-form-message")
            .html(
              `<div class="alert alert-success">${response.data.message}</div>`
            )
            .show();
          //clear the form
          form[0].reset();
        } else {
          //show error message
          form
            .find(".terminal-form-message")
            .html(
              `<div class="alert alert-danger">${response.data.message}</div>`
            )
            .show();
        }
      },
      error: function (response) {
        //unblock the form
        form.unblock();
        //show error message
        form
          .find(".terminal-form-message")
          .html(
            `<div class="alert alert-danger">An error occurred, please try again later</div>`
          )
          .show();
      }
    });
  });

  /**
   * terminal-mobile-menu-content-trigger
   *
   */
  $(".terminal-mobile-menu-content-trigger").click(function (e) {
    e.preventDefault();
    //toggle fade in and out on .terminal-mobile-menu-content
    $(".terminal-mobile-menu-content").toggle();
  });

  /**
   * Listen for .terminal-mobile-menu-content dropdown
   *
   */
  setInterval(() => {
    //check if .terminal-mobile-menu-content display is block
    if ($(".terminal-mobile-menu-content").css("display") === "block") {
      //get the src
      var src = $(".terminal-mobile-menu-content-trigger")
        .find("img")
        .attr("data-close-menu-icon");
      //change the src
      $(".terminal-mobile-menu-content-trigger").find("img").attr("src", src);
    } else {
      //get the src
      var src = $(".terminal-mobile-menu-content-trigger")
        .find("img")
        .attr("data-open-menu-icon");
      //change the src
      $(".terminal-mobile-menu-content-trigger").find("img").attr("src", src);
    }
  }, 50);

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

  /**
   * Get all links with text ['Get Quotes', 'Book Shipment', 'Track Shipment']
   *
   */
  var linkTexts = ["Get Quotes", "Book Shipment", "Track Shipment"];
  linkTexts.forEach((linkText) => {
    //get current site url
    var currentSiteUrl = new URL(window.location.href);
    var currentSiteDomain = currentSiteUrl.hostname;
    //check if the url has sub domain
    if (currentSiteDomain.split(".").length > 2) {
      //explode .
      var currentSiteDomain = currentSiteDomain.split(".");
      //remove the first element
      currentSiteDomain.shift();
      //join the elements
      currentSiteDomain = currentSiteDomain.join(".");
    }

    //get all links with text
    var links = $(`a:contains(${linkText})`);
    //switch
    switch (linkText) {
      case "Get Quotes":
        //update the link href
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/quotes`);
        });
        break;
      case "Book Shipment":
        //https://app.thepep.africa/book
        links.each(function (index, element) {
          //parse the href
          $(this).attr(
            "href",
            `https://app.${currentSiteDomain}/shipments/book`
          );
        });
        break;
      case "Track Shipment":
        //https://app.thepep.africa/track
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/track`);
        });
        break;
      case "Track Package":
        //https://app.thepep.africa/track
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/track`);
        });
        break;
    }
  });

  /**
   * .terminal-hub-ivato-faqs--right--items
   *
   */
  $(".terminal-hub-ivato-faqs--right--items--item--question").each(
    function (index, element) {
      $(this).click(function (e) {
        e.preventDefault();
        //close all .terminal-hub-ivato-faqs--right--items--item--answer
        $(".terminal-hub-ivato-faqs--right--items--item--answer").each(
          function (index, element) {
            $(this).slideUp();
          }
        );
        //get all .terminal-hub-ivato-faqs--right--items--item--question
        $(".terminal-hub-ivato-faqs--right--items--item--question").each(
          function (index, element) {
            $(this).find("img").removeClass("rotate");
          }
        );
        //get the parent
        let parentDiv = $(this).parent();
        //toggle the .terminal-hub-ivato-faqs--right--items--item--answer
        parentDiv
          .find(".terminal-hub-ivato-faqs--right--items--item--answer")
          .slideToggle();
        //toggle the img
        $(this).find("img").toggleClass("rotate");
      });
    }
  );
});
