window.addEventListener('resize', resizeContentBody);
window.addEventListener('load', resizeContentBody);

function resizeContentBody() {
    //console.log(document.body.clientWidth);    //浏览器时下窗口文档body的高度
    let bodyWidth = document.body.clientWidth;
    bodyWidth = bodyWidth > 1600 ? 1600 - 2 : bodyWidth - 2
    let valMargin = Math.floor((bodyWidth % 316) / 2);
    //console.log(valMargin);
    let domContent = document.getElementById("content-body");
    domContent.style.cssText = ('margin: 0 ' + valMargin + 'px');
}


function socialButtons() {
    document.writeln('Button');
    //<a href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('您的链接')+'&t='+encodeURIComponent(document.title),'_blank','toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=600, height=450,top=100,left=350');void(0)" style="font-size: 14px;margin-right: 50px;">Facebook </a>
    //<a href="javascript:window.open('http://twitter.com/share?url=' + encodeURIComponent('您的链接') + '&text=' + encodeURIComponent('标题'), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');void(0)"  style="font-size: 14px;margin-right: 50px;">Twitter</a>
}
