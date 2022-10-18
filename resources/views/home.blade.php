@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="d-inline me-4">会議一覧</h3>
    <button type="button" class="btn btn-primary d-inline pes-1 mb-2" data-bs-toggle="modal" data-bs-target="#meetingModal">
        ＋追加
    </button>
    <meeting-list/>
    <!-- <meeting-modal :csrf="{{json_encode(csrf_token())}}">  :onSava="console.log()"> -->
    <!-- </meeting-modal>

    <meeting-list :meetings="meetings">
    </meeting-list> -->
</div>
@endsection