@extends('app')

@section('log')
    @if(isset($user))
        <li><a href="/auth/login">Log In</a></li>
    @else
        <li><a href="/auth/logout">Log Out</a></li>    
    @endif
@stop

@section('content')

        <h1 class="page-header">Challenges</h1>

        @foreach($data['categories'] as $category)
            <h2 class="sub-header">{{$category['name']}}</h2>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">
                               Title
                            </th>
                            <th class="text-center">
                                Points
                            </th>
                            <th class="text-center">
                                Description
                            </th>
                            <th class="text-center">
                                Link
                            </th>
                            <th class="text-center">
                                Completed
                            </th>
                        </tr>
                    </thead>
                
                    
                        
                        @foreach($category['challenges'] as $challenge)
                        <tr>
                            
                            <td class="col-md-2">
                                {!!nl2br($challenge['name'])!!}
                            </td>
                            <td class="col-md-1 text-center">
                                {{$challenge['point_value']}}
                            </td>
                            <td class="col-md-3">
                                {!!nl2br($challenge['description'])!!}
                            </td>
                            <td class="col-md-1 text-center">
                                @foreach($data['files'] as $filename)
                                    @if (strcmp(explode('.', $filename)[0], $challenge['id']) === 0)

                                        {!! link_to('/Challenges_Repo/'.$filename, 'Link') !!}
                                    @endif
                                @endforeach
                            </td>
                            <td class="col-md-1 text-center">
                                 <?php $flag = 0 ?>
                                @foreach($data['completed'] as $comp)

                                    @if( $comp['challenge_id'] === $challenge['id'])
                                        <?php $flag = 1 ?>
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    @endif
                                @endforeach
                                @if($flag == 0)
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    
               </table>
               @endforeach
            
        </div>



@stop
