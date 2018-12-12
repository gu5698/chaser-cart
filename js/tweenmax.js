console.log("start");

// TweenMax.from('.box_01', 1, {
//     x: 500,
//     y: 600
// });

// TweenMax.to('.box_02', 1, {
//     x: 200,
//     y: 100
// })

TweenMax.fromTo('.box_03', 1, {
    x: 300,
    opacity: 0,
    scale: 1
}, {
    x: 0,
    opacity: 1,
    ease: Power2.easeOut
})

TweenMax.set('.box_04', {
    x: 150,
    y: 300,
    background: '#f20'
})

TweenMax.fromTo('.line', 1, {
    width: 0
},{
    width: 400,
    delay: .6
})
TweenMax.fromTo('.circle', 1,{
    scale: 1,
    opacity: 1
},{
    scale: 1.5,
    opacity: 0,
    repeat: -1,
    ease: Expo.easeOut
})
TweenMax.to('.box_07', 3, {
    scale: 1,
    rotation: 36000,
    repeat: -1,
    transformOrigin: 'right top'
})
TweenMax.to('.box_06', 1, {
    x: 100,
    // yoyo: true,
    repeat: -1,
    transformOrigin: 'left top',
    className: "+=box07"
})
var btn = document.getElementById('play');
btn.onclick = function(){
TweenMax.to('.box_08', 6, {
    bezier: {
        curviness: 1.75,
        values: [{
            x: 0,
            y: 0
        }, {
            x: 250,
            y: 400
        }, {
            x: 450,
            y: 50
        },{
            x: 0,
            y: 0
        }
    ],

    },
    ease: Power1.easeOut
});
}
TweenMax.staggerTo('.section .box', 1, {
    x: 100,
    repeat: -1,
    repeatDelay: 5,
    yoyo: true
},1);
var a = new TimelineMax({
    repeat: -1,
    yoyo: true
});
a.from('.box_01', 1, {
    x: 500,
    y: 600
}).to('.box_02', 1, {
    x: 200,
    y: 100,
    delay:-2
});
document.getElementById('btn_scroll').onclick = function () {
    TweenMax.to(window, 1, {
        scrollTo:{
            y: "#anchor",
            offsetY:10
        }
    })
}
TweenMax.to('.textbox', 6, {
    text:'距離九合一選舉投票不到一周，檢警查賄、掃蕩賭盤進入最後階段，據最高檢察署受理查察統計，選舉賭盤19件31人，以高雄件數最多。台北地檢署則指揮警方傳喚在網路貼文，要免費接駁載北漂遊子返高雄投票的甘姓男子，甘昨表示，原是善意發起活動，被約談後嚇壞一家老小，活動決定不辦了。<br>',
    ease: Linear. easeNone
})
// .to('.textbox', 12, {
//     text:'到底怎麼跑到第二段？<br>',
//     ease: Linear. easeNone,
//     delay: 2
// });

var tis = new TimelineMax({
    repeat:-1,
    yoyo: false,
    repeatDelay: 3
});

tis.to('.textbox', 1, {
    text: "我的天呀  要記得存檔",
    ease: Linear.easeNone,
    delay: 4
}).to('.textbox', 1, {
    text: "要記得吃午餐",
    ease: Linear.easeNone,
    delay: 2
});

var textsplit = new SplitText('#textbox2' ,{
    type: "words , chars"
});

TweenMax.staggerFrom(textsplit.words,1,{
    opacity: 0,
    scale: 0,
    y: 10,
    rotationX: 180,
    // transformOrigin: "0% 50% -50",
    ease: Back.easeOut
},0.1);

function parallax() {
    var scene = document.getElementById('parallax_box');
    var parallax = new Parallax(scene);
}
parallax();

//scrollmagic
//初始化場景
var controller = new ScrollMagic.Controller();


var animation = TweenMax.to('.scroll_box', 1, {
    y: 100
});

//觸發事件
var section_06 = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    duration: '100%',
    offset: -400,
    reverse: true,
    triggerHook:0.5//0 top  0.5 center
}).setTween(animation).addIndicators({
  name: 'section01'
}).addTo(controller);

var section_07 = new ScrollMagic.Scene({
    triggerElement: "#trigger_02",
    // duration: '100%',
    offset: 40,
    // reverse: true,
    triggerHook:0.5//0 top  0.5 center
}).setClassToggle('.toggleclass', 'on').addIndicators({
  name: 'section02'
}).addTo(controller);

var trll = TweenMax.to('.trllbox' ,1 ,{
    x: 200,
    delay: 0
})

var section_08 = new ScrollMagic.Scene({
    triggerElement: "#trigger_03",
    // duration: '80%',
    // offset: 40,
    // reverse: true,
}).setClassToggle('.bgall' ,'on').setTween(trll)
.addIndicators().addTo(controller)

var tlts = new TimelineMax();

    tlts.add(TweenMax.to('.scrollbox_01', 1, {
        x: 200,
    }));
    tlts.add(TweenMax.to('.scrollbox_02', 1, {
        x: 300,
    }));
    tlts.add(TweenMax.to('.scrollbox_03', 1, {
        x: 400,
    }));


    var scene_s = new ScrollMagic.Scene({
        triggerElement: "#trigger_04",
        duration: '300%',
        //畫面最上緣
        triggerHook: 0,
        //只出現一次
        // reverse: false,
    })
    .setPin('.section_09')
    .setTween(tlts)
    .addIndicators({
        name: 'stickview'
    })
    .addTo(controller);

    var tlimax = new TimelineMax();

  tlimax.fromTo('.bgall01' , 1, {
      x:"-100%"
  },{
      x: '0%'
  }).fromTo('.bgall02' , 1, {
    x:"100%"
},{
    x: '0%'
}).fromTo('.bgall03' , 1, {
    y:"-100%"
},{
    y: '0%'
})

var scene_sce = new ScrollMagic.Scene({
    triggerElement: "#trigger_05",
    duration: '300%',
    //畫面最上緣
    triggerHook: 0,
    //只出現一次
    // reverse: false,
})
.setPin('.section_10')
.setTween(tlimax)
.addIndicators()
.addTo(controller);

console.log('end ok');