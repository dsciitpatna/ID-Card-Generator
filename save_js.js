html2canvas([document.getElementById('mainDiv')], {
  onrendered: function(canvas) {
    var imagedata = canvas.toDataURL('image/png');
    var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, '');
    // ajax call to save image inside folder
    $.ajax({
      url: 'save_image.php',
      data: {imgdata: imgdata, save_image: 'save_image'},
      type: 'post',
      success: function(response) {
        console.log(response);
        $('#image_id img').attr('src', response);
      }
    });
  }
})