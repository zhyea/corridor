window.addEventListener('resize', resizeContentBody);
window.addEventListener('load', resizeContentBody);

function resizeContentBody() {
    //console.log(document.body.clientWidth);    //浏览器时下窗口文档body的高度
    let bodyWidth = document.body.clientWidth;
    bodyWidth = bodyWidth > 1300 ? 1300 - 2 : bodyWidth - 2
    let valMargin = Math.floor((bodyWidth % 316) / 2);
    //console.log(valMargin);
    let domContent = document.getElementById("content-body");
    domContent.style.cssText = ('margin: 0 ' + valMargin + 'px');
}
