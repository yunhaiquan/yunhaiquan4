window.onload=function () {
    let banner=document.querySelector('.banner')
    let bannerp=document.querySelectorAll('.bannerp')
    let widths=parseInt(getComputedStyle(banner,null).width)
    console.log(widths);
    let ok=document.querySelectorAll('.ok')
    let next=0;
    let current=0;
    let index=0;
    let t = setInterval(move, 2000);
    ok.forEach(function (element,index) {
        element.onclick=function () {
            if (current == index) {
                return;
            }
            ok[current].classList.remove('hot');
            ok[index].classList.add('hot');
            if(current > index ){
                // bannerp[index].style.left = -widths + 'px';
                animate(bannerp[current],{left: widths});
                animate(bannerp[index],{left: 0});
            }else if(current < index){
                // bannerp[index].style.left = widths + 'px';
                animate(bannerp[current],{left: -widths});
                animate(bannerp[index],{left: 0});
            }
            current= index;

        }
    })
    function move() {
        next++;
        if (next===bannerp.length){
            next=0
        }
        ok[current].classList.remove('hot')
        ok[next].classList.add('hot')
        bannerp[next].style.left=widths+'px'
        animate(bannerp[current],{left:-widths});
        animate(bannerp[next],{left:0})
        current = next;
    }
    banner.onmouseenter=function () {
        clearInterval(t)
    }
    banner.onmouseleave=function () {
       t= setInterval(move,2000)
    }

    let ch=innerHeight;
    // let floor = document.querySelectorAll('.floor') ;
    // let arr=[]
    //     floor.forEach(element=>{
    //         arr.push(element.offsetTop);
    //     })
    let flagDown=true
    let flagUp=true
    let search=document.querySelector('.search')
    window.onscroll=function () {
        let st=document.body.scrollTop ||document.documentElement.scrollTop
        // for(let i=0;i<arr.length;i++){
        //     if(ch +st>=arr[i]+400){
        //         let imgs=floor[i].getElementsByTagName('img');
        //         for (let j=0;j<imgs.length;j++){
        //             imgs[j].src=imgs[j].title
        //         }
        //     }
        // }
        if (st>=300){
            if (!flagDown){
                return
            }
            flagDown=false;
            animate(search,{top:0},function () {
                flagDown=true
                flagUp=true
            })
        }
        else {
            if (!flagUp){
                return
            }
            flagUp=false;
            animate(search,{top:-60},function () {
                flagDown=true
                flagUp=true
            })
        }
    }
}