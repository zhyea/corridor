window.addEventListener('resize', middleContentBody);
window.addEventListener('load', middleContentBody);

/**
 * 使contentBody块动态居中
 */
function middleContentBody() {
    console.log(document.body.clientWidth);    //浏览器时下窗口文档body的高度
    let bodyWidth = document.body.clientWidth;
    let valMargin = Math.floor((bodyWidth % 324) / 2);
    let domContent = document.getElementById("content-body");
    domContent.style.cssText = ('margin: 0 ' + valMargin + 'px');
}
