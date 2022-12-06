@extends('layouts.head')

@section('head')
<title>内容確認</title>
</head>
<body>
  <form action="{{ route('form.store') }}" method="post" class="Form">
    @csrf 
    @foreach ($inputs as $key => $value)
    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <h1 class="h1_title">内容確認</h1>
    <table class="margin-LR-auto">
      <tr>
        <th>
          <p class="th-text w240">お名前</p>
        </th>
        <td>
          <p class="th-text slim W480">{{ $inputs["last_name"]." ".$inputs["first_name"] }}</p>
        </td>
      </tr>
      <tr>
        <th>
          <p class="th-text w240 mt20" >性別</p>
        </th>
        <td>
          @if ($inputs["gender"]==1)
            <p class="th-text slim W480">男性</p>
          @else
            <p class="th-text slim W480">女性</p>
          @endif
        </td>
      </tr>
      <tr>
        <th>
          <p class="th-text w240 mt20">メールアドレス</p>
        </th>
        <td>
          <p class="th-text slim W480">{{ $inputs["email"]}}</p>
        </td>
      </tr>
      <tr>
        <th>
          <p class="th-text w240 mt20">郵便番号</p>
        </th>
        <td>
          <p class="th-text slim W480">{{ $inputs["postcode"]}}</p>
        </td>
      </tr>
      <tr>
        <th>
          <p class="th-text w240 mt20">住所</p>
        </th>
        <td>
          <p class="th-text slim W480">{{ $inputs["address"]}}</p>
        </td>
      </tr>
      <tr>
        <th>
          <p class="th-text w240 mt20">建物名</p>
        </th>
        <td>
          <p class="th-text slim W480">{{ $inputs["building_name"]}}</p>
        </td>
      </tr>
      <tr>
        <th>
          <p class="th-text w240 mt20">ご意見</p>
        </th>
        <td>
          <p class="th-text slim W480">{{ $inputs["opinion"]}}</p>
        </td>
      </tr>
    </table>
    <input type="submit" value="送信" class="Btn" >
    <div class="text-center">
      <input name="back" type="submit"  value="修正する" class="backhover">
    </div>
  </form>
</body>
@endsection