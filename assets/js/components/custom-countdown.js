// counter for read a loud
// $('#cd-read_a_loud').countdown('2020/10/10', function(event) {
//   var $this = $(this).html(event.strftime(''
//     +
//     '<div class="countdown">'+
//         '<div class="clock-count-container text-center" >'+
//             '<h6 class="clock-val" >%S</h6>'+
//         '</div>'+
//         '<h4 class="clock-text"> Sec </h4>'+
//     '</div>'));
// });






// var fiveSeconds = new Date().getTime() + 60000;
// $('#cd-read_a_loud').countdown(fiveSeconds, {elapse: true})
// .on('update.countdown', function(event) {
//   var $this = $(this);
//   if (event.elapsed) {
//     $this.html(event.strftime(''
//     +
//     '<div class="countdown">'+
//         '<div class="clock-count-container text-center" >'+
//             '<h6 class="clock-val" >00</h6>'+
//         '</div>'+
//         '<h4 class="clock-text"> Sec </h4>'+
//     '</div>'));

//   } else {
//     $this.html(event.strftime(''
//     +
//     '<div class="countdown">'+
//         '<div class="clock-count-container text-center" >'+
//             '<h6 class="clock-val" >%S</h6>'+
//         '</div>'+
//         '<h4 class="clock-text mb-2 mt-2"> Sec </h4>'+
//     '</div>'));
//   }
// });


$('#cd-simple').countdown('2020/10/10', function(event) {
  var $this = $(this).html(event.strftime(''
    +'<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%d</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Days </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%H</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Hours </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%M</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Mins </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%S</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Sec </h4>'+
    '</div>'));
});

$('#cd-circle').countdown('2020/10/10', function(event) {
  var $this = $(this).html(event.strftime(''
    +'<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">365</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Days </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%H</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Hours </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%M</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Mins </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%S</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Sec </h4>'+
    '</div>'));
});