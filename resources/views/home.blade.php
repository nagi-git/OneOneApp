@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="d-inline me-4">会議一覧</h3>
    <button type="button" class="btn btn-primary d-inline pes-1 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ＋追加
    </button>
    <meeting-modal :csrf="{{json_encode(csrf_token())}}">
    </meeting-modal>

    <meeting-list>
    </meeting-list>
@endsection