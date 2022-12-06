<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.zip2addr.js"></script>
  <script type="text/javascript">
    function check(obj)
    {
      if (obj.value == '') 
      document.getElementById(obj.id+'error').innerHTML = obj.id+'を入力してください'
    }
</script>
  @yield('head')
