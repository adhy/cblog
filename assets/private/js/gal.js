$(document).ready(function () {

  var $container = $('.masonry').masonry({
    itemSelector: '.item',
    percentPosition: true,
  columnWidth: '.grid-sizer',
    columnWidth: 1
  });


    var $items = getItems();
    $container.masonryImagesReveal( $items );

  
});

$.fn.masonryImagesReveal = function( $items ) {
  var msnry = this.data('masonry');
  var itemSelector = msnry.options.itemSelector;
  // hide by default
  $items.hide();
  // append to container
  this.append( $items );
  $items.imagesLoaded().progress( function( imgLoad, image ) {
    // get item
    // image is imagesLoaded class, not <img>, <img> is image.img
    var $item = $( image.img ).parents( itemSelector );
    // un-hide item
    $item.show();
    // masonry does its thing
    msnry.appended( $item );
  });
  
  return this;
};

function randomInt( min, max ) {
  return Math.floor( Math.random() * max + min );
}




function getItem() {
  var width = randomInt( 150, 400 );
  var height = randomInt( 150, 250 );
 /* var item = '<div class="item col-md-2">'+
    '<img class="img-responsive" src="http://lorempixel.com/' + 
      width + '/' + height + '/nature" /></div>';
  return item;*/

var folder = url+"assets/img/";

$.ajax({
    url : folder,
    success: function (data) {
        $(data).find("a").attr("href", function (i, val) {
            if( val.match(/\.(jpe?g|png|gif)$/) ) { 
               var item= $(".masonry").append( "<div class='item col-md-2 gal-item box'><a href='#' data-toggle='modal' onclick=nextimage('"+val+"') class=''><img class='img-responsive' src='"+ folder + val +"'></img></a></div>" );
            } 
            return item;
        });
    }
});
}





function getItems() {
  var items = '';
  for ( var i=0; i < 1; i++ ) {
    items += getItem();
  }
  // return jQuery object
  return $( items );
}
function nextimage(image){
  var folder = url+"assets/img/";
  $('#light').attr('src',folder+image);
  $('#imageshow').modal('show').on('shown.bs.modal');
  $('h4#text').text(image);

}