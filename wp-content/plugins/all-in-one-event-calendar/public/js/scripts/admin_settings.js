timely.define(["jquery_timely","domReady","ai1ec_config","libs/utils","scripts/setting/cache/cache_event_handlers","external_libs/bootstrap/button","libs/collapse_helper","external_libs/bootstrap/tab","external_libs/bootstrap_datepicker","external_libs/bootstrap/tooltip","external_libs/jquery_cookie"],function(e,t,n,r,i){var s=function(){var t=!0;e("#ai1ec-plugins-settings input:text").each(function(){this.value!==""&&(t=!1)}),t===!0&&e("#ai1ec-plugins-settings").remove()},o=function(t){var n=e(this).attr("href");e.cookie("ai1ec_general_settings_active_tab",n)},u=function(){var t=e("#week_view_starts_at"),r=e("#week_view_ends_at"),i=parseInt(t.val(),10),s=parseInt(r.val(),10);if(s<i)return window.alert(n.end_must_be_after_start),r.focus(),!1;var o=s-i;if(o<6)return window.alert(n.show_at_least_six_hours),r.focus(),!1},a=function(){e(".ai1ec-gzip-causes-js-failure").remove()},f=function(){e("#ai1ec_save_settings").on("click",function(t){var r=e("#require_disclaimer").is(":checked"),i=e("#disclaimer").val();!0===r&&""===i&&(alert(n.require_desclaimer),e('#ai1ec-general-settings ul.ai1ec-nav a[href="#ai1ec-advanced"]').tab("show"),e("#disclaimer").focus(),t.preventDefault())})},l=function(){e("fieldset.ai1ec-captcha_provider").addClass("ai1ec-hidden"),e(".ai1ec-"+e(this).val()).removeClass("ai1ec-hidden")},c=function(){t(function(){f(),a(),r.activate_saved_tab_on_page_load(e.cookie("ai1ec_general_settings_active_tab")),e(document).on("click",'#ai1ec-general-settings .ai1ec-nav a[data-toggle="ai1ec-tab"]',o),e(document).on("click","#disable_standard_filter_menu_toggler",function(e){e.preventDefault()}),e(document).on("click","#ai1ec-button-refresh",i.perform_rescan);var t=e("#exact_date");t.datepicker({autoclose:!0}),s(),e(document).on("click",".ai1ec-admin-view-settings .ai1ec-toggle-view",function(){var t=e(this),n=t.parent().index()+1;if(0===t.closest("tr").siblings().find("td:nth-child("+n+") .ai1ec-toggle-view:checked").length)return!1;if(t.parent().next("td").find(".ai1ec-toggle-default-view").is(":checked"))return!1});var n=function(){var t=e(this).closest(".ai1ec-form-group").nextAll(".ai1ec-form-group").slice(0,4);e(this).prop("checked")?t.show():t.hide()};n.apply(e("#affix_filter_menu").on("click",n)[0]),e(document).on("click",".ai1ec-admin-view-settings .ai1ec-toggle-default-view",function(){e(this).parent().prev("td").children(".ai1ec-toggle-view").prop("checked",!0)}),e(document).on("change","#captcha_provider",l),r.init_autoselect();var c=e.cookie("ai1ec_api_signup_hidden");1!=c&&e(".ai1ec-signup-show").click(),e("#ai1ec_save_settings").on("click",u),e("#show_create_event_button").trigger("ready")})};return e('[name="ai1ec_tickets_submit"]').on("click",function(){e(".ai1ec-ticket-field-error").hide(),e(".ai1ec-required:visible").each(function(){var t=e(this);t.removeClass("ai1ec-error");if(!e.trim(t.val())||"checkbox"===t.attr("type")&&!this.checked)t.addClass("ai1ec-error"),t.closest("td").find(".ai1ec-ticket-field-error").show()});if(!e(".ai1ec-ticket-field-error:visible").length){e(".ai1ec-noauto").remove();var t=e("#ai1ec-api-signup-form"),n=t.attr("data-action"),r=e("<form></form",{method:"POST",action:n,"class":"ai1ec-hidden"});t.appendTo(r),r.appendTo("body").submit()}return!1}),e('[name="ai1ec_signing"]').on("click",function(){e(".ai1ec-error").removeClass("ai1ec-error"),e(".ai1ec-ticket-field-error").hide(),"2"===this.value?(e(".ai1ec-ticketing-signup tr").not(":first").not(".signin").hide(),e(".signin").removeClass("ai1ec-hidden")):(e(".ai1ec-ticketing-signup tr").show(),e(".signin:last").addClass("ai1ec-hidden"))}),e("#ai1ec-api-signout").on("click",function(){var t=e("#ai1ec-api-signed-in"),n=e(this).attr("data-action"),r=e('<input type="hidden" name="ai1ec_signout" value="1" />'),i=e("<form></form",{method:"POST",action:n,"class":"ai1ec-hidden"});return i.append(r,t).appendTo("body").submit(),!1}),e(".ai1ec-api-signup-hide").on("click",function(){return e("#ai1ec-api-signup-form").addClass("ai1ec-hidden"),e(".ai1ec-signup-show").removeClass("ai1ec-hidden").show(),e(this).hide(),e.cookie("ai1ec_api_signup_hidden",1),!1}),e(".ai1ec-signup-show").on("click",function(){return e("#ai1ec-api-signup-form").removeClass("ai1ec-hidden"),e(".ai1ec-api-signup-hide").removeClass("ai1ec-hidden").show(),e(this).hide(),e.cookie("ai1ec_api_signup_hidden",0),!1}),{start:c}});