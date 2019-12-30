@extends('layouts.app')
@section('links')
    
@endsection 
@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>Permissions</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <form method="POST" action="{{ route('users.permission.update', $user->uuid) }}" class="row mt-0">
                @csrf
                <div class="col-md-12">
                    <select name="permissions" id="">
                        @foreach ($allPermissions as $item)
                            <option value="{{$item->name}}">{{ $item->display_name }}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn--sm">
                        Change Permissions
                    </button>
                </div>
            </form>
            <hr>
            <ul class="accordion accordion-2 accordion--oneopen">
                @foreach ($userPermissions as $item)
                <li>
                    <div class="accordion__title">
                        <span class="h5">{{ $item->display_name }}</span>
                    </div>
                    <div class="accordion__content">
                        {{ $item->description }}
                        <a href="#">Remove</a>
                    </div>
                @endforeach
            </ul>
            
        </div>
    </div>
</div>
</section>

@endsection

@section('scripts')
    
@endsection