@extends('layouts.app') 


@section('content')
<section class="pt-5 pb-5 border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <h1>Stories Stats</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>



@if (!auth()->user()->hasRole('photographer'))
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <canvas height="100" id="myChart"></canvas>
                </div>
            </div>
        </div>
    </section>

@endif 

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $total[1] }},
                        {{ $total[2] }},
                        {{ $total[3] }},
                        {{ $total[4] }},
                        {{ $total[5] }},
                        {{ $total[6] }},
                        {{ $total[7] }},
                        {{ $total[8] }},
                        {{ $total[9] }},
                        {{ $total[10] }},
                        {{ $total[11] }},
                        {{ $total[12] }},
                    ],
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    fill: 'flase',
                },
                {
                    label: 'Draft',
                    data: [
                        {{ $draft[1] }},
                        {{ $draft[2] }},
                        {{ $draft[3] }},
                        {{ $draft[4] }},
                        {{ $draft[5] }},
                        {{ $draft[6] }},
                        {{ $draft[7] }},
                        {{ $draft[8] }},
                        {{ $draft[9] }},
                        {{ $draft[10] }},
                        {{ $draft[11] }},
                        {{ $draft[12] }},
                    ],
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    fill: 'flase',
                },
                {
                    label: 'Pending',
                    data: [
                        {{ $pending[1] }},
                        {{ $pending[2] }},
                        {{ $pending[3] }},
                        {{ $pending[4] }},
                        {{ $pending[5] }},
                        {{ $pending[6] }},
                        {{ $pending[7] }},
                        {{ $pending[8] }},
                        {{ $pending[9] }},
                        {{ $pending[10] }},
                        {{ $pending[11] }},
                        {{ $pending[12] }},
                    ],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: 'flase',
                },
                {
                    label: 'Published',
                    data: [
                        {{ $published[1] }},
                        {{ $published[2] }},
                        {{ $published[3] }},
                        {{ $published[4] }},
                        {{ $published[5] }},
                        {{ $published[6] }},
                        {{ $published[7] }},
                        {{ $published[8] }},
                        {{ $published[9] }},
                        {{ $published[10] }},
                        {{ $published[11] }},
                        {{ $published[12] }},
                    ],
                    borderColor: 'rgba(10, 199, 172, 1)',
                    borderWidth: 1,
                    fill: 'flase',
                },
                ]
            },
            options: {
                reponsive: true,
            }
        });
    </script>
    
@endsection