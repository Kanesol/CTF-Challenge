@extends('app')


@section('content')

        <h1 class="page-header">Challenges</h1>




        <h2 class="sub-header">Tier One</h2>


        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Type
                        </th>
                        <th>
                           Title
                        </th>
                        <th>
                            Points
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Link
                        </th>
                    </tr>
                </thead>
                @foreach($data['categories'] as $category)
                    
                        
                        @foreach($category['challenges'] as $challenge)
                        <tr>
                            <td>{{$category['name']}}</td>
                            <td>
                                {{$challenge['name']}}
                            </td>
                            <td>
                                {{$challenge['point_value']}}
                            </td>
                            <td>
                                {{$challenge['description']}}
                            </td>
                            <td>
                                @foreach($data['files'] as $filename)
                                    @if (strpos($filename, $challenge['id'], 0) === 0)

                                        {!! link_to('/Challenges_Repo/'.$filename, 'Link') !!}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    
                @endforeach
            </table>
        </div>



@stop
