@extends('layouts.master')
@section('content')

@component('admin.components.tablePaginate')
@slot('create', route('lessons.create'))   
@slot('title', 'Aulas/Treinos')

@slot('head')
    <th class="text-center" width="15%">Funcionário</th>
    <th class="text-center" width="15%">Aluno</th>
    <th class="text-center" width="15%">Data e Hora de início</th>
    <th class="text-center" width="10%">Data e Hora de término</th>
    <th class="text-center" width="10%">Custo</th>
@endslot

@slot('body')
    @foreach ($lessons as $lesson)
    <tr>
        <td class="text-center">{{ $lesson->user->name }}</td>
        <td class="text-center">{{ $lesson->student->name }}</td>
        <td class="text-center">{{ $lesson->start_time }}</td>
        <td class="text-center">{{ $lesson->end_time }}</td>
        <td class="text-center">{{ $lesson->price }}</td> 
        <td class="options text-center">
            
            <a href="{{ route('lessons.edit', $lesson->id) }}" title="Editar Aula" class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg></a>  

            <a href="{{ route('lessons.show', $lesson->id) }}" title="Visualizar Usuário" class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg></a>
            <form class="form-delete" action="{{ route('lessons.destroy', $lesson->id) }}" method="post">
                @csrf
                @method('delete')

                <button type="submit" title="Excluir Aula" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                </svg></button>
            </form>
        </td>
    </tr>
    @endforeach
@endslot

@endcomponent

@endsection

@push('scripts')
<script src="{{ asset('js/components/dataTable.js') }}"></script>
<script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush