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
                    <form action="{{route('search2')}}" method="POST" role="search" autocomplete="off">
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
                <h2 style="text-align:center"><a href="{{ route('home2') }}"> مبيعات الاقسام تفصيلى </a></h2>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (isset($query))
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                            <tr style="background-color:#33FFE9">
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0"> الفرع</th>
                                @foreach($categories as $category)
                                    <th class="border-bottom-0"> {{$category->is7_name1}}</th>
                                    {{-- <th class="border-bottom-0"> {{$category->Is7Name1}}</th> --}}
                                @endforeach
                                <th class="border-bottom-0"> الاجماليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($query as $key =>  $item)
                                <tr>
                                        <td scope="row">{{$key+1}}</td>
                                        <td scope="row" style="background-color:#5BFF33"><a href="{{ url('home2') }}/{{ $item->PsBranchCode }}">{{ $item->PsBranch }}</a></td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales1, 2)}}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales2, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales3, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales4, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales5, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales6, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales7, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales8, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales9, 2) }}</td>
                                        <td scope="row">{{number_format((float) $item->PsIs1Sales10, 2) }}</td>
                                        @if ($item->PsBranchCode == 1)
                                        <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales1, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 2)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales2, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 3)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales3, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 4)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales4, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 5)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales5, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 6)
                                         <td style="background-color: #80ced6;"  scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales6, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 7)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales7, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 8)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales8, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 9)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales9, 2) }}</td>
                                        @elseif ($item->PsBranchCode == 10)
                                         <td style="background-color: #80ced6;" scope="row">{{number_format((float) $total_branch[0]->PsBranchCodeSales10, 2) }}</td>
                                        @endif
                                       
                                </tr>
                            @endforeach
                            <tr style="background-color: #F933FF;">
                                <td scope="row">10</td>
                                <td scope="row">اجمالى المبيعات</td>
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales1, 2) }}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales2, 2) }}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales3, 2)}}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales4, 2) }}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales5, 2)}}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales6, 2) }}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales7, 2) }}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales8, 2) }}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales9, 2)}}</td>                                                               
                                 <td scope="row">{{number_format((float) $total_category[0]->PsIs1Sales10, 2) }}</td>    
                                                                                           
                                                                         
                                                                                              
                                <td scope="row">{{$total_sales[0]->PsIs7Sales}}</td>
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
    
    {{--<!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script> --}}
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

@endsection
