@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Lista de Usuários</h3>
            {!! Button::primary('Add Usuário')->asLinkTo(route('admin.users.create')) !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($users->items())
                    ->callback('Ações', function($field, $model){
                       $linkEdit = route('admin.users.edit', ['user' => $model->id]);
                       $linkShow = route('admin.users.show', ['user' => $model->id]);

                       return Button::link('Editar')->asLinkTo($linkEdit).'|'.
                              Button::link('Ver Usuário')->asLinkTo($linkShow);
                    })
            !!}
        </div>
        <div class="row">
            {!! $users->links() !!}
        </div>
    </div>


@endsection