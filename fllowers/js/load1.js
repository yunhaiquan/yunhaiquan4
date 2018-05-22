window.onload=function () {
    // 浏览器的高度+滚动高度>=楼层高度
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