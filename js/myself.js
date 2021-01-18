    $("#login").click(function () {
      $("#cover").fadeIn();
    })
    $("#back,.loginbg").click(function () {
      $("#cover").fadeOut();
    })
    
    $('#menubtn').click(function(){      
      $('.burger').toggleClass('toggle');      
    })
    // scroll to id
    $("#mainMenu a").click(function () {
      let who = $(this).not("#cover").attr("href");
      let val = $(who).offset().top - $("#meMenu").innerHeight()+1;
      $("html").animate(
        { scrollTop: val }, 1000, "swing"
      );
    });

    $(window).scroll(() => {
      spy(); // scroll spy
      fadeindescr();// fadein about me
      animationbar();// bar animation
      fadeintxt();//title fade in
    });


    
    spy();

    function spy() {
      let nowat = $(window).scrollTop();
      $('section').each(function () {
        let
          id = $(this).attr('id'),
          offset = $(this).offset().top - $("#meMenu").innerHeight() - 65,
          height = $(this).height();

        if (offset <= nowat && nowat < offset + height) {
          $("#mainMenu a").not("#cover").removeClass('active');
          $(`#mainMenu a[href='#${id}']`).not("#cover").addClass('active');
        };
      });
    }


    
    
    function fadeindescr() {
      let title = document.querySelector('.descr');
      let position =title.getBoundingClientRect().top;
      let screenpos = window.innerHeight / 1.3;
      if (position < screenpos) {
        title.classList.add('txttitleFade');
      }
    }

    function fadeintxt() {
      let idname =['#myworkTit','#contactmeTit','#portfolioTit','#experienceTit','#myskillTit'];
      
      for(let i=0;i<idname.length;i++){

        let title = document.querySelector(`${idname[i]}`);
        let position =title.getBoundingClientRect().top;
        let screenpos = window.innerHeight ;

        title.classList.add('txttitle');
        if (position < screenpos) {
          title.classList.add('txttitleFade');
        }else{
          title.classList.remove('txttitleFade');
        }
      }
    }
    
    function run(bar, n) {
      const numb = document.querySelector(bar);
      let counter = 0;
      setInterval(() => {
        if (counter < n) {
          counter++;
          numb.textContent = counter + "%";
        }
      }, n / 3.5);
    
    }
    let counterSection= document.querySelector("#expert");
    let options={
      rootMargin:'0px 0px -100px 0px '
    }
    let done=0;
    const sectionObserver=new IntersectionObserver(function(number){
    if(number[0].isIntersecting && done!==1){
      done=1;
      run('.numb1', 80);
      run('.numb2', 70);
      run('.numb3', 50);
    }
  },options)
  sectionObserver.observe(counterSection);
    

    
    
    
    
    function animationbar() {
      let bar1 = document.querySelector('#bar1');
      let bar2 = document.querySelector('#bar2');
      let bar3 = document.querySelector('#bar3');
      let position = bar1.getBoundingClientRect().top;
      let screenpos = window.innerHeight / 1.3;
      if (position < screenpos) {
        bar1.classList.add('cusbar1');
        bar2.classList.add('cusbar2');
        bar3.classList.add('cusbar3');
        
      }
      
    }
