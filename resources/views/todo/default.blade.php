<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  @yield('content')
  <style>
    body {
      background-color: #333399;
    }

    .ttl {
      margin-left: 10%;
    }

    .card {
      background-color: #fff;
      width: 60%;
      margin: auto;
      padding: 20px;
      border-radius: 5px;
      margin-top: 15vw;
    }

    .flex {
      display: flex;
      justify-content: space-between;
    }

    .flex_end {}

    .create {
      width: 70%;
      height: 30px;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
      margin-left: 10%;
      margin-top: 15px;
    }

    .create__btn {
      color: #dc70fa;
      border-color: #dc70fa;
      background-color: #fff;
      border-radius: 5px;
      width: 60px;
      height: 40px;
      margin-left: 30px;
    }

    .table {
      margin: auto;
      padding-top: 30px;
    }

    .padding1 {
      padding: 0 50px;
    }

    .padding2 {
      padding: 0 20px;
    }

    .update_btn {
      color: #fa9770;
      background-color: #fff;
      border-radius: 5px;
      width: 60px;
      height: 40px;
      border-color: #fa9770;
    }

    .update_value {
      width: 120%;
      height: 30px;
    }

    .delete_btn {
      color: #71fadc;
      border-color: #71fadc;
      background-color: #fff;
      border-radius: 5px;
      width: 60px;
      height: 40px;
    }

    .search {
      text-decoration: none;
      color: #CCFF99;
      border:solid 2px #CCFF99;
      padding: 10px;
      margin-left: 10%;
      margin-bottom: 20px;
    }
  </style>
</body>

</html>