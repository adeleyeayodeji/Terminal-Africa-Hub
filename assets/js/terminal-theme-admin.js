/**
 * Terminal Africa Hub Admin Script
 *
 */

//global variables

var terminal_hub_config = {
  //footer logo
  footer_logo: `
        <div>
          <img src="${terminal_africa_hub_admin.asset_url}img/logo-footer.png" style="height: 30px;" alt="Terminal Africa">
        </div>
      `
};

jQuery(document).ready(function ($) {
  /**
   * On click import-demo-1
   *
   */
  $(".import-demo-content").each(function (index, element) {
    $(element).click(function (e) {
      e.preventDefault();
      //get data title
      var title = $(this).data("title");
      //get data id
      var demo_id = $(this).data("id");
      //Swal confirm
      Swal.fire({
        title: "Are you sure?",
        text: `You are about to import ${title}. This will overwrite all your current content.`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(246 146 32)",
        cancelButtonColor: "rgb(0 0 0)",
        footer: terminal_hub_config.footer_logo,
        confirmButtonText: "Yes, import it!"
      }).then((result) => {
        if (result.isConfirmed) {
          //Ajax request
          $.ajax({
            url: terminal_africa_hub_admin.ajax_url,
            type: "post",
            data: {
              action: "terminal_import_demo",
              demo_id: demo_id,
              nonce: terminal_africa_hub_admin.nonce
            },
            beforeSend: function () {
              Swal.fire({
                title: "Importing Demo Content",
                text: "Please wait...",
                icon: "info",
                footer: terminal_hub_config.footer_logo,
                showConfirmButton: false
              });
            },
            success: function (response) {
              //check response success
              if (response.success) {
                Swal.fire({
                  title: "Demo Content Imported",
                  text: "The demo content has been imported successfully.",
                  icon: "success",
                  footer: terminal_hub_config.footer_logo,
                  confirmButtonColor: "rgb(246 146 32)",
                  cancelButtonColor: "rgb(0 0 0)"
                }).then((result) => {
                  if (result.isConfirmed) {
                    location.reload();
                  }
                });
              } else {
                Swal.fire({
                  title: "Error",
                  text: response.data.message,
                  icon: "error",
                  footer: terminal_hub_config.footer_logo,
                  confirmButtonColor: "rgb(246 146 32)",
                  cancelButtonColor: "rgb(0 0 0)"
                });
              }
            },
            error: function (error) {
              Swal.fire({
                title: "Error",
                text: "An error occurred while importing the demo content.",
                icon: "error",
                footer: terminal_hub_config.footer_logo,
                confirmButtonColor: "rgb(246 146 32)",
                cancelButtonColor: "rgb(0 0 0)"
              });
            }
          });
        }
      });
    });
  });
});
