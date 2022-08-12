@extends('layouts.app')


@section('content')
@if (!auth()->user()->hasRole('society_head'))

<section class="cover height-50 imagebg" data-gradient-bg="#3590F3,#62BFED,#8FB8ED,#C2BBF0,#C9B8DF">

    <div class="container pos-vertical-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <h1 style="font-family: 'Rajdhani', sans-serif; color:white; margin-bottom:0; font-size:8rem;"> डैशबोर्ड </h1>
            <h3 style="font-family: 'Rajdhani', sans-serif; color:white; margin-top: -2rem; font-size:3rem;"> डीटीयू टाइम्स</h3>     
            </div>
        </div>
    </div>
</section>
<section class="cover hidden-xs">
    <div class="containe ">
        <div class="row justify-content-center">
            <div class="col-md-9">
            <canvas height="100" id="storyChart"></canvas>
            </div>
        </div>
    </div>
</section>

@endif

@if (!auth()->user()->hasRole('photographer') && !auth()->user()->hasRole('society_head'))

<section class="">
    <div class="container" style="padding-top: 3rem;">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                @php
                $published = auth()->user()->story()->whereStatus('published')->latest()->first();
                $pending = auth()->user()->story()->whereStatus('pending')->latest()->first();

                @endphp
                <small>Latest published: {{ $published ? $published->title : 'No story published yet'  }}</small> <br>
                <small>Last story submitted for approval: {{ $pending ? $pending->title : 'No story submitted for approval yet' }}</small>
            </div>
            <div class="col-md-6">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</section>
@endif

@if (!auth()->user()->hasRole('society_head'))
<section class="{{ auth()->user()->hasRole('photographer') ? 'pt-5' : 'pt-0' }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-10">
                <h3>To-do list</h3>
                <ol class="process-3">
                    @foreach ($todos as $item)
                    <li class="process_item">
                        <div class="process__number">
                            <span>{{ $item->id }}</span>
                        </div>
                        <div class="process__body">
                            <h4 class="m-0">
                                {{ $item->name }}
                            </h4>
                            <p class="m-0">
                                {{ $item->description }}
                            </p>
                            <p>
                                <small>Created by {{ \App\User::find($item->user_id) ? \App\User::find($item->user_id)->name : 'Not found' }},</small>
                                @if ($item->completed_by)
                                <small>
                                    Completed by {{ \App\User::find($item->completed_by) ? \App\User::find($item->completed_by)->name : 'The User has been deleted or Not found' }}, {{ \Carbon\Carbon::parse($item->completed_at)->diffForHumans() }}
                                </small>
                                @else
                                <small>
                                    <a href="{{ route('todos.done', $item->id) }}">Mark as Done</a>
                                </small>
                                @endif
                                <small>
                                    <a class="text-danger" href="{{ route('dashboard') }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Remove</a>
                                </small>
                            </p>
                        </div>
                    </li>
                    <form id="delete-form" action="{{ route('todos.destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                    @endforeach
                </ol>

                <div class="mt-5">
                    <form action="{{ route('todos.store') }}" method="post" class="row">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" name="name" class="class-validate" placeholder="New task" required>
                        </div>

                        <div class="col-md-6">
                            @if (auth()->user()->hasRole('council') || auth()->user()->hasRole('superuser') || auth()->user()->hasRole('coordinator'))
                            <small class="mr-3">Visibile to: </small>
                            <br class="hidden-lg">
                            <div class="input-radio input-radio--innerlabel">
                                <input id="all" type="radio" name="for" value="all" />
                                <label for="all">ALL</label>
                            </div>
                            <div class="input-radio input-radio--innerlabel">
                                <input id="columnist" type="radio" name="for" value="columnist" />
                                <label for="columnist">Columnists</label>
                            </div>
                            <div class="input-radio input-radio--innerlabel">
                                <input id="photographer" type="radio" name="for" value="photographer" />
                                <label for="photographer">Photographers</label>
                            </div>
                            @elseif (auth()->user()->hasRole('columnist'))
                            <input type="hidden" name="for" value="columnist">
                            @elseif (auth()->user()->hasRole('photographer'))
                            <input type="hidden" name="for" value="photographer">
                            @endif

                        </div>

                        <div class="col-md-6">
                            <textarea name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
                        </div>

                        <div class="col-md-4">
                            <input type="submit" value="Add To List" class="btn btn--sm type--uppercase">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@endif

@if (auth()->user()->hasRole('society_head'))
@include('users.society_head.dashboard')
@endif

@endsection

@php
$totalUser = auth()->user()->story()->count();
$pendingUser = auth()->user()->story()->whereStatus('pending')->count();
$publishedUser = auth()->user()->story()->whereStatus('published')->count();
$draftUser = auth()->user()->story()->whereStatus('draft')->count();
@endphp
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        if (ctx) {
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Total", "Draft", "Pending", "Published",],
                    datasets: [{
                        data: [{{ $totalUser }}, {{ $draftUser }}, {{ $pendingUser }}, {{ $publishedUser }}],
                        backgroundColor: [
                            'rgba(255,99,132,1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(10, 199, 172, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        display: true,
                        position: 'left'
                    }
                }
            });
        }
    </script>
    @php
    $datasets = [];
    $arrX = range(1, 12);
    if(!is_null($total)) {
        $datasets[] = [
            'label' => 'Total',
            'data' => array_map(function ($x) use ($total) {
                return $total[$x];
            }, $arrX),
            borderColor =>'rgba(255,99,132,1)',
            borderWidth => 1,
            fill => 'flase',
        ];
    }
    if(!is_null($draft)) {
        $datasets[] = [
            'label' => 'Draft',
            'data' => array_map(function ($x) use ($draft) {
                return $draft[$x];
            }, $arrX),
            borderColor =>'rgba(255, 206, 86, 1)',
            borderWidth => 1,
            fill => 'flase',
        ];
    }
    if(!is_null($pending)) {
        $datasets[] = [
            'label' => 'Pending',
            'data' => array_map(function ($x) use ($pending) {
                return $pending[$x];
            }, $arrX),
            borderColor =>'rgba(54, 162, 235, 1)',
            borderWidth => 1,
            fill => 'flase',
        ];
    }
    if(!is_null($published)) {
        $datasets[] = [
            'label' => 'Published',
            'data' => array_map(function ($x) use ($published) {
                return $published[$x];
            }, $arrX),
            borderColor =>'rgba(54, 162, 235, 1)',
            borderWidth => 1,
            fill => 'flase',
        ];
    }
    @endphp
    <script>
        var ct = document.getElementById("storyChart");
        var storyChart = new Chart(ct, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
                datasets: @json($datasets)
            },
            options: {
                reponsive: true,
            }
        });
    </script>
@endsection
