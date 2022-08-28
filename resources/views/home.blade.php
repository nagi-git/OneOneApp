@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-5">
                <form>
                    <div class="form-group">
                        <label for="mtg-date">■日時</label>
                        <input type="mtg-date" class="form-control bg-white" id="mtg-date" placeholder="2022/08/20">
                    </div>
                    <div class="form-group">
                        <label for="participant">■参加者</label>
                        <input type="participant" class="form-control bg-white" id="participant" placeholder="エムにゃん">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">■MTGの内容</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">保存</button>
                </form>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">2022年8月27日</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        MTGの記録
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
