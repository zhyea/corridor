window.addEventListener('resize', resizeContentBody);
window.addEventListener('load', resizeContentBody);

function resizeContentBody() {
    //console.log(document.body.clientWidth);    //浏览器时下窗口文档body的高度
    let clientWidth = document.body.clientWidth;
    let domWrapper = document.getElementsByClassName("wrapper")[0];
    let contentWidth;
    if (clientWidth > 1620) {
        contentWidth = 1620 - 2;
        domWrapper.style.cssText = "width:1620px";
    } else if (clientWidth > 1312) {
        contentWidth = 1312 - 2;
        domWrapper.style.cssText = "width:1312px";
    } else {
        contentWidth = clientWidth - 2;
        domWrapper.style.cssText = "";
    }
    let valMargin = Math.floor((contentWidth % 320) / 2);
    //console.log(valMargin);
    let domContent = document.getElementById("content-body");
    domContent.style.cssText = ('margin: 0 ' + valMargin + 'px');
}

