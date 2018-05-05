/************************************************************
** description: simple loading
** author: simple scrat(xiaoyuehen(at)163.com)
** version: 0.0.2
** last date: 2010-01-05
** lastmodify stephen.liu
** lastmodify date: 2010-01-28
*************************************************************
*/
(function($) {
    $.fn.showLoading_cache = null;
    //relativeid ���ֲ� �Ĺ�j����(Ҫ�ڱεĶ���)ID
    $.fn.showLoading = function(flag, cssBG, cssImg, relativeid) {
        tLoadingStatus = flag;

        var od;
        var sid = $.fn.showLoading_cache;
        if (sid) {
            od = $("#" + $.fn.showLoading_cache + ",#" + $.fn.showLoading_cache + "_img")
        }
        else {
            od = Math.random().toString();
            sid = "jql" + Math.random().toString().replace(/\./g, "");
            $.fn.showLoading_cache = sid;
            var cssB = cssBG || "JQ_PL_LOADING_BG";
            var cssI = cssImg || "JQ_PL_LOADING_IMG";
            od = $('<div id="' + sid + '" class="' + cssB + '"><span></span></div><div id="' + sid + '_img" class="' + cssI + '"></div>').appendTo("body");
        }

        if (flag) {
            var o = relativeid || undefined;
            var scrollh = document.body.scrollHeight;
            var ch = document.documentElement.clientHeight;
            var h = scrollh > ch ? scrollh : ch;

            var scrollw = document.body.scrollWidth;
            var cw = document.documentElement.clientWidth;
            var w = scrollw > cw ? scrollw : cw;

            if (o) {
                h = $('#' + relativeid).height();
                w = $('#' + relativeid).width();
                od.css('top', $('#' + relativeid).offset().top);
                od.css('left', $('#' + relativeid).offset().left);
            }
            od.width(w).height(h).show();
            od.css({ "background-position": "center " + (h - 50) / 3 });
            // if($.browser.msie) od.width(w).height(h);
            if ($.browser.msie && $.isFunction($.fn.bgiframe)) od.bgiframe();
        }
        else od.hide();


        return this;
    }
} (jQuery));

var tLoadingStatus = false;
$(window).resize(function() {
    if (tLoadingStatus) $(document).showLoading(true);
});