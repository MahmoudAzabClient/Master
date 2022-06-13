@extends('layouts.master')
@section('title')
    لوحة التحكم - برنامج الفواتير
@stop
@section('css')
    
@section('title')
    تقرير المبيعات و المصروفات
@stop
@endsection
@section('page-header')
   
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show align-content-center" style="text-align: center" role="alert">
            <strong style="align-content: center">{{ session()->get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" style="text-align: center" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- row closed -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20 ">
                <div class="card-header pb-0">
                        <form action="{{route('bar')}}" method="GET" role="search" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-lg-3" id="start_at">
                                    <label for="exampleFormControlSelect1">من تاريخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" value="{{ $start_at ?? '' }}"
                                                     name="start_at" id="start_date" placeholder="YYYY-MM-DD" type="text">
                                    </div><!-- input-group -->
                                </div>

                                <div class="col-lg-3" id="end_at">
                                    <label for="exampleFormControlSelect1">الي تاريخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" name="end_at" id="end_date"
                                                     value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="text">
                                    </div><!-- input-group -->
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <button class="btn btn-primary btn-block">بحث</button>
                                </div>
                            </div>
                        </form>

                </div>
                <div class="card-body">
                        <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    const formatDate = (date) => {
        let d = new Date(date);
        let month = (d.getMonth() + 1).toString().padStart(2, '0');
        let day = d.getDate().toString().padStart(2, '0');
        let year = d.getFullYear();
        return [year, month, day].join('-');
    }

    var start_date = formatDate(document.getElementById('start_date').value);
    var end_date = formatDate(document.getElementById('end_date').value);
    fetch("{{ URL::to('bar-chart') }}/" + start_date + "/" + end_date).then(response => response.json()).then(json => {
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: json.labels,
            datasets: json.datasets
        },
        options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Bar Chart'
      }
    }
  },
});
});
</script>
@endsection
