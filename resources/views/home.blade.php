@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="d-inline me-4">会議一覧</h3>
    <button type="button" class="btn btn-primary d-inline pes-1 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ＋追加
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pb-2">
                    <h4 class="modal-title" id="exampleModalLabel">会議の詳細</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('meeting') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">■タイトル</label>
                            <input type="title" class="form-control bg-white" id="title" name="title" value="テスト" placeholder="エムにゃんの1on1">
                        </div>
                        <div class="row g-3 form-group mb-2">
                            <label for="meeting_date">■日時</label>
                            <div class="col-5 m-0">
                                <input type="meeting_date" class="form-control bg-white d-inline" id="meeting_date" name="meeting_date" value="2020-01-01" placeholder="2022/08/20">
                            </div>
                            <div class="col-3 m-0">
                                <input type="start_time" class="form-control bg-white d-inline" id="start_time" name="start_time" value="17:00" placeholder="17:00">
                            </div>
                            <p class="col-auto pt-1 m-0">～</p>
                            <div class="col-3 m-0">
                                <input type="end_time" class="form-control bg-white d-inline" id="end_time" name="end_time" value="18:00" placeholder="18:00">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="meeting_user">■参加者</label>
                            <input type="meeting_user" class="form-control bg-white" id="meeting_user" name="meeting_user" value="エムにゃん" placeholder="エムにゃん">
                        </div>
                        <div class="form-group mb-2">
                            <label for="FormControlTextarea1">■MTGの内容</label>
                            <textarea class="form-control" id="agenda" name="agenda" value="たのしい1on1の時間だよ" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="FormControlTextarea2">■その他</label>
                            <textarea class="form-control" id="other" name="other" value="五反田" rows="1"></textarea>
                        </div>
                        <button class="btn btn-primary m-2" type="submit">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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