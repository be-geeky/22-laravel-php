@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Experiences</div>
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                            <th>Image</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->id_user == Auth::user()->id)
                        @foreach($exps as $exp)
                        <tr>
                            @if($user->id_exp == $exp->id)
                                <td>{{ link_to_route('exp.show', $exp->name, [$exp->id]) }}</td>
                                <td>
                                    {!! Form::open(array('route'=>['exp.destroy', $exp->id], 'method'=>'DELETE')) !!}
                                    {{ link_to_route('exp.edit', 'Edit', [$exp->id], ['class' => 'btn btn-primary']) }}
                                    |
                                    {!! Form::button('Delete', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    img
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @endif
                @endforeach
                            </table>
                        </div>
                    </div>
            {{ link_to_route('exp.create', 'Add new experience', null, ['class' => 'btn btn-success']) }}
        </div>
    </div>
</div>
@endsection
