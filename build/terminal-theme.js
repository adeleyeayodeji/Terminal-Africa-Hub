(()=>{var e={588:()=>{jQuery(document).ready((function(e){e(".terminal-faq-header").each((function(n,t){e(this).click((function(n){n.preventDefault();let t=e(this).parent();e(".terminal-faq-body").each((function(n,t){e(this).prev().find("img").attr("src",((e,n)=>n.replace("accordion-close.svg","accordion-open.svg"))),e(this).slideUp()})),t.find(".terminal-faq-body").slideDown(),e(this).find("img").attr("src",((e,n)=>n.replace("accordion-open.svg","accordion-close.svg")))}))})),e("#terminal-submit-contact").submit((function(n){n.preventDefault();var t=e(this),a=t.find("input[name='name']").val(),r=t.find("input[name='email']").val(),i=t.find("textarea[name='message']").val();e.ajax({type:"POST",url:terminal_africa_hub.ajax_url,data:{name:a,email:r,message:i,nonce:terminal_africa_hub.nonce,action:"terminal_hub_contact_form"},dataType:"json",beforeSend:function(){t.block({message:null,overlayCSS:{background:"#fff",opacity:.6}})},success:function(e){t.unblock(),console.log(e),e.success?(t.find(".terminal-form-message").html(`<div class="alert alert-success">${e.data.message}</div>`).show(),t[0].reset()):t.find(".terminal-form-message").html(`<div class="alert alert-danger">${e.data.message}</div>`).show()},error:function(e){t.unblock(),t.find(".terminal-form-message").html('<div class="alert alert-danger">An error occurred, please try again later</div>').show()}})})),e(".terminal-mobile-menu-content-trigger").click((function(n){n.preventDefault(),e(".terminal-mobile-menu-content").fadeToggle()})),e(window).resize((function(){e(window).width()>1200&&e(".terminal-mobile-menu-content").hide()})),e(window).scroll((function(){e(".terminal-mobile-menu-content").hide()})),setInterval((()=>{e(".t-hub-menu-ul").find(".customize-partial-edit-shortcut").hide()}),100)}))}},n={};function t(a){var r=n[a];if(void 0!==r)return r.exports;var i=n[a]={exports:{}};return e[a](i,i.exports,t),i.exports}t.n=e=>{var n=e&&e.__esModule?()=>e.default:()=>e;return t.d(n,{a:n}),n},t.d=(e,n)=>{for(var a in n)t.o(n,a)&&!t.o(e,a)&&Object.defineProperty(e,a,{enumerable:!0,get:n[a]})},t.o=(e,n)=>Object.prototype.hasOwnProperty.call(e,n),(()=>{"use strict";t(588)})()})();