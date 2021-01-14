
    $("#addbtn").click(function () {
      $("#addModal").fadeIn();
    });
    $(".addModal").click(function () {
      $("#addModal").fadeOut();
    });
    $(".backbtn").click(function () {
      $("#addModal").fadeOut();
    });
    $(".backbtn").click(function () {
      $("#addModal").fadeOut();
    });
    
    
    $(".chgModal").click(function () {
      $("#chgModal").fadeOut();
    });
    function op(x,y,url){
    	$(x).fadeIn()
    	if(y)
    	$(y).fadeIn()
    	if(y&&url)
    	$(y).load(url)
    }

