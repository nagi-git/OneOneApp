@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="d-inline me-4">会議一覧</h3>
    <button type="button" class="btn btn-primary d-inline pes-1 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ＋追加
    </button>
    <meeting-modal-component>
    </meeting-modal-component>

    <div class="row col-md-12 justify-content-center">
        <div class="card col-md-5 m-2">
            <div class="card-body">
                <h4 class="card-title mb-0">エムにゃんの1on1</h4>
                <p class="ms-3">2022年8月27日 10:00～10:30</p>
                <h6 class="1h-sm mb-1">■参加者</h6>
                <p class="ms-3 m-0">牧野さん</p>
                <p class="ms-3 m-0">エムにゃん</p>
            </div>
        </div>
        <div class="card col-md-5 m-2">
            <div class="card-body">
                <h4 class="card-title mb-0">エムにゃんの1on1</h4>
                <p class="ms-3">2022年8月27日 10:00～10:30</p>
                <h6 class="1h-sm mb-1">■参加者</h6>
                <p class="ms-3 m-0">牧野さん</p>
                <p class="ms-3 m-0">エムにゃん</p>
            </div>
        </div>
    </div>
</div>
@endsection