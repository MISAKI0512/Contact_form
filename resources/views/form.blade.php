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
                <input type="text" class="Form-Item-Input w100" name="last_name" value="{{ old('last_name') }}" onblur="check(this)" id="苗字">
                <p class="placeholder">例）山田</p>
                <span class="error-text mt-20" id="苗字error"></span>
                @error('last_name')
                <span class="error-text ml0">{{ $message }}</span>
                @enderror
              </div>
              <div class="ml20">
                <input type="text" class="Form-Item-Input w100" name="first_name" value="{{ old('first_name') }}" onblur="check(this)" id="名前">
                <p class="placeholder">例）太郎</p>
                <span class="error-text mt-20" id="名前error"></span>
                @error('first_name')
                <span class="error-text ml0">{{ $message }}</span>
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
              <input type="text" class="Form-Item-Input w100" name="email" value="{{ old('email') }}" onblur="check(this)" id="メールアドレス">
              <p class="placeholder">例）test@example.com</p>
              <span class="error-text mt-20" id="メールアドレスerror"></span>
              @error('email')
              <span class="error-text ml0">{{ $message }}</span>
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
                <input type="text" class="Form-Item-Input w490" id="郵便番号" onKeyUp="$('#郵便番号').zip2addr('#住所');" name="postcode" value="{{ old('postcode') }}" onblur="check(this)" id="郵便番号">
                <p class="placeholder">例）123-4567</p>
                <span class="error-text mt-20" id="郵便番号error"></span>
                @error('postcode')
                <span class="error-text ml0">{{ $message }}</span>
                @enderror
              </div>
            </td>
          </tr>
          <tr>
            <th>
              <p class="th-text w240 mt20">住所<span class="red">※</span></p>
            </th>
            <td>
              <input type="text" class="Form-Item-Input w100" id="住所" name="address" value="{{ old('address') }}" onblur="check(this)" id="住所">
              <p class="placeholder">例）東京都渋谷区千駄ヶ谷1-2-3</p>
              <span class="error-text" id="住所error"></span>
              @error('address')
              <span class="error-text ml0">{{ $message }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <th> 
              <p class="th-text w240 mt20">建物名</p>
            </th>
            <td>
              <input type="text" class="Form-Item-Input w100"  name="building_name" value="{{ old('building_name') }}">
              <p class="placeholder mb20">例）千駄ヶ谷マンション101</p>
            </td>
          </tr>
          <tr>
            <th class="vertical-top">
              <p class="th-text w240 mt20">ご意見<span class="red">※</span></p>
            </th>
            <td>
              <textarea class="Form-Item-Textarea mt20" name="opinion" onblur="check(this)" id="ご意見">{{old('opinion')}}</textarea><br>
              <span class="error-text" id="ご意見error"></span>
              @error('opinion')
              <span class="error-text ml0">{{$message}}</span>
              @enderror
            </td>
          </tr>
        </table>
      <input type="submit" class="Btn mb20" value="確認">
    </form>
  </div>
</body>
@endsection