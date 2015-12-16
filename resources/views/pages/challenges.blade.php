@extends('app')


@section('content')

        <h1 class="page-header">Challenges</h1>



        @foreach($data['categories'] as $category)
            <h2 class="sub-header">{{$category['name']}}</h2>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
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
                
                    
                        
                        @foreach($category['challenges'] as $challenge)
                        <tr>
                            
                            <td class="col-md-2">
                                {!!nl2br($challenge['name'])!!}
                            </td>
                            <td class="col-md-1">
                                {{$challenge['point_value']}}
                            </td>
                            <td class="col-md-3">
                                {!!nl2br($challenge['description'])!!}
                            </td>
                            <td class="col-md-1">
                                @foreach($data['files'] as $filename)
                                    @if (strcmp(explode('.', $filename)[0], $challenge['id']) === 0)

                                        {!! link_to('/Challenges_Repo/'.$filename, 'Link') !!}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    
               </table>
               @endforeach
            
        </div>



@stop
