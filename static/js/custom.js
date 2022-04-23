window.addEventListener('resize', middleContentBody);
window.addEventListener('load', middleContentBody);

/**
 * 使contentBody块动态居中
 */
function middleContentBody() {
    console.log(document.body.clientWidth);    //浏览器时下窗口文档body的高度
    let bodyWidth = document.body.clientWidth - 49;
    let valMargin = Math.floor((bodyWidth % 316) / 2);
    let domContent = document.getElementById("content-body");
    console.log(valMargin);
    domContent.style.cssText = ('margin: 0 ' + valMargin + 'px');
}
