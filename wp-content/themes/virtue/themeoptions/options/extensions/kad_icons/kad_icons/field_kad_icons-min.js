!function(e){"use strict";redux.field_objects=redux.field_objects||{},redux.field_objects.kad_icons=redux.field_objects.kad_icons||{},e(document).ready((function(){})),redux.field_objects.kad_icons.init=function(i){i||(i=e(document).find(".redux-group-tab:visible").find(".redux-container-kad_icons")),e(i).each((function(){function i(e){if(e.hasOwnProperty("id"))return"<span class='elusive'><i class='"+e.id+"'></i> "+e.id+"</span>"}var t=e(this);redux.field_objects.media.init(t);var n=t;t.hasClass("redux-field-container")||(n=t.parents(".redux-field-container:first")),n.hasClass("redux-container-kad_icons")&&n.addClass("redux-field-init"),n.hasClass("redux-field-init")&&(n.removeClass("redux-field-init"),e("select.font-icons").select2({formatResult:i,formatSelection:i,width:"93%",triggerChange:!0,allowClear:!0}),t.find(".redux-slides-remove").on("click",(function(){var i;if(redux_change(e(this)),e(this).parent().siblings().find('input[type="text"]').val(""),e(this).parent().siblings().find("textarea").val(""),e(this).parent().siblings().find('input[type="hidden"]').val(""),e(this).parent().siblings().find("select").val(""),e(this).parents(".redux-container-kad_icons:first").find(".redux-slides-accordion-group").length>1)e(this).parents(".redux-slides-accordion-group:first").slideUp("medium",(function(){e(this).remove()}));else{var t=e(this).parent(".redux-slides-accordion").data("new-content-title");e(this).parents(".redux-slides-accordion-group:first").find(".remove-image").click(),e(this).parents(".redux-container-kad_icons:first").find(".redux-slides-accordion-group:last").find(".redux-slides-header").text(t)}})),t.find(".kad_redux-icon-add").click((function(){e("select.font-icons").select2("destroy");var t=e(this).prev().find(".redux-slides-accordion-group:last").clone(!0),n,s=1*e(t).find(".slide-title").attr("name").match(/[0-9]+(?!.*[0-9])/)+1;e(t).find('.redux-slides-list input[type="text"], .redux-slides-list input[type="checkbox"], input[type="hidden"], select.redux-select-item, textarea').each((function(){e(this).attr("name",jQuery(this).attr("name").replace(/[0-9]+(?!.*[0-9])/,s)).attr("id",e(this).attr("id").replace(/[0-9]+(?!.*[0-9])/,s)),e(this).val(""),e(this).hasClass("slide-sort")&&e(this).val(s)}));var d=e(this).prev().data("new-content-title");e(t).find(".screenshot").removeAttr("style"),e(t).find(".screenshot").addClass("hide"),e(t).find(".screenshot a").attr("href",""),e(t).find(".remove-image").addClass("hide"),e(t).find(".redux-slides-image").attr("src","").removeAttr("id"),e(t).find(".font-icons.select2-container").remove(),e(t).find("select.font-icons option").removeAttr("selected"),e(t).find('.icon-link-target input[type="checkbox"]').val(""),e(t).find('.icon-link-target input[type="checkbox"]').attr("checked",!1),e(t).find("h3").text("").append('<span class="redux-slides-header">'+d+'</span><span class="ui-accordion-header-icon ui-icon ui-icon-plus"></span>'),e(this).prev().append(t),e("select.font-icons").select2({formatResult:i,formatSelection:i,width:"93%",triggerChange:!0,allowClear:!0})})),t.find(".slide-title").keyup((function(i){var t=i.target.value;e(this).parents().eq(3).find(".redux-slides-header").text(t)})),t.find(".redux-slides-accordion").accordion({header:"> div > fieldset > h3",collapsible:!0,active:!1,heightStyle:"content",icons:{header:"ui-icon-plus",activeHeader:"ui-icon-minus"}}).sortable({axis:"y",handle:"h3",connectWith:".redux-slides-accordion",start:function(e,i){i.placeholder.height(i.item.height()),i.placeholder.width(i.item.width())},placeholder:"ui-state-highlight",stop:function(i,t){var n;t.item.children("h3").triggerHandler("focusout"),e("input.slide-sort").each((function(i){e(this).val(i)}))}}))}))}}(jQuery);