@extends('layouts.app')

@section('content')
    @if(count($userInformation) > 0)
        @foreach($userInformation as $uInfo)
            <div style="margin-left: 45%;" class="well">
                  <div class="col-md-6">
                    <h3><a href="/showprofile/{{$uInfo->name}}">{{$uInfo->name}}</a></h3>
                      <!---  {{$uInfo->name}} -->
                    </div>
            </div>
        @endforeach
    @else
        <p>No user found</p>
    @endif
@endsection
