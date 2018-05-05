var hidden = [],
    of = "all",
    pf = "0",
    trgEl = "countdown",
    trgDate, lbtype = "fo";

function init() {
    if (document.getElementById("start_date")) {
        var a = document.getElementById("start_date").innerHTML;
        trgDate = new Date(a);
        trgDate.setTime(trgDate.getTime() - trgDate.getTimezoneOffset() * 6E4);
        countdown();
        setInterval(countdown, 1E3);
        typeof eID != "undefined" && setInterval(refreshTab, 3E4)
    }
}

function pad(a) {
    return a > 9 ? a : "0" + a
}

function countdown() {
    var a = new Date;
    a.setTime(a.getTime()+252E5); // + 288E5
	console.log(a.getTime());
    var c = trgDate.getTime() - a.getTime(),
        b;
    if (c < 0) document.getElementById("cnt_end").style.display = "inline", b = "";
    else {
        var d;
        d = pad(Math.floor(c / 864E5));
        b = '<table cellspacing="0" cellpadding="0" class="countdown_tbl"><tr>';
        b += "<td>" + d + '</td><td class="sep">|</td>';
        c %= 864E5;
        b += "<td>" + pad(Math.floor(c / 36E5)) + '</td><td class="sep">|</td>';
        c %= 36E5;
        b += "<td>" + pad(Math.floor(c / 6E4)) + '</td><td class="sep">|</td>';
        c %= 6E4;
        b += "<td>" + pad(Math.floor(c / 1E3)) + "</td>";
        b += "</tr><tr><th>days</th><th>&nbsp;</th><th>hrs</th><th>&nbsp;</th><th>mins</th><th>&nbsp;</th><th>secs</th></th></tr></table>"
    }
    if (document.getElementById(trgEl) && b) document.getElementById(trgEl).innerHTML = b;
    if (document.getElementById("sing_time")) document.getElementById("sing_time").innerHTML = a.getUTCDate() + "." + pad(a.getUTCMonth() + 1) + "." + a.getUTCFullYear() + " " + a.getUTCHours() + ":" + pad(a.getUTCMinutes()) + ":" + pad(a.getUTCSeconds())
};