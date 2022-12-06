@extends('layouts.head')

@section('head')
<div class="container w90 mb40" >
  <h2 class="h1_title">管理システム</h2>
    <div class="search-form">
      <form action="/search" method="get">
        <table>
          <tr>
            <th>
              <p class="th-text w180">お名前</p>
            </th>
            <td>
              <input type="text" class="Form-Item-Input w240" name="fullname">
            </td>
            <td class="flex flex-left">
              <p class="th-text ml40 mr40">性別</p>
              <input type="radio" name="gender" id="both" value="" class="ml40" checked>
              <label class="th-text slim mr40" for="both"><p>全て</p></label>
              <input type="radio" name="gender" id="men" value="1" class="ml40">
              <label class="th-text slim mr40" for="men"><p>男性</p></label>
              <input type="radio" name="gender" id="woman" value="2" class="ml40">
              <label class="th-text slim mr40" for="woman"><p>女性</p></label>
            </td>
          </tr>
          <tr>
            <th>
              <p class="th-text w180 mt40">登録日</p>
            </th>
            <td>
              <input type="date" class="Form-Item-Input w240" name="created_at_from">
            </td>
            <td>
              <p class="ml20">~
                <input type="date" class="Form-Item-Input w240 ml20" name="created_at_to">
              </p>
            </td>
          </tr>
          <tr>
            <th>
              <p class="th-text w180 mt40">メールアドレス</p>
            </th>
            <td>
              <input type="text" class="Form-Item-Input w240" name="email">
            </td>
          </tr>
        </table>
        <button class="Btn mb10">検索</button>
        <div class="text-center mb20">
          <input value="リセット" type="reset">
        </div>
      </form>
    </div>
  <div class="inquiry-list_paginate mt40">
    <p>全{{ $contacts->total() }} 件中　{{ $contacts->firstItem() }}件〜{{ $contacts->lastItem() }}件を表示</p>
    {{ $contacts->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}  
  </div>
  <table class="space0 w100">
    <tr>
      <th class="inquiry-list_head-item">ID</th>
      <th class="inquiry-list_head-item">お名前</th>
      <th class="inquiry-list_head-item">性別</th>
      <th class="inquiry-list_head-item">メールアドレス</th>
      <th class="inquiry-list_head-item">ご意見</th>
      <th class="inquiry-list_head-item"></th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
      <td class="inquiry-list_detail">
        {{ $contact->id }}
      </td>
      <td class="inquiry-list_detail">
        {{ $contact->fullname }}
      </td>
      <td class="inquiry-list_detail">
        @if($contact->gender === 1)
        男性
        @else
        女性
        @endif
      </td>
      <td class="inquiry-list_detail">
        {{ $contact->email }}
      </td>
      <td class="inquiry-list_detail">
        <div class="opinion">
          <span id="hover-out"> {{ Str::limit($contact->opinion,75,'…')}}</span>
          <span class="All-comment">{{ $contact->opinion }}</span>
        </div>
      </td>
      <td>
        <form action="/delete/{{$contact->id}}" method="post">
          @csrf
          <button class="Btn delete-btn">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection