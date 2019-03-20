@extends('layouts.forum')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img width="40" height="40" src="{{Auth::user()->gravatar }}"/>
                    Dashboard
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ action('TopicController@create') }}" class="btn btn-primary"> Create topic</a>
                    <br><br><h3> Owned topics </h3>
                    @if(count($topics) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th> Title </th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($topics as $topic)
                                <tr>
                                    <td> {{$topic->title}} </td>
                                    <td><a href="{{ action('TopicController@edit', $topic->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete topic', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    {{$topics->links()}}
                    @else
                        <p> No topics found </p>
                    @endif<br><br>

                    <h3>Statistics</h3>
                    <div id="chart-div">
                        <?= Lava::render('BarChart', 'Topics', 'chart-div') ?>
                    </div>



                    <br><br>
                    <h3>Your Location</h3>
                    <div style="width: 670px; height: 500px;">
                        {!! Mapper::render() !!}
                    </div>

                    <script type="text/javascript">

                        function onMapLoad(map)
                        {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(
                                    function(position) {
                                        var pos = {
                                            lat: position.coords.latitude,
                                            lng: position.coords.longitude
                                        };

                                        var marker = new google.maps.Marker({
                                            position: pos,
                                            map: map,
                                            title: "Location found."
                                        });

                                        map.setCenter(pos);
                                    }
                                );
                            }
                        }
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
