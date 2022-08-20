<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <style>
    .drop-down {
      position: relative;
      display: inline-block;
      width: auto;
      margin-top: 0;
      font-family: verdana;
    }
  
    .drop-down select {
      display: none;
    }
  
    .drop-down .select-list {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1;
      margin-top: 40px;
      padding: 0;
      background-color: #595959;
    }
  
    .drop-down .select-list li {
      display: none;
    }
  
    .drop-down .select-list li span {
      display: inline-block;
      min-height: 40px;
      min-width: 280px;
      width: 100%;
      padding: 5px 15px 5px 35px;
      background-color: #595959;
      background-position: left 10px center;
      background-repeat: no-repeat;
      font-size: 16px;
      text-align: left;
      color: #FFF;
      opacity: 0.7;
      box-sizing: border-box;
    }
  
    .drop-down .select-list li span:hover,
    .drop-down .select-list li span:focus {
      opacity: 1;
    }
  </style>
</head>
<body>
  <div class="test">test</div>
  <div class="drop-down"> <select name="options">
    <option class="en" value="en" style="background-image:url('images/en.png');">English</option>
    <option class="fr" value="fr" style="background-image:url('images/fr.png');">French</option>
    <option class="nl" value="nl" style="background-image:url('images/nl.png');">Nederlands</option>
  </select> </div>
  <a href="{{route('chart')}}">dd</a>
  <script>
    jQuery().ready(function() {
      /* Custom select design */
      jQuery('.drop-down').append('<div class="button"></div>');
      jQuery('.drop-down').append('<ul class="select-list"></ul>');
      jQuery('.drop-down select option').each(function() {
        var bg = jQuery(this).css('background-image');
        jQuery('.select-list').append('<li class="clsAnchor"><span value="' + jQuery(this).val() + '" class="' +
          jQuery(this).attr('class') + '" style=background-image:' + bg + '>' + jQuery(this).text() +
          '</span></li>');
      });
      jQuery('.drop-down .button').html('<span style=background-image:' + jQuery('.drop-down select').find(
          ':selected').css('background-image') + '>' + jQuery('.drop-down select').find(':selected').text() +
        '</span>' + '<a href="javascript:void(0);" class="select-list-link">Arrow</a>');
      jQuery('.drop-down ul li').each(function() {
        if (jQuery(this).find('span').text() == jQuery('.drop-down select').find(':selected').text()) {
          jQuery(this).addClass('active');
        }
      });
      jQuery('.drop-down .select-list span').on('click', function() {
        var dd_text = jQuery(this).text();
        var dd_img = jQuery(this).css('background-image');
        var dd_val = jQuery(this).attr('value');
        jQuery('.drop-down .button').html('<span style=background-image:' + dd_img + '>' + dd_text + '</span>' +
          '<a href="javascript:void(0);" class="select-list-link">Arrow</a>');
        jQuery('.drop-down .select-list span').parent().removeClass('active');
        jQuery(this).parent().addClass('active');
        $('.drop-down select[name=options]').val(dd_val);
        $('.drop-down .select-list li').slideUp();
      });
      jQuery('.drop-down .button').on('click', 'a.select-list-link', function() {
        jQuery('.drop-down ul li').slideToggle();
      }); /* End */
    });
  </script>
</body>
</html>



