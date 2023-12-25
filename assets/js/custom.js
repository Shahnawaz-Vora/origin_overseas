/*
=========================================
|                                       |
|           Scroll To Top               |
|                                       |
=========================================
*/ 
$('.scrollTop').click(function() {
    $("html, body").animate({scrollTop: 0});
});


$('.navbar .dropdown.notification-dropdown > .dropdown-menu, .navbar .dropdown.message-dropdown > .dropdown-menu ').click(function(e) {
    e.stopPropagation();
});

/*
=========================================
|                                       |
|       Multi-Check checkbox            |
|                                       |
=========================================
*/

function checkall(clickchk, relChkbox) {

    var checker = $('#' + clickchk);
    var multichk = $('.' + relChkbox);


    checker.click(function () {
        multichk.prop('checked', $(this).prop('checked'));
    });    
}


/*
=========================================
|                                       |
|           MultiCheck                  |
|                                       |
=========================================
*/

/*
    This MultiCheck Function is recommanded for datatable
*/

function multiCheck(tb_var) {
    tb_var.on("change", ".chk-parent", function() {
        var e=$(this).closest("table").find("td:first-child .child-chk"), a=$(this).is(":checked");
        $(e).each(function() {
            a?($(this).prop("checked", !0), $(this).closest("tr").addClass("active")): ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
        })
    }),
    tb_var.on("change", "tbody tr .new-control", function() {
        $(this).parents("tr").toggleClass("active")
    })
}

/*
=========================================
|                                       |
|           MultiCheck                  |
|                                       |
=========================================
*/

function checkall(clickchk, relChkbox) {

    var checker = $('#' + clickchk);
    var multichk = $('.' + relChkbox);


    checker.click(function () {
        multichk.prop('checked', $(this).prop('checked'));
    });    
}

/*
=========================================
|                                       |
|               Tooltips                |
|                                       |
=========================================
*/

$('.bs-tooltip').tooltip();

/*
=========================================
|                                       |
|               Popovers                |
|                                       |
=========================================
*/

$('.bs-popover').popover();


/*
================================================
|                                              |
|               Rounded Tooltip                |
|                                              |
================================================
*/

$('.t-dot').tooltip({
    template: '<div class="tooltip status rounded-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
})


/*
================================================
|            IE VERSION Dector                 |
================================================
*/

function GetIEVersion() {
  var sAgent = window.navigator.userAgent;
  var Idx = sAgent.indexOf("MSIE");

  // If IE, return version number.
  if (Idx > 0) 
    return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

  // If IE 11 then look for Updated user agent string.
  else if (!!navigator.userAgent.match(/Trident\/7\./)) 
    return 11;

  else
    return 0; //It is not IE
}
function change(){
    var options = $("#options").val();
    if(options == 1){
      option1.style.display = "block";
      option2.style.display = "none";
      option3.style.display = "none";
      option4.style.display = "none";
      option5.style.display = "none";
      option6.style.display = "none";
      option7.style.display = "none";
      option8.style.display = "none";
    }else if(options == 2){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "none";
      option4.style.display = "none";
      option5.style.display = "none";
      option6.style.display = "none";
      option7.style.display = "none";
      option8.style.display = "none";
    }else if(options == 3){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "block";
      option4.style.display = "none";
      option5.style.display = "none";
      option6.style.display = "none";
      option7.style.display = "none";
      option8.style.display = "none";
    }else if(options == 4){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "block";
      option4.style.display = "block";
      option5.style.display = "none";
      option6.style.display = "none";
      option7.style.display = "none";
      option8.style.display = "none";
    }else if(options == 5){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "block";
      option4.style.display = "block";
      option5.style.display = "block";
      option6.style.display = "none";
      option7.style.display = "none";
      option8.style.display = "none";
    }else if(options == 6){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "block";
      option4.style.display = "block";
      option5.style.display = "block";
      option6.style.display = "block";
      option7.style.display = "none";
      option8.style.display = "none";
    }else if(options == 7){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "block";
      option4.style.display = "block";
      option5.style.display = "block";
      option6.style.display = "block";
      option7.style.display = "block";
      option8.style.display = "none";
    }else if(options == 8){
      option1.style.display = "block";
      option2.style.display = "block";
      option3.style.display = "block";
      option4.style.display = "block";
      option5.style.display = "block";
      option6.style.display = "block";
      option7.style.display = "block";
      option8.style.display = "block";
    }else{
      option1.style.display = "none";
      option2.style.display = "none";
      option3.style.display = "none";
      option4.style.display = "none";
      option5.style.display = "none";
      option6.style.display = "none";
      option7.style.display = "none";
      option8.style.display = "none";
    }
  }