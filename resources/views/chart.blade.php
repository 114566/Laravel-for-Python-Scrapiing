@extends('layouts.app')
@section('title', '長期金利ビューシステム')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('sel') }}">SEL</a>
    <div class="test">test in chart</div>
    <div class="title d-flex align-items-center justify-content-between p-2 pt-4">
      <h2 class="col-3 text-center fw-bold" onclick="location.reload()">長期金利ビューシステム</h2>
      <div class="col-3 ja-font pl-4 text-center position-relative">
        <label class="position-absolute px-2 fw-bolder graph-display-label">グラフ表示の種類</label>
        <div class="classfication d-flex justify-content-center pt-4 px-4" onchange=graphRadio()>
          <div class="form-check px-3">
            <input class="form-check-input hourly" type="radio" name="graph-radio" value=1 id="flexRadioDefault1"
              checked />
            <label class="form-check-label" for="flexRadioDefault1">1時間単位</label>
          </div>
          <div class="form-check px-3">
            <input class="form-check-input fourhourly" type="radio" name="graph-radio" value=4 id="flexRadioDefault2" />
            <label class="form-check-label" for="flexRadioDefault2"> 4時間単位</label>
          </div>
          <div class="form-check px-3">
            <input class="form-check-input daily" type="radio" name="graph-radio" value=24 id="flexRadioDefault3" />
            <label class="form-check-label" for="flexRadioDefault3">1日単位</label>
          </div>
        </div>
      </div>
      <div class="col-6 d-flex align-items-center justify-content-center px-2">
        <div class="date-option d-flex ja-font px-1 pt-1 text-center align-items-end">
          <div class="p-2">
            <button class="mx-3 btn btn-info detail-btn py-0 text-white fs-6" value=0>国別表示</button>
          </div>
          <div class="country-dropdown p-2">
            <select class="form-select-sm country-list" id="countryList_1">
              {{-- <option value=0 disabled selected hidden>国を選択してください。</option> --}}
              @foreach ($country_list as $item)
                {
                <option value={{ $item->id }} data-icon="{{ asset('asset/img/flag/' . $item->flag_url . '') }}">
                  {{ $item->country }}</option>
                }
              @endforeach
            </select>
          </div>
          <div class="country-dropdown p-2">
            <select class="form-select-sm country-list" id="countryList_2">
              {{-- <option value=0 disabled selected hidden>国を選択してください。</option> --}}
              @foreach ($country_list as $item)
                {
                <option value={{ $item->id }} data-icon="{{ asset('asset/img/flag/' . $item->flag_url . '') }}">
                  {{ $item->country }}</option>
                }
              @endforeach
            </select>
          </div>
          <div class="d-flex p-2">
            <div class="date_list">
              <select class="form-select-sm date-list wrapper">
                @foreach ($date_list as $val)
                  {
                  <option>{{ $val->date }}</option>
                  }
                @endforeach
              </select>
            </div>
          </div>
          <div class="time px-3">
            <div class="show_date"></div>
            <div>
              <span class="show_time"></span>
              ｜
              <span class="show_day fw-bold"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bar-to-line">
    <div class="change_chart_back">
      <div class="change_chart_btn">
        <i class="fa-solid fa-chart-column chart-icon"></i>
      </div>
    </div>
  </div>
  <div class="container-fluid main">
    <div class="px-5 d-flex bg-white chart-area">
      {{-- <div class="col-6">
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
      </div> --}}
    </div>
  </div>
  @include('function.fn')
  <script>
    $(function() {
      $('#countryList_1').IconSelectBox(true);
      $('#countryList_2').IconSelectBox(true);
      $('.country-dropdown').hide();
      $('.detail-btn').on('click', function() {
        $(this).toggleClass('show-hide');
        if ($(this).hasClass('show-hide')) {
          $('.country-dropdown').fadeIn(400);
          $(this).html("<i class='fas fa-minus'></i>");
          $(this).val(1);
        } else {
          let date = $('.date-list').val();
          let per_time = $("input[name='graph-radio']:checked").val();
          $('.country-dropdown').fadeOut(400, function() {
            $('.detail-btn').html("国別表示");
          });
          $(this).val(0);
          $('#countryList_1').val("1");
          get_data(per_time, date, 'line');

        }
      })
    })

    document.querySelector('.changeSelected').addEventListener('click', changeSelected);
  </script>
@endsection
