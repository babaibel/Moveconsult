/*
CSS Browser Selector v0.4.0 (Nov 02, 2010)
Rafael Lima (http://rafael.adm.br)
http://rafael.adm.br/css_browser_selector
License: http://creativecommons.org/licenses/by/2.5/
Contributors: http://rafael.adm.br/css_browser_selector#contributors

Available OS Codes [os]:

    * win - Microsoft Windows (all versions)
    * vista - Microsoft Windows Vista new
    * linux - Linux (x11 and linux)
    * mac - Mac OS
    * freebsd - FreeBSD
    * ipod - iPod Touch
    * iphone - iPhone
    * ipad - iPad new
    * webtv - WebTV
    * j2me - J2ME Devices (ex: Opera mini) changed from mobile to j2me
    * blackberry - BlackBerry new
    * android - Google Android new
    * mobile - All mobile devices new

Available Browser Codes [browser]:

    * ie - Internet Explorer (All versions)
    * ie8 - Internet Explorer 8.x
    * ie7 - Internet Explorer 7.x
    * ie6 - Internet Explorer 6.x
    * ie5 - Internet Explorer 5.x
    * gecko - Mozilla, Firefox (all versions), Camino
    * ff2 - Firefox 2
    * ff3 - Firefox 3
    * ff3_5 - Firefox 3.5
    * ff3_6 - Firefox 3.6 new
    * opera - Opera (All versions)
    * opera8 - Opera 8.x
    * opera9 - Opera 9.x
    * opera10 - Opera 10.x
    * konqueror - Konqueror
    * webkit or safari - Safari, NetNewsWire, OmniWeb, Shiira, Google Chrome
    * safari3 - Safari 3.x
    * chrome - Google Chrome
    * iron - SRWare Iron

*/
function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('firefox/7')?g+' ff7':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);

function checkBrowser(a){a||(a={});if(!a.chromeLink)a.chromeLink="http://www.google.com/chrome/eula.html";if(!a.safariLink)a.safariLink="http://www.apple.com/ru/safari/download/";if(!a.msieLink)a.msieLink="http://windows.microsoft.com/ru-ru/internet-explorer/download-ie";if(!a.operaLink)a.operaLink="http://ru.opera.com/download/";if(!a.firefoxLink)a.firefoxLink="http://www.mozilla-russia.org/products/firefox/";if(a.warning)a.warning+="\r\n\r\n";else a.warning="\u0443\u0441\u0442\u0430\u0440\u0435\u043b\u0430!\r\n\r\n";
if(!a.question)a.question="\u0425\u043e\u0442\u0438\u0442\u0435 \u043b\u0438 \u043e\u0431\u043d\u043e\u0432\u0438\u0442\u044c \u0432\u0435\u0440\u0441\u0438\u044e \u0441\u0432\u043e\u0435\u0433\u043e \u0431\u0440\u0430\u0443\u0437\u0435\u0440\u0430?";if(a.message)a.message+="\r\n\r\n";else a.message="";if(!a.chrome)a.chrome=11;if(!a.safari)a.safari=5;if(!a.msie)a.msie=6;if(!a.opera)a.opera=10.5;if(!a.firefox)a.firefox=3.5;var b=getBrowser(1),c=b[0],e=b[1];e=parseFloat(e+"."+b[2]);b="\u0412\u0435\u0440\u0441\u0438\u044f \u0412\u0430\u0448\u0435\u0433\u043e \u0431\u0440\u0430\u0443\u0437\u0435\u0440\u0430 "+
c+"(ver "+e+") "+a.warning+a.message+a.question;var d="";switch(c){case "Chrome":if(e>=a.chrome)return false;else d=a.chromeLink;break;case "Safari":if(e>=a.safari)return false;else d=a.safariLink;break;case "MSIE":if(e>=a.msie)return false;else d=a.msieLink;break;case "Opera":if(e>=a.opera)return false;else d=a.operaLink;break;case "Firefox":if(e>=a.firefox)return false;else d=a.firefoxLink}if(confirm(b)==true)document.location.href=d;else return false}
function browserDetectNav(a){var b=window.navigator.userAgent,c=/Version[ \/]+\w+\.\w+/i,e=/Safari\/\w+\.\w+/i,d=[],k=/[ \/\.]/i;c=b.match(c);var g=b.match(/Firefox\/\w+\.\w+/i),h=b.match(/Chrome\/\w+\.\w+/i),i=b.match(/Version\/\w+\.\w+/i);e=b.match(e);var j=b.match(/MSIE *\d+\.\w+/i);b=b.match(/Opera[ \/]+\w+\.\w+/i);if(!b==""&!c=="")d[0]=c[0].replace(/Version/,"Opera");else if(!b=="")d[0]=b[0];else if(!j=="")d[0]=j[0];else if(!g=="")d[0]=g[0];else if(!h=="")d[0]=h[0];else if(!i==""&&!e=="")d[0]=
i[0].replace("Version","Safari");var f;if(d[0]!=null)f=d[0].split(k);if((a==null|a==0)&f!=null){a=f[2].length;f[2]=f[2].substring(0,a);return f}else if(a!=null){f[2]=f[2].substr(0,a);return f}else return false}
function browserDetectJS(){var a=[];if(window.opera){a[0]="Opera";a[1]=window.opera.version()}else if(window.chrome)a[0]="Chrome";else if(window.sidebar)a[0]="Firefox";else if(!window.external&&a[0]!=="Opera")a[0]="Safari";else if(window.ActiveXObject){a[0]="MSIE";a[1]=window.navigator.userProfile?"6":window.Storage?"8":!window.Storage&&!window.navigator.userProfile?"7":"Unknown"}return a?a:false}
function getBrowser(a){a=browserDetectNav(a);var b=browserDetectJS();return a[0]==b[0]?a:a[0]!=b[0]?b:false}function isItBrowser(a,b,c){switch(c){case 1:c=browserDetectNav();break;case 2:c=browserDetectJS();break;default:c=getBrowser()}return a==c[0]&b==c[1]?true:a==c[0]&(b==null||b==0)?true:false};

$(document).ready(function(){
	var data = browserDetectNav();
	$('html').addClass(data[0]+data[1]).addClass(data[0]);
	var isIE11 = window.navigator.userAgent.match(/rv:11.0/);
	if(!isIE11=="") $('html').addClass('MSIE11');
});