
function openYouTube(id) {
    //YouTube Player Parameters
    var width = 600;
    var height = 360;
    var FullScreen = "yes";
    var AutoPlay = "yes";
    var HighDef = "yes";

    //Calculate Page width and height
    var pageWidth = window.innerWidth;
    var pageHeight = window.innerHeight;
    if (typeof pageWidth != "number") {
        if (document.compatMode == "CSS1Compat") {
            pageWidth = document.documentElement.clientWidth;
            pageHeight = document.documentElement.clientHeight;
        } else {
            pageWidth = document.body.clientWidth;
            pageHeight = document.body.clientHeight;
        }
    }
    // Make Background visible...
    var divbg = document.getElementById('bg');
    divbg.style.visibility = "visible";

    //Create dynamic Div container for YouTube Popup Div
    var divobj = document.createElement('div');
    divobj.setAttribute('id', id); // Set id to YouTube id
    divobj.className = "popup";
    divobj.style.visibility = "visible";
    var divWidth = width + 4;
    var divHeight = height + 20;
    divobj.style.width = divWidth + "px";
    divobj.style.height = divHeight + "px";
    var divLeft = (pageWidth - divWidth) / 2;
    var divTop = (pageHeight - divHeight) / 2 - 10;
    //Set Left and top coordinates for the div tag
    divobj.style.left = divLeft + "px";
    divobj.style.top = divTop + "px";

    //Create dynamic Close Button Div
    var closebutton = document.createElement('div');
    closebutton.style.visibility = "visible";
    closebutton.innerHTML = "<span onclick=\"closeYouTube('" + id + "')\" class=\"close_button\">X</span>";
    //Add Close Button Div to YouTube Popup Div container
    divobj.appendChild(closebutton);

    //Create dynamic YouTube Div
    var ytobj = document.createElement('div');
    ytobj.setAttribute('id', "yt" + id);
    ytobj.className = "ytcontainer";
    ytobj.style.width = width + "px";
    ytobj.style.height = height + "px";
    if (FullScreen == "yes")
        FullScreen = "&fs=1";
    else
        FullScreen = "&fs=0";
    if (AutoPlay == "yes")
        AutoPlay = "&autoplay=1";
    else
        AutoPlay = "&autoplay=0";
    if (HighDef == "yes")
        HighDef = "&hd=1";
    else
        HighDef = "&hd=0";
    var URL = "http://www.youtube.com/v/" + id + "&hl=en&rel=0&showsearch=0" + FullScreen + AutoPlay + HighDef;
    var YouTube = "<object width=\"" + width + "\" height=\"" + height + "\">";
    YouTube += "<param name=\"movie\" value=\"" + URL + "\"></param>";
    YouTube += "<param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>";
    YouTube += "<embed src=\"" + URL + "\" type=\"application/x-shockwave-flash\" ";
    YouTube += "allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"" + width + "\" height=\"" + height + "\"></embed></object>";
    ytobj.innerHTML = YouTube;
    //Add YouTube Div to YouTube Popup Div container
    divobj.appendChild(ytobj);

    //Add YouTube Popup Div container to HTML BODY
    document.body.appendChild(divobj);
}

function closeYouTube(id) {
    var divbg = document.getElementById('bg');
    divbg.style.visibility = "hidden";
    var divobj = document.getElementById(id);
    var ytobj = document.getElementById("yt" + id);
    divobj.removeChild(ytobj); //remove YouTube Div
    document.body.removeChild(divobj); // remove Popup Div
} 