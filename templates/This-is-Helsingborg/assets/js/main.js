$('.navbar-aside .sub-menu').parent('li').addClass('has-childs');
//console.log($('.navbar-aside .active').parent('ul').last()); //.last().addClass('current-ancestor-last');

if ($('.navbar-aside .active').parent('ul').last().hasClass('sub-menu')) {
    $('.navbar-aside .active').parent('ul').last().parents('li').addClass('current-ancestor-last');
} else {
    $('.navbar-aside .active').parent('li').last().addClass('current-ancestor-last');
}