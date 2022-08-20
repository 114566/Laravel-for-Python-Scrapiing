<script>
$(document).keydown(function(event) {
if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
        event.preventDefault();
     }
    // 107 Num Key  +
    // 109 Num Key  -
    // 173 Min Key  hyphen/underscore key
    // 61 Plus key  +/= key
});
addEventListener('scroll', (event) => {console.log(scrollTop)});

  $('.chart-icon').on('click', function() {
    let icon = $('.chart-icon');
    icon.toggleClass('fa-chart-line');
    var chart = 'bar';
    let state = $('.chart-icon').hasClass('fa-chart-line');
    let per_time = $("input[name='graph-radio']:checked").val();
    let date = $('.date-list').val();
    if (state) {
      var bar = 'bar';
      get_data(per_time, date, bar);
    } else {
      var line = 'line';
      get_data(per_time, date, line);
    }
  });

  //get data by custom paramenter have 4 parameter that is per-time, country, date, chart.
  $("input[name='graph-radio']").on('change', function() {
    let per_time = $(this).val();
    let date = $('.date-list').val();
    if ($('.chart-icon').hasClass('fa-chart-line')) {
      var chart = 'bar';
    } else {
      var chart = 'line';
    }
    get_data(per_time, date, chart)
    // $.ajax({
    //   url: "{{route('dateToMonth')}}",
    //   method: 'GET',
    //   dataType: 'json',
    //     data: {per_time},
    //     success: function(res){
    //       if(res){
    //         $('.date-list').html('');
    //         if(res.status){
    //           for (const key in res.result) {
    //             $('.date-list').append(`<option>${res.result[key]}</option>`);
    //           }
    //         } else {
    //           for (const key in res.result) {
    //             $('.date-list').append(`<option>${res.result[key].date}</option>`);
    //           }
    //         }
    //       }
    //     }
    //   });
  })

  $('.date-list').on('change', function() {
    let date = $(this).val();
    let per_time = $("input[name='graph-radio']:checked").val();
    let detail = $('.detail-btn').val();
    if ($('.chart-icon').hasClass('fa-chart-line')) {
      var chart = 'bar';
    } else {
      var chart = 'line';
    }
    get_data(per_time, date, chart);
  })

  // $('.country-list').on('change', function(){
  $(document).on('click','.countryList_1-a li', function(){
    let date = $('.date-list').val();
    let per_time = $("input[name='graph-radio']:checked").val();
    let detail = $('.detail-btn').val();
    if ($('.chart-icon').hasClass('fa-chart-line')) {
      var chart = 'bar';
    } else {
      var chart = 'line';
    }
    get_data(per_time, date, chart);
  })

  $(document).on('click','.countryList_2-a li', function(){
    let date = $('.date-list').val();
    let per_time = $("input[name='graph-radio']:checked").val();
    let detail = $('.detail-btn').val();
    if ($('.chart-icon').hasClass('fa-chart-line')) {
      var chart = 'bar';
    } else {
      var chart = 'line';
    }
    get_data(per_time, date, chart);
  })

  function get_data(per_time, date, chart) {
    let detail_status = $('.detail-btn').val();
    let country_list_1 = $('#countryList_1').val();
    let country_list_2 = $('#countryList_2').val();
    if (detail_status == 0) {
      $.ajax({
        url: "{{ route('chart') }}",
        method: 'get',
        data: {
          'per_time': per_time,
          'date': date
        },
        dataType: 'json',
        success: function(res) {
          $('.chart-area').html('');
          $('.chart-area').append(`<div class="col-6">
              <canvas id="canada-chart"></canvas>
              <canvas id="america-chart"></canvas>
              <canvas id="australia-chart"></canvas>
              <canvas id="switzerland-chart"></canvas>
              <canvas id="newzealand-chart"></canvas>
            </div>
            <div class="col-6">
              <canvas id="japan-chart"></canvas>
              <canvas id="germany-chart"></canvas>
              <canvas id="france-chart"></canvas>
              <canvas id="england-chart"></canvas>
              <canvas id="turkey-chart"></canvas>
            </div>`);
          // making array 
          const time_arr = [];
          const canada_arr = [];
          const america_arr = [];
          const australia_arr = [];
          const switzerland_arr = [];
          const newzealand_arr = [];
          const japan_arr = [];
          const japan_2_arr = [];
          const germany_arr = [];
          const france_arr = [];
          const england_arr = [];
          const turkey_arr = [];
          for (val of res) {
            if(per_time == 24){
              time_arr.push(val.time.split(" ")[0].slice(5));
            } else {
            time_arr.push(val.time.split(" ")[0].slice(5) + "/" + val.time.split(" ")[1].slice(0,
              5));
            }

            canada_arr.push((val.japan - val.canada).toFixed(4));
            america_arr.push((val.japan - val.america).toFixed(4));
            australia_arr.push((val.japan - val.australia).toFixed(4));
            switzerland_arr.push((val.japan_2 - val.switzerland).toFixed(4));
            newzealand_arr.push((val.japan - val.newzealand).toFixed(4));
            japan_arr.push(parseFloat(val.japan).toFixed(4));
            japan_2_arr.push(parseFloat(val.japan_2).toFixed(4));
            germany_arr.push((val.japan - val.germany).toFixed(4));
            france_arr.push((val.japan - val.france).toFixed(4));
            england_arr.push((val.japan - val.england).toFixed(4));
            turkey_arr.push((val.japan - val.turkey).toFixed(4));
          }
          //currnet value, end value of array.
          const canada_last_val = canada_arr[canada_arr.length - 1];
          const america_last_val = america_arr[america_arr.length - 1];
          const australia__last_val = australia_arr[australia_arr.length - 1];
          const switzerland_last_val = switzerland_arr[switzerland_arr.length - 1];
          const newzealand_last_val = newzealand_arr[newzealand_arr.length - 1];
          const japan_last_val = japan_arr[japan_arr.length - 1];
          const germany_last_val = germany_arr[germany_arr.length - 1];
          const france_last_val = france_arr[france_arr.length - 1];
          const england_last_val = england_arr[england_arr.length - 1];
          const turkey_last_val = turkey_arr[turkey_arr.length - 1];

          const last_val = [
            canada_last_val,
            america_last_val,
            australia__last_val,
            switzerland_last_val,
            newzealand_last_val,
            japan_last_val,
            germany_last_val,
            france_last_val,
            england_last_val,
            turkey_last_val
          ];

          const country_arr = [
            canada_arr,
            america_arr,
            australia_arr,
            switzerland_arr,
            newzealand_arr,
            japan_arr,
            germany_arr,
            france_arr,
            england_arr,
            turkey_arr
          ];
          const country = [
            'canada-chart',
            'america-chart',
            'australia-chart',
            'switzerland-chart',
            'newzealand-chart',
            'japan-chart',
            'germany-chart',
            'france-chart',
            'england-chart',
            'turkey-chart'
          ];
          const label = [
            'カナダ１０年  &  最後  ',
            'アメリカ１０年  &  最後  ',
            'オーストラリア１０年  &  最後  ',
            'スイス２年  &  最後  ',
            'ニュージー１０年  &  最後  ',
            '日本１０年  &  最後  ',
            'ドイツ１０年  &  最後  ',
            'フランス１０年  &  最後  ',
            'イギリス１０年  &  最後  ',
            'トルコ１０年  &  最後  '
          ];
          const bg_color = [
            'rgba(13, 110, 253,0.3)',
            'rgba(102, 16, 242, 0.3)',
            'rgba(214, 51, 132, 0.3)',
            'rgba(7, 7, 100, 0.3)',
            'rgb(255, 193, 7, 0.3)',
            'rgb(196, 88, 80, 0.3)',
            'rgb(25, 135, 84, 0.3)',
            'rgb(184, 76, 148, 0.3)',
            'rgb(13, 202, 240, 0.3)',
            'rgb(51, 102, 0, 0.3)'
          ];
          const borderColor = [
            '#0d6efd',
            '#6610f2',
            '#d63384',
            '#070764',
            '#ffc107',
            '#c45850',
            '#198754',
            '#b84c94',
            '#0dcaf0',
            '#336600'
          ];
          for (var i = 0; i < last_val.length; i++) {
            var border_w = chart=='line' || chart==undefined ? '1px' : '';
            new Chart(document.getElementById(country[i]), {
              type: chart ?? 'line',
              data: {
                labels: time_arr,
                  datasets: [{
                    data: country_arr[i],
                    label: label[i] + last_val[i],
                    borderColor: borderColor[i],
                    fill: true,
                    borderWidth: border_w,
                    backgroundColor: bg_color[i],
                    pointBackgroundColor: 'white',
                  }]
              },
              options: {
                responsive: true,
                title: {
                  display: true,
                  text: label[i].split(" ")[0],
                  fontColor: 'red',
                  fontSize: 20
                },
                legend: {
                  labels: {
                    fontColor: borderColor[i],
                    fontSize: 16
                  }
                },
                tooltips: {
                  titleFontFamily: 'Open Sans',
                  backgroundColor: 'rgba(0,0,0,0.5)',
                  titleFontColor: 'white',
                  caretSize: 10,
                  cornerRadius: 2,
                  xPadding: 10,
                  yPadding: 15,
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                            }
                        }]
                },
              }
            });
          }
        }, //success
        error: function() {
          $('.main').html("<h2 class='text-center error_msg'>通信エラー。<br>インターネット接続を確認してください。</h2>");
        }
      }); //ajax
    } else {
      $.ajax({
        url: "{{ route('chart') }}",
        method: 'get',
        data: {
          'per_time': per_time,
          'date': date
        },
        dataType: 'json',
        success: function(res) {
          $('.chart-area').html('');
          var coun_1, coun_2, ii, jj;
          switch (country_list_1) {
            case '1':
              coun_1 = "canada";
              ii = '0';
              break;
            case '2':
              coun_1 = "america";
              ii = '1';
              break;
            case '3':
              coun_1 = "australia";
              ii = '2';
              break;
            case '4':
              coun_1 = "switzerland";
              ii = '3';
              break;
            case '5':
              coun_1 = "newzealand";
              ii = '4';
              break;
            case '6':
              coun_1 = "japan";
              ii = '5';
              break;
            case '7':
              coun_1 = "germany";
              ii = '7';
              break;
            case '8':
              coun_1 = "france";
              ii = '8';
              break;
            case '9':
              coun_1 = "england";
              ii = '9';
              break;
            case '10':
              coun_1 = "turkey";
              ii = '10';
          }
          switch (country_list_2) {
            case '1':
              coun_2 = "canada";
              jj = '0';
              break;
            case '2':
              coun_2 = "america";
              jj = '1';
              break;
            case '3':
              coun_2 = "australia";
              jj = '2';
              break;
            case '4':
              coun_2 = "switzerland";
              jj = '3';
              break;
            case '5':
              coun_2 = "newzealand";
              jj = '4';
              break;
            case '6':
              coun_2 = "japan";
              jj = '5';
              break;
            case '7':
              coun_2 = "germany";
              jj = '7';
              break;
            case '8':
              coun_2 = "france";
              jj = '8';
              break;
            case '9':
              coun_2 = "england";
              jj = '9';
              break;
            case '10':
              coun_2 = "turkey";
              jj = '10';
          }
            $('.chart-area').append(`
                <div class="row px-3 row text-center jsutify-content-center">
                  <div class="row col-6 m-auto">
                    <canvas id="coun_vs"></canvas>
                  </div>
                  <div class="row d-flex col-12 p-3">
                    <div class="col-5">
                      <canvas id="coun_1"></canvas>
                    </div>
                    <h1 class="col-2 fw-bolder text-danger">VS</h1>
                    <div class="col-5">
                      <canvas id="coun_2"></canvas>
                    </div>
                  </div>
                </div>`);
          // making array 
          const time_arr = [];
          const mix_arr = [];
          //originan value array
          const coun_1_arr = [];
          const coun_2_arr = [];
          for (val of res) {
            if(per_time == 24){
              time_arr.push(val.time.split(" ")[0].slice(5));
            } else {
            time_arr.push(val.time.split(" ")[0].slice(5) + "/" + val.time.split(" ")[1].slice(0,
              5));
            }
            //mixing array
            // mix_arr.push((val.coun_1 - val.coun_2).toFixed(4));
            mix_arr.push((val[coun_1]-val[coun_2]).toFixed(4));
            // original value
            coun_1_arr.push(val[coun_1]);
            coun_2_arr.push(val[coun_2]);
          }
          
          //currnet value, end value of array.this is value differece of two item.
          const mix_arr_last_val     = mix_arr[mix_arr.length - 1];
          
          //current origian value. this is self.
          const coun_1_arr_last      = coun_1_arr[coun_1_arr.length - 1];
          const coun_2_arr_last      = coun_2_arr[coun_2_arr.length - 1];
          
          const label = [
            'カナダ１０年  &  最後  ',
            'アメリカ１０年  &  最後  ',
            'オーストラリア１０年  &  最後  ',
            'スイス２年  &  最後  ',
            'ニュージー１０年  &  最後  ',
            '日本１０年  &  最後  ',
            '日本２年  &  最後  ',
            'ドイツ１０年  &  最後  ',
            'フランス１０年  &  最後  ',
            'イギリス１０年  &  最後  ',
            'トルコ１０年  &  最後  '
          ];
          const bg_color = [
            'rgba(13, 110, 253,0.3)',
            'rgba(102, 16, 242, 0.3)',
            'rgba(214, 51, 132, 0.3)',
            'rgba(7, 7, 100, 0.3)',
            'rgb(255, 193, 7, 0.3)',
            'rgb(196, 88, 80, 0.3)',
            'rgb(196, 88, 80, 0.3)',
            'rgb(25, 135, 84, 0.3)',
            'rgb(184, 76, 148, 0.3)',
            'rgb(13, 202, 240, 0.3)',
            'rgb(51, 102, 0, 0.3)'
          ];
          const borderColor = [
            '#0d6efd',
            '#6610f2',
            '#d63384',
            '#070764',
            '#ffc107',
            '#c45850',
            '#c45850',
            '#198754',
            '#b84c94',
            '#0dcaf0',
            '#336600'
          ];
          
            //  minus value
            var bg = 'rgb(51, 102, 0, 0.3)';
            var border_w = chart=='line' ? '1px' : '';
            new Chart(document.getElementById("coun_vs"), {
              type: chart ?? 'line',
              data: {
                labels: time_arr,
                  datasets: [{
                    data: mix_arr,
                    label: "最後の違い: "+mix_arr_last_val,
                    borderColor:'#336600',
                    fill: true,
                    borderWidth: border_w,
                    backgroundColor: bg,
                  }]
              },
              options: {
                title: {
                  display: true,
                  text: label[ii].split(" ")[0]+"と"+label[jj].split(" ")[0]+"の金利差",
                  fontColor: 'red',
                  fontSize: 20
                },
                legend: {
                  labels: {
                    fontColor: '#336600',
                    fontSize: 16
                  }
                },
                tooltips: {
                  titleFontFamily: 'Open Sans',
                  backgroundColor: 'rgba(0,0,0,0.5)',
                  titleFontColor: 'white',
                  caretSize: 5,
                  cornerRadius: 2,
                  xPadding: 10,
                  yPadding: 15
                },
              }
            });
            // original chartline
            new Chart(document.getElementById("coun_1"), {
              type: chart ?? 'line',
              data: {
                labels: time_arr,
                  datasets: [
                    {
                    data: coun_1_arr,
                    label: label[ii]+":"+coun_1_arr_last,
                    borderColor:borderColor[ii],
                    fill: true,
                    borderWidth: border_w,
                    backgroundColor: bg_color[ii],
                  }
                ]
              },
              options: {
                title: {
                  display: true,
                  text: label[ii].split(" ")[0],
                  fontColor: 'red',
                  fontSize: 20
                },
                legend: {
                  labels: {
                    fontColor: borderColor[ii],
                    fontSize: 16
                  }
                },
                tooltips: {
                  titleFontFamily: 'Open Sans',
                  backgroundColor: 'rgba(0,0,0,0.5)',
                  titleFontColor: 'white',
                  caretSize: 5,
                  cornerRadius: 2,
                  xPadding: 10,
                  yPadding: 15
                },
              }
            });
            new Chart(document.getElementById("coun_2"), {
              type: chart ?? 'line',
              data: {
                labels: time_arr,
                  datasets: [
                    {
                    data: coun_2_arr,
                    label: label[jj]+":"+coun_2_arr_last,
                    borderColor:borderColor[jj],
                    fill: true,
                    borderWidth: border_w,
                    backgroundColor: bg_color[jj],
                  }
                ]
              },
              options: {
                title: {
                  display: true,
                  text: label[jj].split(" ")[0],
                  fontColor: 'red',
                  fontSize: 20
                },
                legend: {
                  labels: {
                    fontColor: borderColor[jj],
                    fontSize: 16
                  }
                },
                tooltips: {
                  titleFontFamily: 'Open Sans',
                  backgroundColor: 'rgba(0,0,0,0.5)',
                  titleFontColor: 'white',
                  caretSize: 5,
                  cornerRadius: 2,
                  xPadding: 10,
                  yPadding: 15
                },
              }
            });
        }, //success
        error: function() {
          $('.main').html("<h2 class='text-center error_msg'>通信エラー。<br>インターネット接続を確認してください。</h2>");
        }
      }); //ajax
    }
  } //get_data()
  get_data();
  setInterval(get_data, 900000); //900s

  //  fn to show current time
  function show_time() {
    let date = new Date();
    let y = date.getFullYear();
    let m = date.getMonth() + 1;
    let d = date.getDate();
    let h = date.getHours();
    let i = date.getMinutes();
    const weekday = ["日","月","火","水","木","金","土"];
    const days = new Date();
    let day = weekday[days.getDay()];

    if (m < 10)
      m = "0" + m;
    if (d < 10)
      d = "0" + d;
    if (h < 10)
      h = "0" + h;
    if (i < 10)
      i = "0" + i;
    if(days.getDay() == 0 || days.getDay() == 6 ){
      $('.show_day').css('color', '#d63484');  
    }
    $('.show_time').html(h + "：" + i);
    $('.show_day').html(day);
    $('.show_date').html(y + "-" + m + "-" + d);
  }
  show_time();
  setInterval(show_time, 10000);
</script>
