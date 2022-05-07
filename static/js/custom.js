window.addEventListener('resize', resizeContentBody);
window.addEventListener('load', resizeContentBody);

function resizeContentBody() {
    //console.log(document.body.clientWidth);    //浏览器时下窗口文档body的高度
    let clientWidth = document.body.clientWidth;
    let contentWidth;
    if (clientWidth > 1620) {
        contentWidth = 1620 - 2;
    } else if (clientWidth > 1312) {
        contentWidth = 1312 - 2;
    } else {
        contentWidth = clientWidth - 2;
    }
    let valMargin = Math.floor((contentWidth % 320) / 2);
    //console.log(valMargin);
    let domContent = document.getElementById("content-body");
    domContent.style.cssText = ('margin: 0 ' + valMargin + 'px');
}


function socialButtons(url, title) {
    let linkTwitter = "https://twitter.com/share?url=" + encodeURIComponent(url) + "&text=" + encodeURIComponent(title);
    let linkFacebook = "https://www.facebook.com/sharer.php?u=" + encodeURIComponent(url) + "&t=" + encodeURIComponent(title);

    let text = socialWinLink(linkTwitter, 'static/img/social/twitter.svg');
    text += '&nbsp;';
    text += socialWinLink(linkFacebook, 'static/img/social/facebook.svg')

    document.writeln(text);
}


function socialWinLink(socialUrl, pathIcon) {
    let link = "<a href=\"javascript:window.open('";
    link += socialUrl;
    link += "', '', ";
    link += "'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');void(0)\"  style=\"margin-right: 6px;\">";
    link += "<img height=\"16\" width=\"16\" src=\"" + pathIcon + "\"/>";
    link += "</a>";
    return link;
}
