window.addEventListener('load', init);


function init(){
    console.log('init');
    // ==========================================navbar
    let navbar = document.getElementById('navbar');
    let navbarIcon = document.querySelectorAll('.navbar-icon');

    if (window.matchMedia('(max-width: 768px)').matches) {
        for(let i=0; i<navbarIcon.length; i++){
            navbar.appendChild(navbarIcon[i]);
        }
    }
    window.addEventListener('resize', ()=>{
        if (window.matchMedia('(max-width: 768px)').matches) {
            for(let i=0; i<navbarIcon.length; i++){
                navbar.appendChild(navbarIcon[i]);
            }
        }else{
            for(let i=0; i<navbarIcon.length; i++){
                navbar.querySelector('ul').appendChild(navbarIcon[i]);
            }

            navbar.querySelector('ul').classList.remove('op1-vv');
        }
    });

    let navbarToggle = document.getElementById('navbar-toggle');
    navbarToggle.addEventListener('click', ()=>{
        navbar.querySelector('ul').classList.toggle('op1-vv');
    });

    // ==========================================chatbotEvent
    chatbotEvent();
}




function chatbotEvent() {
    let chatbot = document.getElementById('chatbot');
    let messageHead = document.getElementById('message-head');
    let greeting = document.getElementById('greeting');
    let avatar = document.getElementById('avatar');
    let greetingCloseBtn = document.getElementById('greeting-close');


    messageHead.addEventListener('click', function(){
        chatbot.querySelector('.message-window').classList.toggle('show');
    });

    avatar.addEventListener('click', function(){
        // console.log(greeting.style.opacity);

        greeting.style.opacity = 1;
        greeting.style.visibility = 'visible';
    });

    greetingCloseBtn.addEventListener('click', function(){

        greeting.style.opacity = 0;
        greeting.style.visibility = 'hidden';
    });
}
