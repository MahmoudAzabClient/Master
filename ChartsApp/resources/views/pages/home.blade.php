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

   
    
    <!-- row closed -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-t-50 ">
                <div class="row">
                @include('includes.nav')    
                </div>
                <div class="card-header pb-0">
                    <form action="{{route('search')}}" method="POST" role="search" autocomplete="off">
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
                                                id="start_date" name="start_at" placeholder="YYYY-MM-DD" type="text">
                                    </div><!-- input-group -->
                                </div>

                                <div class="col-lg-3" id="end_at">
                                    <label for="exampleFormControlSelect1">الي تاريخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" name="end_at"
                                                id="end_date"     value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="text">
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
                @include('includes.alerts.success')
                @include('includes.alerts.error')
                @include('includes.alerts.errors')
                <h2 style="text-align:center"><a href="{{ route('home') }}">مبيعات الفروع اجمالى </a></h2>
                <div class="card-body">
                <label>عدد السجلات</label>
                    <div class="table-responsive">
                        @if (isset($query))
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                            <tr class="color-white" style="background-color:#16A98C;">
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0"> الفرع</th>
                                <th class="border-bottom-0"> المبيعات</th>
                                <th class="border-bottom-0"> المصروفات</th>
                                <th class="border-bottom-0"> الصافى</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($query as $key =>  $item)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td scope="row" ><a href="{{ URL::to('home')}}/{{ $item->PsBranchCode}}">{{ $item->PsBranch }}</a></td>
                                    <td scope="row" style="background-color:#FFAD5B">{{ number_format((float) $item->PsSales, 2)}}</td>
                                    <td scope="row" style="background-color:#F33A6A ">{{number_format((float) $item->PsExpenses, 2)}}</td>
                                    <td scope="row" style="background-color: #3FB7C7;">{{$item->PsSales - $item->PsExpenses}}</td>
                                </tr>
                            @endforeach
                            <tr style="background-color: #C93D2E; color: white;">
                                <td scope="row">{{ $key+2 }}</td>
                                <td scope="row">اجماليات </td>
                                <td scope="row">{{$total_sales}}</td>
                                <td scope="row">{{$total_expenses}}</td>
                                <td scope="row">{{$total_sales - $total_expenses}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
                <div>
                        <canvas id="myChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>

    <!-- Container closed -->
@endsection

@section('js')

    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    
     <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    
    
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>
     <script>
    var ctx = document.getElementById('myChart1').getContext('2d');
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
    indexAxis: 'y',
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      bar: {
        borderWidth: 2,
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'right',
      },
      title: {
        display: true,
        text: 'الرسم البيانى'
      }
    }
  },
});
});
</script>
<script>
    .color-white{
        color: white;
    }
</script>
@endsection
