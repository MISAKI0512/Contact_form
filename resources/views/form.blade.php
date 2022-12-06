@extends('layouts.head')

@section('head')
<title>お問い合わせ</title>
</head>
<body>
  <div class="container max960 mb40">
    <form action="{{ route('form.confirm') }}" method="post" novalidate>
    @csrf  
      <h1 class="h1_title">お問い合わせ</h1>
        <table class="margin-LR-auto">
          <tr>
            <th>
              <p class="th-text w240">お名前<span class="red">※</span></p>
            </th>
            <td class="flex">
              <div>
                <input type="text" class="Form-Item-Input w100" name="last_name" value="{{ old('last_name') }}">
                <p class="placeholder">例）山田</p>
                @error('last_name')
                <p class="error-text">{{ $message }}</p>
                @enderror
              </div>
              <div class="ml20">
                <input type="text" class="Form-Item-Input w100" name="first_name" value="{{ old('first_name') }}">
                <p class="placeholder">例）太郎</p>
                @error('first_name')
                <p class="error-text">{{ $message }}</p>
                @enderror
              </div>
            </td>
          </tr>
          <tr>
            <th class="vertical-top w240">
              <p class="th-text">性別<span class="red">※</span></p>
            </th>
            <td colspan="2" class="flex flex-left">
              <input id="men" name="gender" value="1" class="form-input-radio" type="radio" {{ old('gender','1')==1 ? "checked":""}}>
              <label for="men" class="gender-text"><p>男性</p></label>
              <input id="woman" name="gender" value="2" class="form-input-radio" type="radio" {{ old('gender')==2? "checked":""}}>
              <label for="woman" class="gender-text"><p>女性</p></label>
            </td>
          </tr>
          <tr>
            <th class="w240">
              <p class="th-text mt50">メールアドレス<span class="red">※</span></p> 
            </th>
            <td colspan="2">
              <input type="text" class="Form-Item-Input w100" name="email" value="{{ old('email') }}" >
              <p class="placeholder">例）test@example.com</p>
              @error('email')
              <p class="error-text">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th class="w240">
              <p class="th-text mt20">郵便番号<span class="red">※</span></p>
            </th>
            <td colspan="2" class="flex">
              <p class="post-mark">〒</p>
              <div>
                <input type="text" class="Form-Item-Input w490" id="郵便番号" onKeyUp="$('#郵便番号').zip2addr('#住所');" name="postcode" value="{{ old('postcode') }}">
                <p class="placeholder">例）123-4567</p>
                @error('postcode')
                <p class="error-text">{{ $message }}</p>
                @enderror
              </div>
            </td>
          </tr>
          <tr>
            <th>
              <p class="th-text w240 mt20">住所<span class="red">※</span></p>
            </th>
            <td>
              <input type="text" class="Form-Item-Input w100" id="住所" name="address" value="{{ old('address') }}">
              <p class="placeholder">例）東京都渋谷区千駄ヶ谷1-2-3</p>
              @error('address')
              <p class="error-text">{{ $message }}</p>
              @enderror
            </td>
          </tr>
          <tr>
            <th> 
              <p class="th-text w240 mt20">建物名</p>
            </th>
            <td>
              <input type="text" class="Form-Item-Input w100"  name="building_name" value="{{ old('building_name') }}">
              <p class="placeholder">例）千駄ヶ谷マンション101</p>
            </td>
          </tr>
          <tr>
            <th class="vertical-top">
              <p class="th-text w240 mt20">ご意見<span class="red">※</span></p>
            </th>
            <td>
              <textarea class="Form-Item-Textarea mt20" name="opinion"> {{ old('opinion') }} </textarea>
              @error('opinion')
              <p class="error-text mt0">{{ $message }}</p>
              @enderror
            </td>
          </tr>
        </table>
      <input type="submit" class="Btn mb20" value="確認">
    </form>
  </div>
</body>
@endsection